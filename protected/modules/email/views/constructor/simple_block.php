<div class="block-container <?= $model ? '' : 'new-block-container' ?>" data-block-id="<?= $model ? $model->id : 0 ?>">

    <div class="block-loader" style="display: none"></div>


    <div class="block-preview-container">
        <? if ($model == null): ?>
            <a href="#" class="btn-open-form">Создать блок</a>
        <? else: ?>
            <div class="preview-header">
                <span><?= $model->getBlockName() ?></span>

                <div class="actions">
                    <a href="#" class="glyphicon glyphicon-wrench btn-open-form"></a>
                    <a href="#" class="glyphicon glyphicon-trash btn-delete-block"></a>
                </div>
            </div>
            <? if ($model->type == LetterBlock::TYPE_BANNER): ?>

                <? $imgs = $model->getFullBannerUrl(); $imgs = is_array($imgs) ? $imgs : array($imgs); ?>
                <? foreach ($imgs as $img): ?>
                    <img src="<?= $img ?>">
                <? endforeach; ?>

                <? if (!empty($model->banner_url)): ?>
                    <div class="param-url">
                        <? if ($model->isSimple()): ?>
                            <label>Ссылка на:</label>
                            <a href="<?= $model->banner_url ?>" target="_blank"><?= $model->banner_url ?></a>
                        <? else: ?>
                            <label>Ссылки на:</label>
                            <? foreach ($model->banner_area_coords as $url): ?>
                                <a href="<?= $url ?>" target="_blank"><?= $url ?></a>
                            <? endforeach; ?>
                        <? endif; ?>
                    </div>
                <? endif; ?>
            <? else: ?>
                <p><?= HtmlHelper::CodeToHtml($model->text) ?></p>
            <? endif; ?>
        <? endif; ?>
    </div>

    <? $this->renderPartial('/constructor/simple_form', array('model' => $model)); ?>
</div>
