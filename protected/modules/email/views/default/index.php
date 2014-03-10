<div id="page_newspaper_index" class="page-list">
    <div class="page-header row">
        <div class="col-9"><h1>Рассылки</h1></div>
        <div class="col-3 buttons">
            <a href="/email/default/create" class="btn btn-small btn-primary">Новая рассылка</a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <th>Дата рассылки</th>
        <th>Название</th>
        <th>Рефф</th>
        <th class="cell-actions">Действия</th>
        </thead>
        <tbody>

        <? foreach ($models as $model): ?>
            <tr>
                <td><?= date('d.m.Y', strtotime($model->date)) ?></td>
                <td><?= $model->name ?></td>
                <td><?= $model->reff ?></td>
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

