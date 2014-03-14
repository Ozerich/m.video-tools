<? /* @var $letter Letter */ ?>

<center>

<table width="638" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" class="pad_null"
       style="border-left: 1px solid #CACACA; border-right:1px solid #cacaca; border-bottom: 1px solid #cacaca; margin: 0 auto;">
<tbody>

<? $blocks = $letter->footer_blocks;
if ($blocks): ?>
    <tr>
        <td align="center" style="text-align: center">
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
                                                <?= HtmlHelper::Banner($block->banner_file, $block->banner_url, $block->banner_area_coords); ?>
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
                </table>
            </center>
        </td>
    </tr>
<? endif; ?>

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
                <td width="159" valign="top">
                    <?= HtmlHelper::Link('http://www.mvideo.ru/discount/', HtmlHelper::Font('Акции', array('size' => 12, 'bold' => true, 'line-height' => 18, 'underline' => true))); ?>
                    <br><br>
                    <? if (!empty($letter->stocks)): foreach ($letter->stocks as $label => $url): ?>
                        <?= HtmlHelper::Link($url, HtmlHelper::Font($label, array('size' => 12, 'line-height' => 18, 'underline' => true))); ?>
                        <br>
                    <? endforeach; endif; ?>
                    <?= HtmlHelper::Link('http://www.mvideo.ru/discount/', HtmlHelper::Font('Все акции', array('size' => 12, 'line-height' => 18, 'underline' => true))); ?>
                </td>
                <td width="1" background="#cccccc" style="width: 1px; max-width:1px; padding: 0;background: #cccccc">
                    <br></td>
                <td width="41"><br></td>

                <? $links = array(
                    array(
                        'width' => 170,
                        'items' => array(
                            'Видео' => array(
                                'url' => 'catalog/sd_1/',
                                'children' => array(
                                    'Телевизоры' => 'price/lvl_1/class_1/',
                                    'Видеоплееры' => 'price/lvl_109/class_484/',
                                    'Подвесы' => 'price/lvl_139/class_400/',
                                ),
                            ),
                            'Аудио' => array(
                                'url' => 'catalog/sd_2/',
                                'children' => array(
                                    'MP3-плееры' => 'price/lvl_11/class_12/',
                                    'Музыкальные центры' => 'price/lvl_11/class_7/',
                                    'Наушники' => 'catalog/lvl_155/',
                                ),
                            ),
                            'Компьютеры' => array(
                                'url' => 'catalog/sd_5/',
                                'children' => array(
                                    'Ноутбуки' => 'lvl_8/class_130/',
                                    'Планшеты' => 'lvl_8/class_328/',
                                    'Компьютерные мыши' => 'lvl_114/class_295/',
                                    'Сумки для ноутбуков' => 'lvl_114/class_377/',
                                    'Внешние жесткие диски' => 'lvl_114/class_296/',
                                    'Wi-Fi маршрутизаторы' => 'lvl_114/class_302/',
                                ),
                            ),
                            'Электронные книги' => array(
                                'url' => 'lvl_116/class_13/',
                            ),
                            'Смартфоны' => array(
                                'url' => 'lvl_12/class_357/',
                            ),
                        )),
                    array(
                        'width' => 209,
                        'items' => array(
                            'Фото' => array(
                                'url' => 'catalog/lvl_14/',
                                'children' => array(
                                    'Зеркальные фотоаппараты' => 'price/lvl_14/class_261/',
                                    'Компактные фотоаппараты' => 'price/lvl_14/class_117/',
                                    'Карты памяти' => 'price/lvl_143/class_426/',
                                    'Сумки для фотоаппаратов' => 'price/lvl_143/class_430/',
                                ),
                            ),
                            'Техника для кухни и дома' => array(
                                'children' => array(
                                    'Бытовая техника' => 'catalog/lvl_2/',
                                    'Кухонная техника' => 'catalog/lvl_3/',
                                    'Посуда' => 'catalog/lvl_154/',
                                    'Встраиваемая бытовая техника' => 'catalog/lvl_4/',
                                ),
                            ),
                            'Красота и здоровье' => array(
                                'url' => 'catalog/sd_12/',
                                'children' => array(
                                    'Товары для красоты' => 'catalog/lvl_102/',
                                    'Товары для здоровья' => 'catalog/lvl_136/'
                                ),
                            ),
                            'Автотехника' => array(
                                'url' => 'catalog/sd_7/',
                                'children' => array(
                                    'Навигаторы и автоэлектроника' => 'catalog/lvl_106/',
                                    'Автоакустика' => 'catalog/lvl_7/'
                                ),
                            ),
                            'Игровые приставки и аксессуары' => array(
                                'url' => 'catalog/lvl_105/',
                            ),
                        ))
                ); ?>

                <? foreach ($links as $column): ?>
                    <td width="<?= $column['width'] ?>" valign="top">
                        <? foreach ($column['items'] as $label => $category): ?>
                            <? if (isset($category['url'])): ?>
                                <?= HtmlHelper::Link('http://www.mvideo.ru/' . $category['url'], HtmlHelper::Font($label, array('bold' => true, 'line-height' => 18, 'underline' => true))); ?>
                            <? else: ?>
                                <?= HtmlHelper::Font($label, array('bold' => true, 'line-height' => 18)); ?>
                            <? endif; ?>
                            <br>
                            <? if (isset($category['children'])): foreach ($category['children'] as $label => $link): ?>
                                <?= HtmlHelper::Link('http://www.mvideo.ru/' . $link, HtmlHelper::Font($label, array('line-height' => 18, 'underline' => true))); ?>
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
        <?= HtmlHelper::Image('http://www.mvideo.ru/pics/o/mailer/130815/vvp.jpg'); ?>
    </td>
</tr>
<tr>
    <td colspan="2">
        <? HtmlHelper::PrintSpacer(0, 27); ?>
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
                    <?= HtmlHelper::Link('http://www.facebook.com/MVideo.ru', HtmlHelper::Image('http://www.mvideo.ru/img/mailer/soc_fb.gif', '', array('vertical-align' => 'middle'))); ?>
                    &nbsp;
                    <?= HtmlHelper::Link('http://vk.com/mvideo', HtmlHelper::Image('http://www.mvideo.ru/img/mailer/soc_vk.gif', '', array('vertical-align' => 'middle'))); ?>
                    &nbsp;
                    <?= HtmlHelper::Link('http://twitter.com/mvideo', HtmlHelper::Image('http://www.mvideo.ru/img/mailer/soc_tw.gif', '', array('vertical-align' => 'middle'))); ?>
                    &nbsp;
                    <?= HtmlHelper::Link('http://odnoklassniki.ru/mvideo/', HtmlHelper::Image('http://www.mvideo.ru/img/mailer/soc_ok.gif', '', array('vertical-align' => 'middle'))); ?>
                    &nbsp;
                    <?= HtmlHelper::Link('http://instagram.com/mvideo_ru', HtmlHelper::Image('http://www.mvideo.ru/img/mailer/soc_ins.gif', '', array('vertical-align' => 'middle'))); ?>
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

        <? if (!empty($letter->disclaimer)): ?><?=HtmlHelper::Font(HtmlHelper::CodeToHtml($letter->disclaimer), array('color' => '#898989', 'size' => 11)); ?><br><br>
        <? endif; ?>

        <? $texts = array(
            'Если вы не хотите больше получать информацию об акциях и скидках, пожалуйста, пройдите по ' . HtmlHelper::Link('http://www.mvideo.ru/cabinet/subscription_emarsys.php?act=unsubscribe&bonuserid=$Bonus Member ID$&userid=$Online User ID$&email=$E-Mail$&subid[]=4',
                HtmlHelper::Font('ссылке', array('size' => 11, 'color' => 'red', 'underline' => true))) . '.',

            'Если вы получили это письмо от друга и желаете получать новости от &quot;М.Видео&quot;,<br/> пожалуйста, ' .
            HtmlHelper::Link('http://www.mvideo.ru/cabinet/', HtmlHelper::Font('подпишитесь на рассылку новостей', array('size' => 11, 'color' => 'red', 'underline' => true))) . '.',

            'Чтобы регулярно и без проблем получать рассылку новостей от «М.Видео», пожалуйста,<br/> добавьте адрес ' .
            HtmlHelper::Link('mailto:noreply@sender.mvideo.ru', HtmlHelper::Font('noreply@sender.mvideo.ru', array('size' => 11, 'color' => 'red', 'underline' => true))) . ' в свою адресную книгу.',

            'По всем возникающим вопросам вы можете обратиться по телефону в Москве (495) 777-777-5 (ежедневно с 9 до 21 часа) и регионах: 8-800-200-777-5 (звонок бесплатный).',

            'Также вы можете написать нам по адресу ' . HtmlHelper::Link('mailto:noreply@sender.mvideo.ru', HtmlHelper::Font('24@mvideo.ru', array('size' => 11, 'color' => 'red', 'underline' => true))) . '.',

            'ООО «М.видео Менеджмент», ОГРН 1057746840095. <br/>Юридический адрес: 105066, Россия, Москва, ул. Нижняя Красносельская, дом 40/12, корп. 20.<br>' .
            HtmlHelper::Link('http://www.mvideo.ru/disclaimer/', HtmlHelper::Font('Политика конфиденциальности', array('size' => 11, 'color' => 'red', 'underline' => true))) . '.',
        );?>

        <? foreach ($texts as $ind => $text): ?>
            <?= HtmlHelper::Font($text, array('color' => '#898989', 'size' => 11)); ?>
            <? if ($ind < count($texts) - 1): ?>
                <br><br>
            <? endif; ?>
        <? endforeach; ?>
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