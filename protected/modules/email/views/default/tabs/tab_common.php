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


        <div class="row row-submit">
            <button type="submit" class="btn btn-default btn-success">Сохранить</button>
        </div>
    </fieldset>

<?php $this->endWidget(); ?>