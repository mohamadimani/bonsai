<link rel="stylesheet" href="<?= SITE_URL ?>public\admin\assets\plugins\datepicker/css/persianDatepicker-default.css"/>
<script src="<?= SITE_URL ?>public\admin\assets\plugins\datepicker/js/persianDatepicker.js"></script>

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">مدیریت ترم ها</h4>
                    <p class="text-muted page-title-alt"></p>
                </div>
            </div>

            <style>
                span.edited {
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


            </style>

            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="card-box">
                        <?php
                        if (!empty($_SESSION["edit_term"]) and $_SESSION["edit_term"] == "success") {
                            ?>
                            <div class="alert alert-success alert-dismissable text-center">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                </button>
                                <a class="alert-link"> ترم با موفقیت ویرایش شد</a>
                            </div>
                        <?php }
                        if (!empty($_SESSION["add_term"]) and $_SESSION["add_term"] == "success") {
                            ?>
                            <div class="alert alert-success alert-dismissable text-center">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                </button>
                                <a class="alert-link"> ترم جدید با موفقیت ثبت شد</a>
                            </div>
                        <?php }
                        if (!empty($_SESSION["add_term"]) and $_SESSION["add_term"] == "danger") {
                            ?>
                            <div class="alert alert-danger alert-dismissable text-center">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                </button>
                                <a class="alert-link"> خطا در ثبت !</a>
                            </div>
                        <?php }
                        if (!empty($_SESSION["add_term"]) and $_SESSION["add_term"] == "empty") {
                            ?>
                            <div class="alert alert-warning alert-dismissable text-center">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                </button>
                                <a class="alert-link"> نام و تاریخ ها نمیتواند خالی باشد !</a>
                            </div>
                        <?php }
                        unset($_SESSION["add_term"]);
                        unset($_SESSION["edit_term"]);
                        ?>
                        <div class="col-sm-12 col-md-8">
                            <h4 style="margin: 10px 0 30px 0;"><b> افزودن ترم جدید </b></h4>
                            <form action="<?= SITE_URL ?>admin_terms/add_terms" method="post"
                                  enctype="multipart/form-data">

                                <div class="m-t-20">
                                    <h5><b>نام ترم</b></h5>
                                    <input required type="text" name="term_name" class="form-control"
                                           id="thresholdconfig" value=""/>
                                </div>

                                <div class="m-t-20">
                                    <h5><b> شروع شبت نام </b></h5>
                                    <input required type="text" name="register_start_term" class="form-control"
                                           id="r1" value=""/>
                                </div>

                                <div class="m-t-20">
                                    <h5><b> پایان ثبت نام</b></h5>
                                    <input required type="text" name="register_end_term" class="form-control"
                                           id="thresholdconfig2" value=""/>
                                </div>

                                <div class="m-t-20">
                                    <h5><b> شروع کلاس</b></h5>
                                    <input required type="text" name="term_start_time" class="form-control"
                                           id="thresholdconfig3" value=""/>
                                </div>
                                <div class="m-t-20">
                                    <h5><b> پایان کلاس</b></h5>
                                    <input required type="text" name="term_end_time"
                                           class="form-control thresholdconfig4"
                                           id="thresholdconfig4" value=""/>
                                </div>
                                <script>
                                    $("#r1").persianDatepicker();
                                    $("#thresholdconfig2").persianDatepicker();
                                    $("#thresholdconfig3").persianDatepicker();
                                    $(".thresholdconfig4").persianDatepicker();
                                </script>
                                <div class="checkbox checkbox-custom">
                                    <h5><b>وضعیت</b></h5>
                                    <input id="checkbox11" type="checkbox" name="status" checked="">
                                    <label for="checkbox11">فعال</label>
                                </div>
                                <div class="m-t-20">
                                    <input type="submit" class="form-control btn btn-success"
                                           value="ثبت"/>
                                </div>
                            </form>
                        </div>
                        <table class="table table-hover mails m-0 table table-actions-bar m-t-20">
                            <thead>
                            <tr>
                                <th>نام ترم</th>
                                <th> وضعیت</th>
                                <th>شروع ثبت نام</th>
                                <th>پایان ثبت نام</th>
                                <th>شروع ترم</th>
                                <th>پایان ترم</th>
                                <th>عملیات</th>
                                <th>ویرایش</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($data['terms'] as $terms) {
                                $edit_color = '';
                                $edit_show = 'none';
                                if (!empty($_SESSION["updated_lang_id"]) and $_SESSION["updated_lang_id"] == $terms['id']) {
                                    $edit_color = '#ff0e0e';
                                    $edit_show = 'show';
                                }
                                ?>
                                <tr class="active">
                                    <td style="position: relative;">
                                        <span class="edited"
                                              style="color: <?= $edit_color ?>;display: <?= $edit_show ?>">edited</span>
                                        <span><?= $terms["term_name"] ?></span>
                                    </td>
                                    <td class="act_title"><?php if ($terms['status'] == 'ACTIVE') {
                                            echo '<span style="color:#00c300"> فعال</span>';
                                        } elseif ($terms['status'] == 'INACTIVE') {
                                            echo '<span style="color:#ff0e0e">غیر فعال</span>';
                                        } ?>
                                    </td>
                                    <td><?= $terms["register_start_time"] ?></td>
                                    <td><?= $terms["register_end_time"] ?></td>
                                    <td><?= $terms["term_start_time"] ?></td>
                                    <td><?= $terms["term_end_time"] ?></td>
                                    <td>
                                        <a style="cursor: pointer"
                                           onclick="active_user(<?= $terms['id'] ?>,'inactive',this)"
                                           title="غیر فعال کردن"
                                           class="table-action-btn <?php if ($terms['status'] == 'INACTIVE') {
                                               echo 'hidden';
                                           } ?>">
                                            <i class="btn btn-warning btn-xs   fa fa-ban"></i></a>
                                        <a style="cursor: pointer"
                                           onclick="active_user(<?= $terms['id'] ?>,'active',this)"
                                           title=" فعال کردن"
                                           class="table-action-btn <?php if ($terms['status'] == 'ACTIVE') {
                                               echo 'hidden';
                                           } ?>">
                                            <i class="btn btn-success btn-xs md md-check "></i></a>
                                        <!-- ========== delete ====== -->
                                        <a style="cursor: pointer"
                                           onclick="delete_category(<?= $terms['id'] ?>,this)"
                                           title="حذف"
                                           class="table-action-btn ">
                                            <i class="btn btn-danger btn-xs md md-close "></i></a>
                                    </td>
                                    <td>
                                        <!-- ==========Edit ====== -->
                                        <a href="<?= SITE_URL ?>admin_terms/edit_term/<?= $terms['id'] ?>"
                                           title="ویرایش"
                                           class="table-action-btn ">
                                            <i class="btn btn-info   btn-xs md md-edit "></i></a>
                                    </td>
                                </tr>
                            <?php }
                            unset($_SESSION["updated_term_id"]);
                            ?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div> <!-- content -->
    </div>

    <script>

        function active_user(id, status, item) {
            var url = "<?= SITE_URL ?>admin_terms/term_status_change";
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

        function delete_category(id, item) {
            var url = "<?= SITE_URL ?>admin_terms/delete_term";
            var data = {'id': id};
            $.post(url, data, function (msg) {
                if (msg == true) {
                    swal('با موفقیت حذف شد', ' ', 'success');
                    $(item).parents('tr').remove();
                } else if (msg == "posts") {
                    swal("ترم  های دارای کلاس را نمیتوان حذف کرد !", " ", "error");
                } else {
                    swal("مشکل در حذف !", " ", "error");
                }
            })
        }

    </script>