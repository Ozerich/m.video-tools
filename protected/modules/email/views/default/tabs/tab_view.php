<div class="viewer-container">
    <div class="loader"><span>Загрузка...</span></div>
    <div class="viewer-container-inner" style="display: none">
        <div class="email-container">
            <label>Отправить на E-mail:</label>
            <input type="text" class="form-control">
            <button type="submit" class="btn btn-mini btn-success btn-send-preview">Отправить</button>
        </div>
        <div class="iframe-container">
            <iframe src="/email/default/preview/<?= $model->id ?>" width="680" height="100%" frameborder="0"
                    scrolling="no"
                    id="preview_frame"></iframe>
        </div>
    </div>
</div>