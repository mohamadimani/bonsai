<?php
$user_info = $data["user_info"];
if (!empty($_SESSION["user_update"]) and $_SESSION["user_update"] == "success") {
    ?>
    <div class="alert alert-success alert-dismissable text-center">
        <button onclick="close_alert(this)" type="button" class="close" data-dismiss="alert"
                aria-hidden="true">
            ×
        </button>
        <a class="alert-link">اطلاعات بروزرسانی شد</a>
    </div>
<?php }
if (!empty($_SESSION["user_update"]) and $_SESSION["user_update"] == "danger") {
    ?>
    <div class="alert alert-danger alert-dismissable text-center">
        <button onclick="close_alert(this)" type="button" class="close" data-dismiss="alert"
                aria-hidden="true">
            ×
        </button>
        <a class="alert-link"> مشکل در ثبت اطلاعات !</a>
    </div>
<?php }
if (!empty($_SESSION["user_update"]) and $_SESSION["user_update"] == "empty") {
    ?>
    <div class="alert alert-danger alert-dismissable text-center">
        <button onclick="close_alert(this)" type="button" class="close" data-dismiss="alert"
                aria-hidden="true">
            ×
        </button>
        <a class="alert-link">مقادیر نمیتوانند خالی باشند</a>
    </div>
<?php }
if (!empty($_SESSION["user_info"])) {
    ?>
    <div class="alert alert-danger alert-dismissable text-center">
        <button onclick="close_alert(this)" type="button" class="close" data-dismiss="alert"
                aria-hidden="true">
            ×
        </button>
        <a class="alert-link"><?= $_SESSION["user_info"] ?></a>
    </div>
<?php }
unset($_SESSION["user_update"]);
unset($_SESSION["user_info"]);
?>

<style>


    div.banner > img {
        width:100%;
        height:100%;
        float: left;
        padding:0;
        margin: 0;
        position: fixed;
        right:0;
        top:0;
    }

    footer{
        color: white !important;
    }
</style>

<div class="row banner " style="width: 100%;height: 100%; text-align: center;padding: 0;margin: 0;">
    <img src="<?= SITE_URL ?>public/images/cms_banner.png" alt="bamboweb" >
</div>
