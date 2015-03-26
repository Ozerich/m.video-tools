{include file="header_full.tpl" wo_left_menu=1 ptitle="Красная газета"}
<div id="red_newspaper">
    <h1><a href="/" title="М.Видео - интернет-магазин бытовой техники и электроники">газета м.видео</a></h1>
    <div class="paginator top">
        <a href="javascript:void(0);" class="prev pagArrow_left"></a>
        <div class="navi"></div>
        <a href="javascript:void(0);" class="next pagArrow_right"></a>
    </div>
    <a href="javascript:void(0);" class="prev left_arrow"><i></i><i></i><i></i><i></i></a>
    <a href="javascript:void(0);" class="next right_arrow"><i></i><i></i><i></i><i></i></a>
    <div class="cont_carousel">
        <ul>
            <? foreach($model->pages as $page): ?>
                <li class="red_page">
                <img src="<?=$page->image?>" />
                    <? foreach($page->regions as $region): ?>
                        <a class='gdsItem' href='<?=is_numeric($region->url) ? '/products/'.$region->url.'.html' : $region->url?>?reff=<?=$model->reff?>' target='_blank' style='width: <?=$region->width?>px; height: <?=$region->height?>px; top: <?=$region->y?>px; left: <?=$region->x?>px;'><div class='learn_more'></div></a>
                    <? endforeach; ?>
                </li>
            <? endforeach; ?>
        </ul>
    </div>
    <div class="paginator bottom">
        <a href="javascript:void(0);" class="prev pagArrow_left"></a>
        <div class="navi"></div>
        <a href="javascript:void(0);" class="next pagArrow_right"></a>
    </div>
</div>
{include file="footer_full.tpl"}