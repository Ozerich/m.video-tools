<fieldset>

    <div class="row">
        <div class="col-12 constructor-container constructor-blocks-container constructor-container-footer">
            <span>Структура:</span>

            <div class="blocks">
                <? foreach ($model->footer_blocks as $block): ?>
                    <? $this->renderPartial('/constructor/simple_block', array('model' => $block)); ?>
                <? endforeach; ?>
            </div>
            <? $this->renderPartial('/constructor/simple_block', array('model' => null)); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12 footer-stocks-container">
            <span>Акции:</span>

            <div class="stocks">
                <? foreach ($model->stocks as $stock): ?>
                    <? $this->renderPartial('/default/tabs/footer/_stock', array('stock' => $stock)); ?>
                <? endforeach; ?>
            </div>

            <? $this->renderPartial('/default/tabs/footer/_stock', array('stock' => new LetterStock())); ?>

            <div class="add-btn-container">
                <a href="#" class="btn btn-mini btn-primary btn-add">Добавить акцию</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 disclaimer-container">
            <span>Дисклеймер:</span>
            <textarea class="form-control disclaimer-input"><?= $model->disclaimer ?></textarea>
        </div>
    </div>
</fieldset>

<script>
    $(function () {
        $('.constructor-container-footer').BlockConstructor({
            position: 'footer'
        });
    });
</script>