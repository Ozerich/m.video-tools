<? /* @var $product LetterCatalogBlock */ ?>
<table cellspacing="0" cellpadding="0" border="0" width="100%">

    <tr>
        <td height="32" style="height:32px;vertical-align:top;line-height:13px;">

            <? $need_category_bold = empty($product->product_name_additional); ?>
            <? if (strpos($product->product_model, '[url') === false): ?>
                <? echo HtmlHelper::Link($product->getFullUrl(), HtmlHelper::Font(
                    ($need_category_bold ? '' : '') . HtmlHelper::CodeToHtml($product->product_category) . ($need_category_bold ? '' : '') . (strlen($product->product_model) < 60 && $need_category_bold ? '<br/>' : ' ') . '<b>'.HtmlHelper::CodeToHtml($product->product_model).'</b>', array(
                    'size' => 11,
                )), $product->getUtmContent('name')); ?>
            <? else: ?>
                <? echo HtmlHelper::Font($product->product_category, array('size' => 11, 'bold' => false)); ?><br>
                <? echo HtmlHelper::Font(preg_replace_callback('#\[url\=(.+?)\](.+?)\[\/url\]#sui', function ($matches) use ($product) {
                    return HtmlHelper::Link($matches[1], HtmlHelper::Font($matches[2], array('size' => 11, 'color' => '#000', 'underline' => true)), $product->getUtmContent('name', $matches[1]));
                }, $product->product_model), array('size' => 11, 'bold' => true)); ?>
            <? endif; ?>
            <? if(!empty($product->product_name_additional)): ?>
                <br><?=HtmlHelper::Font($product->product_name_additional, array('bold' => true, 'size' => 11)); ?>
            <? endif; ?>
        </td>
    </tr>

    <tr>
        <td>
            <? if ($product->isMultiLinks()): ?>
                <?= HtmlHelper::Banner($product->image, null, $product->area_coords, $product->getUtmContent('img')); ?>
            <? else: ?>
                <?= HtmlHelper::Link($product->getFullUrl(), HtmlHelper::Image($product->getFullImageUrl()), $product->getUtmContent('img')); ?>
            <? endif; ?>
        </td>
    </tr>

    <tr>
        <td style="padding-bottom: 7px">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td width="215" style="width: 215px;text-align: right" align="right">
                        <?= HtmlHelper::Font(HtmlHelper::prepare_price($product->product_old_price), array('color' => '#666', 'size' => 14, 'bold' => true)); ?>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td width="215" style="width: 215px; text-align: right" align="right">
                        <?= HtmlHelper::Font(HtmlHelper::prepare_price($product->product_price), array('color' => '#000', 'size' => 18, 'line-height' => 22, 'bold' => true)); ?>
                    </td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>


    <? if (!empty($product->product_yellow)): ?>
        <tr>
            <td bgcolor="#fff736" height="27" style="height: 27px; vertical-align: middle" align="center"
                valign="middle">
                <?=
                preg_replace_callback('#<b>(.+?)</b>#', function ($matches) {
                    return HtmlHelper::Font($matches[1], array('bold' => true, 'up' => true, 'size' => 18));
                }, HtmlHelper::Font(HtmlHelper::CodeToHtml(preg_replace_callback('#\[b_small\](.+?)\[\/b_small\]#', function ($matches) {
                    return HtmlHelper::Font($matches[1], array('bold' => true, 'up' => true, 'size' => 11));
                }, $product->product_yellow)), array('size' => 11, 'bold' => false, 'up' => true))); ?>
            </td>
        </tr>
    <? endif; ?>

    <tr bgcolor="#ed1c29" height="28" style="height: 28px;">
        <td bgcolor="#ed1c29" height="28" style="height: 28px;" align="center">
            <?= HtmlHelper::Link($product->getFullUrl(), HtmlHelper::Font('КУПИТЬ', array('color' => '#fff', 'size' => 14, 'bold' => true)), $product->getUtmContent('buy')); ?>
        </td>
    </tr>

    <tr>
        <td>
            <? HtmlHelper::PrintSpacer(0, 10); ?>
        </td>
    </tr>

    <? if (count($product->product_features) > 1): ?>
        <tr>
            <td valign="top" style="padding-bottom: 12px">
                <? foreach ($product->product_features as $feature): ?>
                    <?= HtmlHelper::Font('• ' . $feature, array('size' => 11)); ?> <br/>
                <? endforeach; ?>
            </td>
        </tr>

    <? endif; ?>

    <? if (!empty($product->product_all_url) || !empty($product->product_all_label)): ?>
        <tr>
            <td>
                <center>
                    <?=
                    HtmlHelper::Link($product->product_all_url, HtmlHelper::Font($product->product_all_label,
                        array('color' => '#475c71', 'size' => 11, 'underline' => true, 'up' => true, 'bold' => true)
                    ), $product->getUtmContent('all')); ?>
                </center>
            </td>
        </tr>
    <? endif; ?>
</table>