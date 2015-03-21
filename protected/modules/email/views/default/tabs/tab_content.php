<div class="tab-loader"><p>Загрузка...</p></div>
<div class="col-12 constructor-container constructor-content-container">
    <div class="blocks">
        <? foreach ($model->catalog_blocks as $block): ?>
            <? $this->renderPartial('/constructor/content_block', array('model' => $block)); ?>
        <? endforeach; ?>
        <? $this->renderPartial('/constructor/content_block', array('model' => null, 'columns' => 1)); ?>
        <? $this->renderPartial('/constructor/content_block', array('model' => null, 'columns' => 2)); ?>
    </div>
</div>

<script>
    $(function () {
        $('.constructor-content-container').BlockConstructor({
            position: 'catalog'
        });
    });
    $(window).load(function () {
        $('#tab_content .tab-loader').hide();
    });
</script>