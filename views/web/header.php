<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<!-- Mirrored from temdemo.ir/html/brave/landing-theatre.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2019 14:31:38 GMT -->
<head>
    <!-- Site Title-->
    <title><?= $site_options["site_name"] ?></title>
    <meta charset="utf-8">
    <meta name="keywords" content="<?= $site_options["keywords"] ?>">
    <meta name="description" content="<?= $site_options["site_description"] ?>">
    <meta http-equiv="content-language" content="fa"/>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= SITE_URL ?>public/images/<?= $site_options["site_logo"] ?>">
    <title><?= $site_options["site_name"] ?></title>
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Oswald:200,400%7CLato:300,400,300italic,700%7CMontserrat:900">
    <script src="<?= SITE_URL ?>public/admin/assets/js/jquery.min.js"></script>
    <script src="<?= SITE_URL ?>public/web/js/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script>
    <link rel="stylesheet" href="<?= SITE_URL ?>public/web/css/bootstrap.css">
    <link rel="stylesheet" href="<?= SITE_URL ?>public/web/css/style.css">
    <link rel="stylesheet" href="<?= SITE_URL ?>public/web/css/fonts.css">
    <link rel="stylesheet" href="<?= SITE_URL ?>public/web/css/rtl.css">
    <script src="<?= SITE_URL ?>public/web/js/script.js"></script>
    <link href="<?= SITE_URL ?>public/admin/assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet"
          type="text/css">
    <script src="<?= SITE_URL ?>public/admin/assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>


    <style>

        * {
            /*font-family: 'aviny', sans-serif!important;*/
        }

        .ie-panel {
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {
            display: block;
        }

        img.logo1 {
            height: 60px;
            padding: 10px;
            position: relative;
            left: 20px;
        }

        div.page {
            padding: 0 !important;
        }


    </style>
</head>
<body>
<div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img
                src="<?= SITE_URL ?>public/web/images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820"
                alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
</div>
<!-- Page preloader-->
<div class="page-loader">
    <div class="page-loader-logo-name"></div>
    <div class="preloader-wrapper preloader-big active">
        <div class="spinner-layer spinner-blue">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="gap-patch">
                <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-red">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="gap-patch">
                <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-yellow">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="gap-patch">
                <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-green">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="gap-patch">
                <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
    </div>
</div>
<!-- Page-->
<div class="page">
    <!-- Page Header-->
    <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap rd-navbar-centered">
            <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
                 data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fullwidth" data-xl-layout="rd-navbar-static"
                 data-xxl-layout="rd-navbar-static" data-xxxl-layout="rd-navbar-static"
                 data-lg-device-layout="rd-navbar-fullwidth" data-xl-device-layout="rd-navbar-static"
                 data-xxl-device-layout="rd-navbar-static" data-xxxl-device-layout="rd-navbar-static"
                 data-stick-up-offset="1px" data-sm-stick-up-offset="1px" data-md-stick-up-offset="1px"
                 data-lg-stick-up-offset="1px" data-xl-stick-up-offset="1px" data-xxl-stick-up-offset="1px"
                 data-xxx-lstick-up-offset="1px" data-stick-up="true">
                <div class="rd-navbar-inner">
                    <div class="rd-navbar-aside-left">
                        <div class="rd-navbar-nav-wrap">
                            <ul class="rd-navbar-nav">
                                <?php foreach ($ecomm_menu as $menu) {
                                    ?>
                                    <li class="rd-nav-item">
                                        <a class="rd-nav-link " href="<?= SITE_URL . $menu['link'] ?>">
                                            <span class="message-li"><?= $menu["name"] ?></span></a>
                                    </li>
                                <?php }
                                if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) {
                                    ?>
                                    <li class="rd-nav-item">
                                        <a class="rd-nav-link " href="<?= SITE_URL ?>users">
                                            <span class="message-li">پنل کاربری</span></a>
                                    </li>
                                <?php } else { ?>
                                    <li class="rd-nav-item">
                                        <a class="rd-nav-link " href="<?= SITE_URL ?>users/user_login">
                                            <span class="message-li">  ورود | ثبت نام  </span></a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel" style="text-align: left;position: relative;">
                        <!-- RD Navbar Toggle-->
                        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span>
                        </button>
                        <!-- RD Navbar Brand-->
                        <div class="rd-navbar-brand" style="overflow: inherit!important;width: 100%;">
                            <!--Brand-->
                            <a class="brand-name" href="<?= SITE_URL ?>">
                                <img src="<?= SITE_URL ?>public/images/<?= $site_options["site_logo"] ?>" class="logo1"
                                     alt="<?= $site_options["site_name"] ?>"
                                     style="">
                            </a>
                        </div>
                    </div>


                </div>
            </nav>
        </div>
    </header>
