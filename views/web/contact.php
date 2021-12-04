<?php
$contact = $site_options;
?>
<!--<link href="--><? //= SITE_URL ?><!--public/admin/assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->


<style>

    .form-input {
        border: 1px solid silver;
    }

    h1, h2, h3, h4, h6, .faq-box h4, .site-title, .mobile-site-title, label {
        font-family: 'aviny', sans-serif !important;
    }

    label {
        font-size: 18px !important;
    }

    .alert h3 {
        font-size: 22px;
    }

    .alert.alert-success {
        background-color: #6fffab;
    }

    .alert.alert-danger {
        background-color: #ff89a4;
    }

</style>

<!-- Contact information-->
<section class="section section-lg bg-default">

    <!-- section wave-->
    <div class="section-wave">
        <svg x="0px" y="0px" width="1920px" height="46px" viewbox="0 0 1920 46" preserveAspectRatio="none">
            <path d="M1920,0.5c-82.8,0-109.1,44-192.3,44c-78.8,0-116.2-44-191.7-44c-77.1,0-115.9,44-192,44c-78.2,0-114.6-44-192-44c-78.4,0-115.3,44-192,44c-76.9-0.1-119-44-192-44c-77,0-115.2,44-192,44c-73.6,0-114-44-190.9-44c-78.5,0-117.2,44-194.1,44c-75.9,0-113-44-191-44V46h1920V0.5z"></path>
        </svg>
    </div>
    <div class="container container-bigger">
        <?php
        if (isset($_SESSION["send_message"])) {
            ?>
            <div class="alert alert-<?= $_SESSION["send_message"][0] ?> alert-dismissable text-center">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×
                </button>
                <h3><a class="alert-link"><?= $_SESSION["send_message"][1] ?></a></h3>
            </div>
        <?php }
        unset($_SESSION["send_message"]) ?>
        <div class="row row-ten row-50 justify-content-md-center justify-content-xl-between">
            <div class="col-md-9 col-lg-6">
                <h3>تماس با ما</h3>
                <hr class="divider divider-left divider-default">

                <!-- RD Mailform-->
                <form method="post" action="<?= SITE_URL ?>contact/save_conmment">
                    <div class="row row-20">
                        <div class="col-md-6">
                            <div class="form-wrap form-wrap-validation">
                                <label class="form-label-outside" for="form-1-name">نام</label>
                                <input class="form-input" id="form-1-name" type="text" name="name"
                                       data-constraints="@Required"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-wrap form-wrap-validation">
                                <label class="form-label-outside" for="form-1-email">ایمیل</label>
                                <input class="form-input" id="form-1-email" type="email" name="email"
                                       data-constraints="@Email @Required"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-wrap form-wrap-validation">
                                <label class="form-label-outside" for="form-1-phone">تلفن</label>
                                <input class="form-input" id="form-1-phone" type="text" name="phone"
                                       data-constraints="@Numeric @Required"/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-wrap form-wrap-validation">
                                <label class="form-label-outside" for="form-1-message">پیام</label>
                                <textarea class="form-input" id="form-1-message" name="comment"
                                          data-constraints="@Required"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 offset-custom-4">
                            <div class="form-button">
                                <input class="button button-secondary button-nina" type="submit" value="ارسال پیام">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-9 col-lg-4 col-xl-3">
                <div class="column-aside">
                    <div class="row">
                        <div class="col-sm-10 col-md-6 col-lg-12">
                            <h6>آدرس</h6>
                            <hr class="divider-thin">
                            <article class="box-inline"><span
                                        class="icon icon-md-smaller icon-primary mdi mdi-map-marker"></span><span><a
                                            href="javascript:void(0)"><?= $contact["address"] ?></a></span></article>
                        </div>
                        <div class="col-sm-10 col-md-6 col-lg-12">
                            <h6>تلفن</h6>
                            <hr class="divider-thin">
                            <article class="box-inline"><span
                                        class="icon icon-md-smaller icon-primary mdi mdi-phone"></span>
                                <ul class="list-comma">
                                    <li><a href="tel:#"><?= $contact["phone"] ?></a></li>
                                    <li><a href="tel:#"><?= $contact["mobile"] ?></a></li>
                                </ul>
                            </article>
                        </div>
                        <div class="col-sm-10 col-md-6 col-lg-12">
                            <h6>ایمیل</h6>
                            <hr class="divider-thin">
                            <article class="box-inline"><span
                                        class="icon icon-md-smaller icon-primary mdi mdi-email-open"></span><span><a
                                            href="mailto:<?= $contact["email"] ?>"><span class="__cf_email__"
                                                                                         data-cfemail="472a262e2b0723222a282b2e292c69283520"><?= $contact["email"] ?></span></a></span>
                            </article>
                        </div>
                        <!--                            <div class="col-sm-10 col-md-6 col-lg-12">-->
                        <!--                                <h6>ساعات کار</h6>-->
                        <!--                                <hr class="divider-thin">-->
                        <!--                                <article class="box-inline"><span-->
                        <!--                                            class="icon icon-md-smaller icon-primary mdi mdi-calendar-clock"></span>-->
                        <!--                                    <ul class="list-0">-->
                        <!--                                        <li>یکشنبه: 9:00 am–6:00 pm</li>-->
                        <!--                                        <li>سه شنبه: 9:00 am–6:00 pm</li>-->
                        <!--                                        <li>جمعه: 11:00 am–4:00 pm</li>-->
                        <!--                                    </ul>-->
                        <!--                                </article>-->
                        <!--                            </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--<section class="section">-->
<!--    <div class="google-map-container" data-center="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-zoom="5"-->
<!--         data-icon="images/gmap_marker.png" data-icon-active="images/gmap_marker_active.html">-->
<!--        <div class="google-map"></div>-->
<!--        <ul class="google-map-markers">-->
<!--            <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45."-->
<!--                data-description="9870 St Vincent Place, Glasgow"></li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</section>-->
