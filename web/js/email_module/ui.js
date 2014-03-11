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

    }
};

$(function () {
    $('.nav-tabs a').click(function () {
        $(this).tab('show');
        return false;
    })
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
            }
            else {

            }

            LetterHelper.UpdateContructorPositions($constructor);
        });

        return false;
    });

};