<? /* @var $product LetterCatalogBlock */ ?>
<table cellspacing="0" cellpadding="0" border="0" width="100%">

    <tr>
        <td height="32" style="height:32px;vertical-align:top;line-height:13px;">
            <?=
            HtmlHelper::Link($product->getFullUrl(), HtmlHelper::Font(
                '<b>' . HtmlHelper::CodeToHtml($product->product_category) . '</b>' . (strlen($product->product_model) < 60 ? '<br/>' : ' ') . HtmlHelper::CodeToHtml($product->product_model)), array(
                'size' => 11,
            )); ?>
        </td>
    </tr>

    <tr>
        <td>
            <?= HtmlHelper::Link($product->getFullUrl(), HtmlHelper::Image($product->getFullImageUrl())); ?>
        </td>
    </tr>

    <tr>
        <td>
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td width="115" style="width: 115px;">
                        <? HtmlHelper::PrintSpacer(27); ?>
                    </td>
                    <td align="right" width="80" style="width:80px;" style="text-align: right">
                        <?= HtmlHelper::Font($product->product_old_price, array('color' => '#666', 'size' => 14, 'bold' => true)); ?>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td width="115" style="width: 115px;">
                        <? HtmlHelper::PrintSpacer(115); ?>
                    </td>
                    <td width="80" style="width: 80px; text-align: right" align="right">
                        <?= HtmlHelper::Font($product->product_price, array('color' => '#000', 'size' => 18, 'line-height' => 22, 'bold' => true)); ?>
                    </td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td>
            <? HtmlHelper::PrintSpacer(0, 7); ?>
        </td>
    </tr>

    <? if (!empty($product->product_yellow)): ?>
        <tr>
            <td bgcolor="#fff736" height="27" style="height: 27px; vertical-align: middle" align="center"
                valign="middle">
                <?= HtmlHelper::Font(HtmlHelper::CodeToHtml($product->product_yellow), array('size' => 11, 'bold' => true)); ?>
            </td>
        </tr>
    <? endif; ?>

    <tr bgcolor="#ed1c29" height="28" style="height: 28px;">
        <td bgcolor="#ed1c29" height="28" style="height: 28px;" align="center">
            <?= HtmlHelper::Link($product->getFullUrl(), HtmlHelper::Font('КУПИТЬ', array('color' => '#fff', 'size' => 14))); ?>
        </td>
    </tr>

    <tr>
        <td>
            <? HtmlHelper::PrintSpacer(0, 10); ?>
        </td>
    </tr>

    <? if ($product->product_features): ?>
        <tr>
            <td valign="top">
                <? foreach ($product->product_features as $feature): ?>
                    <?= HtmlHelper::Font('• ' . $feature, array('size' => 11)); ?> <br/>
                <? endforeach; ?>
            </td>
        </tr>
        <tr>
            <td>
                <? HtmlHelper::PrintSpacer(0, 12); ?>
            </td>
        </tr>
    <? endif; ?>

    <? if (!empty($product->product_all_url) || !empty($product->product_all_label)): ?>
        <tr>
            <td>
                <center>
                    <?= HtmlHelper::Link($product->product_all_url, HtmlHelper::Font($product->product_all_label,
                        array('color' => '#475c71', 'size' => 11, 'underline' => true, 'up' => true, 'bold' => true)
                    )); ?>
                </center>
            </td>
        </tr>
    <? endif; ?>
</table>