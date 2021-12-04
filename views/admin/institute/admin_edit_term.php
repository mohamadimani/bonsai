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
                                <a class="alert-link"> نام  و تاریخ ها نمیتواند خالی باشد !</a>
                            </div>
                        <?php }
                        unset($_SESSION["add_term"]);
                        unset($_SESSION["edit_term"]);

                        $term_id = $data['term_list'];
                        ?>
                        <div class="col-sm-12 col-md-8">
                            <h4 style="margin: 10px 0 30px 0;"><b> افزودن ترم جدید </b></h4>
                            <form action="<?= SITE_URL ?>admin_terms/update_term/<?= $term_id['id'] ?>" method="post"
                                  enctype="multipart/form-data">

                                <div class="m-t-20">
                                    <h5><b>نام ترم</b></h5>
                                    <input required type="text" name="term_name" class="form-control"
                                           id="thresholdconfig" value="<?= $term_id['term_name'] ?>"/>
                                </div>

                                <div class="m-t-20">
                                    <h5><b> شروع شبت نام </b></h5>
                                    <input required type="text" name="register_start_term" class="form-control"
                                           id="r1" value="<?= $term_id['register_start_time'] ?>"/>
                                </div>

                                <div class="m-t-20">
                                    <h5><b> پایان ثبت نام</b></h5>
                                    <input required type="text" name="register_end_term" class="form-control"
                                           id="thresholdconfig2" value="<?= $term_id['register_end_time'] ?>"/>
                                </div>

                                <div class="m-t-20">
                                    <h5><b> شروع کلاس</b></h5>
                                    <input required type="text" name="term_start_time" class="form-control"
                                           id="thresholdconfig3" value="<?= $term_id['term_start_time'] ?>"/>
                                </div>
                                <div class="m-t-20">
                                    <h5><b> پایان کلاس</b></h5>
                                    <input required type="text" name="term_end_time"
                                           class="form-control thresholdconfig4"
                                           id="thresholdconfig4" value="<?= $term_id['term_end_time'] ?>"/>
                                </div>
                                <script>
                                    $("#r1").persianDatepicker();
                                    $("#thresholdconfig2").persianDatepicker();
                                    $("#thresholdconfig3").persianDatepicker();
                                    $(".thresholdconfig4").persianDatepicker();
                                </script>
                                <div class="checkbox checkbox-custom">
                                    <h5><b>وضعیت</b></h5>
                                    <input id="checkbox11" type="checkbox" name="status"
                                        <?php if ($term_id['status'] == 'ACTIVE') {
                                            echo 'checked';
                                        } ?>>
                                    <label for="checkbox11">فعال</label>
                                </div>
                                <div class="m-t-20">
                                    <input type="submit" class="form-control btn btn-success"
                                           value="ثبت"/>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div> <!-- content -->
    </div>
