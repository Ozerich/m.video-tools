<? $blocks = $letter->catalog_blocks;
if ($blocks): ?>
<center>
    <table width="638" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" class="pad_null deviceWidth"
           style="border-left: 1px solid #CACACA; border-right:1px solid #cacaca; border-bottom: 1px solid #cacaca; margin: 0 auto;">
        <tbody>
        <tr>
            <td style="padding: 0 18px 20px">
                <center>
                        <? $ind = 0;
					foreach ($blocks as $block): ?>
						<table width="280" style="width: 280px !important" cellspacing="0" cellpadding="0" border="0" align="<?=$ind % 2 == 0 ? 'left' : 'right'?>" class="contentWidth"><tr>
						<? if ($block->type == LetterCatalogBlock::TYPE_BANNER): ?>
							<td colspan="3">
								<?= HtmlHelper::Banner($block->image, $block->url, array(), $block->utm_content); ?>
							</td>
							<? $ind++; ?>
						<? else: ?>
							<td width="100%" style="vertical-align: top; padding-bottom: 20px">
								<? $this->renderPartial('/letter/catalog_old/product', array('product' => $block)); ?>
							</td>
						<? endif; ?>
						</tr></table>
						<? $ind++; endforeach; ?>
                </center>
            </td>
        </tr>
        </tbody>
    </table>
</center>
<? endif; ?>