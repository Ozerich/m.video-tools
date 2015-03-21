<? /* @var $letter Letter */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=<?=$encoding?>">
</head>
<body bgcolor="#f5f5f5" style="visibility: visible;">

<center>
    <table width="<?=$letter->getOption('page_width', 638)?>" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" class="pad_null"
           style="border-left: 1px solid #ccc; border-top: 1px solid #ccc; border-right:1px solid #ccc; margin: 0 auto;">
        <tbody>
        <tr> 
            <td>
                <center>
                    <table width="<?=$letter->getOption('content_width', 600)?>" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff"
                           style="border-collapse:separate; margin: 0 auto;">
                        <tbody>
						<tr>
							<td width="100%" align="center" style="text-align: center">
								<table width="100%" cellspacing="0" cellpadding="0" border="0" style="border-collapse:separate;">
									<tr>
										<td><? HtmlHelper::PrintSpacer(0, 20); ?>
										</td>
									</tr>
									
									<tr>
										<td align="center" style="text-align: center"><?= HtmlHelper::Font($letter->top_text, array('size' => 12)); ?></td>
									</tr>
									
									<tr>
										<td><? HtmlHelper::PrintSpacer(0, 12); ?>
										</td>
									</tr>
									<tr>
										<td align="center" style="text-align: center">
											<a target="_blank" href="http://contact.mvideo.ru/u/gm.php?UID=$uid$&ID=$ident$"  color="#838383" style="font-family: Tahoma,Arial; font-size: 12px; color: #838383; text-decoration: underline;">Письмо не отображается корректно?</a>	
										</td>
									</tr>
									
									<tr>
										<td><? HtmlHelper::PrintSpacer(0, 12); ?>
										</td>
									</tr>															
								</table>
							</td>
						</tr>
						
						               
						<tr>
						
						<td align="center" style="text-align: center">
							<?= HtmlHelper::Banner('http://www.mvideo.ru/pics/o/mailer/common/logo.jpg','http://www.mvideo.ru/', array(), 'a_head_logo', 'Перейти на сайт М.Видео'); ?>                                                                                                                    </td>						
						</tr>
						
						<tr>
							<td><? HtmlHelper::PrintSpacer(0, 19); ?>
							</td>
						</tr>
						
						
						
                        <? $blocks = $letter->header_blocks;
                        if ($blocks): ?>
                            <tr>
                                <td>
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td width="600">
                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                    <? foreach ($blocks as $ind => $block): ?>
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
                                </td>
                            </tr>
                        <? endif; ?>
                        </tbody>
                    </table>
                </center>
            </td>
        </tr>
        </tbody>
    </table>
</center>