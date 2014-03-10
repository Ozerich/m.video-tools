<? $type = $model && $model->type == LetterBlock::TYPE_TEXT ? LetterBlock::TYPE_TEXT : LetterBlock::TYPE_BANNER; ?>
<div class="form-container" style="display: none">

    <div class="form-inner">
        <div class="param param-type">
            <label>Тип блока:</label>

            <div class="param-input">
                <label><input type="radio" name="param_type_<?=$model ? $model->id : ''?>"
                              value="banner" <?= $type == LetterBlock::TYPE_BANNER ? 'checked' : '' ?>>
                    Баннер</label>
                <label><input type="radio" name="param_type_<?=$model ? $model->id : ''?>"
                              value="text" <?= $type == LetterBlock::TYPE_TEXT ? 'checked' : '' ?>>
                    Текст</label>
            </div>
        </div>

        <div class="param-banner-container" style="display:<?= $type == LetterBlock::TYPE_BANNER ? 'block' : 'none' ?>">
            <div class="param">
                <label>Имя файла:</label>
                <input type="text" class="form-control input-file"
                       value="<?= $type == LetterBlock::TYPE_BANNER && $model ? $model->banner_file : '' ?>">
            </div>
            <div class="param">
                <label>Ссылка:</label>
                <input type="text" class="form-control input-url"
                       value="<?= $type == LetterBlock::TYPE_BANNER && $model ? $model->banner_url : '' ?>">
            </div>
        </div>

        <div class="param-text-container" style="display:<?= $type == LetterBlock::TYPE_TEXT ? 'block' : 'none' ?>">
            <div class="param">
                <textarea
                    class="form-control input-text"><?= $type == LetterBlock::TYPE_TEXT && $model ? $model->text : '' ?></textarea>
            </div>
        </div>

    </div>

    <div class="form-buttons">
        <a href="#" class="btn btn-mini btn-danger btn-cancel">Отмена</a>
        <a href="#" class="btn btn-mini btn-success btn-submit"><?= $model ? 'Сохранить' : 'Добавить' ?></a>
    </div>

</div>