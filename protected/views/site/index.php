<div id="page_home">
    <div class="page-header row">
        <div class="col-9"><h1>Газеты</h1></div>
        <div class="col-3 buttons">
            <a href="/newspaper/create" class="btn btn-small btn-primary">Новая газета</a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <th>Дата выхода</th>
        <th>Название</th>
        <th>Автор</th>
        <th class="cell-pages">Страниц</th>
        <th class="cell-actions">Действия</th>
        </thead>
        <tbody>
        <? foreach ($newspapers as $newsparer): ?>
            <tr>
                <td><?=$newsparer->date?></td>
                <td><?=$newsparer->name?></td>
                <td><?=$newsparer->user?></td>
                <td class="cell-pages"><?=count($newsparer->pages);?></td>
                <td class="cell-actions">
                    <a data-toggle="modal" href="/newspaper/html/<?= $newsparer->id ?>"
                       class="btn btn-small btn-warning">HTML код</a>
                    <a href="/pages/<?= $newsparer->id ?>" class="btn btn-small btn-info">Ссылки</a>
                    <a href="/newspaper/edit/<?= $newsparer->id ?>" class="btn btn-small btn-success">Редактировать</a>
                    <a onclick="return confirm('Вы уверены что хотите удалить газету?');"
                       href="/newspaper/delete/<?= $newsparer->id ?>" class="btn btn-small btn-danger">Удалить</a>
                </td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>

</div>

<script>
    $('[data-toggle="modal"]').click(function (e) {
        e.preventDefault();
        $('.btn-warning').attr('disabled', 'disabled');
        var url = $(this).attr('href');

        $.get(url, function (data) {
            $(data).modal();
            $('.btn-warning').removeAttr('disabled');
        });

    });
</script>

