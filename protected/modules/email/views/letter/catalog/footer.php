<? /* @var $letter Letter */ ?>

<center>

<table width="638" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" class="pad_null"
       style="border-left: 1px solid #CACACA; border-right:1px solid #cacaca; border-bottom: 1px solid #cacaca; margin: 0 auto;">
<tbody>
<tr>
    <td colspan="2">
        <? HtmlHelper::PrintSpacer(0, 20); ?>
    </td>
</tr>

<? $blocks = $letter->footer_blocks;
if ($blocks): ?>
    <tr>
        <td align="center" style="text-align: center; border-bottom: 1px solid #cacaca;">
            <center>
                <table cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td width="600">
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
<?/*
<tr>
    <td colspan="2">
        <? HtmlHelper::PrintSpacer(0, 25); ?>
    </td>
</tr>
*/?>
<tr>
<td>
<center>

<table width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff"
       style="border-collapse:separate; text-align: left; margin: 0 auto;">
<tbody>



<tr>
    <td colspan="2">
        <table width="600" cellspacing="0" cellpadding="0" border="0">
            <tbody>
            <tr>
                <td width="20"><br></td>
                <td width="159" valign="top"><br>
                    <?= HtmlHelper::Link('http://www.mvideo.ru/discount/', HtmlHelper::Font('Акции', array('size' => 12, 'bold' => true, 'line-height' => 18, 'underline' => true)), 'a_foot_menu'); ?>
                    <br>
                    <? if (!empty($letter->stocks)): foreach ($letter->stocks as $stock): if ($stock->on_list): ?>
                        <?= HtmlHelper::Link($stock->url, HtmlHelper::Font($stock->label, array('size' => 12, 'line-height' => 18, 'underline' => true)), 'a_foot_menu'); ?>
                        <br>
                    <? endif; endforeach; endif; ?>
                    <?= HtmlHelper::Link('http://www.mvideo.ru/deal_of_the_day/', HtmlHelper::Font('Товар дня', array('size' => 12, 'line-height' => 18, 'underline' => true)), 'a_foot_menu'); ?>
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
        </table>
    </td>
</tr>

<tr>
    <td colspan="2">
        <? HtmlHelper::PrintSpacer(0, 36); ?>
    </td>
</tr>



<tr>
    <td colspan="2">
        <table width="600" cellspacing="0" cellpadding="0" border="0">
            <tbody>
            <tr>
                <td>
                    <?= HtmlHelper::Font('Мы здесь:', array('font' => 'Arial', 'size' => 13, 'color' => '#333')); ?>
                    &nbsp;&nbsp;&nbsp;
                    <?= HtmlHelper::Link('http://www.facebook.com/MVideo.ru', HtmlHelper::Image('http://static.mvideo.ru/img/mailer/soc_fb.gif', '', array('vertical-align' => 'middle'))); ?>
                    &nbsp;
                    <?= HtmlHelper::Link('http://vk.com/mvideo', HtmlHelper::Image('http://static.mvideo.ru/img/mailer/soc_vk.gif', '', array('vertical-align' => 'middle'))); ?>
                    &nbsp;
                    <?= HtmlHelper::Link('http://twitter.com/mvideo', HtmlHelper::Image('http://static.mvideo.ru/img/mailer/soc_tw.gif', '', array('vertical-align' => 'middle'))); ?>
                    &nbsp;
                    <?= HtmlHelper::Link('http://odnoklassniki.ru/mvideo/', HtmlHelper::Image('http://static.mvideo.ru/img/mailer/soc_ok.gif', '', array('vertical-align' => 'middle'))); ?>
                    &nbsp;
                    <?= HtmlHelper::Link('http://instagram.com/mvideo_ru', HtmlHelper::Image('http://static.mvideo.ru/img/mailer/soc_ins.gif', '', array('vertical-align' => 'middle'))); ?>
                </td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>

<tr>
    <td colspan="2">
        <? HtmlHelper::PrintSpacer(0, 27); ?>
    </td>
</tr>

<tr>
    <td colspan="2">

        <font size="1" face="Tahoma, sans-serif;" color="#898989"
              style="font-family: Tahoma,Arial; font-size: 11px; color: #898989; text-decoration: none;">

            <? if (!empty($letter->disclaimer)): ?><?=
                HtmlHelper::Font(preg_replace_callback('#\[url="*(.+?)"*\](.+?)\[/url\]#sui', function ($matches) {
                    return HtmlHelper::Link($matches[1], HtmlHelper::Font($matches[2], array('color' => 'red', 'size' => 11, 'underline' => true)), 'a_foot_links');
                }, $letter->disclaimer), array('color' => '#898989', 'size' => 11)); ?>
                <br><br>
            <? endif; ?>

            <? foreach ($letter->stocks as $stock): if ($stock->on_footer): ?>
				<? if(0 && $stock->date_start): ?>
                Акция «<?= HtmlHelper::Link($stock->url, HtmlHelper::Font($stock->label, array('size' => 11, 'color' => 'red', 'underline' => true)), 'a_foot_links'); ?>» проходит <?= HtmlHelper::GetDateRangeText($stock->date_start, $stock->date_end); ?> во всех обособленных подразделениях (магазинах)
                ООО «М.видео Менеджмент», включая интернет-магазин (покупки, сделанные посредством интернет-сайта <?=HtmlHelper::Link('http://www.mvideo.ru/', HtmlHelper::Font('mvideo.ru', array('size' => 11, 'color' => 'red', 'underline' => true)), 'a_foot_links')?>). Пожалуйста, ознакомьтесь с <?=HtmlHelper::Link($stock->url, HtmlHelper::Font('правилами акции', array('size' => 11, 'color' => 'red', 'underline' => true)), 'a_foot_links')?>.
                <br><br>
				<? else: ?>
				Пожалуйста, ознакомьтесь с правилами акции «<?=$stock->label?>» <?=HtmlHelper::Link($stock->url, HtmlHelper::Font('здесь', array('size' => 11, 'color' => 'red', 'underline' => true)), 'a_foot_links')?>.<br>
				<? endif; ?>
            <? endif; endforeach; ?>
<br>

            <? $texts = array(
                'Если вы не хотите больше получать информацию об акциях и скидках, пожалуйста, пройдите по ' . HtmlHelper::Link('https://contact.mvideo.ru/u/register_bg.php?owner_id=303739311&f=1794&key_id=3&optin=n&inp_3=$Email$&landing=http://mvideo.ru/cancel-subscribe-temporary/',
                    HtmlHelper::Font('ссылке', array('size' => 11, 'color' => 'red', 'underline' => true)), 'a_foot_links') . '.',

                'Если вы получили это письмо от друга и желаете получать новости от &quot;М.Видео&quot;,<br/> пожалуйста, ' .
                HtmlHelper::Link(HtmlHelper::GetCabinetUrl(), HtmlHelper::Font('подпишитесь на рассылку новостей', array('size' => 11, 'color' => 'red', 'underline' => true)), 'a_foot_links') . '.',

                'Чтобы регулярно и без проблем получать рассылку новостей от «М.Видео», пожалуйста,<br/> добавьте адрес ' .
                HtmlHelper::Link('mailto:noreply@sender.mvideo.ru', HtmlHelper::Font('noreply@sender.mvideo.ru', array('size' => 11, 'color' => 'red', 'underline' => true)), 'a_foot_links') . ' в свою адресную книгу.',

                'По всем возникающим вопросам вы можете обратиться по телефону в Москве (495) 777-777-5 (ежедневно с 9 до 21 часа) и регионах: 8-800-200-777-5 (звонок бесплатный).',

                'Также вы можете написать нам по адресу ' . HtmlHelper::Link('mailto:24@mvideo.ru', HtmlHelper::Font('24@mvideo.ru', array('size' => 11, 'color' => 'red', 'underline' => true))) . '.',

                'ООО «М.видео Менеджмент», ОГРН 1057746840095. <br/>Юридический адрес: 105066, Россия, Москва, ул. Нижняя Красносельская, дом 40/12, корп. 20.<br>' .
                HtmlHelper::Link('http://www.mvideo.ru/disclaimer/', HtmlHelper::Font('Политика конфиденциальности', array('size' => 11, 'color' => 'red', 'underline' => true)), 'a_foot_links') . '.',
            );?>

            <? foreach ($texts as $ind => $text): ?>
                <?= $text ?>
                <? if ($ind < count($texts) - 1): ?>
                    <br><br>
                <? endif; ?>
            <? endforeach; ?>

        </font>

    </td>
</tr>
<tr>
    <td colspan="2">
        <? HtmlHelper::PrintSpacer(0, 27); ?>
    </td>
</tr>

</tbody>
</table>
</center>
</td>
</tr>
</tbody>
</table>
</center>

</tbody>
</table>
</center>
</td>
</tr>
</tbody>
</table>
</center>
</body>
</html>