<?php

?>

<style>
    .search_icon {
        position: absolute;
        top: 12px;
        right: 20px;
    }

    tbody tr:hover {
        color: #000000 !important;
        text-shadow: 2px 2px 4px #5f5f5f;
    }

    /*tr:active {*/
    /*color: #000;*/
    /*}*/

    .story_owner_name {
        color: #00c000;
    }

    .story_owner_balance {
        color: #00c000;
    }

    .full_black_cover {
        width: 100%;
        height: 100%;
        float: right;
        background-color: black;
        opacity: 0.5;
        position: fixed;
        top: 0;
        right: 0;
        display: none;
        z-index: 9999;
    }

    .new_item {
        position: absolute;
        top: 9px;
        right: 0;
        float: right;
        color: red;
        font-weight: bold;
        transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        font-size: 14px;

    }

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

    .operation .fa-book {
        color: #1b30ab;
    }

    .operation .glyphicon-list {
        color: #42a7ec;
    }

    .operation .fa-dollar {
        color: #0086ff;
    }

    .operation .fa-line-chart {
        color: #00ff11;
    }

    .operation .fa-money {
        color: #ffb700;
    }

    .operation .glyphicon-comment {
        color: #ab7f40;
    }

    .operation .fa-diamond {
        color: #00ff5f;
    }

    .operation .glyphicon-gift {
        color: #9e61ff;
    }

    .con-close-modal {
        position: fixed;
        top: 15%;
        right: 33%;
        z-index: 9999999;
    }

    span.capacity {
        background-color: #86d410;
        display: inline-block;
        color: black;
        float: right;
        max-width: 100% !important;
        right: 0;
        height: 100%;
    }

    div.capacity {
        width: 100%;
        border-radius: 4px;
        border: 1px solid silver;
        float: right;
        text-align: center;
        position: relative;
        overflow: hidden;
        height: 20px;
    }

    label.normal {
        font-weight: normal !important;
        line-height: 40px !important;
        cursor: pointer;
    }

    hr {
        border-top: 1px solid rgba(0, 0, 0, 0.21) !important;
        margin: 0 0 5px 0 !important;
    }

    .m_b_0 {
        margin-bottom: 0 !important;
    }

    input.input-sm {
        margin-top: 5px !important;
    }

    span.capacity {
        /*position: absolute;*/
    }
    .search_row{
        border:1px solid silver;
        border-radius: 4px;
    }
</style>
<!-- Forms -->
<div style="margin-top: 50px"></div>
<div class="row">
    <div class="col-sm-8 col-xs-8 col-sm-push-3 col-xs-push-3">
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-t-0 header-title pull-left"><b> مدیریت کلاس ها </b></h4>

                    <div class="col-sm-3" style="margin: 0 20px;">
                        <a href="<?= SITE_URL ?>admin_class/add_class"
                           class="btn btn-default btn-md waves-effect waves-light m-b-30">
                            <i class="md md-add"></i>افزودن کلاس جدید</a>
                    </div>

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
            if (!empty($_SESSION["save_class_day"]) and $_SESSION["save_class_day"] == "success") {
                ?>
                <div class="alert alert-success alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <a class="alert-link"> با موفقیت ذخیره شد</a>
                </div>
            <?php }
            if (!empty($_SESSION["save_class_day"]) and $_SESSION["save_class_day"] == "danger") {
                ?>
                <div class="alert alert-danger alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <a class="alert-link">مشکل در ثبت ! </a>
                </div>
            <?php }
            if (!empty($_SESSION["add_class"]) and $_SESSION["add_class"] == "success") {
                ?>
                <div class="alert alert-success alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <a class="alert-link"> با موفقیت ذخیره شد</a>
                </div>
            <?php }
            if (!empty($_SESSION["update_class"]) and $_SESSION["update_class"] == "success") {
                ?>
                <div class="alert alert-success alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <a class="alert-link"> اطلاعات با موفقیت بروزرسانی شد</a>
                </div>
            <?php }
            unset($_SESSION['save_class_day']);
            unset($_SESSION["add_class"]);
            unset($_SESSION["update_class"]); ?>

            <div class="table-responsive">
                <div class="col-sm-12  search_row">
                    <!-- ************* search  ************** -->
                    <!--search by lang-->
                    <div class="col-sm-3 search_parent" style="position: relative;">
                        <span style="font-weight: bold;line-height: 40px">جست و جو بر اساس : </span>
                    </div>
                    <div class="col-sm-2 search_parent" style="position: relative;">
                        <select name="search_by_lang" id="search1" class="selectpicker form-control search"
                                onchange="search_class(this,'lang')" data-original-title="انتخاب زبان"
                                data-toggle="tooltip" data-placement="top" tabindex="-98" title="انتخاب زبان">
                            <option style="font-weight: bold;background-color: #cfceca">براساس زبان</option>
                            <option style="font-weight: bold;"  value="all">نمایش همه</option>
                            <?php foreach ($data['langs'] as $lang) { ?>
                                <option value="<?= $lang['id'] ?>"><?= $lang['lang_name'] ?>  </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-1 search_parent" style="position: relative;">
                        <span style="line-height: 40px;font-weight: bold;">یا</span>
                    </div>
                    <!--search by type-->
                    <div class="col-sm-2 search_parent" style="position: relative;">
                        <select name="search_by_type" id="search2" class="form-control search"
                                onchange="search_class(this,'type')">
                            <option style="font-weight: bold;background-color: #cfceca">براساس نوع</option>
                            <option style="font-weight: bold;"  value="all">نمایش همه</option>
                            <option value="public">عمومی</option>
                            <option value="semiprivate">نیمه خصوصی</option>
                            <option value="private">خصوصی</option>
                        </select>
                    </div>
                    <div class="col-sm-1 search_parent" style="position: relative;">
                        <span style="line-height: 40px;font-weight: bold;">یا</span>
                    </div>
                    <!--search by type-->
                    <div class="col-sm-2 search_parent" style="position: relative;">
                        <select name="search_by_type" id="search2" class="form-control search"
                                onchange="search_class(this,'term')">
                            <option style="font-weight: bold;background-color: #cfceca">براساس ترم</option>
                            <option style="font-weight: bold;" value="all">نمایش همه</option>
                            <?php foreach ($data['terms'] as $term) { ?>
                                <option value="<?= $term['id'] ?>"><?= $term['term_name'] ?>  </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <table class="table table-hover mails m-0 table table-actions-bar">
                    <thead>

                    <tr>
                        <th>نام کلاس</th>
                        <th>وضعیت</th>
                        <th>سطح</th>
                        <th> مدرس</th>
                        <th> نوع کلاس</th>
                        <th> شهریه</th>
                        <th> ظرفیت</th>
                        <th>عملیات</th>
                        <th> بیشتر</th>
                        <th>ویرایش</th>
                    </tr>
                    </thead>
                    <tbody class="users_row">

                    <?php
                    foreach ($data['class_list'] as $class) {
                        if ($class['class_type'] == 'public') {
                            $class['class_type'] = 'عمومی';
                        } else if ($class['class_type'] == 'private') {
                            $class['class_type'] = 'خصوصی';
                        } else if ($class['class_type'] = 'semiprivate') {
                            $class['class_type'] = 'نیمه خصوصی';
                        }
                        ?>
                        <tr class="active">
                        <?php
                        if (isset($_SESSION["add_class_user_id"]) and $_SESSION["add_class_user_id"] == $class["id"]) {
                            ?>
                            <td class="c_o_name"><p class="new_item">new</p><?= $class['lang_name'] ?></td>
                        <?php } else if (isset($_SESSION["updated_class_id"]) and $_SESSION["updated_class_id"] == $class["id"]) {
                            ?>
                            <td><p class="new_item">edited</p><?= $class['lang_name'] ?></td>
                        <?php } else { ?>
                            <tr class="active" style="">
                            <td><?= $class['lang_name'] ?></td>
                        <?php } ?>

                        <td class="act_title"><?php if ($class['status'] == 'ACTIVE') {
                                echo '<span style="color: #00c300"> فعال</span>';
                            } elseif ($class['status'] == 'INACTIVE') {
                                echo '<span style="color: #ff0e0e">غیر فعال</span>';
                            } ?></td>
                        <td><?= $class['lang_level'] ?></td>
                        <td><?= $class['name'] . ' ' . $class['family'] ?></td>
                        <td><?= $class['class_type'] ?></td>
                        <td><?= $class['tuition'] ?></td>
                        <td>
                            <div class="capacity">
                            <span class="capacity"
                                  style="width: <?= (($class['registered'] * 100) / $class['capacity']) ?>%;">
                                <?= $class['capacity'] . '/' . $class['registered'] ?></span>
                            </div>
                        </td>
                        <td>
                            <a style="cursor: pointer" onclick="active_user(<?= $class['id'] ?>,'inactive',this)"
                               title="غیر فعال کردن"
                               class="table-action-btn  <?php if ($class['status'] == 'INACTIVE') {
                                   echo 'hidden';
                               } ?>">
                                <i class="btn btn-warning btn-xs   md md-close"></i></a>
                            <a style="cursor: pointer" onclick="active_user(<?= $class['id'] ?>,'active',this)"
                               title=" فعال کردن"
                               class="table-action-btn <?php if ($class['status'] == 'ACTIVE') {
                                   echo 'hidden';
                               } ?>">
                                <i class="btn btn-success btn-xs md md-check "></i></a>
                            <!-- ==========  access   ====== -->
                        </td>
                        <td class="operation">

                            <!--                            <i data-toggle="tooltip" data-placement="top" class="fa fa-dollar"-->
                            <!--                               onclick="get_credit_story(-->
                            <? //= $class['id'] ?><!--,'amount')"-->
                            <!--                               data-original-title="گزارش مالی"></i>-->
                            <!---->
                            <!--                            <i data-toggle="tooltip" data-placement="top" title="" class="fa fa-money "-->
                            <!--                               data-target=".con-close-modal" onclick="show_modal('sharge',-->
                            <? //= $class['id'] ?><!--)"-->
                            <!--                               data-original-title="افزودن شارژ">-->
                            <!--                            </i>-->

                            <!-- *************************** -->

                            <!--                            <i data-toggle="tooltip" data-placement="top" title=""-->
                            <!--                               onclick="marksreport(-->
                            <? //= $class['id'] ?><!--)" class="fa fa-line-chart"-->
                            <!--                               data-original-title="گزارش نمرات"></i>-->

                            <i data-toggle="tooltip" data-placement="top" title="" class="fa fa-book"
                               data-original-title="برنامه کلاسی"
                               onclick="show_modal('class_days',<?= $class['id'] ?>);get_class_time(this,<?= $class['id'] ?>)"></i>

                            <!--                                <i data-toggle="tooltip" data-placement="top" title=""-->
                            <!--                                   onclick="makediscount( )"-->
                            <!--                                   class="glyphicon glyphicon-gift"-->
                            <!--                                   data-original-title="اعمال تخفیف"></i>-->
                        </td>

                        <td>
                            <a href="<?= SITE_URL ?>admin_class/edit_class/<?= $class['id'] ?>"
                               title="  ویرایش" class="table-action-btn  ">
                                <i class="btn btn-info   btn-xs fa md md-edit"></i></a>
                        </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div> <!-- end col -->
</div>

<!--   add amount   -->
<div class="sharge  con-close-modal" data-userid="" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="hide_modal('.con-close-modal')">
                    ×
                </button>
                <h4 class="modal-title"> افزودن شارژ حساب </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">مقدار شارژ (تومان)</label>
                            <input required type="number" class="form-control" id="amount" placeholder="0"
                                   name="amount">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label"> توضیحات</label>
                            <input required type="text" class="form-control" id="note" placeholder="..." name="summary">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"
                        onclick="hide_modal('.con-close-modal')">بستن
                </button>
                <button type="button" onclick=" hide_modal('.con-close-modal');charge_user(this) "
                        class="btn btn-info waves-effect waves-light">ذخیره
                    تغیرات
                </button>
            </div>
        </div>
    </div>
</div><!-- /.modal -->

<!--  amount history-->
<div class="amount  con-close-modal" data-userid="" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="hide_modal('.con-close-modal')">
                    ×
                </button>
                <h5 class="modal-title"> گزارشات شارژ حساب : <span class="story_owner_name"> </span></h5>
                <br>
                <h5 class="modal-title">موجودی فعلی حساب : <span class="story_owner_balance"> </span> تومان</h5>
            </div>
            <div class="modal-body" style="overflow-y: scroll;max-height: 300px">
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr class="inverse">
                                <th>ردیف</th>
                                <th>تاریخ</th>
                                <th>مقدار</th>
                                <th>توضیحات</th>
                            </tr>
                            </thead>
                            <tbody class="credit_story">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"
                        onclick="hide_modal('.con-close-modal')">بستن
                </button>
            </div>
        </div>
    </div>
</div><!-- /.modal -->

<!--  class_days  -->
<div class="class_days  con-close-modal" data-class_ld="" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= SITE_URL ?>admin_class/save_class_days" method="post">
                <input required type="hidden" name="class_id">
                <div class="modal-header">
                    <button type="button" class="close" onclick="hide_modal('.con-close-modal')">
                        ×
                    </button>
                    <h5 class="modal-title"> برنامه کلاسی : <span class="story_owner_name"> </span></h5>
                    <br>
                </div>
                <div class="modal-body" style="overflow-y: scroll;max-height: 300px">
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <div class="row">
                                <div class="col-xs-4"> روزهای کلاس</div>
                                <div class="col-xs-8 class_days_p">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input required type="submit" value="ثبت" class="btn btn-success"
                           onclick="check_form_value(this,event)">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"
                            onclick="hide_modal('.con-close-modal')">بستن
                    </button>
                </div>
            </form>
        </div>
    </div>
</div><!-- /.modal -->

<div class="full_black_cover"></div>
<div style="margin: 50px 0"></div>


<?php
unset($_SESSION["add_class_user_id"]);
unset($_SESSION["updated_class_id"]) ?>

<script>

    function show_modal(modal, class_id) {
        $(".full_black_cover").css("display", "block");
        var main_modal = $(".con-close-modal." + modal);

        main_modal.slideDown(650);
        main_modal.attr("data-class_ld", class_id);
        main_modal.find('input[type=hidden]').val(class_id);
    }

    function hide_modal(modal) {
        $(modal).css("display", "none");
        $(".full_black_cover").css("display", "none");
    }
    //    ................
    function active_user(id, status, item) {
        var url = "<?= SITE_URL ?>admin_class/class_status_change";
        var data = {'id': id, 'status': status};
        var act_title = '';
        var act_color = '';
        if (status == 'active') {
            act_title = 'فعال';
            act_color = '#00c300';
        } else if (status == 'inactive') {
            act_title = 'غیر فعال';
            act_color = 'red';
        }
        $.post(url, data, function (msg) {
            if (msg == true) {
                swal('با موفقیت ثبت شد', ' ', 'success');
                $(item).parents('td').find('a.hidden').removeClass('hidden');
                $(item).parents('tr').find('td.act_title').text(act_title);
                $(item).parents('tr').find('td.act_title').css({'color': act_color});
                $(item).addClass('hidden');
            } else {
                swal("مشکل در ثبت !", " ", "error");
            }
        })
    }

    function charge_user(item) {
        var user_id = $(item).parents(".con-close-modal").attr("data-userid");
        var amount = $(item).parents(".con-close-modal").find("input[name=amount]").val();
        $(item).parents(".con-close-modal").find("input[name=amount]").val(" ");
        var summary = $(item).parents(".con-close-modal").find("input[name=summary]").val();
        $(item).parents(".con-close-modal").find("input[name=summary]").val("");
        $("#ticketmodal-content").html('<div class="modal-body"><i class="fa fa-spinner fa-spin"></i> لطفا صبر کنید...<div class="clear"></div></div><div class="modal-footer"><div id="modal-response" class="modal-response"></div><button id="closemodal" type="button" style="float:left;" class="btn btn-default" data-dismiss="modal">بستن</button></div>');
        $("#myModal").modal('show');
        var url = "<?= SITE_URL ?>admin_student/student_sharge";
        var data = {"user_id": user_id, "amount": amount, "summary": summary};
        $.post(url, data, function (data, status) {
            if (data == true) {
                swal('انجام شد', "", 'success');
            } else {
                swal('خطا', "", 'error');
            }
        });
    }

    function get_credit_story(user_id, modal) {
        var url = "<?= SITE_URL ?>admin_student/get_credit_story";
        var data = {"user_id": user_id};
        $("tbody.credit_story").html(" ");
        $("span.story_owner_name").text(" ");

        $.post(url, data, function (msg, status) {
            if (msg == "null") {
                swal('گزارشی یافت نشد', "", 'error');
            } else {
                if (status != "success") {
                    swal('خطا', "", 'error');
                } else {
                    $.each(msg, function (index, value) {
                        if (value["id"]) {
                            show_modal('amount', user_id);
                            index++;
                            var color = "success";
                            if (value["amount"] < 0) {
                                color = "danger"
                            }
                            $("span.story_owner_name").text(value["name"] + ' ' + value["family"]);
                            $("span.story_owner_balance").text(value["credit"]);
                            var credit_row = '<tr class="' + color + '"><td>' + index + '</td><td>' + value["add_date"] + '</td> <td><span>' + value["amount"] + ' </span >تومان </td><td>' + value["summary"] + '</td></tr>';
                            $("tbody.credit_story").append(credit_row);
                        }

                    })
                }
            }
        }, "json")
    }

    function search_class(item, by_search) {
        var search_val = $(item).parents("div.search_parent").find("select.search").val();
        var url = "<?= SITE_URL ?>admin_class/search_by_ajax";
        var data = {"search_type": by_search, 'search_id': search_val};
        $("tbody.users_row").html("");
        $.post(url, data, function (msg) {
            console.log(msg);
            if (msg) {
                $.each(msg, function (index, value) {
                    var active = '';
                    var inactive = '';
                    var class_type = '';
                    var color = '';
                    var active_text = '';
                    var width_color = (value['registered'] * 110) / value['capacity'];

                    if (value['class_type'] == 'private') {
                        class_type = 'خصوصی';
                    } else if (value['class_type'] == 'public') {
                        class_type = 'عمومی';
                    }
                    else if (value['class_type'] == 'semiprivate') {
                        class_type = 'نیمه خصوصی';
                    }

                    if (value['status'] == 'ACTIVE') {
                        color = '#00c300';
                        active_text = 'فعال'
                        active = 'hidden';
                    } else if (value['status'] == 'INACTIVE') {
                        color = '#ff0e0e';
                        active_text = 'غیر فعال'
                        inactive = 'hidden';
                    }

                    var item_row = '<tr class="active"> <td>' + value['lang_name'] + '</td> <td class="act_title"><span style="color: ' + color + '"> ' + active_text + '</span> </td> <td>' + value['lang_level'] + '</td><td>' + value['name'] + ' ' + value['family'] + '</td><td>' + class_type + '</td> <td>' + value['tuition'] + '</td><td><div class="capacity"><span class="capacity" style="opacity: 0.5!important;width:' + width_color + '%;position:absolute;"></span><span  style="width: 100%;"> ' + value['capacity'] + ' / ' + value['registered'] + '</span></div> </td><td><a style="cursor: pointer" onclick="active_user(' + value['id'] + ',\'inactive\',this)" title="غیر فعال کردن" class="table-action-btn  ' + inactive + '"><i class="btn btn-warning btn-xs   md md-close"></i></a>  <a style="cursor: pointer" onclick="active_user(' + value['id'] + ',\'active\',this)" title=" فعال کردن" class="table-action-btn  ' + active + '"> <i class="btn btn-success btn-xs md md-check "></i></a> </td> <td class="operation"><i data-toggle="tooltip" data-placement="top" title="" class="fa fa-book" data-original-title="برنامه کلاسی" onclick="show_modal(\'class_days\',' + value['id'] + ');get_class_time(this,' + value['id'] + ')"></i> </td> <td><a href="<?= SITE_URL ?>admin_class/edit_class/' + value['id'] + '" title="  ویرایش" class="table-action-btn  "><i class="btn btn-info   btn-xs fa md md-edit"></i></a></td> </tr>';
                    $("tbody.users_row").append(item_row);
                })
            } else {
                swal("موردی یافت نشد !", '', 'warning');
            }
        }, 'json')
    }

    function get_class_time(item, class_id) {
        var row = '<div><hr><div class="row m_b_0"><div class="col-xs-4"><div class="checkbox checkbox-custom"><input   type="checkbox" id="sat" name="day[sat]"><label for="sat">شنبه</label></div></div><div class="col-xs-6"><div class="col-xs-3"><label for="sat_h" class="normal">ساعت</label></div><div class="col-xs-6"><input   type="text" id="sat_h" name="time[sat]"class="form-control input-sm"></div></div></div><hr><div class="row m_b_0"><div class="col-xs-4"><div class="checkbox checkbox-custom"><input   type="checkbox" id="sun" name="day[sun]"><label for="sun">یک شنبه</label></div></div><div class="col-xs-6"><div class="col-xs-3   "><label for="sun_h" class="normal">ساعت</label></div><div class="col-xs-6"><input   type="text" id="sun_h" name="time[sun]"    class="form-control input-sm">            </div></div></div><hr><div class="row m_b_0"><div class="col-xs-4"><div class="checkbox checkbox-custom"><input   type="checkbox" id="mon" name="day[mon]"><label for="mon">دوشنبه</label></div></div><div class="col-xs-6"><div class="col-xs-3   "><label for="mon_h" class="normal">ساعت</label></div><div class="col-xs-6"><input   type="text" id="mon_h" name="time[mon]"class="form-control input-sm"></div></div></div><hr><div class="row m_b_0"><div class="col-xs-4"><div class="checkbox checkbox-custom"><input   type="checkbox" id="tue" name="day[tue]"><label for="tue">سه شنبه</label></div></div><div class="col-xs-6"><div class="col-xs-3   "><label for="tue_h" class="normal">ساعت</label></div><div class="col-xs-6"><input   type="text" id="tue_h" name="time[tue]"class="form-control input-sm"></div></div></div><hr><div class="row m_b_0"><div class="col-xs-4"><div class="checkbox checkbox-custom"><input   type="checkbox" id="wed" name="day[wed]"><label for="wed">چهارشنبه</label></div></div><div class="col-xs-6"><div class="col-xs-3   "><label for="wed_h" class="normal">ساعت</label></div><div class="col-xs-6"><input   type="text" id="wed_h" name="time[wed]"class="form-control input-sm"></div></div></div><hr><div class="row m_b_0"><div class="col-xs-4"><div class="checkbox checkbox-custom"><input type="checkbox" id="thu" name="day[thu]"><label for="thu">پنج شنبه</label></div></div><div class="col-xs-6"><div class="col-xs-3 "><label for="thu_h" class="normal">ساعت</label></div><div class="col-xs-6"><input   type="text" id="thu_h" name="time[thu]" class="form-control input-sm"></div></div></div><hr><div class="row m_b_0"><div class="col-xs-4"><div class="checkbox checkbox-custom"><input   type="checkbox" id="fri" name="day[fri]"><label for="fri"> جمعه</label></div></div><div class="col-xs-6"><div class="col-xs-3 "><label for="fri_h" class="normal">ساعت</label></div><div class="col-xs-6"><input   type="text" id="fri_h" name="time[fri]" class="form-control input-sm"></div></div></div><hr></div>'
        $('.class_days_p').html(' ');
        $('.class_days_p').append(row);
        var url = '<?= SITE_URL ?>admin_class/AJAX_class_time/' + class_id;
        var data = {};
        $.post(url, data, function (msg) {
            $.each(msg, function (index, value) {
                $('.class_days').find('input#' + value['day']).attr('checked', 'checked');
                $('.class_days').find('input#' + value['day'] + '_h').val(value['time']);
            });
        }, 'json');
    }

    function check_form_value(item, e) {
        e.preventDefault();
        var checked_input = $(item).parents('form').find('input:checked');
        var full_input_count = 0;
        for (var i = 0; i < checked_input.length; i++) {
            var input_ch_id = checked_input.eq(i).attr('id');
            var hour_input = checked_input.eq(i).parents('div.m_b_0').find('input#' + input_ch_id + '_h');
            var hour_val = hour_input.val();
            hour_val = hour_val.trim();
            if (hour_val.length > 0) {
                hour_input.css({'border-color': '#E3E3E3'});
                full_input_count++
            } else {
                hour_input.css({'border-color': '#ff6f98'});
            }
            if (full_input_count == checked_input.length) {
                $(item).parents('form').submit();
            }
        }
    }

    //    function save_class_days(item, e) {
    //        e.preventDefault();
    //        var form_info = $(item).serializeArray();
    //        console.log(form_info);
    //        alert(form_info['name']);
    //        var url = '<?//= SITE_URL ?>//admin_class/AJAX_save_class_days';
    //        var data = {'form_info': form_info};
    //        $.post(url, data, function (msg) {
    //            alert(msg);
    //            console.log(msg);
    //        })
    //    }
</script>
