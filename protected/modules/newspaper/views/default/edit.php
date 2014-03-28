<div id="page_newspaper_edit">

    <div class="page-header row">
        <div class="col-9"><h1>Газета "<?=$model->name?>"</h1></div>
        <div class="col-3 buttons">
            <a href="/newspaper/pages/view/<?= $model->id ?>" class="btn btn-primary">Редактировать ссылки</a>
        </div>
    </div>

    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'login-form', 'htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>

    <fieldset>
        <div class="row">
            <div class="col-6 form-group">
                <?=$form->label($model, 'name'); ?>
                <?=$form->textField($model, 'name', array('class' => 'form-control')); ?>
                <?=$form->error($model, 'name'); ?>
            </div>

            <div class="col-3 form-group">
                <?=$form->label($model, 'reff'); ?>
                <?=$form->textField($model, 'reff', array('class' => 'form-control')); ?>
                <?=$form->error($model, 'reff'); ?>
            </div>

            <div class="col-3 form-group">
                <?=$form->label($model, 'date'); ?>
                <?=$form->textField($model, 'date', array('class' => 'form-control')); ?>
                <?=$form->error($model, 'date'); ?>
            </div>
        </div>
        <div class="row row-submit">
            <input type="submit" class="btn btn-success" value="Сохранить">
        </div>
    </fieldset>

    <? $this->endWidget(); ?>

    <div class="pages-container">
        <h2>Страницы</h2>

        <form action="/newspaper/update_positions/<?= $model->id ?>" method="post">
            <table class="table">
                <thead>
                <tr>
                    <th class="cell-num">Номер</th>
                    <th class="cell-image">Картинка</th>
                    <th class="cell-count">Кол-во ссылок</th>
                    <th class="cell-actions">Действия</th>
                </tr>
                </thead>
                <tbody>
                <? foreach ($model->pages as $page): ?>
                    <tr data-id="<?= $page->id ?>">
                        <td class="cell-num">
                            <select name="num[<?=$page->id?>]">
                                <? for($i = 1; $i <= count($model->pages); $i++): ?>
                                    <option <?=$page->num == $i ? 'selected' : ''?> value="<?=$i?>"><?=$i?></option>
                                <? endfor; ?>
                            </select>
                        </td>
                        <td class="cell-image">
                            <div class="edit-container">
                                <input type="text" value="<?= $page->image ?>">
                                <a title="Изменить ссылку" href="#" class="glyphicon glyphicon-circle-arrow-down icon-ok"></a>
                            </div>
                            <img src="<?= $page->image ?>">
                        </td>
                        <td class="cell-count"><?=count($page->regions);?></td>
                        <td class="cell-actions">
                            <a class="btn btn-small btn-info"
                               href="/newspaper/pages/view/<?= $model->id ?>/?page=<?= $page->id ?>">Ссылки</a>
                            <a class="btn btn-small btn-danger action-delete"
                               href="/newspaper/default/delete_page/<?= $page->id ?>">Удалить</a>
                        </td>
                    </tr>
                <? endforeach; ?>
                </tbody>
            </table>

                <div class="row">
                    <div class="col-3">
                                   <? if ($model->pages): ?> <input type="submit" class="btn btn-small btn-primary" value="Сохранить порядок">            <? endif; ?>
					</div>
					<div class="col-6">
					</div>
					<div class="col-3" style="text-align: right">
						<a href="/newspaper/add_page/<?=$model->id?>" class="btn btn-small btn-success">Добавить страницу</a>
                    </div>
                </div>

        </form>
    </div>
</div>

<script>
    $(function () {
        $('table .action-delete').on('click', function () {
            if (!confirm('Вы уверены что хотите удалить страницу?'))return false;
            $.get($(this).attr('href'));
            $(this).parents('tr').remove();
            return false;
        });

        $('table .cell-image .icon-ok').on('click', function () {
            var $block = $(this).parents('td');
            var pageId = $(this).parents('tr').data('id');
            var src = $block.find('input[type=text]').val();

            $block.find('img').attr('src', src);
            $.post('/newspaper/default/update_page_image', {page_id: pageId, src: src});

            return false;
        });

    });
</script>