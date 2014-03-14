<div class="row">
    <div class="col-12 regions-container">
        <span>Регионы:</span>

        <div class="regions">
            <? $regions = array(
                'MI', 'MI+B', 'RI', 'RI+B'
            ); ?>
            <? foreach ($regions as $ind => $region): ?>
                <label for="region_<?= $ind ?>"><input type="checkbox" name="<?= $region ?>" checked
                                                       id="region_<?= $ind ?>"> <?= $region ?></label>
            <? endforeach; ?>
        </div>
        <button class="btn btn-mini btn-success btn-download">Скачать</button>

        <a href="#" class="zip-link" target="_blank" style="display: none">Скачать архив</a>
    </div>
</div>