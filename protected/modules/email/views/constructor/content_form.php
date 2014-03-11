<? $type = $model && $model->type == LetterCatalogBlock::TYPE_BANNER ? LetterCatalogBlock::TYPE_BANNER : LetterCatalogBlock::TYPE_PRODUCT; ?>
<div class="form-container" style="display: none">

    <div class="form-inner">

        <div class="param param-type">
            <label>Тип блока:</label>

            <div class="param-input">
                <label><input type="radio" name="content_param_type_<?= $columns ?>_<?= $model ? $model->id : '' ?>"
                              value="product" <?= $type == LetterCatalogBlock::TYPE_PRODUCT ? 'checked' : '' ?>>
                    Товар</label>
                <label><input type="radio" name="content_param_type_<?= $columns ?>_<?= $model ? $model->id : '' ?>"
                              value="banner" <?= $type == LetterCatalogBlock::TYPE_BANNER ? 'checked' : '' ?>>
                    Баннер</label>
            </div>
        </div>

        <div class="param-container param-product-container"
             style="display:<?= $type == LetterCatalogBlock::TYPE_PRODUCT ? 'block' : 'none' ?>">
            <div class="param">
                <label>Категория товара:</label>
                <input type="text" class="form-control" name="category"
                       value="<?= $model ? $model->product_category : '' ?>">
            </div>
            <div class="param">
                <label>Модель товара:</label>
                <input type="text" class="form-control" name="model" value="<?= $model ? $model->product_model : '' ?>">
            </div>
            <div class="param">
                <label>Код товара (или ссылка):</label>
                <input type="text" class="form-control" name="url" value="<?= $model ? $model->url : '' ?>">
            </div>
            <div class="param">
                <label>Имя файла:</label>
                <input type="text" class="form-control" name="image" value="<?= $model ? $model->image : '' ?>">
            </div>
            <div class="param">
                <label>Текст в желтом блоке:</label>
                <input type="text" class="form-control" name="yellow"
                       value="<?= $model ? $model->product_yellow : '' ?>">
            </div>
            <div class="param">
                <label>Старая цена:</label>
                <input type="text" class="form-control" name="old_price"
                       value="<?= $model ? $model->product_old_price : '' ?>">
            </div>
            <div class="param">
                <label>Цена:</label>
                <input type="text" class="form-control" name="price" value="<?= $model ? $model->product_price : '' ?>">
            </div>
            <div class="param">
                <label>Характеристики:</label>
                <textarea class="form-control"
                          name="features"><?= $model ? (is_array($model->product_features) ? implode("\n", $model->product_features) : $model->product_features) : '' ?></textarea>
            </div>
            <div class="param">
                <label>Адрес ссылки под товаром:</label>
                <input type="text" class="form-control" name="product_all_url" value="<?= $model ? $model->product_all_url : '' ?>">
            </div>
            <div class="param">
                <label>Текст ссылки под товаром:</label>
                <input type="text" class="form-control" name="product_all_label" value="<?= $model ? $model->product_all_label : '' ?>">
            </div>
        </div>

        <div class="param-container param-banner-container"
             style="display:<?= $type == LetterCatalogBlock::TYPE_BANNER ? 'block' : 'none' ?>">
            <div class="param">
                <label>Имя файла:</label>
                <input type="text" name="image" class="form-control input-file"
                       value="<?= $type == LetterCatalogBlock::TYPE_BANNER && $model ? $model->image : '' ?>">
            </div>
            <div class="param">
                <label>Ссылка:</label>
                <input type="text" name="url" class="form-control input-url"
                       value="<?= $type == LetterCatalogBlock::TYPE_BANNER && $model ? $model->url : '' ?>">
            </div>
        </div>


    </div>

    <div class="form-buttons">
        <a href="#" class="btn btn-mini btn-danger btn-cancel">Отмена</a>
        <a href="#" class="btn btn-mini btn-success btn-submit"><?= $model ? 'Сохранить' : 'Добавить' ?></a>
    </div>

</div>