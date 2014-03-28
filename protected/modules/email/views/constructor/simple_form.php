<? $type = $model && $model->type == LetterBlock::TYPE_TEXT ? LetterBlock::TYPE_TEXT : LetterBlock::TYPE_BANNER; ?>
<div class="form-container" style="display: none">

    <div class="form-inner">
        <div class="param param-type param-radio">
            <label>Тип блока:</label>

            <div class="param-input">
                <label><input type="radio" name="param_type_<?= $model ? $model->id : '' ?>"
                              value="banner" <?= $type == LetterBlock::TYPE_BANNER ? 'checked' : '' ?>>
                    Баннер</label>
                <label><input type="radio" name="param_type_<?= $model ? $model->id : '' ?>"
                              value="text" <?= $type == LetterBlock::TYPE_TEXT ? 'checked' : '' ?>>
                    Текст</label>
            </div>
        </div>

        <div class="param-container param-banner-container"
             style="display:<?= $type == LetterBlock::TYPE_BANNER ? 'block' : 'none' ?>">
            <div class="param">
                <label>Имя файла:</label>
                <input type="text" name="file" class="form-control input-file"
                       value="<?= $type == LetterBlock::TYPE_BANNER && $model ? $model->banner_file : '' ?>">
            </div>

            <div class="param param-banner-type param-radio">
                <label>Тип баннера:</label>

                <div class="param-input">
                    <label><input type="radio" name="param_banner_type_<?= $model ? $model->id : '' ?>"
                                  value="simple" <?= !$model || $model->isSimple() ? 'checked' : '' ?>>
                        Одна ссылка</label>
                    <label><input type="radio" name="param_banner_type_<?= $model ? $model->id : '' ?>"
                                  value="areas" <?= $model && !$model->isSimple() ? 'checked' : '' ?>>
                        Несколько ссылок</label>
                </div>
            </div>

            <div class="param-banner-container param-banner-simple-container"
                 style="display: <?= !$model || $model->isSimple() ? 'block' : 'none'; ?>">
                <div class="param">
                    <label>Ссылка:</label>
                    <input type="text" name="url" class="form-control input-url"
                           value="<?= $type == LetterBlock::TYPE_BANNER && $model ? $model->banner_url : '' ?>">
                </div>
            </div>

            <div class="param-banner-container param-banner-areas-container"
                 style="display:  <?= !$model || $model->isSimple() ? 'none' : 'block'; ?>">
                <div class="image-container">
                    <img src="<?= $model ? $model->getFullBannerUrl(true) : ''; ?>">
                </div>
                <div class="banner-form-container" style="display: none">
                    <div class="param param-coords">
                        <label>Координаты:</label>
                        <input type="text" readonly class="input-coords form-control">
                    </div>
                    <div class="param param-url">
                        <label>Ссылка:</label>
                        <input type="text" class="form-control input-url">
                    </div>
                    <button class="btn btn-mini btn-success btn-submit">Добавить</button>
                    <button class="btn btn-mini btn-danger btn-cancel">Отмена</button>
                </div>
                <ul>
                    <? if ($model && $model->banner_area_coords): ?>
                        <? foreach ($model->banner_area_coords as $coords => $url): ?>
                            <li data-coords="<?= $coords ?>" data-url="<?= $url ?>">
                                <a target="_blank" href="<?= $url ?>"><?= $url ?></a>

                                <div class="actions">
                                    <a href="#" class="glyphicon glyphicon-wrench btn-edit"></a>
                                    <a href="#" class="glyphicon glyphicon-trash btn-delete"></a>
                                </div>
                            </li>
                        <? endforeach; ?>
                    <? endif; ?>
                </ul>
            </div>
        </div>

        <div class="param-container param-text-container"
             style="display:<?= $type == LetterBlock::TYPE_TEXT ? 'block' : 'none' ?>">
            <div class="param">
                <textarea
                    class="form-control input-text"
                    name="text"><?= $type == LetterBlock::TYPE_TEXT && $model ? $model->text : '' ?></textarea>
            </div>
        </div>

    </div>

    <div class="form-buttons">
        <a href="#" class="btn btn-mini btn-danger btn-cancel">Отмена</a>
        <a href="#" class="btn btn-mini btn-success btn-submit"><?= $model ? 'Сохранить' : 'Добавить' ?></a>
    </div>

</div>