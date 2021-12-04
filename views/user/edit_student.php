
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
                    <h4 class="page-title">ویرایش پروفایل</h4>
                    <br>
                    <br>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-9 col-md-8">
                    <div class="card-box">
                        <?php
                        if (!empty( $_SESSION["user_info"])  ) {
                            ?>
                            <div class="alert alert-danger alert-dismissable text-center">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    ×
                                </button>
                                <a class="alert-link"><?=  $_SESSION["user_info"] ?></a>
                            </div>
                        <?php }
                        if (!empty($_SESSION["pay_error"])  ) {
                            ?>
                            <div class="alert alert-danger alert-dismissable text-center">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    ×
                                </button>
                                <a class="alert-link"><?= $_SESSION["pay_error"] ?></a>
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
                        if (!empty($_SESSION["update_student"]) and $_SESSION["update_student"] == "is_user_name") {
                            ?>
                            <div class="alert alert-warning alert-dismissable text-center">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    ×
                                </button>
                                <a class="alert-link"> این نام کاربری قبلا استفاده شده !</a>
                            </div>
                        <?php }

                        unset($_SESSION["update_student"]);
                        unset( $_SESSION["user_info"]);
                        unset($_SESSION["pay_error"]);
                        if (isset($_SESSION["update_student_info"])) {
                            $old_data = $_SESSION["update_student_info"];
                            unset($_SESSION["update_student_info"]);
                        } else {
                            $old_data = $user_info;
                        }
                        ?>

                        <div class="table-responsive">
                            <br>
                            <br>
                            <br>
                            <div id="ticketmodal-content">
                                <form action="<?= SITE_URL ?>users/update_user_info" method="post">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                نام کاربری
                                            </div>
                                            <div class="col-xs-8">
                                                <input required data-toggle="tooltip" data-placement="top" title=""
                                                       data-original-title="نام کاربری"
                                                       type="text" id="username" class="form-control"
                                                       value="<?= @$old_data["username"] ?>" disabled >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                تلفن همراه
                                            </div>
                                            <div class="col-xs-8">
                                                <input required data-toggle="tooltip" data-placement="top"
                                                       type="tel" class="form-control" data-original-title="تلفن همراه"
                                                       value="<?= @$old_data["mobile"] ?>" disabled="disabled">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-4">
                                                ایمیل
                                            </div>
                                            <div class="col-xs-8">
                                                <input required data-toggle="tooltip" data-placement="top" title=""
                                                       type="email"
                                                       id="email"
                                                       name="email" class="form-control"
                                                       value="<?= @$old_data["email"] ?>"
                                                       data-original-title="ایمیل">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                نام
                                            </div>
                                            <div class="col-xs-8">
                                                <input required data-toggle="tooltip" data-placement="top" title=""
                                                       type="text"
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
                                                <input required data-toggle="tooltip" data-placement="top" title=""
                                                       type="text"
                                                       id="lastname" data-original-title="نام خانوادگی"
                                                       name="family" class="form-control"
                                                       value="<?= @$old_data["family"] ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                تاریخ تولد
                                            </div>
                                            <div class="col-xs-8">
                                                <input required data-toggle="tooltip" data-placement="top" title=""
                                                       type="text"
                                                       id="birthdateshow" name="birthdate"
                                                       class="form-control time usage"
                                                       data-original-title="تاریخ تولد"
                                                       value="<?= @$old_data["birthdate"] ?>">
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
                                                <input required data-toggle="tooltip" data-placement="top" title=""
                                                       id="nationalcode" name="code_meli" class="form-control"
                                                       value="<?= @$old_data["code_meli"] ?>"    type="text"
                                                       data-original-title="کد ملی"
                                                       onkeyup=" $(this).val($(this).val().replace(/\D/g, ''));">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                استان
                                            </div>
                                            <div class="col-xs-8">
                                                <input required data-toggle="tooltip" data-placement="top" title=""
                                                       type="text"
                                                       id="ostan" value="<?= @$old_data["state"] ?>"
                                                       name="state" class="form-control" data-original-title="استان">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                شهر
                                            </div>
                                            <div class="col-xs-8">
                                                <input required data-toggle="tooltip" data-placement="top" title=""
                                                       type="text"
                                                       id="city" value="<?= @$old_data["city"] ?>"
                                                       name="city" class="form-control" data-original-title="شهر">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                آدرس
                                            </div>
                                            <div class="col-xs-8">
                                                <input required data-toggle="tooltip" data-placement="top" title=""
                                                       type="text"
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
                                                <input required data-toggle="tooltip" data-placement="top" title=""
                                                       id="postalcode" name="postal_code" class="form-control"
                                                       value="<?= @$old_data["postal_code"] ?>" type="text"
                                                       data-original-title="کد پستی"
                                                       onkeyup=" $(this).val($(this).val().replace(/\D/g, ''));">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                تلفن منزل
                                            </div>
                                            <div class="col-xs-8">
                                                <input required data-toggle="tooltip" data-placement="top" title=""
                                                       type="text"
                                                       id="home_phone" name="phone" class="form-control"
                                                       value="<?= @$old_data["phone"] ?>"
                                                       data-original-title="تلفن منزل"
                                                       onkeyup=" $(this).val($(this).val().replace(/\D/g, ''));">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                تلفن همراه اضطراری
                                            </div>
                                            <div class="col-xs-8">
                                                <input required data-toggle="tooltip" data-placement="top" title=""
                                                       type="text"
                                                       id="emergency_phone" name="emergency_phone" class="form-control"
                                                       value="<?= @$old_data["emergency_phone"] ?>"
                                                       data-original-title="تلفن همراه اضطراری"
                                                       onkeyup=" $(this).val($(this).val().replace(/\D/g, ''));">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                سطح تحصیلات
                                            </div>
                                            <div class="col-xs-8">
                                                <select name="education" id="education"
                                                        class="form-control selectpicker"
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
                                                <input required data-toggle="tooltip" data-placement="top" type="text"
                                                       id="study_field" name="study_field" class="form-control"
                                                       value="<?= @$old_data["study_field"] ?>"
                                                       data-original-title="رشته تحصیلی">
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
                                                        <?= @$old_data["ashnaei"] ?>
                                                    </option>
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
                                            <button type="submit" class="btn btn-success">ثبت تغییرات</button>
                                            <a href="<?= SITE_URL ?>admin_student">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    انصراف
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div> <!-- end col -->

            </div>
        </div> <!-- container -->
    </div> <!-- content -->
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
