<!DOCTYPE html>
<html>
<head>
    <title>We can help you sell all</title>
    <link rel="stylesheet" href="/static/css/app.css">
    <link rel="stylesheet" href="/static/css/flexslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/static/css/font-awesome.min.css" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--fonts-->
    <link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!--//fonts-->
    <!-- js -->
    <script type="text/javascript" src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
    <script src="/static/js/bootstrap-select.js"></script>
    <script type="text/javascript" src="/static/js/jquery.leanModal.min.js"></script>
    <link href="/static/css/jquery.uls.css" rel="stylesheet"/>
    <link href="/static/css/jquery.uls.grid.css" rel="stylesheet"/>
    <link href="/static/css/jquery.uls.lcd.css" rel="stylesheet"/>

    <!-- Source -->
    <script src="/static/js/jquery.uls.data.js"></script>
    <script src="/static/js/jquery.uls.data.utils.js"></script>
    <script src="/static/js/jquery.uls.lcd.js"></script>
    <script src="/static/js/jquery.uls.languagefilter.js"></script>
    <script src="/static/js/jquery.uls.regionfilter.js"></script>
    <script src="/static/js/jquery.uls.core.js"></script>
</head>
<body>
<div class="header">
    <div class="container">
        <div class="logo">
            <a href="/">Will<span>Sell</span>All</a>
        </div>
        <div class="header-right">
            <?php if(isset($isLogged) && $isLogged == true): ?>
            <a class="account" href="/article/category-0/" >Мой кабинет</a>
            <span class="active uls-trigger"><a href="/user/logout/">Выход</a></span>
            <?php endif; ?>
            <?php if(isset($isLogged) && $isLogged == false): ?>
                <a class="account" href="/user/login/" >Вход</a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php if(!isset($hide_baner)): ?>
<div class="<?php if(isset($main_banner)){echo "main-banner";} ?> banner text-center">
    <div class="container">
        <h1>Продавай или покупай   <span class="segment-heading">  все online </span> вместе WillSellAll</h1>
        <p>Бесплатные online объявления на WillSellAll.com - здесь вы найдете то, что искали</p>
        <?php if(isset($isLogged) && $isLogged == true): ?>
            <a href="/article/add/">Создать бесплатное объявление</a>
        <?php endif; ?>
        <?php if(isset($isLogged) && $isLogged == false): ?>
            <a href="/user/login/">Создать бесплатное объявление</a>
        <?php endif; ?>
    </div>
</div>
<?php endif ?>
