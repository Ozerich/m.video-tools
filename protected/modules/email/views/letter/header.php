<? /* @var $letter Letter */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=<?=$encoding?>">
</head>
<body bgcolor="#ffffff" style="visibility: visible;">

<center>
    <table width="638" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" class="pad_null"
           style="border-top: 1px solid #CACACA; border-left: 1px solid #CACACA; border-right:1px solid #cacaca; margin: 0 auto;">
        <tbody>
        <tr>
            <td>
                <center>
                    <table width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff"
                           style="border-collapse:separate; margin: 0 auto;">
                        <tbody>

                        <tr>
                            <td colspan="2">
                                <? HtmlHelper::PrintSpacer(0, 8); ?>
                                <center>
                                    <?= HtmlHelper::Font($letter->top_text, array('size' => 11)); ?>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><? HtmlHelper::PrintSpacer(0, 18); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="http://www.mvideo.ru/img/mailer/130125/logo.gif" style="display:block;"
                                     width="154" height="83" vspace="0" hspace="0" border="0" usemap="#top_logo"/>
                                <map id="top_logo" name="top_logo">
                                    <area target="_blank" alt="Войти на сайт М.Видео"
                                          href="http://www.mvideo.ru/?reff=<?= $letter->reff ?>" shape="rect"
                                          coords="0,0,154,83"/>
                                </map>
                            </td>
                            <td align="right" valign="top">
                                <? HtmlHelper::PrintSpacer(440, 30); ?>
                                <font size="1" face="Tahoma, sans-serif;" color="#4f637b"
                                      style="font-family: Tahoma,Arial; font-size: 11px; color: #4f637b; text-decoration: underline;"><a
                                        target="_blank" href="http://click.mvideo.ru/u/gm.php?prm=$uid$_$ident$"
                                        style="color:#4f637b;font-family: Tahoma,Arial; font-size: 11px;text-decoration: underline;">Письмо
                                        не отображается корректно?
                                        <?= HtmlHelper::Image('http://www.mvideo.ru/img/mailer/130221/strelka.gif') ?>
                                    </a>
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><? HtmlHelper::PrintSpacer(0, 30); ?></td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <center>
                                    <table width="600" cellspacing="0" cellpadding="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td><?= HtmlHelper::Link('http://www.mvideo.ru/price/lvl_12/class_357/', HtmlHelper::Image('http://www.mvideo.ru/img/mailer/130311/tmenu1.gif')); ?></td>
                                            <td><?= HtmlHelper::Link('http://www.mvideo.ru/catalog/lvl_3/', HtmlHelper::Image('http://www.mvideo.ru/img/mailer/130311/tmenu2.gif')); ?></td>
                                            <td><?= HtmlHelper::Link('http://www.mvideo.ru/price/lvl_1/class_1/', HtmlHelper::Image('http://www.mvideo.ru/img/mailer/130311/tmenu3.gif')); ?></td>
                                            <td><?= HtmlHelper::Link('http://www.mvideo.ru/catalog/lvl_2/', HtmlHelper::Image('http://www.mvideo.ru/img/mailer/130311/tmenu4.gif')); ?></td>
                                            <td><?= HtmlHelper::Link('http://www.mvideo.ru/price/lvl_8/class_328/', HtmlHelper::Image('http://www.mvideo.ru/img/mailer/130311/tmenu5.gif')); ?></td>
                                            <td><?= HtmlHelper::Link('http://www.mvideo.ru/deal_of_the_day/', HtmlHelper::Image('http://www.mvideo.ru/img/mailer/130311/tmenu6.gif')); ?></td>
                                            <td><?= HtmlHelper::Link('http://www.mvideo.ru/discount/', HtmlHelper::Image('http://www.mvideo.ru/img/mailer/130311/tmenu7.gif')); ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"><? HtmlHelper::PrintSpacer(0, 15); ?>
                            <td>
                        </tr>


                        <? $blocks = $letter->header_blocks;
                        if ($blocks): ?>
                            <tr>
                                <td colspan="2">
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