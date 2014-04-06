<div
    class="stock <?= $stock->isNewRecord ? 'stock-new' : '' ?>" <?= !$stock->isNewRecord ? 'data-id="' . $stock->id . '"' : 'style="display: none"' ?>>

    <div class="stock-closed">
        <span><?= $stock->label ?></span>

        <div class="buttons">
            <a href="#" class="btn btn-mini btn-success btn-edit-start">Редактировать</a>
            <a href="#" class="btn btn-mini btn-danger btn-delete">Удалить</a>
        </div>
    </div>

    <div class="stock-opened" style="display: <?= $stock->isNewRecord ? 'block' : 'none' ?>">
        <div>
            <div class="col-12">
                <label><?= $stock->getAttributeLabel('label') ?></label>
                <input type="text" class="form-control" name="label" value="<?= $stock->label ?>">
            </div>
        </div>
        <div>
            <div class="col-12">
                <label><?= $stock->getAttributeLabel('url') ?></label>
                <input type="text" class="form-control" name="url" value="<?= $stock->url ?>">
            </div>
        </div>
        <div>
            <div class="col-3">
                <label><?= $stock->getAttributeLabel('on_list') ?></label>
                <input type="checkbox" class="form-control"
                       name="on_list" <?= $stock->on_list ? 'checked' : '' ?>>
            </div>
            <div class="col-3">
                <label><?= $stock->getAttributeLabel('on_footer') ?></label>
                <input type="checkbox" class="form-control"
                       name="on_footer" <?= $stock->on_footer ? 'checked' : '' ?>>
            </div>
            <div class="col-3 date-input" style="display: <?= $stock->on_footer ? 'block' : 'none' ?>">
                <label><?= $stock->getAttributeLabel('date_start'); ?></label>
                <input type="text" class="datepicker form-control" name="date_start"
                       value="<?= $stock->date_start ?>">
            </div>
            <div class="col-3 date-input" style="display: <?= $stock->on_footer ? 'block' : 'none' ?>">
                <label><?= $stock->getAttributeLabel('date_end'); ?></label>
                <input type="text" class="datepicker form-control" name="date_end"
                       value="<?= $stock->date_end ?>">
            </div>
        </div>
        <div class="buttons">
            <a href="#" class="btn btn-mini btn-danger btn-cancel">Отменить</a>
            <a href="#" class="btn btn-mini btn-success btn-save">Сохранить</a>
        </div>
    </div>
</div>
