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

    label.normal {
        font-weight: normal !important;
        line-height: 40px !important;
        cursor: pointer;
    }

    hr {
        border-top: 1px solid rgba(0, 0, 0, 0.21) !important;
        margin: 5px 0 !important;
    }

    .m_b_0 {
        margin-bottom: 0 !important;
    }

</style>

<!-- Forms -->
<div style="margin-top: 50px"></div>
<div class="row">
    <div class="col-sm-8 col-xs-8 col-sm-push-3 col-xs-push-3">
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-t-0 header-title pull-left"><b> ویرایش کلاس </b></h4>
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
            if (!empty($_SESSION["update_class"]) and $_SESSION["update_class"] == "server") {
                ?>
                <div class="alert alert-danger alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                    </button>
                    <a class="alert-link">مشکل در ذخیره اطلاعات !</a>
                </div>
            <?php }
            if (!empty($_SESSION["update_class"]) and $_SESSION["update_class"] == "empty") {
                ?>
                <div class="alert alert-warning alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                    </button>
                    <a class="alert-link"> لطفا اطلاعات رو کامل پر کنید !</a>
                </div>
            <?php }
            if (!empty($_SESSION["update_class"]) and $_SESSION["update_class"] == "re_password") {
                ?>
                <div class="alert alert-warning alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                    </button>
                    <a class="alert-link"> رمز عبور و تکرار رمز عبور یکسان نیستند !</a>
                </div>
            <?php }
            if (!empty($_SESSION["update_class"]) and $_SESSION["update_class"] == "is_user_name") {
                ?>
                <div class="alert alert-warning alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                    </button>
                    <a class="alert-link"> این نام کاربری قبلا استفاده شده !</a>
                </div>
            <?php }
            $class_id = $data["class_id"];
            unset($_SESSION["update_class"]);
            if (isset($_SESSION["update_class_info"])) {
                $old_data = $_SESSION["update_class_info"];
                unset($_SESSION["update_class_info"]);
            } else {
                $old_data = $data["class_info"];
            }
            ?>

            <div class="table-responsive">
                <br>
                <br>
                <br>
                <div id="ticketmodal-content">
                    <form action="<?= SITE_URL ?>admin_class/update_class/<?= $class_id ?>" method="post">
                        <div class="col-xs-12">

                            <div class="row">
                                <div class="col-xs-4">انتخاب زبان</div>
                                <div class="col-xs-8">
                                    <select id="ashn" name="lang_id" class="selectpicker form-control alng input-sm"
                                            title="زبان" tabindex="-98" onchange="get_lang_level(this)"
                                            data-original-title="انتخاب زبان" required onclick=""
                                            data-toggle="tooltip" data-placement="top">
                                        <option value="">انتخاب کنید</option>
                                        <?php foreach ($data["langs"] as $lang) {
                                            $select0 = '';
                                            if ($old_data['lang_id'] == $lang['id']) {
                                                $select0 = 'selected';
                                            } ?>
                                            <option <?= $select0 ?> data-level="<?= $lang['lang_level'] ?>"
                                                                   value="<?= $lang['id'] ?>"><?= $lang['lang_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4"> سطح</div>
                                <div class="col-xs-8">
                                    <select id="ashnaei" name="lang_level" class="selectpicker form-control input-sm"
                                            title="سطح" tabindex="-98" required data-original-title="سطح"
                                            data-toggle="tooltip" data-placement="top">
                                        <option value="<?= $old_data['lang_level'] ?>"><?= $old_data['lang_level'] ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">انتخاب ترم</div>
                                <div class="col-xs-8">
                                    <select id="ashnaei" name="term_id" class="selectpicker form-control input-sm"
                                            title="ترم" tabindex="-98" data-original-title=" ترم"
                                            data-toggle="tooltip" data-placement="top">
                                        <option value="">انتخاب کنید</option>
                                        <?php foreach ($data["terms"] as $terms) {
                                            $select_t = '';
                                            if ($old_data['term_id'] == $terms['id']) {
                                                $select_t = 'selected';
                                            } ?>
                                            <option <?= $select_t ?>
                                                    value="<?= $terms['id'] ?>"><?= $terms['term_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">انتخاب استاد</div>
                                <div class="col-xs-8">
                                    <select id="ashnaei" name="teacher_id" class="selectpicker form-control input-sm"
                                            title="استاد" tabindex="-98" required data-original-title="انتخاب استاد"
                                            data-toggle="tooltip" data-placement="top">
                                        <option value="">انتخاب کنید</option>
                                        <?php foreach ($data["teachers"] as $teacher) {
                                            $select_te = '';
                                            if ($old_data['teacher_id'] == $teacher['id']) {
                                                $select_te = 'selected';
                                            } ?>
                                            <option <?= $select_te ?>
                                                    value="<?= $teacher['id'] ?>"><?= $teacher['name'] . ' ' . $teacher['family'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4"> نوع کلاس</div>
                                <div class="col-xs-8">
                                    <select class="selectpicker form-control input-sm" id="type" name="class_type"
                                            title="نوع کلاس" tabindex="-98" required data-original-title="نوع کلاس"
                                            data-toggle="tooltip" data-placement="top">
                                        <?php
                                        print_r($old_data['class_type']);
                                        $select1 = '';
                                        $select2 = '';
                                        $select3 = '';
                                        if ($old_data['class_type'] == 'public') {
                                            $select1 = 'selected';
                                        } else if ($old_data['class_type'] == 'semiprivate') {
                                            $select2 = 'selected';
                                        } else if ($old_data['class_type'] == 'private') {
                                            $select3 = 'selected';
                                        } ?>
                                        <option value=""> انتخاب کنید</option>
                                        <option <?= $select1 ?> value="public"> عمومی</option>
                                        <option <?= $select2 ?> value="semiprivate"> نیمه خصوصی</option>
                                        <option <?= $select3 ?> value="private"> خصوصی</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">شهریه</div>
                                <div class="col-xs-8">
                                    <input required data-toggle="tooltip" data-placement="top" type="text"
                                           id="firstname" name="tuition" class="form-control input-sm"
                                           value="<?= @$old_data['tuition'] ?>" data-original-title="شهریه">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">ظرفیت کلاس</div>
                                <div class="col-xs-8">
                                    <input required data-toggle="tooltip" data-placement="top" type="text"
                                           id="firstname3" name="capacity" class="form-control input-sm"
                                           value="<?= @$old_data['capacity'] ?>" data-original-title="ظرفیت کلاس">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">تعداد جلسات کلاس</div>
                                <div class="col-xs-8">
                                    <input required data-toggle="tooltip" data-placement="top" type="text"
                                           id="firstname1" name="session_count" class="form-control input-sm"
                                           value="<?= @$old_data['session_count'] ?>" data-original-title="تعداد جلسات"
                                           title="تعداد جلسات">
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-success">ثبت تغییرات</button>
                                <a href="<?= SITE_URL ?>admin_class">
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

    get_lang_level($('select#ashn'), 'load');

    function get_lang_level(item, load) {
        var lang_levels = $(item).find('option:selected').attr('data-level');
        lang_levels = lang_levels.split(',');
        if (load != 'load') {
            $('select[name=lang_level]').html(' ');
        }
        for (var i = 0; i < lang_levels.length; i++) {
            var row = ' <option value="' + lang_levels[i] + '">' + lang_levels[i] + '</option>';
            $('select[name=lang_level]').append(row);
        }
    }
</script>
