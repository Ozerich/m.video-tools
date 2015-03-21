<? /* @var $letter Letter */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=<?=$encoding?>">
	
<style type="text/css">
	body	 {width: 100%; background-color: #ffffff; margin:0; padding:0; -webkit-font-smoothing: antialiased;font-family: Times, serif}
	table {border-collapse: collapse;}
	
	@media only screen and (max-width: 640px) {
		body[yahoo] .deviceWidth {width:440px!important; float: none !important;}	
		body[yahoo] .contentWidth {width:404px!important; float: none !important; background: red;}	
		body[yahoo] .center {text-align: center!important;}	 
	}
	
	@media only screen and (max-device-width: 480px) { 
		body[yahoo] .deviceWidth {width:440px!important; float: none !important;}	
		body[yahoo] .contentWidth {width:404px!important; float: none !important; background: green;}	
		body[yahoo] .center {text-align: center!important;}	 
	}
	
	
	
	@media only screen and (max-width: 479px) {
		body[yahoo] .deviceWidth {width:300px !important; float: none !important;}		
		body[yahoo] .contentWidth {width:262px !important; float: none !important;}		
		body[yahoo] .center {text-align: center!important;}	 
	}
	
</style>

	 
</head>
<body bgcolor="#ffffff" style="visibility: visible;" yahoo="fix">

<center>
    <table width="638" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" class="pad_null deviceWidth"
           style="border-top: 1px solid #CACACA; border-left: 1px solid #CACACA; border-right:1px solid #cacaca; margin: 0 auto;">
        <tbody>
        <tr>
            <td style="padding: 0 18px">
				<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff"
					   style="border-collapse:separate; margin: 0 auto;" class="contentWidth">
					<tbody>

					<tr>
						<td colspan="2" style="padding: 8px 0 18px 0">
							<center>
								<?= HtmlHelper::Font($letter->top_text, array('size' => 11)); ?>
							</center>
						</td>
					</tr>
					<tr>
						<td>
							<img src="http://static.mvideo.ru/img/mailer/130125/logo.gif" style="display:block;"
								 width="154" alt="М.Видео" height="83" vspace="0" hspace="0" border="0" usemap="#top_logo"/>
							<map id="top_logo" name="top_logo">
								<area target="_blank" alt="М.Видео" title="М.Видео"
									  href="<?=HtmlHelper::prepare_url('http://spb.mvideo.ru/', 'a_head_logo')?>" shape="rect"
									  coords="0,0,154,83"/>
							</map>
						</td>
						<td align="right" valign="top" style="padding-top: 30px">
							<font size="1" face="Tahoma, sans-serif;" color="#4f637b"
								  style="font-family: Tahoma,Arial; font-size: 11px; color: #4f637b; text-decoration: underline;"><a
									target="_blank" href="http://contact.mvideo.ru/u/gm.php?UID=$uid$&ID=$ident$"
									style="color:#4f637b;font-family: Tahoma,Arial; font-size: 11px;text-decoration: underline;">Письмо
									не отображается корректно?
									<?= HtmlHelper::Image('http://static.mvideo.ru/img/mailer/130221/strelka.gif') ?>
								</a>
							</font>
						</td>
					</tr>

					<tr>
						<td colspan="2" style="padding: 30px 0 15px">
							<center>
								<table width="30%" align="left" class="" cellspacing="0" cellpadding="0" border="0">
									<tbody>
									<tr>
										<td><?= HtmlHelper::Link('http://spb.mvideo.ru/price/lvl_12/class_357/', HtmlHelper::Image('http://static.mvideo.ru/img/mailer/130311/tmenu1.gif', 'Смартфоны'), 'a_head_menu', 'Смартфоны'); ?></td>
										<td><?= HtmlHelper::Link('http://spb.mvideo.ru/catalog/kuhonnaya-tehnika/', HtmlHelper::Image('http://static.mvideo.ru/img/mailer/130311/tmenu2.gif', 'Кухонная техника'), 'a_head_menu', 'Кухонная техника'); ?></td>
										<td><?= HtmlHelper::Link('http://spb.mvideo.ru/price/lvl_1/class_1/', HtmlHelper::Image('http://static.mvideo.ru/img/mailer/130311/tmenu3.gif', 'Телевизоры'), 'a_head_menu', 'Телевизоры'); ?></td>
									 </tr>
									</tbody>
								</table>
								<table width="35%" align="left" class="" cellspacing="0" cellpadding="0" border="0">
									<tbody>
									<tr>
										<td><?= HtmlHelper::Link('http://spb.mvideo.ru/catalog/bytovaya-tehnika/', HtmlHelper::Image('http://static.mvideo.ru/img/mailer/130311/tmenu4.gif', 'Бытовая техника'), 'a_head_menu', 'Бытовая техника'); ?></td>
										<td><?= HtmlHelper::Link('http://spb.mvideo.ru/price/lvl_8/class_328/', HtmlHelper::Image('http://static.mvideo.ru/img/mailer/130311/tmenu5.gif', 'Планшеты'), 'a_head_menu', 'Планшеты'); ?></td>
										<td><?= HtmlHelper::Link('http://spb.mvideo.ru/deal_of_the_day/', HtmlHelper::Image('http://static.mvideo.ru/img/mailer/130311/tmenu6.gif', 'Товар дня'), 'a_head_menu', 'Товар дня'); ?></td>
									</tr>
									</tbody> 
								</table>
								
								<table width="45" align="left" class="" cellspacing="0" cellpadding="0" border="0">
									<tbody>
									<tr>
										<td><?= HtmlHelper::Link('http://spb.mvideo.ru/discount/', HtmlHelper::Image('http://static.mvideo.ru/img/mailer/130311/tmenu7.gif', 'Акции'), 'a_head_menu', 'Акции'); ?></td>
									</tr>
									</tbody>
								</table>
							</center>
						</td>
					</tr>


					<? $blocks = $letter->header_blocks;
					if ($blocks): ?>
						<tr>
							<td colspan="2"><center>
								<table cellpadding="0" width="100%" cellspacing="0" border="0" class="contentWidth">
									<tr>
										<td width="100%">
											<table width="100%" cellpadding="0" cellspacing="0" border="0">
												<? foreach ($blocks as $ind => $block): ?>
													<tr>
														<td colspan="2" style="padding-bottom: 18px">
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
							</center></td>							
						</tr>
					<? endif; ?>
					</tbody>
				</table>
            </td>
        </tr>
        </tbody>
    </table>
</center>