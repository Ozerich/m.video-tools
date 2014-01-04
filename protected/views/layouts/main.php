<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta name="author" content="Vital Ozierski, ozicoder@gmail.com">

    <title>М.Видео</title>

    <link href="/web/css/common.less" rel="stylesheet/less" type="text/less" media="screen">

    <script src="/web/js/jquery-2.0.3.min.js"></script>
    <script src="/web/js/jquery.imgareaselect.js"></script>
    <script src="/web/js/bootstrap-3.0.0.min.js"></script>
    <script src="/web/js/less-1.3.3.min.js"></script>


    <!--[if lt IE 9]>
    <script src="/web/js/html5shiv.min.js"></script>
    <![endif]-->

</head>

<body>

<header>
    <a href="/" class="brand"><img src="/web/img/mvideo.png"></a>
</header>

<div class="container">
    <?= $content ?>
</div>

<footer>
    <div class="footer-container">
        Программа разработана специально для М.Видео
        <div class="author">
            <span>Автор: </span>
            <a href="mailto:ozicoder@gmail.com">Виталий Озерский</a>
            <span>&copy; 2013 - <?= date('Y'); ?></span>
        </div>
    </div>
</footer>

</body>