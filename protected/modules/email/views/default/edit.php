<script src="/web/js/email_module/ui.js"></script>
<script src="/web/js/email_module/tab_header.js"></script>

<div id="page_email_edit">

    <input type="hidden" id="letter_id" value="<?=$model->id?>">

    <div class="page-header row">
        <div class="col-9"><h1>Рассылка "<?= $model->name ?>"</h1></div>
    </div>

    <? $tabs = array(
        'tab_common' => 'Основные параметры',
        'tab_header' => 'Верхняя часть',
        'tab_content' => 'Основная часть',
        'tab_footer' => 'Нижняя часть',
        'tab_view' => 'Просмотр',
        'tab_download' => 'Скачать'
    ); ?>

    <ul class="nav nav-tabs">
        <? $ind = 0;
        foreach ($tabs as $tab_id => $tab_label): $ind++ ?>
            <li<?= $ind == $active_tab ? ' class="active"' : '' ?> data-ind="<?=$ind?>"><a href="#<?= $tab_id ?>"><?= $tab_label ?></a></li>
        <? endforeach; ?>
    </ul>

    <div class="tab-content">
        <? $ind = 0;
        foreach ($tabs as $tab_id => $tab_label): $ind++ ?>
            <div class="tab-pane<?=$ind == $active_tab ? ' active' : ''?>" id="<?=$tab_id?>">
                <? $this->renderPartial('tabs/'.$tab_id, array('model' => $model)); ?>
            </div>
        <? endforeach; ?>
    </div>
</div>