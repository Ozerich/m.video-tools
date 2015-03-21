<? $blocks = $letter->catalog_blocks;
if ($blocks): ?>
<center>
    <table width="638" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" class="pad_null"
           style="border-left: 1px solid #CACACA; border-right:1px solid #cacaca; margin: 0 auto;">
        <tbody>
        <tr>
            <td>
                <center>
                    <table width="600" cellspacing="0" cellpadding="0" border="0"
                           style="text-align: left; margin: 0 auto;">
                        <? $ind = 0;

                        foreach ($blocks as $block): ?>

                            <? if ($ind % 2 == 0): ?>
                                <tr>
                            <? endif; ?>

                            <? if ($block->type == LetterCatalogBlock::TYPE_BANNER): ?>
								<? if($block->columns == 2): ?>
                                <td colspan="2">
                                    <?= HtmlHelper::Banner($block->image, $block->url, array(), $block->utm_content, $block->alt); ?>
                                <? $ind++; ?>
                                </td>
								<? else: ?>
									<td width="300">
										<?= HtmlHelper::Banner($block->image, $block->url, array(), $block->utm_content, $block->alt); ?>
									</td>
								<? endif; ?>
							<? endif; ?>
                            <? if ($ind % 2 == 1): ?>
                                </tr>
                            <? endif; ?>
                            <? $ind++; endforeach; ?>
                    </table>
                </center>
            </td>
        </tr>
        </tbody>
    </table>
</center>
<? endif; ?>