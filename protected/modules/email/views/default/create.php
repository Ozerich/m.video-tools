<div id="page_email_create">

    <div class="page-header row">
        <div class="col-9"><h1>Новая рассылка</h1></div>

    </div>

    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'email-form')); ?>
    <fieldset>
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
            <div class="col-9 form-group">
                <?= $form->label($model, 'reff'); ?>
                <?= $form->textField($model, 'reff', array('class' => 'form-control')); ?>
                <?= $form->error($model, 'reff'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-9 form-group">
                <?= $form->label($model, 'images_url'); ?>
                <?= $form->textField($model, 'images_url', array('class' => 'form-control')); ?>
                <?= $form->error($model, 'images_url'); ?>
            </div>
        </div>

        <div class="row row-submit">
            <button type="submit" class="btn btn-default btn-success">Создать рассылку</button>
        </div>
    </fieldset>

    <?php $this->endWidget(); ?>
</div>