<? /* @var $letter Letter */ ?>
<center>
<table width="<?=$letter->getOption('page_width', 638)?>" class="deviceWidth" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" class="pad_null"
	style="border-left: 1px solid #ccc; border-right:1px solid #ccc;  margin: 0 auto;">
<tbody>

<tr>
		<td>
		<center>
				<table width="<?=$letter->getOption('content_width', 600)?>" class="contentWidth" cellspacing="0" cellpadding="0" border="0" style="border-collapse:separate; text-align: left; margin: 0 auto;">
					<tr>
						<td>

<? $blocks = $letter->footer_blocks;
if ($blocks): ?>
    <tr>
        <td align="center" style="text-align: center; border-bottom: 1px solid #ccc;">
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
                                    <tr>
                                        <td colspan="2">
                                            <? HtmlHelper::PrintSpacer(0, 18); ?>
                                        </td>
                                    </tr>
                                <? endforeach; ?>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <? HtmlHelper::PrintSpacer(0, 25); ?>
                        </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>
<? endif; ?>

<? if($letter->getOption('short_mode', 0) == 0): ?>
		<tr>
    <td>
        <? HtmlHelper::PrintSpacer(0, 18); ?>
    </td>
</tr>				
<tr><td colspan="2" class="contentWidth">
<center>
<?=HtmlHelper::Image('http://static.mvideo.ru/pics/o/mailer/common/separator.jpg');?>
</center>
</td></tr>

<? 
$footer_stocks = array_filter($letter->stocks, function($row){
return $row->on_list;
}); ?>
<? if($footer_stocks): ?> 

<tr><td colspan="2" align="center" style="text-align: center">
<center>
<?= HtmlHelper::Link('http://www.mvideo.ru/', HtmlHelper::Font('Акции', array('font' => 'Tahoma', 'size' => 12, 'line-height' => 18, 'underline' => true, 'bold' => true)), 'a_foot_menu'); ?>&nbsp;&nbsp;&nbsp;
<? foreach ($footer_stocks as $ind => $stock): ?> 
	<?= HtmlHelper::Link($stock->url, HtmlHelper::Font($stock->label, array('font' => 'Tahoma', 'size' => 12, 'line-height' => 18, 'underline' => true)), 'a_foot_menu'); ?>&nbsp;&nbsp;&nbsp;
	<? if($ind == 2 || $ind == 5 || $ind == 8): ?><? elseif($ind < count($footer_stocks) - 1): ?><?endif; ?>
<? endforeach; ?>
</center>
</td></tr>
<tr>
    <td>
        <? HtmlHelper::PrintSpacer(0, 18); ?>
    </td>
</tr>
<tr><td colspan="2" class="contentWidth">
<center>
<?=HtmlHelper::Image('http://static.mvideo.ru/pics/o/mailer/common/separator.jpg');?>
</center>
</td></tr>
<tr>
    <td>
        <? HtmlHelper::PrintSpacer(0, 18); ?>
    </td>
</tr>
<? endif; ?>
<tr>
	<td colspan="2">
		<table cellpadding="0" cellspacing="0" width="50%" class="contentWidth" align="left">
			<tr>
				<td>
					<img usemap="#img_45153" vspace="0" hspace="0" border="0" src="http://static.mvideo.ru/pics/o/mailer/common/nav_01.jpg" alt="">
					<map id="img_45153" name="img_45153">
						<area alt="Ноутбуки" title="Ноутбуки" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/noutbuki-planshety-komputery/noutbuki-118', 'a_foot_menu')?>" shape="rect" coords="186,0,266,87">
						<area alt="Телевизоры и цифровое ТВ" title="Телевизоры и цифровое ТВ" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/televizory-i-cifrovoe-tv-1', 'a_foot_menu')?>" shape="rect" coords="26,0,128,99">
					</map>                                                                                                                            																															
				</td>
			</tr>
		</table><table cellpadding="0" cellspacing="0" width="50%" class="contentWidth" align="left">
			<tr>
				<td>
					<img usemap="#img_12005" vspace="0" hspace="0" border="0" src="http://static.mvideo.ru/pics/o/mailer/common/nav_02.jpg" alt="">
					<map id="img_12005" name="img_12005">
						<area alt="Apple" title="Apple" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/noutbuki-planshety-komputery/komputery-i-noutbuki-apple-164', 'a_foot_menu')?>" shape="rect" coords="189,0,263,85">
						<area alt="Планшеты" title="Планшеты" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/noutbuki-planshety-komputery/planshety-195', 'a_foot_menu')?>" shape="rect" coords="31,0,126,83">
					</map>  
				</td>
			</tr>			
		</table><table cellpadding="0" cellspacing="0" width="50%" class="contentWidth" align="left">
			<tr>
				<td>
					<img usemap="#img_49649" vspace="0" hspace="0" border="0" src="http://static.mvideo.ru/pics/o/mailer/common/nav_03.jpg" alt="">
					<map id="img_49649" name="img_49649">
						<area alt="Электронные книги" title="Электронные книги" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/elektronnye-knigi-i-aksessuary/elektronnye-knigi-73', 'a_foot_menu')?>" shape="rect" coords="166,0,284,101">
						<area alt="Смартфоны и сотовые телефоны" title="Смартфоны и сотовые телефоны" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/smartfony-sotovye-telefony-10', 'a_foot_menu')?>" shape="rect" coords="15,0,138,116">
					</map>                                                                                                                          
				</td>
			</tr>			
		</table><table cellpadding="0" cellspacing="0" width="50%" class="contentWidth" align="left">
			<tr>
				<td>
					<img usemap="#img_18928" vspace="0" hspace="0" border="0" src="http://static.mvideo.ru/pics/o/mailer/common/nav_04.jpg" alt="">
					<map id="img_18928" name="img_18928">
						<area alt="Аудио" title="Аудио" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/audiotehnika', 'a_foot_menu')?>" shape="rect" coords="189,0,263,103">
						<area alt="Фото и видео" title="Фото и видео" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/fotoapparaty-i-videotehnika', 'a_foot_menu')?>" shape="rect" coords="31,0,126,106">
					</map>                                                                                                                           
				</td>
			</tr>			
		</table><table cellpadding="0" cellspacing="0" width="50%" class="contentWidth" align="left">
			<tr>
				<td>
					<img usemap="#img_65038" vspace="0" hspace="0" border="0" src="http://static.mvideo.ru/pics/o/mailer/common/nav_05.jpg" alt="">
					<map id="img_65038" name="img_65038">
						<area alt="Техника для кухни" title="Техника для кухни" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/tehnika-dlya-kuhni', 'a_foot_menu')?>" shape="rect" coords="163,6,287,94">
						<area alt="Красота и здоровье" title="Красота и здоровье" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/krasota-i-zdorove', 'a_foot_menu')?>" shape="rect" coords="17,6,138,92">
					</map>                                                                                                                      
				</td>
			</tr>			
		</table><table cellpadding="0" cellspacing="0" width="50%" class="contentWidth" align="left">
			<tr>
				<td>
					<img usemap="#img_18270" vspace="0" hspace="0" border="0" src="http://static.mvideo.ru/pics/o/mailer/common/nav_06.jpg" alt="">
					<map id="img_18270" name="img_18270">
						<area alt="Автотехника" title="Автотехника" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/avtomobilnaya-elektronika-i-gps', 'a_foot_menu')?>" shape="rect" coords="181,8,273,95">
						<area alt="Бытовая техника" title="Бытовая техника" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/bytovaya-tehnika-2', 'a_foot_menu')?>" shape="rect" coords="29,0,129,93">
					</map>                                                                                                                                                                                                                                                    
				</td>
			</tr>			
		</table><table cellpadding="0" cellspacing="0" width="50%" class="contentWidth" align="left">
			<tr>
				<img usemap="#img_63515" vspace="0" hspace="0" border="0" src="http://static.mvideo.ru/pics/o/mailer/common/nav_07.jpg" alt="">
				<map id="img_63515" name="img_63515">
					<area alt="Игры и развлечения" title="Игры и развлечения" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/igry-i-razvlecheniya', 'a_foot_menu')?>" shape="rect" coords="7,8,150,113">
				</map>                                                                                                                            																													
			</tr>			
		</table>
	</td>
</tr>


<tr>
    <td>
        <? HtmlHelper::PrintSpacer(0, 36); ?>
    </td>
</tr>

</td></tr></table></center></td></tr>
</tbody></table></center>
<? endif; ?><center>
<table width="<?=$letter->getOption('page_width', 638)?>" class="deviceWidth" cellspacing="0" cellpadding="0" border="0" bgcolor="#dfdfdf"
       style="border-collapse:separate; text-align: left; border-bottom:1px solid #ccc;border-left:1px solid #ccc;border-right:1px solid #cc; margin: 0 auto; background: #dfdfdf">
<tbody>

	<tr>
		<td>
			<? HtmlHelper::PrintSpacer(0, 15); ?>
		</td>
	</tr>
	
	
	<tr>
		<td>
		<center>
				<table width="<?=$letter->getOption('content_width', 600)?>" class="contentWidth" cellspacing="0" cellpadding="0" border="0" style="border-collapse:separate; text-align: left; margin: 0 auto;">
					<tr>
						<td>


            <? foreach ($letter->stocks as $stock): if ($stock->on_footer): ?>
			<?=HtmlHelper::Font('Пожалуйста, ознакомьтесь с правилами акции «'.$stock->label.'» '.HtmlHelper::Link($stock->url, HtmlHelper::Font('здесь', array('size' => 13, 'color' => '#A3A0A0', 'underline' => true)), 'a_foot_links').'.', array('size' => 13, 'color' => '#333333', 'line-height' => 20));?><br><br>
            <? endif; endforeach; ?>
			

						

	<? $texts = array(
	'Если вы не хотите больше получать информацию об акциях, распродажах и спецпредложениях, пожалуйста, пройдите по ' . HtmlHelper::Link('https://contact.mvideo.ru/u/register_bg.php?owner_id=303739311&f=1794&key_id=3&optin=n&inp_3=$Email$&landing=http://mvideo.ru/cancel-subscribe-temporary/
',
		HtmlHelper::Font('ссылке', array('size' => 13, 'color' => '#A3A0A0', 'underline' => true)), 'a_foot_links') . '.',

	'Если вы получили это письмо от друга и желаете получать рассылку от М.Видео, пожалуйста, подпишитесь ' .
	HtmlHelper::Link('https://www.mvideo.ru/login', HtmlHelper::Font('здесь', array('size' => 13, 'color' => '#A3A0A0', 'underline' => true)), 'a_foot_links') . '.',

	'Чтобы регулярно и без проблем получать рассылку от М.Видео, пожалуйста, добавьте адрес ' .
	HtmlHelper::Link('mailto:mvideo@sender.mvideo.ru', HtmlHelper::Font('mvideo@sender.mvideo.ru', array('size' => 13, 'color' => '#A3A0A0', 'underline' => true)), 'a_foot_links') . ' в свою адресную книгу.',

	'Возникли вопросы? Позвоните нам по телефону в Москве 8 (495) 777-777-5 и в регионах<br>8 (800) 200-777-5 (звонок бесплатный). Центр ответственности за клиента работает круглосуточно.',

	'Или напишите нам по адресу ' . HtmlHelper::Link('mailto:24@mvideo.ru', HtmlHelper::Font('24@mvideo.ru', array('size' => 13, 'color' => '#A3A0A0', 'underline' => true))) . '.',

	'Мы уважаем права покупателя и удалим все ваши данные из своей базы '.HtmlHelper::Link('mailto:24@mvideo.ru', HtmlHelper::Font('по запросу', array('size' => 13, 'color' => '#A3A0A0', 'underline' => true))).' в любое время.',
);?>

<? foreach ($texts as $ind => $text): ?>
<? if($letter->getOption('short_mode') == 1 && 0) continue; ?>
	<?=HtmlHelper::Font($text, array('size' => 13, 'color' => '#333333', 'line-height' => 20));?>
	<? if ($ind < count($texts) - 1): ?>
		<br><br>
	<? endif; ?>
<? endforeach; ?>
	
						</td>
					</tr>
				</table>
			</center>
	
	</td></tr>
	
	<tr>
		<td style="border-bottom: 1px solid #aaaaaa">
			<? HtmlHelper::PrintSpacer(0, 15); ?>
		</td>
	</tr>
	
	<tr>
		<td>
			<? HtmlHelper::PrintSpacer(0, 15); ?>
		</td>
	</tr>
	
	<tr>
		<td>
			<center>
				<table width="<?=$letter->getOption('content_width', 600)?>" class="contentWidth" cellspacing="0" cellpadding="0" border="0" style="border-collapse:separate; text-align: left; margin: 0 auto;">
					<tr>
						<td>
						<?=HtmlHelper::Font("ООО «М.видео Менеджмент», ОГРН 1057746840095.<br>
Юридический адрес: 105066, Россия, Москва, ул. Нижняя Красносельская,<br>
дом 40/12, корп. 20.
", array('size' => 13, 'color' => '#333333', 'line-height' => 18));?>
						</td>
					</tr>
				</table>
			</center>
		</td>
	</tr>
	
	<tr>
		<td>
			<? HtmlHelper::PrintSpacer(0, 15); ?>
		</td>
	</tr>
	
	<tr>
		<td><center>
			<table width="95%" cellpadding="0" cellspacing="0" border="0" style="border-collapse: separate">
				<tr>
					<td>
						<table width="50%" class="contentWidth" cellpadding="0" cellspacing="0" align="left">
							<tr>
								<td>
									<?=HtmlHelper::Link('http://www.mvideo.ru/', HtmlHelper::Image('http://static.mvideo.ru/pics/o/mailer/common/footer_logo_mvideo.jpg', 'М.Видео'), 'a_footer_logo', 'М.Видео'); ?>                                        
									&nbsp;<?=HtmlHelper::Font('Copyright &copy; М.Видео, 2014', array('size' => 13, 'line-height' => 50,'valign' => 'top', 'color' => '#333333')); ?>
								</td>
							</tr>
						</table>
						<table width="50%" class="contentWidth" cellpadding="0" cellspacing="0" align="right">
							<tr>
								<td>
						<?=HtmlHelper::Link('http://www.mvideo.ru/legalcontent', HtmlHelper::Font('Политика конфиденциальности', array('size' => 13, 'line-height' => 50,'valign' => 'top', 'color' => '#A3A0A0', 'underline' => true)), 'a_foot_links', 'Политика конфиденциальности'); ?>
						&nbsp;
						<?=HtmlHelper::Image('http://static.mvideo.ru/pics/o/mailer/common/footer_logo_akit.jpg', 'Ассоциация компаний интернет-торговли'); ?>  
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</center>
		</td>
	</tr>
	
	<tr>
		<td>
			<? HtmlHelper::PrintSpacer(0, 32); ?>
		</td>
	</tr>
</tbody>
</table>
</center>
</body>
</html>