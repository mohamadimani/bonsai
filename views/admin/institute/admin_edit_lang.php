<?php
$language = $data['language'];


?>

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">ویرایش زبان </h4>
                    <p class="text-muted page-title-alt"></p>
                </div>
            </div>

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
                        if (!empty($_SESSION["edit_lang"]) and $_SESSION["edit_lang"] == "danger") {
                            ?>
                            <div class="alert alert-danger alert-dismissable text-center">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <a class="alert-link"> خطا در ثبت !</a>
                            </div>
                        <?php }
                        if (!empty($_SESSION["edit_lang"]) and $_SESSION["edit_lang"] == "empty") {
                            ?>
                            <div class="alert alert-warning alert-dismissable text-center">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <a class="alert-link"> نام یا سطح زبان نمیتواند خالی باشد !</a>
                            </div>
                        <?php }
                        unset($_SESSION["edit_lang"]);
                        ?>

                        <h4 style="margin: 10px 0 30px 0;"><b> ویرایش زبان </b></h4>
                        <form action="<?= SITE_URL ?>admin_language/update_lang/<?= $language ['id'] ?>" method="post"
                              enctype="multipart/form-data">
                            <div class="m-t-20">
                                <h5><b>نام زبان</b></h5>
                                <input required type="text" name="lang_name" class="form-control"
                                       id="thresholdconfig" value="<?= $language ['lang_name'] ?>"/>
                            </div>
                            <div class="m-t-20">
                                <h5><b>سطح ها</b></h5>
                                <textarea required name="lang_level" class="form-control"
                                          id="thresholdconfig"><?= $language ['lang_level'] ?></textarea>
                                <h5><b> (سطح ها را با , جدا کنید)</b></h5>
                            </div>
                            <div class="checkbox checkbox-custom">
                                <h5><b>وضعیت</b></h5>
                                <input id="checkbox11" type="checkbox"
                                       name="status" <?php if ($language ['status'] == 'ACTIVE') echo 'checked' ?>>
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
        </div> <!-- content -->
    </div>

