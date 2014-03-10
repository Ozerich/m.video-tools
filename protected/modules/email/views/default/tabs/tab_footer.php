<fieldset>
    <div class="row">
        <div class="col-12 constructor-container constructor-container-footer">
            <span>Структура:</span>

            <div class="blocks">
                <? foreach ($model->footer_blocks as $block): ?>
                    <? $this->renderPartial('/constructor/simple_block', array('model' => $block)); ?>
                <? endforeach; ?>
            </div>
            <? $this->renderPartial('/constructor/simple_block', array('model' => null)); ?>
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