<div class="modal fade" id="modalHtml">
    <div id="page_newspaper_html" class="modal-dialog">
        <div class="modal-body">


<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Газета "<?=$model->name?>"</h4>
    </div>
    <div class="modal-body">
        <textarea>
            <?=$html?>
        </textarea>
    </div>
    <div class="modal-footer">
        <a href="/newspaper/default/download_html/<?=$model->id?>" class="btn btn-success">Скачать как файл</a>

    </div>
</div>
        </div>
    </div>
</div>