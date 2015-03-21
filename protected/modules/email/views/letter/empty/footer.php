<? /* @var $letter Letter */ ?>

<center>

<table width="<?=$letter->getOption('page_width', 638)?>" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" class="pad_null"
	style="border-left: 1px solid #ccc; border-right:1px solid #ccc;  margin: 0 auto;">
<tbody>


<? $blocks = $letter->footer_blocks;
if ($blocks): ?>
    <tr>
        <td align="center" style="text-align: center;">
            <center>
                <table cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td width="<?=$letter->getOption('content_width', 600)?>">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <? foreach ($blocks as $block): ?>
                                    <tr>
                                        <td colspan="2">
                                            <? if ($block->type == LetterBlock::TYPE_TEXT): ?>
                                                <?= HtmlHelper::Font(HtmlHelper::CodeToHtml($block->text), array('size' => 14)); ?>
                                            <? elseif ($block->type == LetterBlock::TYPE_BANNER): ?>
                                                <?= HtmlHelper::Banner($block->banner_file, $block->banner_url, $block->banner_area_coords, $block->utm_content, $block->alt); ?>
                                            <? endif; ?>
                                        </td>
                                    </tr>
                                <? endforeach; ?>
                            </table>
                        </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>

<? endif; ?>
</tbody>
</table>
</center>
</body>
</html>