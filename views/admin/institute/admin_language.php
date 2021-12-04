<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">مدیریت زبان ها</h4>
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
                        if (!empty($_SESSION["edit_lang"]) and $_SESSION["edit_lang"] == "success") {
                            ?>
                            <div class="alert alert-success alert-dismissable text-center">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <a class="alert-link"> زبان با موفقیت ویرایش شد</a>
                            </div>
                        <?php }
                        if (!empty($_SESSION["add_lang"]) and $_SESSION["add_lang"] == "success") {
                            ?>
                            <div class="alert alert-success alert-dismissable text-center">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <a class="alert-link"> زبان جدید با موفقیت ثبت شد</a>
                            </div>
                        <?php }
                        if (!empty($_SESSION["add_lang"]) and $_SESSION["add_lang"] == "danger") {
                            ?>
                            <div class="alert alert-danger alert-dismissable text-center">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <a class="alert-link"> خطا در ثبت !</a>
                            </div>
                        <?php }
                        if (!empty($_SESSION["add_lang"]) and $_SESSION["add_lang"] == "empty") {
                            ?>
                            <div class="alert alert-warning alert-dismissable text-center">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <a class="alert-link"> نام یا سطح زبان نمیتواند خالی باشد !</a>
                            </div>
                        <?php }
                        unset($_SESSION["add_lang"]);
                        unset($_SESSION["edit_lang"]);

                        ?>

                        <h4 style="margin: 10px 0 30px 0;"><b> افزودن زبان جدید </b></h4>
                        <form action="<?= SITE_URL ?>admin_language/add_language" method="post"
                              enctype="multipart/form-data">
                            <div class="m-t-20">
                                <h5><b>نام زبان</b></h5>
                                <input required type="text" name="lang_name" class="form-control"
                                       id="thresholdconfig" value=""/>
                            </div>
                            <div class="m-t-20">
                                <h5><b>سطح ها</b></h5>
                                <textarea required name="lang_level" class="form-control"
                                          id="thresholdconfig"></textarea>
                                <h5><b> (سطح ها را با , جدا کنید)</b></h5>
                            </div>
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

                        <table class="table table-hover mails m-0 table table-actions-bar m-t-20">
                            <thead>
                            <tr>
                                <th>نام زبان</th>
                                <th> وضعیت</th>
                                <th>سطح ها</th>
                                <th>عملیات</th>
                                <th>ویرایش</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($data['languages'] as $lang) {
                                $edit_color = '';
                                $edit_show = 'none';
                                if (!empty($_SESSION["updated_lang_id"]) and $_SESSION["updated_lang_id"] == $lang['id']) {
                                    $edit_color = '#ff0e0e';
                                    $edit_show = 'show';
                                }
                                ?>
                                <tr class="active">
                                    <td style="position: relative;">
                                        <span class="edited"
                                              style="color: <?= $edit_color ?>;display: <?= $edit_show ?>">edited</span>
                                        <span><?= $lang["lang_name"] ?></span>
                                    </td>
                                    <td class="act_title"><?php if ($lang['status'] == 'ACTIVE') {
                                            echo '<span style="color: #00c300"> فعال</span>';
                                        } elseif ($lang['status'] == 'INACTIVE') {
                                            echo '<span style="color: #ff0e0e">غیر فعال</span>';
                                        } ?>
                                    </td>
                                    <td><?= $lang["lang_level"] ?></td>
                                    <td>
                                        <a style="cursor: pointer"
                                           onclick="active_user(<?= $lang['id'] ?>,'inactive',this)"
                                           title="غیر فعال کردن"
                                           class="table-action-btn <?php if ($lang['status'] == 'INACTIVE') {
                                               echo 'hidden';
                                           } ?>">
                                            <i class="btn btn-warning btn-xs   fa fa-ban"></i></a>
                                        <a style="cursor: pointer"
                                           onclick="active_user(<?= $lang['id'] ?>,'active',this)"
                                           title=" فعال کردن"
                                           class="table-action-btn <?php if ($lang['status'] == 'ACTIVE') {
                                               echo 'hidden';
                                           } ?>">
                                            <i class="btn btn-success btn-xs md md-check "></i></a>
                                        <!-- ========== delete ====== -->
                                        <a style="cursor: pointer"
                                           onclick="delete_category(<?= $lang['id'] ?>,this)"
                                           title="حذف"
                                           class="table-action-btn ">
                                            <i class="btn btn-danger btn-xs md md-close "></i></a>
                                    </td>
                                    <td>
                                        <!-- ==========Edit ====== -->
                                        <a href="<?= SITE_URL ?>admin_language/edit_lang/<?= $lang['id'] ?>"
                                           title="ویرایش"
                                           class="table-action-btn ">
                                            <i class="btn btn-info   btn-xs md md-edit "></i></a>
                                    </td>
                                </tr>
                            <?php }
                            unset($_SESSION["updated_lang_id"]);
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
            var url = "<?= SITE_URL ?>admin_language/lang_status_change";
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
            var url = "<?= SITE_URL ?>admin_language/delete_lang";
            var data = {'id': id};
            $.post(url, data, function (msg) {
                if (msg == true) {
                    swal('با موفقیت حذف شد', ' ', 'success');
                    $(item).parents('tr').remove();
                } else if (msg == "posts") {
                    swal("زبان  های دارای ترم را نمیتوان حذف کرد !", " ", "error");
                } else {
                    swal("مشکل در حذف !", " ", "error");
                }
            })
        }

    </script>