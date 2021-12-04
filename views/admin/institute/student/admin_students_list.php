<?php

?>


<!-- Forms -->
<div style="margin-top: 50px"></div>
<div class="row">
    <div class="col-sm-8 col-xs-8 col-sm-push-3 col-xs-push-3">
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-t-0 header-title pull-left"><b> مدیریت ورزشکاران</b></h4>
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
            if (!empty($_SESSION["add_student"]) and $_SESSION["add_student"] == "success") {
                ?>
                <div class="alert alert-success alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <a class="alert-link"> موفقیت ذخیره شد</a>
                </div>
            <?php }
            if (!empty($_SESSION["update_student"]) and $_SESSION["update_student"] == "success") {
                ?>
                <div class="alert alert-success alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <a class="alert-link"> اطلاعات با موفقیت بروزرسانی شد</a>
                </div>
            <?php }
            unset($_SESSION["add_student"]);
            unset($_SESSION["update_student"]); ?>

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
            </style>
            <div class="table-responsive">
                <table class="table table-hover mails m-0 table table-actions-bar">
                    <thead>
                    <tr class="">
                        <div class="col-sm-8  search_row">
                            <!--                            <div class="col-sm-5">-->
                            <!--                                <a href="-->
                            <? //= SITE_URL ?><!--admin_student/add_student"-->
                            <!--                                   class="btn btn-default btn-md waves-effect waves-light m-b-30">-->
                            <!--                                    <i class="md md-add"></i>افزودن دانشجوی جدید</a>-->
                            <!--                            </div>-->
                            <!-- ************* search  ************** -->
                            <div class="col-sm-4">
                                <input type="text" name="search" id="search" class="form-control"
                                       placeholder="نام یا نام کاربری">
                            </div>
                            <div class="col-sm-3" style="position: relative;">
                                <i class="glyphicon glyphicon-search search_icon"></i>
                                <input type="button" class="form-control btn btn-info"
                                       value=" جستجو" onclick="search_students(this)">
                            </div>
                        </div>
                        <br>
                        <br>
                    </tr>
                    <tr>
                        <th>نام</th>
                        <th>وضعیت</th>
                        <th>موبایل</th>
                        <th>نام کاربری</th>
                        <th> اخرین ورود</th>
                        <th>عملیات</th>
                        <th>ویرایش</th>
                    </tr>
                    </thead>
                    <tbody class="users_row">
                    <?php
                    foreach ($data['students'] as $users) {
                        $users['name']=$users['name'].' '.$users['family'];
                        ?>
                        <tr class="active">
                        <?php
                        if (isset($_SESSION["add_student_user_id"]) and $_SESSION["add_student_user_id"] == $users["id"]) {
                            ?>
                            <td class="c_o_name"><p class="new_item">new</p><?= $users['name'] ?></td>
                        <?php } else if (isset($_SESSION["update_student_user_id"]) and $_SESSION["update_student_user_id"] == $users["id"]) {
                            ?>
                            <td><p class="new_item">edited</p><?= $users['name'] ?></td>
                        <?php } else { ?>
                            <tr class="active" style="">
                            <td><?= $users['name'] ?></td>
                        <?php } ?>

                        <td class="act_title"><?php if ($users['status'] == 'ACTIVE') {
                                echo '<span style="color: #00c300"> فعال</span>';
                            } elseif ($users['status'] == 'INACTIVE') {
                                echo '<span style="color: #ff0e0e">غیر فعال</span>';
                            } ?></td>
                        <td><?= $users['mobile'] ?></td>
                        <td><?= $users['username'] ?></td>
                        <td><?= $users['last_login'] ?></td>
                        <td>
                            <a style="cursor: pointer" onclick="active_user(<?= $users['id'] ?>,'inactive',this)"
                               title="غیر فعال کردن"
                               class="table-action-btn  ">
                                <i class="btn btn-warning btn-xs   md md-close"></i></a>
                            <a style="cursor: pointer" onclick="active_user(<?= $users['id'] ?>,'active',this)"
                               title=" فعال کردن"
                               class="table-action-btn <?php if ($users['status'] == 'ACTIVE') {
                                   echo 'hidden';
                               } ?>">
                                <i class="btn btn-success btn-xs md md-check "></i></a>
                            <!-- ==========  access   ====== -->
                        </td>

                        <td>
                            <a href="<?= SITE_URL ?>admin_student/edit_student/<?= $users['id'] ?>"
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
                            <input type="number" class="form-control" id="amount" placeholder="0" name="amount">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label"> توضیحات</label>
                            <input type="text" class="form-control" id="note" placeholder="..." name="summary">
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

<div class="full_black_cover"></div>
<div style="margin: 50px 0"></div>

<?php unset($_SESSION["add_student_user_id"]);
unset($_SESSION["update_student_user_id"]) ?>

<script>

    function show_modal(modal, user_id) {
        $(".full_black_cover").css("display", "block");
        var main_modal = $(".con-close-modal." + modal);
        main_modal.slideDown(666);
        main_modal.attr("data-userid", user_id);
    }

    function hide_modal(modal) {
        $(modal).css("display", "none");
        $(".full_black_cover").css("display", "none");
    }
    //    ................
    function active_user(id, status, item) {
        var url = "<?= SITE_URL ?>admin_student/student_status_change";
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

    function search_students(item) {
        var search_text = $(item).parents("div.search_row").find("input#search").val();
        var url = "<?= SITE_URL ?>admin_student/search_by_ajax";
        var data = {"search_text": search_text, "type": "student"};
        $("tbody.users_row").html("");
        $.post(url, data, function (msg) {
            if (msg) {
                $.each(msg, function (index, value) {
                    console.log(value);
                    var in_hid = "";
                    var ac_hid = "";
                    if (value["status"] == "ACTIVE") {
                        var status = '<span style="color: #00c300"> فعال</span>';
                        ac_hid = "hidden";
                    } else {
                        var status = ' <span style="color: #ff0e0e">غیر فعال</span> ';
                        in_hid = "hidden";
                    }
                    var item_row = '<tr class="active" >' +
                        '<td>' + value["name"] + " " + value["family"] + '</td>  ' +
                        '<td class="act_title">   ' + status + '   </td> ' +
                        '<td>  ' + value["mobile"] + '</td>    <td>  ' + value["username"] + '  </td>    <td>  ' + value["last_login"] + ' </td>  ' +
                        '<td><a style="cursor: pointer" onclick="active_user(  ' + value["id"] + ',\'inactive\',this)" ' +
                        'title="غیر فعال کردن"  class="table-action-btn  ' + in_hid + '">' +
                        '<i class="btn btn-warning btn-xs   md md-close"></i></a>' +
                        '   <a style="cursor: pointer" onclick="active_user(' + value["id"] + ',\'active\',this)"' +
                        '  title=" فعال کردن"  class="table-action-btn ' + ac_hid + '">            ' +
                        '<i class="btn btn-success btn-xs md md-check "></i></a>    </td>   ' +
                        ' <td class="operation">        <i data-toggle="tooltip" data-placement="top" class="fa fa-dollar"     ' +
                        '      onclick="get_credit_story(  ' + value["id"] + ',\'amount\')"           data-original-title="گزارش مالی"></i>    ' +
                        '    <i data-toggle="tooltip" data-placement="top" title="" class="fa fa-money "      ' +
                        '     data-target=".con-close-modal" onclick="show_modal(\'sharge\', ' + value["id"] + ')"        ' +
                        '   data-original-title="افزودن شارژ"> </i>  <a href="<?= SITE_URL ?>admin_student/old_feed/' + value["id"] + '"> <i data-toggle="tooltip" data-placement="top" title=""    ' +
                        '       onclick="marksreport(  ' + value["id"] + ' )" class="fa fa-line-chart"   ' +
                        ' data-original-title="مشاهده برنامه  "></i>   </a>     <i data-toggle="tooltip" data-placement="top" title=""  ' +
                        ' onclick="listclasses( ' + value["id"] + ')" class="fa fa-books" ' +
                        ' data-original-title="لیست کلاس ها"></i>    </td> <td> <a href="<?= SITE_URL ?>admin_student/edit_student/' + value["id"] + '"   ' +
                        ' title="  ویرایش" class="table-action-btn  "> <i class="btn btn-info   btn-xs fa md md-edit"></i></a>    </td></tr>';
                    $("tbody.users_row").append(item_row);
                })
            } else {
                swal("موردی یافت نشد !", '', 'warning');
            }
        }, 'json')
    }

</script>
