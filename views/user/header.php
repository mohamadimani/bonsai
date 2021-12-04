<?php
$model = new model();
function intFormat($num)
{
    settype($num, "String");
    $n = strlen($num);
    $i = 0;
    $help = $n % 3;
    while ($help != 0) {
        $num = '0' . $num;
        $i++;
        $n = strlen($num);
        $help = $n % 3;
    }
    $arr = str_split($num, 3);
    $str = "";
    foreach ($arr as $index) {
        $str = $str . "," . $index;
    }
    $i++;
    return substr($str, $i);
}

//date_default_timezone_set("Asia/tehran");
if (!empty($_SESSION["user_login_time"]) and $_SESSION["user_login_time"] > time()) {
    $login_time_limit = $_SESSION["user_login_time"] - time();
    $limit_min = floor($login_time_limit / 60);
    $limit_sec = ($login_time_limit % 60);
    $login_time_limit2 = $limit_min . ':' . $limit_sec;

} else {
    $now_time = $model->time_to_jalali_date("T");
    $login_time_limit2 = $now_time;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-language" content="fa"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <title> <?= @$site_options["site_name"] ?></title>
    <link rel="stylesheet" href="<?= SITE_URL ?>public/admin/assets/plugins/morris/morris.css">
    <link href="<?= SITE_URL ?>public/admin/assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet"
          type="text/css">
    <link href="<?= SITE_URL ?>public/admin/assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?= SITE_URL ?>public/admin/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?= SITE_URL ?>public/admin/assets/css/core.css" rel="stylesheet" type="text/css"/>
    <link href="<?= SITE_URL ?>public/admin/assets/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="<?= SITE_URL ?>public/admin/assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <link href="<?= SITE_URL ?>public/admin/assets/css/pages.css" rel="stylesheet" type="text/css"/>
    <script src="<?= SITE_URL ?>public/admin/assets/js/modernizr.min.js"></script>

    <link type="text/css" rel="stylesheet"
          href="<?= SITE_URL ?>public/admin/assets/plugins/persianjalili/style/kamadatepicker.css"/>
    <script src="<?= SITE_URL ?>public/admin/assets/js/jquery.min.js"></script>
    <script src="<?= SITE_URL ?>public/admin/assets/plugins/persianjalili/src/kamadatepicker.js"></script>
    <!--    <script src="--><? //= SITE_URL ?><!--public\admin\assets\ckeditor/ckeditor.js"></script>-->
    <script src="<?= SITE_URL ?>public\admin\assets\plugins\ckeditor/ckeditor.js"></script>
    <link rel="shortcut icon" href="<?= SITE_URL ?>public/images/<?= $site_options["site_logo"] ?>">
    <!--    jquery ui-->
    <link href="<?= SITE_URL ?>public\admin\assets\js/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script src="<?= SITE_URL ?>public\admin\assets\js/jquery-ui.js"></script>
    <!--    toltip-->
    <link rel="stylesheet"
          href="<?= SITE_URL ?>public\admin\assets\plugins\datepicker/css/persianDatepicker-default.css"/>
    <script src="<?= SITE_URL ?>public\admin\assets\plugins\datepicker/js/persianDatepicker.js"></script>

    <style>


        /*toltip style */
        div.tooltip-inner {
            font-family: "IRANSans-web", "Helvetica Neue", Helvetica, Arial, IRANSans-web;
            font-weight: bold;
            border-radius: 5px;
        }

        /*all tables tr hover */
        tbody tr:hover {
            color: #000000 !important;
            text-shadow: 2px 2px 4px #5f5f5f;
        }

        /*/////*/

        .has_sub ul li {
            display: none;
        }

        .has_sub ul {
        }

        .slimScrollBar {
            width: 10px !important;
        }

        table th, td {
            text-align: center;
        }

        input {
            text-align: center;
        }

        @media (max-width: 600px) {
            div.side-menu.left {
                position: fixed !important;
                width: 100%;
            }

            .card-box {
                /*overflow: scroll;*/
            }

            /*scrol right manu*/
            .sidebar-inner {
                overflow-y: scroll !important;
            }
        }

        .has_sub ul li {
            display: block;
        }

        ul.nav {
            display: flex !important;
        }

        .side-menu.left {
            background: white;
            box-shadow: -3px 0 5px rgba(125, 122, 122, 0.1);
            position: absolute;
            top: 60px;
        }

    </style>
</head>

<body class="fixed-left">
<div style="float: left;width: 100%;height: 30px"></div>
<div id="wrapper">
    <div class="topbar">
        <div class="topbar-left">
            <div class="text-center">
                <a href="<?= SITE_URL ?>users" class="logo">
                    <span><?= @$user_info["name"] . '  ' . @$user_info["family"] ?></span>
                </a>
            </div>
        </div>
        <div class="">
            <div class="pull-left">
                <button class="button-menu-mobile open-left waves-effect waves-light">
                    <i class="md md-menu"></i>
                </button>
                <span class="clearfix"></span>
            </div>
        </div>

        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="">
                    <ul class="nav navbar-nav navbar-right pull-right">
                        <?php
                        if (isset($user_info["credit"])) {
                            ?>
                            <li class="hidden-xs">
                                <a class="waves-effect waves-light">
                                    <i class="fa fa-money"></i>
                                    <span style="margin: auto 5px;"><?= $user_info["credit"] ?></span>
                                    <span>تومان</span>
                                </a>
                            </li>
                        <?php } ?>
                        <li class=" ">
                            <a class="waves-effect waves-light">
                                <?php if (!empty($_SESSION["user_login_time"]) and $_SESSION["user_login_time"] > time()) { ?>
                                    <span style="margin: 0 10px 0 10px;">  زمان پنل  </span>
                                <?php } ?>
                                <span class="active_time" style="width: 100px;"> <?= $login_time_limit2 ?> </span>
                                <i class="fa  fa-clock-o"></i>
                                <script>
                                    var counter = 0;
                                    setInterval(function () {
                                        var nowtime = Math.abs(Math.floor(new Date() / 1000));
                                        var left =  <?= $_SESSION["user_login_time"] ?> -nowtime;
                                        if (nowtime <= <?= $_SESSION["user_login_time"]  ?>) {
                                            var min = Math.floor(left / 60);
                                            var secend = Math.floor(left - (min * 60));
                                            if (min < 2) {
                                                $('span.active_time').css({
                                                    'color': "red",
                                                    "font-weight": "bold",
                                                    "font-size": "16px"
                                                });
                                                if (counter == 0) {
                                                    swal("اخطار !", min + "دقیقه و " + secend + "ثانیه " + " تا بسته شدن پنل مدیر جهت بالا بردن امنیت !", "error");
                                                    counter++;
                                                }
                                            }
                                            if (min < 10) {
                                                min = "0" + min
                                            }
                                            if (secend < 10) {
                                                secend = "0" + secend
                                            }
                                            var time = min + ':' + secend;
                                            $('span.active_time').text(time);
                                        }
                                    }, 1000);
                                </script>
                            </a>
                        </li>
                        <li class="hidden-xs">
                            <a id="btn-fullscreen" class="waves-effect waves-light">
                                <i class="icon-size-fullscreen"></i>
                            </a>
                        </li>

                        <?php if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) { ?>
                            <li class="dropdown top-menu-item-xs">
                                <a href="javascript:void(0)"
                                   class="dropdown-toggle profile waves-effect waves-light"
                                   data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?= SITE_URL ?>public/admin/assets/images/small/img4.jpg"
                                         alt="user-img"
                                         class="img-circle">
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="admin_options"><a href=" <?= SITE_URL ?>users">
                                            <i class="ti-settings m-r-10 text-custom"></i>پروفایل</a></li>
                                    <li><a href="<?= SITE_URL ?>users/user_logout">
                                            <i class="ti-power-off m-r-10 text-danger"></i>خروج</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) { ?>
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul>
                        <li class=" has_sub"><a href="<?= SITE_URL ?>" target="_blank">
                                <i class="fa fa-user"></i>مشاهده سایت</a></li>
                        <li class="text-muted menu-title">عمومی</li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect">
                                <i class="fa fa-user"></i>
                                <span class="menu-arrow"></span> مدیریت </a>
                            <ul class="list-unstyled">
                                <li class="admin_password_change">
                                    <a href="<?= SITE_URL ?>users"> اطلاعات پروفایل</a>
                                </li>
                                <li class="admin_password_change">
                                    <a href="<?= SITE_URL ?>users/edit_user"> ویرایش پروفایل</a>
                                </li>
                                <li class="admin_password_change">
                                    <a href="<?= SITE_URL ?>users/change_password"> تغییر رمز ورود </a>
                                </li>
                            </ul>
                        </li>

                        <li class="text-muted menu-title">فروشگاه</li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect">
                                <i class="ti-shopping-cart"></i> <span class="menu-arrow"></span> محصولات </a>
                            <ul class="list-unstyled">
                                <li class=" ">
                                    <a href="<?= SITE_URL ?>users/products"> لیست محصولات</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect">
                                <i class="ti-shopping-cart"></i> <span class="menu-arrow"></span> مدیریت سفارشات </a>
                            <ul class="list-unstyled">
                                <li class=" ">
                                    <a href="<?= SITE_URL ?>users/orders">لیست سفارش های من </a></li>
                                <li class="admin_ecomm_orders">
                                    <a href="<?= SITE_URL ?>users/favorites"> محصولات مورد علاقه من </a></li>
                                <li class="admin_ecomm_orders">
                                    <a href="<?= SITE_URL ?>users/basket"> سبد خرید من </a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    <?php } ?>

