var LetterHelper = {
    GetId: function () {
        return parseInt($('#letter_id').val());
    },

    UpdateContructorPositions: function ($constructor) {
        var $blocks = $constructor.find('.block-container').not('.block-big-container.new-block-container');

        $constructor.find('.block-small-container').css('clear', 'none').removeClass('block-right');

        var new_in_pair = false;

        for (var i = 0; i < $blocks.length - 1; i++) {
            var pair = [$($blocks.get(i)), $($blocks.get(i + 1))];

            if (pair[0].hasClass('block-small-container') && pair[1].hasClass('block-small-container')) {
                pair[0].css('clear', 'both');
                pair[1].addClass('block-right');
                i++;

                if (pair[0].hasClass('new-block-container') || pair[1].hasClass('new-block-container')) {
                    new_in_pair = true;
                }
            }
        }

        if (new_in_pair == false) {
            $constructor.find('.block-small-container.new-block-container').css('clear', 'both');
        }
    },

    UpdatePreview: function () {
        $('.viewer-container .loader').show();
        $('.viewer-container .viewer-container-inner').hide();
        $('.viewer-container iframe').get(0).contentWindow.location.reload(true);
    }
};

$(function () {
    $('.nav-tabs a').click(function () {
        $(this).tab('show');
        return false;
    });


    $('.viewer-container iframe').on('load', function () {
        $('.viewer-container .loader').hide();
        $('.viewer-container .viewer-container-inner').show().find('.iframe-container').height($(this).get(0).contentWindow.document.body.scrollHeight);
    });

    $('.viewer-container .btn-send-preview').on('click', function () {
        var email = $('.viewer-container .email-container input').val();

        if (email.length == 0) {
            alert('Введите e-mail');
        }

        var $btn = $(this);

        $btn.prop('disabled', true).text('Отправка...');

        $.post('/email/ajax/SendPreview', {id: LetterHelper.GetId(), email: email}, function () {
            alert('Рассылка отправлена');
            $btn.prop('disabled', false).text('Отправить');
        });

        return false;
    });


    $('.btn-download').on('click', function () {
        var $btn = $(this);
        var request = {id: LetterHelper.GetId(), regions: []};

        $('.regions-container .regions input:checked').each(function () {
            request.regions.push($(this).attr('name'));
        });

        $('.zip-link').hide();
        $btn.prop('disabled', true).text('Создание архива...');

        $.post('/email/ajax/download', request, function (response) {
            $btn.prop('disabled', false).text('Скачать');
            $('.zip-link').attr('href', response).show();
        });



        return false;
    });
});

$.fn.BlockConstructor = function (options) {


    var $constructor = $(this);

    $(window).load(function () {
        LetterHelper.UpdateContructorPositions($constructor);
    });

    $constructor.on('click', '.block-container .btn-open-form', function () {
        var $block = $(this).parents('.block-container');
        $block.find('.block-preview-container').hide();
        $block.find('.form-container').show();

        LetterHelper.UpdateContructorPositions($constructor);

        return false;
    });

    $constructor.find('.form-container .param-type input').on('change', function () {
        var $form_container = $(this).parents('.form-container');

        var val = $form_container.find('.param-type input:checked').val();
        $form_container.find('.param-container').hide();
        $form_container.find('.param-' + val + '-container').show();

    });

    $constructor.on('click', '.form-container .btn-cancel', function () {
        var $block = $(this).parents('.block-container');
        $block.find('.block-preview-container').show();
        $block.find('.form-container').hide();


        return false;
    });

    $constructor.on('click', '.block-container .btn-delete-block', function () {
        if (!confirm('Вы уверены что хотите удалить блок?')) {
            return false;
        }

        $.post('/email/ajax/delete_block', {
            id: $(this).parents('.block-container').data('block-id'),
            type: $constructor.hasClass('constructor-content-container') ? 'catalog' : 'block'
        }, function () {
            LetterHelper.UpdatePreview();
        });

        $(this).parents('.block-container').slideDown(function () {
            $(this).remove();
        });

        return false;
    });

    $constructor.on('click', '.form-container .btn-submit', function () {
        var $form = $(this).parents('.block-container');

        var data = {};

        $form.find('.param-container:visible :input').each(function () {
            data[$(this).attr('name')] = $(this).val();
        });

        var request = {
            id: $form.data('block-id') || null,
            position: options.position,
            letter_id: LetterHelper.GetId(),
            type: $form.find('.param-type input:checked').val(),
            data: data,
            columns: $form.hasClass('block-small-container') ? 1 : 2
        };


        $form.find('.block-loader').show();

        $.post('/email/ajax/submit_block', request, function (data) {
            $form.find('.block-loader').hide();

            data = jQuery.parseJSON(data);

            if (data.success) {
                $form.find('.block-preview-container').show();
                $form.find('.form-container').hide();

                if (request.id == null) {
                    if (request.position == 'catalog') {
                        $(data.block).insertBefore($constructor.find('.block-small-container.new-block-container'));
                    }
                    else {
                        $constructor.find('.blocks').append(data.block);
                    }
                }
                else {
                    $form.replaceWith(data.block);
                }

                LetterHelper.UpdatePreview();
            }
            else {

            }

            LetterHelper.UpdateContructorPositions($constructor);
        });

        return false;
    });

};