<div id="page_email_index" class="page-list">
    <div class="page-header row">
        <div class="col-9"><h1>Рассылки</h1></div>
        <div class="col-3 buttons">
            <a href="/email/default/create" class="btn btn-small btn-primary">Новая рассылка</a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <th class="cell-date">Дата рассылки</th>
        <th class="cell-name">Название</th>
        <th class="cell-reff">utm_campaign</th>
        <th class="cell-actions">Действия</th>
        </thead>
        <tbody>

        <? foreach ($models as $model): ?>
            <tr>
                <td class="cell-date"><?= date('d.m.Y', strtotime($model->date)) ?></td>
                <td class="cell-name"><?= $model->name ?></td>
                <td class="cell-reff"><?= $model->utm_campaign ?></td>
                <td class="cell-actions">
                    <a href="/email/default/edit/<?= $model->id ?>" class="btn btn-small btn-success">Редактировать</a>
                    <a onclick="return confirm('Вы уверены что хотите удалить рассылку?');"
                       href="/email/default/delete/<?= $model->id ?>"
                       class="btn btn-small btn-danger">Удалить</a>
                </td>
            </tr>
        <? endforeach; ?>

        </tbody>
    </table>

</div>

