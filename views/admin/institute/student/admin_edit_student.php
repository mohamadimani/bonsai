<?php

?>
<link rel="stylesheet" href="<?= SITE_URL ?>public\admin\assets\plugins\datepicker/css/persianDatepicker-default.css"/>
<script src="<?= SITE_URL ?>public\admin\assets\plugins\datepicker/js/persianDatepicker.js"></script>
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
</style>

<!-- Forms -->
<div style="margin-top: 50px"></div>
<div class="row">
    <div class="col-sm-8 col-xs-8 col-sm-push-3 col-xs-push-3">
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-t-0 header-title pull-left"><b> ویرایش اعضاء </b></h4>
                    <span class=" text-muted m-b-30 font-13 pull-right">
                        <span class="datetime"> 00:00:00 </span>
                    </span>
                    <script>
                        setInterval(function () {
                            var time1 = new Date();
                            var h = time1.getHours();
                            var m = time1.getMinutes();
                            var s = time1.getSeconds();
                            if (h < 10) {
                                h = "0" + h
                            }
                            if (m < 10) {
                                m = "0" + m
                            }
                            if (s < 10) {
                                s = "0" + s
                            }
                            var tim = h + ':' + m + ':' + s;
                            $('span.datetime').text(tim)
                        }, 1000);
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-8 col-sm-push-3 col-xs-8 col-xs-push-3 ">
        <div class="card-box">
            <?php
            if (!empty($_SESSION["update_student"]) and $_SESSION["update_student"] == "success") {
                ?>
                <div class="alert alert-success alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                    </button>
                    <a class="alert-link"> اطلاعات با موفقیت ویرایش شد</a>
                </div>
            <?php }
            if (!empty($_SESSION["update_student"]) and $_SESSION["update_student"] == "server") {
                ?>
                <div class="alert alert-danger alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                    </button>
                    <a class="alert-link">مشکل در ذخیره اطلاعات !</a>
                </div>
            <?php }
            if (!empty($_SESSION["update_student"]) and $_SESSION["update_student"] == "empty") {
                ?>
                <div class="alert alert-warning alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                    </button>
                    <a class="alert-link"> لطفا اطلاعات رو کامل پر کنید !</a>
                </div>
            <?php }
            if (!empty($_SESSION["update_student"]) and $_SESSION["update_student"] == "re_password") {
                ?>
                <div class="alert alert-warning alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                    </button>
                    <a class="alert-link"> رمز عبور و تکرار رمز عبور یکسان نیستند !</a>
                </div>
            <?php }
            if (!empty($_SESSION["update_student"]) and $_SESSION["update_student"] == "is_user_name") {
                ?>
                <div class="alert alert-warning alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                    </button>
                    <a class="alert-link"> این نام کاربری قبلا استفاده شده !</a>
                </div>
            <?php }
            $user_id = $data["user_id"];
            unset($_SESSION["update_student"]);
            if (isset($_SESSION["update_student_info"])) {
                $old_data = $_SESSION["update_student_info"];
                unset($_SESSION["update_student_info"]);
            } else {
                $old_data = $data["user_info"];
            }
            ?>

            <div class="table-responsive">
                <br>
                <br>
                <br>
                <div id="ticketmodal-content">
                    <form action="<?= SITE_URL ?>admin_student/update_user/<?= $user_id ?>" method="post">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-4">
                                    نام کاربری
                                </div>
                                <div class="col-xs-8">
                                    <input required data-toggle="tooltip" data-placement="top" title="" type="text"
                                           id="username"
                                           name="user_name" class="form-control" value="<?= @$old_data["username"] ?>"
                                           data-original-title="نام کاربری">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    ایمیل
                                </div>
                                <div class="col-xs-8">
                                    <input required data-toggle="tooltip" data-placement="top" title="" type="email"
                                           id="email"
                                           name="email" class="form-control" value="<?= @$old_data["email"] ?>"
                                           data-original-title="ایمیل">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    نوع کاربری
                                </div>
                                <div class="col-xs-8">

                                    <select class="selectpicker form-control" id="type" name="user_type"
                                            title="نوع کاربری" tabindex="-98">
                                        <option value="<?= @$old_data["user_type"] ?>">
                                            <?php if (@$old_data["user_type"] == 'student') { ?>
                                                دانشجو<?php } else { ?>    استاد<?php } ?>
                                        </option>
                                        <option value="student"> دانشجو</option>
                                        <option value="teacher"> استاد</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    نحوه آشنایی با ما
                                </div>
                                <div class="col-xs-8">
                                    <select id="ashnaei" name="ashnaei" class="selectpicker form-control"
                                            title="نحوه آشنایی با ما" tabindex="-98">

                                        <option value="<?= @$old_data["ashnaei"] ?>">
                                            <?= @$old_data["ashnaei"] ?></option>
                                        <option value="جستجو در موتورهای جستجو">
                                            جستجو در موتورهای جستجو
                                        </option>
                                        <option value="دوستان و آشنایان">
                                            دوستان و آشنایان
                                        </option>
                                        <option value="تبلیغات در سطح شهر">
                                            تبلیغات در سطح شهر
                                        </option>
                                        <option value="تبلیغات پیامکی">
                                            تبلیغات پیامکی
                                        </option>
                                        <option value="مجله، روزنامه، تراکت">
                                            مجله، روزنامه، تراکت
                                        </option>
                                        <option value="سایر موارد">
                                            سایر موارد
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    نام
                                </div>
                                <div class="col-xs-8">
                                    <input required data-toggle="tooltip" data-placement="top" title="" type="text"
                                           id="firstname" name="name" class="form-control"
                                           value="<?= @$old_data["name"] ?>"
                                           data-original-title="نام">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    نام خانوادگی
                                </div>
                                <div class="col-xs-8">
                                    <input required data-toggle="tooltip" data-placement="top" title="" type="text"
                                           id="lastname" data-original-title="نام خانوادگی"
                                           name="family" class="form-control" value="<?= @$old_data["family"] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    تاریخ تولد
                                </div>
                                <div class="col-xs-8">
                                    <input required data-toggle="tooltip" data-placement="top" title="" type="text"
                                           id="birthdateshow" name="birthdate" class="form-control time usage"
                                           data-original-title="تاریخ تولد" value="<?= @$old_data["birthdate"] ?>">
                                    <script>
                                        $(".usage").persianDatepicker();
                                    </script>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    کد ملی
                                </div>
                                <div class="col-xs-8">
                                    <input required data-toggle="tooltip" data-placement="top" title="" type="text"
                                           id="nationalcode" name="code_meli" class="form-control"
                                           value="<?= @$old_data["code_meli"] ?>"
                                           data-original-title="کد ملی">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    استان
                                </div>
                                <div class="col-xs-8">
                                    <input required data-toggle="tooltip" data-placement="top" title="" type="text"
                                           id="ostan" value="<?= @$old_data["state"] ?>"
                                           name="state" class="form-control" data-original-title="استان">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    شهر
                                </div>
                                <div class="col-xs-8">
                                    <input required data-toggle="tooltip" data-placement="top" title="" type="text"
                                           id="city" value="<?= @$old_data["city"] ?>"
                                           name="city" class="form-control" data-original-title="شهر">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    آدرس
                                </div>
                                <div class="col-xs-8">
                                    <input required data-toggle="tooltip" data-placement="top" title="" type="text"
                                           id="address" value="<?= @$old_data["address"] ?>"
                                           name="address" class="form-control"
                                           data-original-title="آدرس">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    کد پستی
                                </div>
                                <div class="col-xs-8">
                                    <input required data-toggle="tooltip" data-placement="top" title="" type="text"
                                           id="postalcode" name="postal_code" class="form-control"
                                           value="<?= @$old_data["postal_code"] ?>" data-original-title="کد پستی">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    تلفن منزل
                                </div>
                                <div class="col-xs-8">
                                    <input required data-toggle="tooltip" data-placement="top" title="" type="text"
                                           id="home_phone" name="phone" class="form-control"
                                           value="<?= @$old_data["phone"] ?>" data-original-title="تلفن منزل">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    تلفن همراه
                                </div>
                                <div class="col-xs-8">
                                    <input required data-toggle="tooltip" data-placement="top" title="" type="text"
                                           id="cell_phone" name="mobile" class="form-control"
                                           value="<?= @$old_data["mobile"] ?>" data-original-title="تلفن همراه">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    تلفن همراه اضطراری
                                </div>
                                <div class="col-xs-8">
                                    <input required data-toggle="tooltip" data-placement="top" title="" type="text"
                                           id="emergency_phone" name="emergency_phone" class="form-control"
                                           value="<?= @$old_data["emergency_phone"] ?>"
                                           data-original-title="تلفن همراه اضطراری">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    سطح تحصیلات
                                </div>
                                <div class="col-xs-8">
                                    <select name="education" id="education" class="form-control selectpicker"
                                            title="سطح تحصیلات">
                                        <option value="<?= @$old_data["education"] ?>">
                                            <?= @$old_data["education"] ?></option>
                                        <option value="زیر دیپلم">
                                            زیر دیپلم
                                        </option>
                                        <option value="دیپلم">
                                            دیپلم
                                        </option>
                                        <option value="فوق دیپلم">
                                            فوق دیپلم
                                        </option>
                                        <option value="لیسانس">
                                            لیسانس
                                        </option>
                                        <option value="فوق لیسانس">
                                            فوق لیسانس
                                        </option>
                                        <option value="دکترا">
                                            دکترا
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    رشته تحصیلی
                                </div>
                                <div class="col-xs-8">
                                    <input required data-toggle="tooltip" data-placement="top" title="" type="text"
                                           id="study_field" name="study_field" class="form-control"
                                           value="<?= @$old_data["study_field"] ?>"
                                           data-original-title="رشته تحصیلی">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-xs-4"> کلمه عبور <br>( خالی بودن فیلد = عدم تغییر رمز قبلی )</div>
                                <div class="col-xs-8">
                                    <input data-toggle="tooltip" data-placement="top" title="" type="password"
                                           id="password" name="password" class="form-control" value=""
                                           data-original-title="کلمه عبور">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4"> تکرار کلمه عبور <br>( خالی بودن فیلد = عدم تغییر رمز قبلی )</div>
                                <div class="col-xs-8">
                                    <input data-toggle="tooltip" data-placement="top" title="" type="password"
                                           id="password" name="re_password" class="form-control" value=""
                                           data-original-title="تکرار کلمه عبور">
                                </div>
                            </div>

                            <div class="row">
                                <button type="submit" class="btn btn-success">ثبت تغییرات</button>
                                <a href="<?= SITE_URL ?>admin_student">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div> <!-- end col -->
</div>


<div style="margin: 50px 0"></div>
<script>


</script>
