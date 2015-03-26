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


<?/*
<tr>
    <td colspan="2">
        <? HtmlHelper::PrintSpacer(0, 25); ?>
    </td>
</tr>
*/?>

						<? if($letter->getOption('short_mode', 0) == 0): ?>
						
						<? /*
<tr>
<td>
<center>



<tr>
    <td align="center" style="text-align: center"><center>
        <table width="600" cellspacing="0" cellpadding="0" border="0">
            <tbody>
            <tr>
                <td width="20"><br></td>
                <td width="159" valign="top"><br>
                    <?= HtmlHelper::Font('Акции', array('size' => 12, 'bold' => true, 'line-height' => 18, 'underline' => false)); ?>
                    <br>
                    <? if (!empty($letter->stocks)): foreach ($letter->stocks as $stock): if ($stock->on_list): ?>
                        <?= HtmlHelper::Link($stock->url, HtmlHelper::Font($stock->label, array('size' => 12, 'line-height' => 18, 'underline' => true)), 'a_foot_menu'); ?>
                        <br>
                    <? endif; endforeach; endif; ?>
                    </td>
                <td width="1" background="#cccccc" style="width: 1px; max-width:1px; padding: 0;background: #cccccc">
                    <br></td>
                <td width="41"><br></td>

                <? $links = array(
                    array(
                        'width' => 170,
                        'items' => array(
                            'Видео' => array(
                                'url' => 'televizory-i-video',
                                'children' => array(
                                    'Телевизоры' => 'televizory-i-cifrovoe-tv/televizory-65',
                                    'Видеоплееры' => 'video/videopleery-317',
                                    'Подвесы' => 'podvesy-dlya-televizorov-38',
                                ),
                            ),
                            'Аудио' => array(
                                'url' => 'audiotehnika',
                                'children' => array(
                                    'MP3-плееры' => 'audiotehnika-i-aksessuary/mp3-pleery-72',
                                    'Музыкальные центры' => 'audiotehnika-i-aksessuary/muzykalnye-centry-68',
                                    'Наушники' => 'naushniki-54',
                                ),
                            ),
                            'Компьютеры' => array(
                                'url' => 'noutbuki-planshety-i-kompyutery',
                                'children' => array(
                                    'Ноутбуки' => 'noutbuki-planshety-komputery/noutbuki-118',
                                    'Планшеты' => 'noutbuki-planshety-komputery/planshety-195',
                                    'Компьютерные мыши' => 'komputernye-aksessuary/komputernye-myshi-183',
                                    'Сумки для ноутбуков' => 'komputernye-aksessuary/sumki-dlya-noutbukov-216',
                                    'Внешние жесткие диски' => 'komputernye-aksessuary/vneshnie-zhestkie-diski-184',
                                    'Wi-Fi маршрутизаторы' => 'komputernye-aksessuary/wi-fi-i-setevoe-oborudovanie-186',
                                ),
                            ),
                            'Электронные книги' => array(
                                'url' => 'elektronnye-knigi-i-aksessuary/elektronnye-knigi-73',
                            ),
                            'Смартфоны' => array(
                                'url' => 'smartfony-sotovye-telefony/smartfony-205',
                            ),
                        )),
                    array(
                        'width' => 209,
                        'items' => array(
                            'Фото' => array(
                                'url' => 'fotoapparaty-i-videotehnika-12',
                                'children' => array(
                                    'Зеркальные фотоаппараты' => 'fotoapparaty-i-videotehnika/zerkalnye-fotoapparaty-169',
                                    'Компактные фотоаппараты' => 'fotoapparaty-i-videotehnika/kompaktnye-cifrovye-fotoapparaty-112',
                                    'Карты памяти' => 'aksessuary-dlya-foto-i-videotehniki/karty-pamyati-i-kartridery-260',
                                    'Сумки для фотоаппаратов' => 'aksessuary-dlya-foto-i-videotehniki/sumki-dlya-fotoapparatov-264',
                                ),
                            ),
                            'Техника для кухни и дома' => array(
                                'children' => array(
                                    'Бытовая техника' => 'bytovaya-tehnika-2',
                                    'Кухонная техника' => 'kuhonnaya-tehnika-3',
                                    'Посуда' => 'posuda-53',
                                    'Встраиваемая бытовая техника' => 'vstraivaemaya-tehnika-4',
                                ),
                            ),
                            'Красота и здоровье' => array(
                                'url' => 'krasota-i-zdorove',
                                'children' => array(
                                    'Товары для красоты' => 'tovary-dlya-krasoty-14',
                                    'Товары для здоровья' => 'tovary-dlya-zdorovya-35'
                                ),
                            ),
                            'Автотехника' => array(
                                'url' => 'avtomobilnaya-elektronika-i-gps',
                                'children' => array(
                                    'Навигаторы и автоэлектроника' => 'navigatory-i-avtomobilnaya-elektronika-17',
                                    'Автоакустика' => 'avtoakustika-7'
                                ),
                            ),
                            'Игровые приставки и аксессуары' => array(
                                'url' => 'igrovye-pristavki-16',
                            ),
                        ))
                ); ?>

                <? foreach ($links as $column): ?>
                    <td width="<?= $column['width'] ?>" valign="top"><br>
                        <? foreach ($column['items'] as $label => $category): ?>
                            <? if (isset($category['url'])): ?>
                                <?= HtmlHelper::Link('http://www.mvideo.ru/' . $category['url'], HtmlHelper::Font($label, array('bold' => true, 'line-height' => 18, 'underline' => true)), 'a_foot_menu'); ?>
                            <? else: ?>
                                <?= HtmlHelper::Font($label, array('bold' => true, 'line-height' => 18), 'a_foot_menu'); ?>
                            <? endif; ?>
                            <br>
                            <? if (isset($category['children'])): foreach ($category['children'] as $label => $link): ?>
                                <?= HtmlHelper::Link('http://www.mvideo.ru/' . $link, HtmlHelper::Font($label, array('line-height' => 18, 'underline' => true)), 'a_foot_menu'); ?>
                                <br>
                            <? endforeach; endif; ?>
                        <? endforeach; ?>
                    </td>
                <? endforeach; ?>

            </tr>
            </tbody>
        </table></center>
    </td>
</tr>
*/?>
<? /*
$footer_stocks = array_filter($letter->stocks, function($row){
return $row->on_list;
}); ?>
<? if($footer_stocks): ?> 
	<tr>
		<td>
			<? HtmlHelper::PrintSpacer(0, 15); ?>
		</td>
	</tr>
<tr><td colspan="2">
<center>
<?=HtmlHelper::Image('http://static.mvideo.ru/pics/o/mailer/common/separator.jpg');?>
</center>
</td><tr>


<tr>
    <td>
        <? HtmlHelper::PrintSpacer(0, 5); ?>
    </td>
</tr>
<tr><td colspan="2" align="center" style="text-align: center; padding: 0 18px;">
<center>
<?= HtmlHelper::Link('http://www.mvideo.ru/', HtmlHelper::Font('Акции', array('font' => 'Tahoma', 'size' => 12, 'line-height' => 18, 'underline' => true, 'bold' => true)), 'a_foot_menu'); ?>&nbsp;&nbsp;&nbsp;
<? foreach ($footer_stocks as $ind => $stock): ?>
	<?= HtmlHelper::Link($stock->url, HtmlHelper::Font($stock->label, array('font' => 'Tahoma', 'size' => 12, 'line-height' => 18, 'underline' => true)), 'a_foot_menu'); ?>&nbsp;&nbsp;&nbsp;
<? endforeach; ?>
</center>
</td></tr>
<? endif; ?>*/?>
<tr>
    <td>
        <? HtmlHelper::PrintSpacer(0, 10); ?>
    </td>
</tr>
<tr><td colspan="2">
<center>
<?=HtmlHelper::Image('http://static.mvideo.ru/pics/o/mailer/common/separator.jpg');?>
</center>
</td><tr>


<? /*
<tr>
    <td>
        <? HtmlHelper::PrintSpacer(0, 18); ?>
    </td>
</tr>
<tr><td colspan="2">
<center>
<?=HtmlHelper::Image('http://static.mvideo.ru/pics/o/mailer/common/separator.jpg');?>
</center>
</td><tr>*/?>
<tr>
    <td>
        <? HtmlHelper::PrintSpacer(0, 18); ?>
    </td>
</tr>
<tr>
<td colspan="2">
<? /*
<center>
<img usemap="#img_footer_categories" width="600" height="470" vspace="0" hspace="0" border="0" src="http://static.mvideo.ru/pics/o/mailer/common/categories.jpg" alt="">
<map id="img_footer_categories" name="img_footer_categories">
<area alt="Телевизоры и цифровое ТВ" title="Телевизоры и цифровое ТВ" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/televizory-i-cifrovoe-tv-1', 'a_foot_menu')?>" shape="rect" coords="26,19,123,123">
<area alt="Ноутбуки" title="Ноутбуки" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/noutbuki-planshety-komputery/noutbuki-118', 'a_foot_menu')?>" shape="rect" coords="174,22,279,112">
<area alt="Планшеты" title="Планшеты" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/noutbuki-planshety-komputery/planshety-195', 'a_foot_menu')?>" shape="rect" coords="316,13,439,116">
<area alt="Apple" title="Apple" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/noutbuki-planshety-komputery/komputery-i-noutbuki-apple-164', 'a_foot_menu')?>" shape="rect" coords="478,22,570,110">
<area alt="Смартфоны и сотовые телефоны" title="Смартфоны и сотовые телефоны" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/smartfony-sotovye-telefony-10', 'a_foot_menu')?>" shape="rect" coords="14,126,137,237">
<area alt="Электронные книги" title="Электронные книги" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/elektronnye-knigi-i-aksessuary/elektronnye-knigi-73', 'a_foot_menu')?>" shape="rect" coords="151,127,294,227">
<area alt="Фото и видео" title="Фото и видео" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/fotoapparaty-i-videotehnika', 'a_foot_menu')?>" shape="rect" coords="320,134,433,228">
<area alt="Аудио" title="Аудио" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/audiotehnika', 'a_foot_menu')?>" shape="rect" coords="476,126,575,226">
<area alt="Красота и здоровье" title="Красота и здоровье" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/krasota-i-zdorove', 'a_foot_menu')?>" shape="rect" coords="15,251,140,344">
<area alt="Техника для кухни" title="Техника для кухни" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/tehnika-dlya-kuhni', 'a_foot_menu')?>" shape="rect" coords="162,249,291,345">
<area alt="Бытовая техника" title="Бытовая техника" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/bytovaya-tehnika-2', 'a_foot_menu')?>" shape="rect" coords="321,248,429,344">
<area alt="Автотехника" title="Автотехника" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/avtomobilnaya-elektronika-i-gps', 'a_foot_menu')?>" shape="rect" coords="474,251,576,350">
<area alt="Игры и развлечения" title="Игры и развлечения" target="_blank" href="<?=HtmlHelper::prepare_url('http://www.mvideo.ru/igry-i-razvlecheniya', 'a_foot_menu')?>" shape="rect" coords="12,349,137,466">

</map>  </center>     */?>

<center>
<table width="602" cellpadding="0" cellspacing="0" border="0">
	<tr height="118">
		<td width="123"><?= HtmlHelper::Banner('http://static.mvideo.ru/pics/o/mailer/common/footer_nav_single_01.jpg','http://www.mvideo.ru/televizory-i-cifrovoe-tv-1', array(), 'a_foot_menu', 'Телевизоры и цифровое ТВ'); ?></td>
		<td width="113"><?= HtmlHelper::Banner('http://static.mvideo.ru/pics/o/mailer/common/footer_nav_single_02.jpg','http://www.mvideo.ru/noutbuki-planshety-komputery/noutbuki-118', array(), 'a_foot_menu', 'Ноутбуки'); ?></td>
		<td width="126"><?= HtmlHelper::Banner('http://static.mvideo.ru/pics/o/mailer/common/footer_nav_single_03.jpg','http://www.mvideo.ru/noutbuki-planshety-komputery/planshety-195', array(), 'a_foot_menu', 'Планшеты'); ?></td>
		<td width="113"><?= HtmlHelper::Banner('http://static.mvideo.ru/pics/o/mailer/common/footer_nav_single_04.jpg','http://www.mvideo.ru/noutbuki-planshety-komputery/komputery-i-noutbuki-apple-164', array(), 'a_foot_menu', 'Apple'); ?></td>
		<td width="127"><?= HtmlHelper::Banner('http://static.mvideo.ru/pics/o/mailer/common/footer_nav_single_05.jpg','http://www.mvideo.ru/smartfony-sotovye-telefony-10', array(), 'a_foot_menu', 'Смартфоны и сотовые телефоны'); ?></td>
	</tr>
	<tr height="125">
		<td width="123"><?= HtmlHelper::Banner('http://static.mvideo.ru/pics/o/mailer/common/footer_nav_single_06.jpg','http://www.mvideo.ru/elektronnye-knigi-i-aksessuary/elektronnye-knigi-73', array(), 'a_foot_menu', 'Электронные книги'); ?></td>
		<td width="113"><?= HtmlHelper::Banner('http://static.mvideo.ru/pics/o/mailer/common/footer_nav_single_07.jpg','http://www.mvideo.ru/fotoapparaty-i-videotehnika', array(), 'a_foot_menu', 'Фото и видео'); ?></td>
		<td width="126"><?= HtmlHelper::Banner('http://static.mvideo.ru/pics/o/mailer/common/footer_nav_single_08.jpg','http://www.mvideo.ru/audiotehnika', array(), 'a_foot_menu', 'Аудио'); ?></td>
		<td width="113"><?= HtmlHelper::Banner('http://static.mvideo.ru/pics/o/mailer/common/footer_nav_single_09.jpg','http://www.mvideo.ru/krasota-i-zdorove', array(), 'a_foot_menu', 'Красота и здоровье'); ?></td>
		<td width="127"><?= HtmlHelper::Banner('http://static.mvideo.ru/pics/o/mailer/common/footer_nav_single_10.jpg','http://www.mvideo.ru/tehnika-dlya-kuhni', array(), 'a_foot_menu', 'Техника для кухни'); ?></td>
	</tr>
	<tr height="131">
		<td width="123"><?= HtmlHelper::Banner('http://static.mvideo.ru/pics/o/mailer/common/footer_nav_single_11.jpg','http://www.mvideo.ru/bytovaya-tehnika-2', array(), 'a_foot_menu', 'Бытовая техника'); ?></td>
		<td width="113"><?= HtmlHelper::Banner('http://static.mvideo.ru/pics/o/mailer/common/footer_nav_single_12.jpg','http://www.mvideo.ru/avtomobilnaya-elektronika-i-gps', array(), 'a_foot_menu', 'Автотехника'); ?></td>
		<td width="126"><?= HtmlHelper::Banner('http://static.mvideo.ru/pics/o/mailer/common/footer_nav_single_13.jpg','http://www.mvideo.ru/igry-i-razvlecheniya', array(), 'a_foot_menu', 'Игры и развлечения'); ?></td>
		<td width="113"><?= HtmlHelper::Banner('http://static.mvideo.ru/pics/o/mailer/common/footer_nav_single_14.jpg','http://www.mvideo.ru/komputernye-programmy-i-pc-igry-19', array(), 'a_foot_menu', 'Компьютерные программы'); ?></td>
		<td width="127"><?= HtmlHelper::Banner('http://static.mvideo.ru/pics/o/mailer/common/footer_nav_single_15.jpg','http://www.mvideo.ru/aksessuary-dlya-telefonov-58', array(), 'a_foot_menu', 'Аксессуары'); ?></td>
	</tr>
</table>     
</center>                                                                                                                
</td></tr>


<? endif; ?>


<tr>
    <td>
        <? HtmlHelper::PrintSpacer(0, 36); ?>
    </td>
</tr>

<table width="<?=$letter->getOption('page_width', 638)?> " cellspacing="0" cellpadding="0" border="0" bgcolor="#dfdfdf"
       style="border-collapse:separate; text-align: left; border-bottom:1px solid #ccc; margin: 0 auto; background: #dfdfdf">
<tbody>

	<tr>
		<td>
			<? HtmlHelper::PrintSpacer(0, 15); ?>
		</td>
	</tr>
	
	
	<tr>
		<td>
		<center>
				<table width="<?=$letter->getOption('content_width', 600)?>" cellspacing="0" cellpadding="0" border="0" style="border-collapse:separate; text-align: left; margin: 0 auto;">
					<tr>
						<td>


            <? foreach ($letter->stocks as $stock): if ($stock->on_footer): ?>
			<?=HtmlHelper::Font('Пожалуйста, ознакомьтесь с правилами акции «'.$stock->label.'» '.HtmlHelper::Link($stock->url, HtmlHelper::Font('здесь', array('size' => 13, 'color' => '#A3A0A0', 'underline' => true)), 'a_foot_links').'.', array('size' => 13, 'color' => '#333333', 'line-height' => 20));?><br><br>
            <? endif; endforeach; ?>
			

						

	<? $texts = array(
	nl2br($letter->disclaimer),
	'Если вы не хотите больше получать информацию об акциях, распродажах и спецпредложениях, пожалуйста, пройдите по ' . HtmlHelper::Link('https://contact.mvideo.ru/u/register_bg.php?owner_id=303739311&f=1794&key_id=3&optin=n&inp_3=$Email$&landing=http://mvideo.ru/unsubscribe-confirmation/
',
		HtmlHelper::Font('ссылке', array('size' => 13, 'color' => '#A3A0A0', 'underline' => true)), 'a_foot_links') . '.',

	'Если вы получили это письмо от друга и желаете получать рассылку от М.Видео, пожалуйста, подпишитесь ' .
	HtmlHelper::Link('https://www.mvideo.ru/login', HtmlHelper::Font('здесь', array('size' => 13, 'color' => '#A3A0A0', 'underline' => true)), 'a_foot_links') . '.',

	'Чтобы регулярно и без проблем получать рассылку от М.Видео, пожалуйста, добавьте адрес ' .
	HtmlHelper::Link('mailto:mvideo@sender.mvideo.ru', HtmlHelper::Font('mvideo@sender.mvideo.ru', array('size' => 13, 'color' => '#A3A0A0', 'underline' => true)), 'a_foot_links') . ' в свою адресную книгу.',

//	'Возникли вопросы? Позвоните нам по телефону в Москве 8 (495) 777-777-5 и в регионах<br>8 (800) 200-777-5 (звонок бесплатный). Центр ответственности за клиента работает круглосуточно.',

//	'Или напишите нам по адресу ' . HtmlHelper::Link('mailto:24@mvideo.ru', HtmlHelper::Font('24@mvideo.ru', array('size' => 13, 'color' => '#A3A0A0', 'underline' => true))) . '.',

	'Мы уважаем права покупателя и удалим все ваши данные из своей базы '.HtmlHelper::Link('mailto:24@mvideo.ru', HtmlHelper::Font('по запросу', array('size' => 13, 'color' => '#A3A0A0', 'underline' => true))).' в любое время.',
);?>

<? foreach ($texts as $ind => $text): if(empty($text))continue; ?>
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
				<table width="<?=$letter->getOption('content_width', 600)?>" cellspacing="0" cellpadding="0" border="0" style="border-collapse:separate; text-align: left; margin: 0 auto;">
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
						<?=HtmlHelper::Link('http://www.mvideo.ru/', HtmlHelper::Image('http://static.mvideo.ru/pics/o/mailer/common/footer_logo_mvideo.jpg', 'М.Видео'), 'a_footer_logo', 'М.Видео'); ?>                                        
						&nbsp;<?=HtmlHelper::Font('Copyright &copy; М.Видео, 2014', array('size' => 13, 'line-height' => 50,'valign' => 'top', 'color' => '#333333')); ?>
					</td>
					<td align="right" style="text-align: right">
						<?=HtmlHelper::Link('http://www.mvideo.ru/legalcontent', HtmlHelper::Font('Политика конфиденциальности', array('size' => 13, 'line-height' => 50,'valign' => 'top', 'color' => '#A3A0A0', 'underline' => true)), 'a_foot_links', 'Политика конфиденциальности'); ?>
						&nbsp;
						<?=HtmlHelper::Image('http://static.mvideo.ru/pics/o/mailer/common/footer_logo_akit.jpg', 'Ассоциация компаний интернет-торговли'); ?>  
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