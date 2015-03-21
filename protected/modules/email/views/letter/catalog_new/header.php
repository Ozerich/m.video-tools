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
						
						<? if($letter->getOption('short_mode', 0) == 0): ?>
						<tr>
							<td align="center" style="text-align: center">
								<? /*
								<img usemap="#img_nav" width="600" height="72" vspace="0" hspace="0" border="0" src="http://www.mvideo.ru/pics/o/mailer/common/menu.jpg" alt="">
								<map id="img_nav" name="img_nav">
									<area alt="Телефоны" title="Телефоны" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/telefony', 'a_head_menu')?>" shape="rect" coords="0,0,84,54">
									<area alt="Ноутбуки, планшеты и компьютеры" title="Ноутбуки, планшеты и компьютеры" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/noutbuki-planshety-i-kompyutery', 'a_head_menu')?>" shape="rect" coords="84,0,216,55">
									<area alt="Телевизоры и видео" title="Телевизоры и видео" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/televizory-i-video', 'a_head_menu')?>" shape="rect" coords="217,0,310,52">
									<area alt="Техника для кухни" title="Техника для кухни" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/tehnika-dlya-kuhni', 'a_head_menu')?>" shape="rect" coords="310,1,384,54">
									<area alt="Техника для дома" title="Техника для дома" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/tehnika-dlya-doma', 'a_head_menu')?>" shape="rect" coords="383,2,456,56">
									<area alt="Фото и Видео" title="Фото и Видео" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/fotoapparaty-i-videotehnika', 'a_head_menu')?>" shape="rect" coords="456,0,521,54">
									<area alt="Другие категории" title="Другие категории" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/', 'a_head_menu')?>" shape="rect" coords="523,0,600,52">
								</map>        
*/?>	
								<table cellpadding="0" cellspacing="0" height="55" width="100%" border="0">
									<tr>
										<td height="55" width="100"><?= HtmlHelper::Banner('http://www.mvideo.ru/pics/o/mailer/common/header_nav_single_01.jpg','http://www.mvideo.ru/telefony', array(), 'a_head_menu', 'Телефоны'); ?></td>
										<td height="55" width="101"><?= HtmlHelper::Banner('http://www.mvideo.ru/pics/o/mailer/common/header_nav_single_02.jpg','http://www.mvideo.ru/noutbuki-planshety-i-kompyutery', array(), 'a_head_menu', 'Ноутбуки, планшеты и компьютеры'); ?></td>
										<td height="55" width="100"><?= HtmlHelper::Banner('http://www.mvideo.ru/pics/o/mailer/common/header_nav_single_03.jpg','http://www.mvideo.ru/televizory-i-video', array(), 'a_head_menu', 'Телевизоры и видео'); ?></td>
										<td height="55" width="74"><?= HtmlHelper::Banner('http://www.mvideo.ru/pics/o/mailer/common/header_nav_single_04.jpg','http://www.mvideo.ru/tehnika-dlya-kuhni', array(), 'a_head_menu', 'Техника для кухни'); ?></td>
										<td height="55" width="76"><?= HtmlHelper::Banner('http://www.mvideo.ru/pics/o/mailer/common/header_nav_single_05.jpg','http://www.mvideo.ru/tehnika-dlya-doma', array(), 'a_head_menu', 'Техника для дома'); ?></td>
										<td height="55" width="75"><?= HtmlHelper::Banner('http://www.mvideo.ru/pics/o/mailer/common/header_nav_single_06.jpg','http://www.mvideo.ru/fotoapparaty-i-videotehnika', array(), 'a_head_menu', 'Фото и Видео'); ?></td>
										<td height="55" width="74"><?= HtmlHelper::Banner('http://www.mvideo.ru/pics/o/mailer/common/header_nav_single_07.jpg','http://www.mvideo.ru/catalog', array(), 'a_head_menu', 'Другие категории'); ?></td>
									</tr>
								</table>
								
							</td>
						</tr>
						
						<tr>
							<td><? HtmlHelper::PrintSpacer(0, 25); ?>
							</td>
						</tr>
						<? endif; ?>
						
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