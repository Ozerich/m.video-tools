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

    $container.find('.btn-save-stocks').on('click', function () {

        var stocks = [];

        $container.find('tbody tr').not('.new-stock').each(function () {
            stocks.push({
                name: $(this).find('.cell-name').find('input').val(),
                url: $(this).find('.cell-url').find('input').val()
            });
        });

        $.post('/email/ajax/save_stocks', {
            letter_id: LetterHelper.GetId(),
            stocks: stocks
        }, function(){
            LetterHelper.UpdatePreview();
        });

        alert('Акции сохранены');

        return false;
    });


    $container.find('.disclaimer-input').on('change', function () {
        $.post('/email/ajax/disclaimer', {
            id: LetterHelper.GetId(),
            value: $(this).val()
        }, function(){
            LetterHelper.UpdatePreview();
        });
    });
});