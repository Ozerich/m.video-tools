$(function () {


    var $container = $('#tab_footer');

    function updateStockArrows() {
        $container.find('tbody tr').not('.new-stock').find('.btn-stock-up, .btn-stock-down').show();
        $container.find('tbody tr').not('.new-stock').first().find('.btn-stock-up').hide();
        $container.find('tbody tr').not('.new-stock').last().find('.btn-stock-down').hide();
    }

    updateStockArrows();


    $container.find('.btn-add-stock').on('click', function () {
        $container.find('.new-stock').clone().appendTo($container.find('tbody')).removeClass('new-stock').show();
        updateStockArrows();
        return false;
    });

    $container.on('click', '.btn-stock-remove', function () {
        $(this).parents('tr').remove();
        updateStockArrows();
        return false;
    });


    $container.on('click', '.btn-stock-up,.btn-stock-down', function () {
        var $row = $(this).parents('tr');
        if ($(this).hasClass('btn-stock-up')) {
            $row.insertBefore($row.prev());
        }
        else {
            $row.insertAfter($row.next());
        }
        updateStockArrows();
        return false;
    });


    var $stocks_container = $container.find('.footer-stocks-container');

    $stocks_container.on('click', '.btn-delete', function () {
        if (!confirm("Вы уверены, что хотите удалить акцию?")) {
            return false;
        }

        $.post('/email/ajax/delete_stock', {id: $(this).parents('.stock').data('id')});

        $(this).parents('.stock').remove();

        LetterHelper.UpdatePreview();

        return false;
    });

    $stocks_container.on('click', '.btn-edit-start', function () {
        var $block = $(this).parents('.stock');

        $block.find('.stock-closed').hide();
        $block.find('.stock-opened').show();

        return false;
    });

    $stocks_container.on('click', '.btn-cancel', function () {
        var $block = $(this).parents('.stock');


        if ($block.hasClass('stock-new')) {
            $block.hide();
            $stocks_container.find('.btn-add').show();
        }
        else {
            $block.find('.stock-closed').show();
            $block.find('.stock-opened').hide();
        }

        return false;
    });

    $stocks_container.on('click', '.btn-save', function () {
        var $block = $(this).parents('.stock');

        var request = $block.find(':input').serialize() + '&letter_id=' + LetterHelper.GetId();

        $block.find('.stock-closed > span').text($block.find('.stock-opened input[name=label]').val());
        $block.find('.btn-cancel').trigger('click');


        if ($block.hasClass('stock-new')) {
            var $new_block = $block.clone().removeClass('stock-new').appendTo($stocks_container.find('.stocks'));
            $new_block.show().find('.stock-closed').show();
            $new_block.find('.stock-opened').hide();


            $.post('/email/ajax/submit_stock', request, function (data) {
                data = jQuery.parseJSON(data);
                $new_block.data('id', data.id);

                LetterHelper.UpdatePreview();
            });
        }
        else {
            request += '&id=' + $block.data('id');
            $.post('/email/ajax/submit_stock', request, function () {
                LetterHelper.UpdatePreview();
            });
        }


        return false;
    });

    $stocks_container.on('change', 'input[name=on_footer]', function () {
        $(this).parents('.stock').find('.date-input').toggle($(this).is(':checked'));
    });


    $stocks_container.find('.btn-add').on('click', function () {
        $stocks_container.find('.stock-new').show().find('.stock-closed').hide();
        $(this).hide();
        return false;
    });


    $container.find('.disclaimer-input').on('change', function () {
        $.post('/email/ajax/disclaimer', {
            id: LetterHelper.GetId(),
            value: $(this).val()
        }, function () {
            LetterHelper.UpdatePreview();
        });
    });
});