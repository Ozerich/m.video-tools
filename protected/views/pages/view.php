<div id="page_pages">
    <? if(isset($_GET['page'])): ?>
    <input type="hidden" id="open_page" value="<?=$_GET['page']?>">
    <? endif; ?>

    <div class="page-header row">
        <div class="col-9"><h1>Газета "<?=$newspaper->name?>"</h1></div>
    </div>

    <div class="row row-pagination">
        <div class="col-12">
            <ul class="pagination">
                <? for ($i = 1; $i <= count($newspaper->pages); $i++): ?>
                    <li><a data-num="<?= $i ?>" data-id="<?= $newspaper->pages[$i - 1]->id ?>" href="#"><?=$i?></a></li>
                <? endfor; ?>
            </ul>
        </div>
    </div>

    <div class="hidden-img-container" style="display: none">
        <? for ($i = 1; $i <= count($newspaper->pages); $i++): $page = $newspaper->pages[$i - 1]; ?>
            <img data-id="<?= $page->id ?>" data-num="<?= $i ?>" src="<?= $page->image ?>">
        <? endfor; ?>
    </div>

    <div class="image-container">

        <div class="loader" style="display: none">
            <p>Загрузка фонового изображения...</p>
        </div>
        <div class="image-wrapper">
            <img id="scene" src="<?= $newspaper->pages[0]->image ?>">

            <? foreach ($newspaper->pages as $page): ?>
                <? foreach ($page->regions as $region): ?>
                    <div title="<?= $region->url ?>" data-id="<?= $region->id ?>" data-page="<?= $page->id ?>"
                         class="image-item" data-pos="<?=$region->pos?>" data-x="<?= $region->x ?>" data-y="<?= $region->y ?>"
                         data-width="<?= $region->width ?>" data-height="<?= $region->height ?>"
                         data-url="<?= $region->url ?>" data-alt="<?= $region->alt ?>"
                         style="display: none; left: <?= $region->x - 1 ?>px; width: <?= $region->width - 1 ?>px; top: <?= $region->y - 1 ?>px; height: <?= $region->height - 1 ?>px;"></div>
                <? endforeach; ?>
            <? endforeach; ?>
        </div>
    </div>



</div>


<script src="/web/js/page.js"></script>
