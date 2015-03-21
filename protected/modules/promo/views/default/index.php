<div id="page_promo" class="page-list">
    <div class="page-header row">
        <div class="col-9"><h1>Промо-страница</h1></div>
    </div>
    <div class="row">
        <?php $form = $this->beginWidget('CActiveForm', array('id' => 'promo-form')); ?>
        <fieldset>

            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 form-group">
                    <?= $form->label($model, 'name'); ?>
                    <?= $form->textField($model, 'name', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'name'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 form-group">
                    <?= $form->label($model, 'type'); ?>
                    <?= $form->dropDownList($model, 'type', PromoForm::GetTypes(), array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'type'); ?>
                </div>
            </div>


            <div class="row row-submit">
                <button type="submit" class="btn btn-default btn-success">Скачать</button>
            </div>
        </fieldset>

        <?php $this->endWidget(); ?>

    </div>
</div>
