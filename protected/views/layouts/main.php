<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta name="author" content="Vital Ozierski, ozicoder@gmail.com">

    <title>Газета М.Видео</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/css/imgareaselect/imgareaselect-default.css" rel="stylesheet" media="screen">
    <link href="/css/bootstrap-glyphicons/less/bootstrap-glyphicons.less" rel="stylesheet/less" type="text/less"
          media="screen">

    <link href="/css/common.less" rel="stylesheet/less" type="text/less" media="screen">

    <script src="/js/jquery-2.0.3.min.js"></script>
    <script src="/js/jquery.imgareaselect.js"></script>
    <script src="/js/bootstrap-3.0.0.min.js"></script>
    <script src="/js/less-1.3.3.min.js"></script>

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.min.js"></script>
    <![endif]-->

</head>

<body>

<? $this->renderPartial('//page_panel'); ?>

<header>
    <a href="/" class="brand"><img src="/img/mvideo.png"></a>
</header>

<div class="container">
    <?=$content?>
</div>

<footer>
	<div class="footer-container">
		Программа разработана специально для М.Видео
		<div class="author">
			<span>Автор: </span>
			<a href="mailto:ozicoder@gmail.com">Виталий Озерский</a>
			<span>&copy; 2013</span>
		</div>
	</div>
</footer>

</body>