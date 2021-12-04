<?php

?>
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
                    <h4 class="m-t-0 header-title pull-left"><b> افزودن کلاس </b></h4>
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
            if (!empty($_SESSION["add_class"]) and $_SESSION["add_class"] == "success") {
                ?>
                <div class="alert alert-success alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                    </button>
                    <a class="alert-link"> کلاس جدید با موفقیت ذخیره شد</a>
                </div>
            <?php }
            if (!empty($_SESSION["add_class"]) and $_SESSION["add_class"] == "server") {
                ?>
                <div class="alert alert-danger alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                    </button>
                    <a class="alert-link">مشکل در ذخیره اطلاعات !</a>
                </div>
            <?php }
            if (!empty($_SESSION["add_class"]) and $_SESSION["add_class"] == "empty") {
                ?>
                <div class="alert alert-warning alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                    </button>
                    <a class="alert-link"> لطفا اطلاعات رو کامل پر کنید !</a>
                </div>
            <?php }
            unset($_SESSION["add_class"]);
            unset($_SESSION["add_student_user_id"]);
            if (isset($_SESSION["add_class_info"])) {
                $old_data = $_SESSION["add_class_info"];
                unset($_SESSION["add_class_info"]);
            }
            ?>

            <div class="table-responsive">
                <br>
                <br>
                <br>
                <div id="ticketmodal-content">
                    <form action="<?= SITE_URL ?>admin_class/add_new_class" method="post">
                        <div class="col-xs-12">

                            <div class="row">
                                <div class="col-xs-4">انتخاب زبان</div>
                                <div class="col-xs-8">
                                    <select id="ashnaei" name="lang_name" class="selectpicker form-control input-sm"
                                            title="زبان" tabindex="-98" onchange="get_lang_level(this)"
                                            data-original-title="انتخاب زبان" required
                                            data-toggle="tooltip" data-placement="top">
                                        <option value="">انتخاب کنید</option>
                                        <?php foreach ($data["langs"] as $lang) { ?>
                                            <option data-level="<?= $lang['lang_level'] ?>"
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
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">انتخاب ترم</div>
                                <div class="col-xs-8">
                                    <select id="ashnaei" name="term" class="selectpicker form-control input-sm"
                                            title="ترم" tabindex="-98" data-original-title=" ترم"
                                            data-toggle="tooltip" data-placement="top">
                                        <option value="">انتخاب کنید</option>
                                        <?php foreach ($data["terms"] as $lang) { ?>
                                            <option value="<?= $lang['id'] ?>"><?= $lang['term_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">انتخاب استاد</div>
                                <div class="col-xs-8">
                                    <select id="ashnaei" name="teacher" class="selectpicker form-control input-sm"
                                            title="استاد" tabindex="-98" required data-original-title="انتخاب استاد"
                                            data-toggle="tooltip" data-placement="top">
                                        <option value="">انتخاب کنید</option>
                                        <?php foreach ($data["teachers"] as $lang) { ?>
                                            <option value="<?= $lang['id'] ?>"><?= $lang['name'] . ' ' . $lang['family'] ?></option>
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
                                        <option value=""> انتخاب کنید</option>
                                        <option value="public"> عمومی</option>
                                        <option value="semiprivate"> نیمه خصوصی</option>
                                        <option value="private"> خصوصی</option>
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
                                <div class="col-xs-4"> روزهای کلاس</div>
                                <div class="col-xs-8">
                                    <hr>
                                    <div class="row m_b_0">
                                        <div class="col-xs-3">
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" id="sat" name="day[sat]">
                                                <label for="sat">شنبه</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="col-xs-3">
                                                <label for="sat_h" class="normal">ساعت</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <input type="text" id="sat_h" name="time[sat]"
                                                       class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row m_b_0">
                                        <div class="col-xs-3">
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" id="sun" name="day[sun]">
                                                <label for="sun">یک شنبه</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="col-xs-3   ">
                                                <label for="sun_h" class="normal">ساعت</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <input type="text" id="sun_h" name="time[sun]"
                                                       class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row m_b_0">
                                        <div class="col-xs-3">
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" id="mon" name="day[mon]">
                                                <label for="mon">دوشنبه</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="col-xs-3   ">
                                                <label for="mon_h" class="normal">ساعت</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <input type="text" id="mon_h" name="time[mon]"
                                                       class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row m_b_0">
                                        <div class="col-xs-3">
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" id="tue" name="day[tue]">
                                                <label for="tue">سه شنبه</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="col-xs-3   ">
                                                <label for="tue_h" class="normal">ساعت</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <input type="text" id="tue_h" name="time[tue]"
                                                       class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row m_b_0">
                                        <div class="col-xs-3">
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" id="wed" name="day[wed]">
                                                <label for="wed">چهارشنبه</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="col-xs-3   ">
                                                <label for="wed_h" class="normal">ساعت</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <input type="text" id="wed_h" name="time[wed]"
                                                       class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row m_b_0">
                                        <div class="col-xs-3">
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" id="thu" name="day[thu]">
                                                <label for="thu">پنج شنبه</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="col-xs-3   ">
                                                <label for="thu_h" class="normal">ساعت</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <input type="text" id="thu_h" name="time[thu]"
                                                       class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row m_b_0">
                                        <div class="col-xs-3">
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" id="fri" name="day[fri]">
                                                <label for="fri"> جمعه</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="col-xs-3   ">
                                                <label for="fri_h" class="normal">ساعت</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <input type="text" id="fri_h" name="time[fri]"
                                                       class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

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

    function get_lang_level(item) {
        var lang_levels = $(item).find('option:selected').attr('data-level');
        lang_levels = lang_levels.split(',');
        $('select[name=lang_level]').html(' ');
        for (var i = 0; i < lang_levels.length; i++) {
            var row = ' <option value="' + lang_levels[i] + '">' + lang_levels[i] + '</option>';
            $('select[name=lang_level]').append(row);
        }
    }

</script>
