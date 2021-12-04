<?php
$user_physique = $data['user_physique'];
$BMI = $user_physique['BMI'];
if ($BMI < 18.5) {
    $BMI_status = 'لاغری شدید';
    $pointer_left = 10;
} else if ($BMI >= 18.5 and $BMI <= 20) {
    $BMI_status = '  وزن ورزشکاری';
    $pointer_left = 29;
} else if ($BMI > 20 and $BMI <= 25) {
    $BMI_status = 'وزن طبیعی  ';
    $pointer_left = 48;
} else if ($BMI > 25 and $BMI <= 30) {
    $BMI_status = 'کمی اضافه وزن';
    $pointer_left = 67;
} else if ($BMI > 30 and $BMI <= 40) {
    $BMI_status = '  اضافه وزن زیاد';
    $pointer_left = 86;
} else if ($BMI > 40) {
    $BMI_status = 'چاقی شدید';
}
unset($_SESSION['feed_error']);
?>
<style>
    .p-15 {
        padding: 15px;
    }

    .relative {
        position: relative;
    }

    .progress {
        height: 20px !important;
        position: relative;
    }

    .progress-bar {
        box-shadow: none;
        font-size: 13px;
        font-weight: bold;
        line-height: 20px;
    }

    .bmi_pointer {
        position: absolute;
        right: <?= $pointer_left ?>%;
        top: 40px;
        width: 0;
        height: 0;
        background-color: #00aced;
        border-bottom: 20px solid #5f83ce;
        border-top: 20px solid #ebeff2;
        border-right: 10px solid #ebeff2;
        border-left: 10px solid #ebeff2;
    }

    .BMI_number {
        color: #5f83ce;
        padding: 0 5px;
        font-weight: bold;
    }

    .row {
        margin: 30px 0;
    }

    td {
        border: 1px solid silver !important;
    }

</style>

<div class="row">
    <div class="col-md-8 col-md-push-3 col-xs-12   ">
        <div class="card-box">
            <p><b>برنامه غذایی تاریخ : </b> <b><?= $user_physique['in_date'] ?></b></p>
            <div class="container-fluid ">
                <div class="p-15 col-md-12 col-sx-12">
                    <div class="p-15 col-md-6 col-sx-12">
                        <div class="row  ">
                            <p><span>شاخص توده بدن شما(BMI) :</span>
                                <span class="BMI_number"><?= $user_physique['BMI'] ?></span>
                            </p>
                            <p><span>  میزان  کالری مورد نیاز   :</span>
                                <span class="BMI_number"><?= round($user_physique['need_calory']) ?></span>
                            </p>
                            <p><span>  میزان کربو هیدرات (کالری) :</span>
                                <span class="BMI_number"><?= round($user_physique['CHO_C']) ?></span>
                            </p>
                            <p><span>  میزان کربو هیدرات (گرم) :</span>
                                <span class="BMI_number"><?= round($user_physique['CHO_G']) ?></span>
                            </p>
                            <p><span>  میزان   چربی (کالری) :</span>
                                <span class="BMI_number"><?= round($user_physique['FAT_C']) ?></span>
                            </p>
                            <p><span>  میزان   چربی (گرم) :</span>
                                <span class="BMI_number"><?= round($user_physique['FAT_G']) ?></span>
                            </p>
                            <p><span>  میزان   پروتوئین (کالری) :</span>
                                <span class="BMI_number"><?= round($user_physique['PRO_C']) ?></span>
                            </p>
                            <p><span>  میزان   پروتوئین (گرم) :</span>
                                <span class="BMI_number"><?= round($user_physique['PRO_G']) ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="p-15 col-md-6 col-sx-12">
                        <!--            <table class="table"> -->
                        <!--                <tr>-->
                        <!--                    <td colspan="2">لبنیات</td>-->
                        <!--                    <td colspan="2">سبزیجات</td>-->
                        <!--                    <td colspan="2">میوه</td>-->
                        <!--                    <td colspan="2">قند</td>-->
                        <!--                </tr>-->
                        <!--                <tr>-->
                        <!--                    <td> افزایش</td>-->
                        <!--                    <td> کاهش</td>-->
                        <!--                    <td> افزایش</td>-->
                        <!--                    <td> کاهش</td>-->
                        <!--                    <td> افزایش</td>-->
                        <!--                    <td> کاهش</td>-->
                        <!--                    <td> افزایش</td>-->
                        <!--                    <td> کاهش</td>-->
                        <!--                </tr>-->
                        <!--                <tr>-->
                        <!--                    <td>--><? //= $food_unit['dairy_asc'] ?><!--</td>-->
                        <!--                    <td>--><? //= $food_unit['dairy_desc'] ?><!--</td>-->
                        <!--                    <td>--><? //= $food_unit['vegetable_asc'] ?><!--</td>-->
                        <!--                    <td>--><? //= $food_unit['vegetable_desc'] ?><!--</td>-->
                        <!--                    <td>--><? //= $food_unit['fruit_asc'] ?><!--</td>-->
                        <!--                    <td>--><? //= $food_unit['fruit_desc'] ?><!--</td>-->
                        <!--                    <td>--><? //= $food_unit['sugar_asc'] ?><!--</td>-->
                        <!--                    <td>--><? //= $food_unit['sugar_desc'] ?><!--</td>-->
                        <!--                </tr>-->
                        <!--            </table>-->
                    </div>
                </div>
                <div class="p-15 col-md-12 col-sx-12">
                    <div class="row  relative">
                        <span class="bmi_pointer"></span>
                        <div class="progress">
                            <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 20%;"
                                 class="progress-bar progress-bar-danger progress-bar-striped">لاغر
                            </div>
                            <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 20%;"
                                 class="progress-bar progress-bar-info">ورزشکاری
                            </div>
                            <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 20%;"
                                 class="progress-bar progress-bar-success progress-bar-striped active">معمولی
                            </div>
                            <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 20%;"
                                 class="progress-bar progress-bar-warning progress-bar-striped active">اضافه وزن
                            </div>
                            <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 20%;"
                                 class="progress-bar progress-bar-danger progress-bar-striped active"> چاق
                            </div>
                        </div>
                    </div>
                    <div class=" row m-t-40"></div>
                    <div class="row m-t-40 ">
                        <a href="<?= SITE_URL ?>users/plan/<?= $user_physique['user_id'] . '/' . $user_physique['id'] ?>">
                            <span class="btn btn-success"> مشاهده برنامه غذایی</span></a>
                        <a href="<?= SITE_URL ?>feed"><span class="btn btn-info">برنامه  جدید</span></a>
                        <a href="<?= SITE_URL ?>users/old_feed">
                            <span class="btn btn-success">بازگشت</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="p-15 col-md-6 col-sx-12">
</div>
<br>
<br>
<br>
<br>