<?php
 require_once('models/Connection.php');
 require_once('models/SettingFE.php');
$model_fe = new Config();
$sliders = $model_fe->getAll();
 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href=""/>
    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="publics/Client/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="publics/Client/css/slippry.css">
    <link rel="stylesheet" type="text/css" href="publics/Client/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="publics/Client/css/style.css">
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Sarina' rel='stylesheet' type='text/css'>
</head>

<body>


    <!-- *****************************************************************
    ** Preloader *********************************************************
    ****************************************************************** -->

	<div id="preloader-container">
    	<div id="preloader-wrap">
    		<div id="preloader"></div>
    	</div>
    </div>


    <!-- *****************************************************************
    ** Header ************************************************************
    ****************************************************************** -->

    <header class="tada-container">


    	<!-- LOGO -->
    	<div class="logo-container">
        	<a href="?admin=admin&mod=auth&act=getFormLogin"><img src="publics\img\Ảnh chụp màn hình 2021-09-03 195235.jpg" alt="logo" ></a>
            <div class="tada-social">
            	<a href="https://www.facebook.com/"><i class="icon-facebook5"></i></a>
                <a href="https://twitter.com/?lang=vi"><i class="icon-twitter4"></i></a>
                <a href="https://www.google.com/search?gs_ssp=eJzj4tTP1TcwMU02T1JgNGB0YPBiS8_PT89JBQBASQXT&q=google&oq=go&aqs=chrome.2.69i60j69i59j46i39i199i465j69i59j69i60l4.2483j0j7&sourceid=chrome&ie=UTF-8"><i class="icon-google-plus"></i></a>
                <a href="#"><i class="icon-vimeo4"></i></a>
                <a href="#"><i class="icon-linkedin2"></i></a>
            </div>
        </div>


    	<!-- MENU DESKTOP -->
    	<nav class="menu-desktop menu-sticky">

            <ul class="tada-menu">
                     <li><a href="?admin=client&mod=home&act=index" class="active">Trang chủ</i></a></li>
                    <li><a href="#">Danh mục<i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                          <?php foreach ($categories as $category) { ?>
                            <li><a href="?admin=client&mod=home&act=categories&id=<?= $category['id']?>"><?= $category['name']?></a></li>
                          <?php } ?>
                        </ul>
                    </li>
                    <li><a href="?admin=client&mod=home&act=about">Chúng tôi</a></li>
                    <li><a href="?admin=client&mod=home&act=contact">Liên hệ</a></li>
            </ul>

        </nav>


        <!-- MENU MOBILE -->
        <div class="menu-responsive-container">
            <div class="open-menu-responsive">|||</div>
            <div class="close-menu-responsive">|</div>
            <div class="menu-responsive">
                <ul class="tada-menu">
                     <li><a href="#" class="active">TRANG CHỦ<i class="icon-arrow-down8"></i></a></li>
                    <li><a href="#">DANH MỤC<i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                          <?php foreach ($categories as $category) { ?>
                            <li><a href="?admin=client&mod=home&act=categories&id=<?= $category['id']?>"><?= $category['name']?></a></li>
                          <?php } ?>
                        </ul>
                    </li>
                    <li><a href="?admin=client&mod=home&act=about">CHÚNG TÔI</a></li>
                    <li><a href="?admin=client&mod=home&act=contact">LIÊN HỆ</a></li>
                </ul>
            </div>
        </div> <!-- # menu responsive container -->


        <!-- SEARCH -->
        
        <!-- SLIDER -->
        <?php
        $admin = isset($_GET['admin']) ? $_GET['admin'] : 'client';
        $mod = isset($_GET['mod'])  ? $_GET['mod'] : 'home';
        $act = isset($_GET['act'])  ? $_GET['act'] : 'index'; ?>
          <?php if ($admin== 'client' && $mod == 'home' && $act == 'index' ): ?>
          <div class="tada-slider">
                 <ul id="tada-slider">

                        <?php foreach ($sliders as $slider): ?>
                          <li>
                            <img src="<?= $slider['imgslider']?>" alt="image slider 1">
                            <div class="pattern"></div>
                            <div class="tada-text-container">
                                <h1><?=$slider['title']?></h1>
                                   <h2><?=$slider['content']?></h2>
                                   <span class="button"><a href="#"><?=$slider["text_button"]?></a></span>
                               </div>
                           </li>
                        <?php endforeach; ?>
                 </ul>

                  </div>
          <?php endif; ?>

        <!-- END SLIDER -->


    </header><!-- #HEADER -->
