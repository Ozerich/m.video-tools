<? $blocks = $letter->catalog_blocks;
if ($blocks): ?>
<center>
    <table width="638" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" class="pad_null"
           style="border-left: 1px solid #CACACA; border-right:1px solid #cacaca; border-bottom: 1px solid #cacaca; margin: 0 auto;">
        <tbody>
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
                                    <?= HtmlHelper::Banner($block->image, $block->url, array(), $block->utm_content); ?>
                                </td>
                                <? $ind++; ?>
                            <? else: ?>
                                <td width="258" style="vertical-align: top">
                                    <? $this->renderPartial('/letter/catalog/product', array('product' => $block)); ?>
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
        <tr>
            <td>
                <? HtmlHelper::PrintSpacer(0, 20); ?>
            </td>
        </tr>
        </tbody>
    </table>
</center>
<? endif; ?>