<div id="page_email_create">

    <div class="page-header row">
        <div class="col-9"><h1>Новая рассылка</h1></div>

    </div>

    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'email-form', 'htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>
    <fieldset>

        <div class="row">
            <div class="col-12 form-group">
                <?= $form->label($model, 'layout'); ?>
                <?= $form->dropDownList($model, 'layout', Letter::GetLayouts(), array('class' => 'form-control')); ?>
                <?= $form->error($model, 'layout'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-9 form-group">
                <?= $form->label($model, 'name'); ?>
                <?= $form->textField($model, 'name', array('class' => 'form-control')); ?>
                <?= $form->error($model, 'name'); ?>
            </div>

            <div class="col-3 form-group">
                <?= $form->label($model, 'date'); ?>
                <?= $form->textField($model, 'date', array('class' => 'form-control')); ?>
                <?= $form->error($model, 'date'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-6 form-group">
                <?= $form->label($model, 'reff'); ?>
                <?= $form->textField($model, 'reff', array('class' => 'form-control')); ?>
                <?= $form->error($model, 'reff'); ?>
            </div>
            <div class="col-6 form-group">
                <?= $form->label($model, 'utm_campaign'); ?>
                <?= $form->textField($model, 'utm_campaign', array('class' => 'form-control')); ?>
                <?= $form->error($model, 'utm_campaign'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-12 form-group">
                <?= $form->label($model, 'images_url'); ?>
                <?= $form->textField($model, 'images_url', array('class' => 'form-control')); ?>
                <?= $form->error($model, 'images_url'); ?>
            </div>
        </div>
		
        <div class="row">
		    <div class="col-3 form-group">
                <?= $form->label($model, 'layout'); ?>
                <?= $form->dropDownList($model, 'layout', Letter::GetLayouts(), array('class' => 'form-control')); ?>
                <?= $form->error($model, 'layout'); ?>
            </div>
            <div class="col-3 form-group">
                <label>Ширина страницы</label>
                <input type="text" name="Letter[options][page_width]" value="638" class="form-control">
            </div>
            <div class="col-3 form-group">
                <label>Ширина контента</label>
                <input type="text" name="Letter[options][content_width]" value="600" class="form-control">
            </div>
			<div class="col-3 form-group">
                <label>Короткая версия</label>
				<select name="Letter[options][short_mode]" class="form-control">
					<option value="0" selected>Нет</option>
					<option value="1">Да</option>
				</select>
            </div>
        </div>

        <div class="row">
            <div class="col-9 form-group">
                <label>Копировать из:</label>
                <select class="form-control" name="copy_from">
                    <option value="0" selected>Не копировать</option>
                    <? foreach (Letter::model()->findAll() as $letter): ?>
                        <option value="<?= $letter->id ?>"><?= $letter->name ?></option>
                    <? endforeach; ?>
                </select>
            </div>
        </div>



        <div class="row">
            <div class="col-9 form-group">
                <label>Импорт из файла:</label>
                <input type="file" name="import_file">
            </div>
        </div>

        <div class="row row-submit">
            <button type="submit" class="btn btn-default btn-success">Создать рассылку</button>
        </div>
    </fieldset>

    <?php $this->endWidget(); ?>
</div>