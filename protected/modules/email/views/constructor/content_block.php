<div
    class="block-container <?= $model ? ($model->columns == 1 ? 'block-small-container' : 'block-big-container') : ($columns == 1 ? 'block-small-container' : 'block-big-container'); ?> <?= $model ? '' : 'new-block-container' ?>"
    data-block-id="<?= $model ? $model->id : 0 ?>">

    <div class="block-loader" style="display: none"></div>

    <div class="block-preview-container">
        <? if ($model == null): ?>
            <a href="#" class="btn-open-form">Создать блок</a>
        <? else: ?>
            <div class="preview-header">
                <span><?= $model->type == LetterBlock::TYPE_BANNER ? 'Баннер' : 'Продукт'; ?></span>

                <div class="actions">
                    <a href="#" class="glyphicon glyphicon-wrench btn-open-form"></a>
                    <a href="#" class="glyphicon glyphicon-trash btn-delete-block"></a>
                </div>
            </div>
            <? if ($model->type == LetterBlock::TYPE_BANNER): ?>
                <img src="<?= $model->getFullBannerUrl(); ?>">
                <div class="param-url">
                    <label>Ссылка на:</label>
                    <a href="<?= $model->url ?>" target="_blank"><?= $model->url ?></a>
                </div>
            <? else: ?>
                <div class="product-preview">
                    <span class="product-category"><?= $model->product_category ?></span>
                    <span class="product-model"><?= $model->product_model ?></span>

                    <div class="product-image">
                        <img src="<?= $model->getFullBannerUrl(); ?>">
                    </div>
                    <div class="prices-container">
                        <? if ($model->product_old_price): ?>
                            <span class="old-price"><?= $model->product_old_price ?></span>
                        <? endif; ?>
                        <span class="price"><?= $model->product_price ?></span>
                    </div>
                    <span class="product-yellow"><?= $model->product_yellow ?></span>
                    <? if ($model->product_features): ?>
                        <? foreach (is_array($model->product_features) ? $model->product_features : explode("\n", $model->product_features) as $feature): ?>
                            <li><?= $feature; ?></li>
                        <? endforeach; ?>
                    <? endif; ?>
                    <? if (!empty($model->product_all_url)): ?>
                        <div class="url-all">
                            <a href="<?= $model->product_all_url ?>"
                               target="_blank"><?= $model->product_all_label ?></a>
                        </div>
                    <? endif; ?>
                    <div class="param-url">
                        <label>Ссылка товара:</label>
                        <a href="<?= $model->getFullUrl() ?>" target="_blank"><?= $model->getFullUrl() ?></a>
                    </div>
                </div>
            <? endif; ?>
        <? endif; ?>
    </div>

    <? $this->renderPartial('/constructor/content_form', array('model' => $model, 'columns' => $model ? $model->columns : $columns)); ?>
</div>
