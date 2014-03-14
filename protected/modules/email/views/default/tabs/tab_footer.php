<fieldset>

    <div class="row">
        <div class="col-12 constructor-container constructor-blocks-container constructor-container-footer">
            <span>Структура:</span>

            <div class="blocks">
                <? foreach ($model->footer_blocks as $block): ?>
                    <? $this->renderPartial('/constructor/simple_block', array('model' => $block)); ?>
                <? endforeach; ?>
            </div>
            <? $this->renderPartial('/constructor/simple_block', array('model' => null)); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12 footer-stocks-container">
            <span>Акции:</span>
            <table>
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Ссылка</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr style="display: none" class="new-stock">
                    <td class="cell-name"><input type="text" class="form-control" value=""></td>
                    <td class="cell-url"><input type="text" class="form-control" value=""></td>
                    <td class="cell-actions">
                        <a href="#" class="glyphicon glyphicon-arrow-up btn-stock-up"></a>
                        <a href="#" class="glyphicon glyphicon-arrow-down btn-stock-down"></a>
                        <a href="#" class="glyphicon glyphicon-remove btn-stock-remove"></a>
                    </td>
                </tr>
                <? foreach ($model->stocks as $stock_name => $stock_url): ?>
                    <tr>
                        <td class="cell-name"><input type="text" class="form-control" value="<?= $stock_name ?>">
                        </td>
                        <td class="cell-url"><input type="text" class="form-control" value="<?= $stock_url ?>"></td>
                        <td class="cell-actions">
                            <a href="#" class="glyphicon glyphicon-arrow-up btn-stock-up"></a>
                            <a href="#" class="glyphicon glyphicon-arrow-down btn-stock-down"></a>
                            <a href="#" class="glyphicon glyphicon-remove btn-stock-remove"></a>
                        </td>
                    </tr>
                <? endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5">
                        <a href="#" class="btn btn-mini btn-success btn-add-stock">Добавить акцию</a>
                        <a href="#" class="btn btn-mini btn-primary btn-save-stocks">Сохранить акции</a>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>


    <div class="row">
        <div class="col-12 disclaimer-container">
            <span>Дисклеймер:</span>
            <textarea class="form-control disclaimer-input"><?=$model->disclaimer?></textarea>
        </div>
    </div>
</fieldset>

<script>
    $(function () {
        $('.constructor-container-footer').BlockConstructor({
            position: 'footer'
        });
    });
</script>