<center>
    <table width="638" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" class="pad_null"
           style="border-left: 1px solid #CACACA; border-right:1px solid #cacaca; margin: 0 auto;">
        <tbody>
        <? $blocks = $letter->catalog_blocks;
        if ($blocks): ?>
        <tr>
            <td>
                <center>
                    <table width="556" cellspacing="0" cellpadding="0" border="0"
                           style="text-align: left; margin: 0 auto;">
                        <? $ind = 0;

                        foreach ($blocks as $block): ?>

                            <? if ($ind % 2 == 0): ?>
                                <tr>
                            <? endif; ?>

                            <? if ($block->type == LetterCatalogBlock::TYPE_BANNER): ?>
                                <td colspan="3">
                                    <?= HtmlHelper::Banner($block->image, $block->url); ?>
                                </td>
                                <? $ind++; ?>
                            <? else: ?>
                                <td width="258" style="vertical-align: top">
                                    <? $this->renderPartial('/letter/product', array('product' => $block)); ?>
                                </td>
                                <? if ($ind % 2 == 0): ?>
                                    <td width="42">
                                        <? HtmlHelper::PrintSpacer(42, 0); ?>
                                    </td>
                                <? endif; ?>
                            <? endif; ?>
                            <? if ($ind % 2 == 1): ?>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <? HtmlHelper::PrintSpacer(0, 35); ?>
                                    </td>
                                </tr>
                            <? endif; ?>
                            <? $ind++; endforeach; ?>
                    </table>
                </center>
            </td>
        </tr>
        <? endif; ?>
        <tr>
            <td style="border-top: 1px solid #cacaca;">
                <? HtmlHelper::PrintSpacer(0, 38); ?>
            </td>
        </tr>
        </tbody>
    </table>
</center>