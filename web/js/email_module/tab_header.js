$(function () {
    var $container = $('#tab_header');

    $container.find('#top_text_input').on('change', function () {
        $.post('/email/ajax/top_text', {
            id: LetterHelper.GetId(),
            value: $(this).val()
        }, function(){
            LetterHelper.UpdatePreview();
        });
    });
});