<div class="block-container <?= $model ? '' : 'new-block-container' ?>" data-block-id="<?= $model ? $model->id : 0 ?>">

    <div class="block-loader" style="display: none"></div>


    <div class="block-preview-container">
        <? if ($model == null): ?>
            <a href="#" class="btn-open-form">Создать блок</a>
        <? else: ?>
            <div class="preview-header">
                <span><?= $model->type == LetterBlock::TYPE_BANNER ? 'Баннер' : 'Текстовый блок'; ?></span>

                <div class="actions">
                    <a href="#" class="glyphicon glyphicon-wrench btn-open-form"></a>
                    <a href="#" class="glyphicon glyphicon-trash btn-delete-block"></a>
                </div>
            </div>
            <? if ($model->type == LetterBlock::TYPE_BANNER): ?>
                <img src="<?= $model->getFullBannerUrl(); ?>">
                <div class="param-url">
                    <label>Ссылка на:</label>
                    <a href="<?= $model->banner_url ?>" target="_blank"><?= $model->banner_url ?></a>
                </div>
            <? else: ?>
                <p><?= $model->text ?></p>
            <? endif; ?>
        <? endif; ?>
    </div>

    <? $this->renderPartial('/constructor/simple_form', array('model' => $model)); ?>
</div>
