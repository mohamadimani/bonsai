<style>
    i {
        font-size: 16px !important;
        /*cursor: pointer;*/
        /*margin: 0 3px;*/
    }

    .tooltip-inner {
        font-family: "IRANSans-web", "Helvetica Neue", Helvetica, Arial, IRANSans-web, "B Koodak";
        border-radius: 5px;
    }

    .operation i, .operation .submit {
        padding: 5px;
        border-radius: 50%;
    }

    .operation i:hover, .operation .submit:hover {
        background: rgba(255, 203, 96, 0.71);
    }

    .row {
        margin-bottom: 15px;
    }

    .profile-detail .img-circle {
        height: 120px;
        width: 120px;
        box-shadow: 1px 1px 9px silver;
        border: 1px solid #cccccc;
    }
</style>

<!--ajax upload css-->

<style>

    .bgColor {
        max-width: 440px;
        height: 200px;
        background-color: #c3e8cb;
        padding: 10px;
        border-radius: 4px;
        text-align: center;
    }

    #targetOuter {
        position: relative;
        text-align: center;
        background-color: #F0E8E0;
        margin: 20px auto;
        width: 100px;
        height: 100px;
        border-radius: 4px;
    }

    .btnSubmit {
        background-color: #565656;
        border-radius: 4px;
        padding: 10px;
        border: #333 1px solid;
        color: #FFFFFF;
        width: 200px;
        cursor: pointer;
    }

    .inputFile {
        padding: 5px 0;
        background-color: #FFFFFF;
        width: 100%;
        height: 100%;
        overflow: hidden;
        opacity: 0;
        cursor: pointer;
    }

    .icon-choose-image {
        position: absolute;
        opacity: 0.1;
        top: 0;
        right: 0;
        /*top: 50%;*/
        /*left: 50%;*/
        /*margin-top: -24px;*/
        /*margin-left: -24px;*/
        width: 100% !important;
        height: 100% !important;
    }

    .upload-preview {
        border-radius: 4px;
    }

    #body-overlay {
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 999;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        display: none;
    }

    #body-overlay div {
        position: absolute;
        /*left: 50%;*/
        /*top: 50%;*/
        /*margin-top: -32px;*/
        /*margin-left: -32px;*/
    }

    .dangers_test {
        display: none;
    }

    .font-18 {
        font-size: 18px;
    }

    span.upload_text {
        position: absolute;
        right: 0;
        top: 33%;
        opacity: 0.5;
    }

    ul.last_message li {
        margin: 10px 0;
        border-radius: 3px;
        border: 1px solid silver;
        padding: 15px;
    }

    .message_answer {
        margin-right: 30px;

    }

    .message_question {
        font-weight: bold;
        /*border-bottom: 1px solid silver;*/
        margin-bottom: 6px;
    }

    ul.last_message {
        list-style-type: none;
        padding: 10px;
        box-sizing: border-box;
    }


</style>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">پروفایل</h4>
                    <br>
                    <br>

                    <?php if (!empty($_SESSION["update_student"]) and $_SESSION["update_student"] == "success") {
                        ?>
                        <div class="alert alert-success alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×
                            </button>
                            <a class="alert-link"> اطلاعات با موفقیت ویرایش شد</a>
                        </div>
                    <?php }
                    if (isset($_SESSION["send_message"])) {
                        ?>
                        <div class="alert alert-<?= $_SESSION["send_message"][0] ?> alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×
                            </button>
                            <a class="alert-link"><?= $_SESSION["send_message"][1] ?></a>
                        </div>
                    <?php }
                    unset($_SESSION["update_student"]);
                    unset($_SESSION["send_message"]); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6 col-lg-push-3  ">
                    <div class="profile-detail card-box">
                        <div>
                            <?php if (empty(trim($user_info['picture']))) { ?>
                                <img src="<?= SITE_URL ?>public/admin/assets/images/small/img4.jpg"
                                     class="img-circle" alt="بامبو وب">
                            <?php } else { ?>
                                <img src="<?= SITE_URL ?>public/images/institute/users/<?= $user_info['id'] . '/' . $user_info['picture'] ?>"
                                     class="img-circle" alt="بامبو وب">
                            <?php } ?>
                            <ul class="list-inline status-list m-t-20">
                                <li>
                                    <h3 class="text-success m-b-5">
                                        <span><?= $user_info['credit'] ?></span><span>تومان</span></h3>
                                    <p class="text-muted">موجودی حساب</p>
                                </li>
                            </ul>
                            <hr>
                            <div class="text-left">
                                <p class="text-muted font-13"><strong>نام :</strong>
                                    <span class="m-l-15"><?= $user_info['name'] . ' ' . $user_info['family'] ?></span>
                                </p>
                                <p class="text-muted font-13"><strong>نام کاربری :</strong>
                                    <span class="m-l-15"><?= $user_info['username'] ?></span>
                                </p>
                                <p class="text-muted font-13"><strong>موبایل :</strong>
                                    <span class="m-l-15"><?= $user_info['mobile'] ?></span>
                                </p>
                                <p class="text-muted font-13"><strong>تلفن :</strong>
                                    <span class="m-l-15"><?= $user_info['phone'] ?></span>
                                </p>
                                <p class="text-muted font-13"><strong>کد ملی :</strong>
                                    <span class="m-l-15"><?= $user_info['code_meli'] ?></span>
                                </p>
                                <p class="text-muted font-13"><strong>مدرک تحصیلی :</strong>
                                    <span class="m-l-15"><?= $user_info['education'] ?></span>
                                </p>
                                <p class="text-muted font-13"><strong> تاریخ تولد :</strong>
                                    <span class="m-l-15"><?= $user_info['birthdate'] ?></span>
                                </p>
                                <p class="text-muted font-13"><strong>ایمیل :</strong>
                                    <span class="m-l-15"><?= $user_info['email'] ?></span>
                                </p>
                                <p class="text-muted font-13"><strong>آدرس :</strong>
                                    <span class="m-l-15"><?= $user_info['address'] ?></span>
                                </p>
                                <?php if (empty(trim($user_info['picture']))) { ?>
                                    <p class="text-muted font-13"><strong>تغییر تصویر پروفایل :</strong>
                                        <span class="text-danger">فقط یکبار قابل تغییر میباشد</span>
                                        <!--ajax upload image-->
                                    <div id="body-overlay">
                                        <img src="<?= SITE_URL ?>public\admin\images/loading.gif" width="44px"
                                             height="44px"/>
                                    </div>
                                    <div class="bgColor">
                                        <form id="uploadForm" action="<?= SITE_URL ?>admin_posts/ajax_upload_img"
                                              method="post">
                                            <div id="targetOuter">
                                                <div id="targetLayer"></div>
                                                <img src="<?= SITE_URL ?>public\admin\images/photo.png"
                                                     class="icon-choose-image"/>
                                                <span class="btn btn-info upload_text"> انتخاب عکس </span>
                                                <div class="icon-choose-image">
                                                    <input name="userImage" id="userImage" type="file" class="inputFile"
                                                           onChange="showPreview(this);"/>
                                                </div>
                                            </div>
                                            <div>
                                                <input type="submit" value="ارسال تصویر" class="btn btn-success"/>
                                            </div>
                                        </form>
                                    </div>
                                    </p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- container -->
    </div> <!-- content -->
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<script type="text/javascript">
    function showPreview(objFileInput) {
        if (objFileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (e) {
                $("#targetLayer").html('<img src="' + e.target.result + '" width="100px" height="100px!important" class="upload-preview" />');
                $("#targetLayer").css('opacity', '0.7');
                $(".icon-choose-image").css('opacity', '0.5');
            };
            fileReader.readAsDataURL(objFileInput.files[0]);
        }
    }

    $(document).ready(function (e) {
        $("#uploadForm").on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= SITE_URL ?>users/ajax_upload_profile_img",
                type: "POST",
                data: new FormData(this),
                beforeSend: function () {
                    $("#body-overlay").show();
                },
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data == true) {
                        window.location = '<?= SITE_URL ?>users/index';
                    } else {
                        swal("مشکل در بارگزاری تصویر", "", "warning")
                    }
//                    $("span.link").html(data);
//                    $("span.link").css('opacity', '1');
//                    $(".dangers_test").css('display', 'block');
//                    setInterval(function () {
//                        $("#body-overlay").hide();
//                    }, 500);
                },
                error: function () {
                    swal("مشکل در بارگزاری تصویر", "", "warning")
                }
            });
        }));
    });
</script>

