var LetterHelper = {
    GetId: function () {
        return parseInt($('#letter_id').val());
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

    $constructor.on('click', '.block-container .btn-open-form', function () {
        var $block = $(this).parents('.block-container');
        $block.find('.block-preview-container').hide();
        $block.find('.form-container').show();

        return false;
    });

    $constructor.find('.form-container .param-type input').on('change', function () {
        var $form_container = $(this).parents('.form-container');

        if ($form_container.find('.param-type input:checked').val() == 'banner') {
            $form_container.find('.param-banner-container').show();
            $form_container.find('.param-text-container').hide();
        }
        else {
            $form_container.find('.param-banner-container').hide();
            $form_container.find('.param-text-container').show();
        }
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

        $.post('/email/ajax/delete_block', {id: $(this).parents('.block-container').data('block-id')});

        $(this).parents('.block-container').slideDown(function () {
            $(this).remove();
        });

        return false;
    });

    $constructor.on('click', '.form-container .btn-submit', function () {
        var $form = $(this).parents('.block-container');

        var request = {
            id: $form.data('block-id') || null,
            position: options.position,
            letter_id: LetterHelper.GetId(),
            type: $form.find('.param-type input:checked').val(),
            data: {}
        };

        if (request.type == 'banner') {
            request.data = {
                url: $form.find('.input-url').val(),
                file: $form.find('.input-file').val()
            };
        }
        else if (request.type == 'text') {
            request.data = {
                text: $form.find('.input-text').val()
            };
        }

        $form.find('.block-loader').show();

        $.post('/email/ajax/submit_block', request, function (data) {
            $form.find('.block-loader').hide();

            data = jQuery.parseJSON(data);
  
            if (data.success) {
                $form.find('.block-preview-container').show();
                $form.find('.form-container').hide();

                if (request.id == null) {
                    $constructor.find('.blocks').append(data.block);
                }
                else {
                    $form.replaceWith(data.block);
                }
            }
            else{

            }
        });

        return false;
    });

};