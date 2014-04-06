<div class="row">
    <div class="col-12 regions-container">
        <span>Регионы:</span>

        <div class="regions">
            <? $regions = array(
                '', 'MI', 'MB', 'MI+B', 'RI', 'RB', 'RI+B', 'std_RI', 'new_RI','MI-test','SPb-test', 'MI-std', 'SPb-std', 'Volgograd'
            ); ?>
            <? foreach ($regions as $ind => $region): ?>
                <label for="region_<?= $ind ?>"><input type="checkbox" name="<?= $region ?>" <?=$region ? '' : 'checked'?>
                                                       id="region_<?= $ind ?>"> <?= $region ? $region : 'Без регионов' ?></label>
            <? endforeach; ?>
        </div>
        <button class="btn btn-mini btn-success btn-download">Скачать</button>

        <a href="#" class="zip-link" target="_blank" style="display: none">Скачать архив</a>
    </div>
</div>