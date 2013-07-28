<div class="row-fluid">

    <div class="panel" id="form_login">

        <div class="panel-heading">
            <h3 class="panel-title">Вход в систему:</h3>
        </div>

        <?php $form = $this->beginWidget('CActiveForm', array('id' => 'login-form')); ?>
        <fieldset>
            <div class="form-group">
                <?=$form->label($model, 'email'); ?>
                <?=$form->textField($model, 'email', array('class' => 'form-control')); ?>
                <?=$form->error($model, 'email'); ?>
            </div>

            <div class="form-group">
                <?=$form->label($model, 'password'); ?>
                <?=$form->passwordField($model, 'password', array('class' => 'form-control')); ?>
                <?=$form->error($model, 'password'); ?>
            </div>

            <button type="submit" class="btn btn-success btn-primary">Войти</button>
        </fieldset>

        <?php $this->endWidget(); ?>
    </div>
</div>