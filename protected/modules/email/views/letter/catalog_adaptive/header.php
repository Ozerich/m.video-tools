<? /* @var $letter Letter */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=<?=$encoding?>">
	
	<style type="text/css">
		table {border-collapse: collapse;}
		
		@media only screen and (max-width: 600px)  {
			body[yahoo] .deviceWidth {width: 338px!important; padding:0;}	
			body[yahoo] .contentWidth {width: 300px!important; padding:0;}	
			body[yahoo] .center {text-align: center!important;}	 
			body[yahoo] .contentWidth.nav-1{
				border-right: 1px solid #ccc;
				width: 299px !important;
			}
		}
		.MsoNormal{display: none;}
		p.MsoNormal {margin: 0px}
	</style>
</head>
<body bgcolor="#f5f5f5" style="visibility: visible;" yahoo="fix">

<center>
    <table width="<?=$letter->getOption('page_width', 638)?>" class="deviceWidth" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" class="pad_null"
           style="border-left: 1px solid #ccc; border-top: 1px solid #ccc; border-right:1px solid #ccc; margin: 0 auto;">
        <tbody>
        <tr> 
            <td>
                <center>
                    <table width="<?=$letter->getOption('content_width', 600)?>" class="contentWidth" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff"
                           style="border-collapse:separate; margin: 0 auto;">
                        <tbody>
						<tr>
							<td width="100%" align="center" style="text-align: center">
								<table width="100%" class="contentWidth" cellspacing="0" cellpadding="0" border="0" style="border-collapse:separate;">
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
						
						<td align="center" style="text-align: center; padding-bottom: 18px">						
							<?= HtmlHelper::Banner('http://www.mvideo.ru/pics/o/mailer/common/logo.jpg', 'http://www.mvideo.ru/', null, 'a_head_logo','Перейти на сайт М.Видео'); ?>                                                                                                                    </td>						
						</tr>
						
						
						<? if($letter->getOption('short_mode', 0) == 0): ?>
							<tr>
								<td style="padding-bottom: 20px">
									<table cellpadding="0" cellspacing="0" class="contentWidth nav-1" width="300" align="left"> 
										<tr>
											<td>
												<img usemap="#img_26966" vspace="0" hspace="0" border="0" src="http://static.mvideo.ru/pics/o/mailer/common/header_nav_01.jpg" alt="">
												<map id="img_26966" name="img_26966">
													<area alt="Телевизоры и видео" title="Телевизоры и видео" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/televizory-i-video', 'a_head_menu')?>" shape="rect" coords="207,6,295,46">
													<area alt="Ноутбуки, планшеты, компьютеры" title="Ноутбуки, планшеты, компьютеры" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/noutbuki-planshety-i-kompyutery', 'a_head_menu')?>" shape="rect" coords="109,1,193,54">
													<area alt="Телефоны" title="Телефоны" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/telefony', 'a_head_menu')?>" shape="rect" coords="14,6,88,48">
												</map>                                                                                                                           											
											</td>
										</tr>
									</table>
									<table cellpadding="0" cellspacing="0" class="contentWidth" width="300" align="right">
										<tr>
											<td>
												<img usemap="#img_30681" vspace="0" hspace="0" border="0" src="http://static.mvideo.ru/pics/o/mailer/common/header_nav_02.jpg" alt="">
												<map id="img_30681" name="img_30681">
													<area alt="Другие категории" title="Другие категории" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/', 'a_head_menu')?>" shape="rect" coords="228,7,299,45">
													<area alt="Фото и видео" title="Фото и видео" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/fotoapparaty-i-videotehnika', 'a_head_menu')?>" shape="rect" coords="165,4,213,49">
													<area alt="Техника для дома" title="Техника для дома" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/tehnika-dlya-doma', 'a_head_menu')?>" shape="rect" coords="81,9,144,47">
													<area alt="Техника для кухни" title="Техника для кухни" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/tehnika-dlya-kuhni', 'a_head_menu')?>" shape="rect" coords="5,6,71,49">
												</map>                                                                                                                            
											</td>
										</tr>
									</table>
								</td>
							</tr>
						<? endif; ?>
						
                        <? $blocks = $letter->header_blocks;
                        if ($blocks): ?>
                            <tr>
                                <td>
									<? foreach ($blocks as $ind => $block): ?><table width="50%" class="contentWidth" cellpadding="0" cellspacing="0" align="<?=$ind % 2 == 0 ? 'left' : 'left'?>">
											<tr>
												<td>
													<? if ($block->type == LetterBlock::TYPE_TEXT): ?>
														<?= HtmlHelper::Font(HtmlHelper::CodeToHtml($block->text), array('size' => 14)); ?>
													<? elseif ($block->type == LetterBlock::TYPE_BANNER): ?>
														<?= HtmlHelper::Banner($block->banner_file, $block->banner_url, $block->banner_area_coords, $block->utm_content, $block->alt); ?>
													<? endif; ?>
												</td>
											</tr>
										</table><? endforeach; ?>
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