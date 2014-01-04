<div id="page_newspaper_create">

    <div class="page-header row">
        <div class="col-9"><h1>Новая газета</h1></div>

    </div>

    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'login-form')); ?>
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

        <div class="row">
            <div class="col-3 form-group">
                <label for="pages_count">Количество страниц:</label>
                <select id="pages_count" name="pages_count" class="form-control">
                    <? for ($i = 1; $i <= 20; $i++): ?>
                        <option value="<?= $i ?>" <?=$i == $pages_count ? 'selected' : ''?>><?=$i?></option>
                    <? endfor; ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h2>Фоновые изображения</h2>
            </div>
        </div>

        <div class="row page-background template">
            <div class="col-9 form-group">
                <label>URL фоновой картинки №<span class="num"></span></label>
                <input type="text" name="background" class="form-control">
            </div>
        </div>

        <div class="backgrounds-container">

        </div>

        <div class="row row-submit">
            <button type="submit" class="btn btn-default btn-success">Добавить газету</button>
        </div>

    </fieldset>

    <?php $this->endWidget(); ?>
</div>


<script>
    $(function () {

        $('#pages_count').on('change',function () {
            var $container = $('.backgrounds-container').empty();
            var $template = $('.page-background.template');

            for (var i = 1; i <= $(this).find('option:selected').val(); i++) {
                var $block = $template.clone();
                $block.removeClass('template').show();
                $block.find('.num').text(i);
                $block.find('input[type=text]').attr('name', 'background_' + i);
                $container.append($block);
            }
        }).trigger('change');
    });
</script>