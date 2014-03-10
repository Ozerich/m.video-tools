<fieldset>
    <div class="row">
        <div class="col-9 form-group">
            <label>Текст сверху страницы</label>
            <input type="text" id="top_text_input" value="<?= $model->top_text ?>" class="form-control">
        </div>
        <div class="col-12 constructor-container constructor-container-header">
            <span>Структура:</span>
            <div class="blocks">
                <? foreach ($model->header_blocks as $block): ?>
                    <? $this->renderPartial('/constructor/simple_block', array('model' => $block)); ?>
                <? endforeach; ?>
            </div>
            <? $this->renderPartial('/constructor/simple_block', array('model' => null)); ?>
        </div>
    </div>
</fieldset>

<script>
    $(function () {
        $('.constructor-container-header').BlockConstructor({
            position: 'header'
        });
    });
</script>