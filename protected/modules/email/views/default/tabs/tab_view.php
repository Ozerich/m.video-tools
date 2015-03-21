<div class="viewer-container">
    <div class="loader"><span>Загрузка...</span></div>
    <div class="viewer-container-inner" style="display: none;">
        <div class="email-container">
            <label>Отправить на E-mail:</label>
            <input type="text" class="form-control">
            <button type="submit" class="btn btn-mini btn-success btn-send-preview">Отправить</button>
        </div>
		<div class="iframes-container" style="overflow: hidden;">
			<div class="iframe-container" style="float: right; width: 650px;">
				<iframe src="/email/default/preview/<?= $model->id ?>" width="650" height="100%" frameborder="0"
						scrolling="no"
						id="preview_frame">
				</iframe>
			</div>
		</div>
    </div>
</div>