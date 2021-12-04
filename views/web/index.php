<?php
/**
 * Created by PhpStorm.
 * User: mani
 * Date: 01/15/2019
 * Time: 04:06 PM
 */

$last_news = $data["last_news"];
$site_about = $data["site_about"];
$get_slider = $data["get_slider"];
$clients = $data["clients"];
$get_services = $data["get_services"];
$team_gallery = $data["team_gallery"];
$last_blog = $data["last_blog"];
$new_products = $data["new_products"];
//$site_idea = $data["site_idea"];
//print_r($get_services);
//echo password_hash("0406", PASSWORD_BCRYPT, array('cost' => 12));

?>

<style>
    .swiper-pagination-bullet {
        background-color: #b2b2b2;
    }

    .swiper-pagination-bullet-active {
        background-color: #ffe309;
    }

    @media (min-width: 1050px) {
        .section-variant-2 {
            padding: 30px 0 140px !important;
        }
    }

</style>


<!-- Swiper-->
<section class="section swiper-container swiper-slider swiper-slider_height-4" data-loop="true" data-autoplay="5500"
         data-simulate-touch="false" data-slide-effect="fade">
    <div class="swiper-wrapper bg-gray-darker">
        <?php foreach ($get_slider as $key => $slide) {
            $checked = "";
            if ($key == 0) {
                $checked = "checked";
            }
            ?>
            <div class="swiper-slide" data-slide-bg="<?= SITE_URL ?>public/images/gallery/<?= $slide["img_name"] ?>">
                <div class="swiper-slide-caption">
                    <div class="section-lg">
                        <div class="container container-bigger">
                            <div class="row row-ten">
                                <div class="col-md-10 col-xl-5">
                                    <h3><?= $slide["title"] ?></h3>
                                    <p class="big"> <?= $slide["text"] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- Swiper controls-->
    <div class="swiper-pagination-wrap container container-bigger">
        <div class="swiper-pagination"></div>
    </div>
</section>


<!--services-->
<section class="section section-md bg-gray-darker text-center">
    <div class="container container-wide">
        <h3>خدمات ما</h3>
        <div class="row row-50 justify-content-sm-center">
            <?php foreach ($get_services as $service) { ?>
                <div class="col-sm-10 col-md-6 col-lg-3">
                    <div class="counter-wrap">
                        <div class="heading-3">
                            <a href="<?= SITE_URL ?>single/index/<?= $service['id'] ?>">
                                <span data-step="300"> <?= $service["title"] ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<!-- shop -->
<section class="section section-variant-1 bg-accent-accent section-way-point" id="shop">
    <div class="way-point" data-custom-scroll-to="#shop">
        <svg version="1.1" x="0px" y="0px" width="253px" height="38px" enable-background="new 0 0 253 38"
             xml:space="preserve">
            <path style="clip-path: url('#gel')" fill-rule="evenodd" clip-rule="evenodd"
                  d="M252,36.001C199.397,36.001,176,0,125.815,0                                       C76,0,52.988,36.001,0,36.001C4.336,40.465,273.563,36.001,252,36.001z"></path>
          </svg>
        <span class="icon mdi mdi-chevron-down"></span>
    </div>
    <div class="container container-wide">
        <div class="row justify-content-xl-end row-30">
            <div class="col-xl-8">
                <div class="parallax-text-wrap">
                    <h3>فروشگاه ما</h3>
                </div>
                <hr class="divider divider-default">
            </div>
            <div class="col-xl-3 text-xl-right"><a class="button button-default-outline button-nina"
                                                   href="<?= SITE_URL ?>ecomm"><span
                            style="transition: opacity 0.22s ease 0.27s, transform 0.22s ease 0.27s, color 0.22s ease 0s;">همه محصولات فروشگاه</span><span
                            class="button-original-content">همه محصولات فروشگاه</span></a></div>
        </div>
        <div class="row row-30 row-xxl">
            <?php foreach ($new_products as $product) { ?>
                <div class="col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                    <div class="product">
                        <div class="product-image"><a href="<?= SITE_URL ?>ecomm/product/<?= $product['id'] ?>">
                                <img src="<?= SITE_URL ?>public/product/<?= $product['id'] ?>/gallery/s/<?= $product['image'] ?>"
                                     alt="<?= $product['name'] ?>" style="height: 250px;"></a></div>
                        <div class="product-title">
                            <h4><a href="<?= SITE_URL ?>ecomm/product/<?= $product['id'] ?>"><?= $product['name'] ?></a>
                            </h4>
                        </div>
                        <div class="product-price">
                            <?php if ($product['price'] > 0) { ?>
                                <h4><span><?= $product['price'] ?></span><span>تومان</span></h4>
                            <?php } else { ?>
                                <h4><span>رایگان</span></h4>
                            <?php } ?>
                        </div>
                        <div class="product-button">
                            <a class="button button-secondary button-nina" href="javascript:void(0)"
                               onclick="add_basket(this,<?= $product['id'] ?>)"><span
                                        style="transition: opacity 0.22s ease 0.27s, transform 0.22s ease 0.27s, color 0.22s ease 0s;">افزودن به سبد خرید</span><span
                                        class="button-original-content">افزودن به سبد خرید</span></a></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<!-- blog-->
<?php if (!empty($last_blog)) { ?>

    <section class="section section-variant-2 bg-default text-center">
        <div class="container-wide">
            <h3>مقالات</h3>
            <div class="divider divider-default"></div>
            <div class="row row-50 offset-custom-2">
                <?php foreach ($last_blog as $new) { ?>
                    <div class="col-md-6 col-xl-4">
                        <article class="event-default-wrap">
                            <div class="event-default">
                                <figure class="event-default-image">
                                    <img src="<?= SITE_URL ?>public/posts/<?= $new['id'] . '/s_' . $new['img_name'] ?>"
                                         alt="<?= ALT ?>" style="width: 100%;height: 250px!important;"/>
                                </figure>
                                <div class="event-default-date-wrap">
                                    <time datetime="2019"><span
                                                class="event-default-date"><?= $new['new_date'] ?></span>
                                        <span class="event-default-month"> </span>
                                    </time>
                                </div>
                                <div class="event-default-caption"><a
                                            class="button button-xs button-secondary button-nina"
                                            href="<?= SITE_URL ?>single/index/<?= $new['id'] ?>" target="_blank"><span
                                                style="transition: opacity 0.22s ease 0.27s, transform 0.22s ease 0.27s, color 0.22s ease 0s;">مشاهده</span><span
                                                class="button-original-content">مشاهده</span></a></a></div>
                            </div>
                            <div class="event-default-inner">
                                <h5><a class="event-default-title" target="_blank"
                                       href="<?= SITE_URL ?>single/index/<?= $new['id'] ?>"><?= $new['title'] ?></a>
                                </h5>
                            </div>
                        </article>
                    </div>
                <?php } ?>
            </div>
            <a class="button button-secondary button-nina" href="<?= SITE_URL ?>blog"><span
                        style="transition: opacity 0.22s ease 0.27s, transform 0.22s ease 0.27s, color 0.22s ease 0s;">مشاهده همه</span><span
                        class="button-original-content">مشاهده همه</span></a>
        </div>
    </section>
<?php } ?>


<!-- our story-->
<?php if (!empty($site_about)) { ?>
    <section class="section section-lg bg-gray-lighter">
        <div class="container container-bigger">
            <div class="row row-ten row-50 justify-content-md-center align-items-lg-center justify-content-xl-between">
                <div class="col-md-9 col-lg-5 col-xxl-4">
                    <h3>داستان ما</h3>
                    <div class="divider divider-default"></div>
                    <p class="heading-5"><?= $site_about['contect'] ?></p>
                    <a class="button button-secondary button-nina" href="<?= SITE_URL ?>about"><span
                                style="transition: opacity 0.22s ease 0.27s, transform 0.22s ease 0.27s, color 0.22s ease 0s;">بیشتر بدانید</span><span
                                class="button-original-content">بیشتر بدانید</span></a>

                </div>
                <div class="col-md-9 col-lg-5">
                    <img src="<?= SITE_URL ?>public/posts/<?= $site_about['id'] . '/' . $site_about['img_name'] ?>"
                         alt="" width="720"
                         height="459"/>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<!-- meet our people-->

<!-- call -->
<section class="section section-md bg-gradient-1 text-center text-md-right">
    <div class="container-wide">
        <div class="row row-50 justify-content-sm-center">
            <div class="col-xxl-8">
                <div class="box-cta box-cta-inline">
                    <div class="box-cta-inner">
                        <h3 class="box-cta-title">آیا به مشاوره نیاز دارید؟</h3>
                        <h4>شما می تواند از مزایای مشاوره رایگان ، بهره مند شوید.</h4>
                    </div>
                    <div class="box-cta-inner"><a class="button button-secondary button-nina"
                                                  href="<?= SITE_URL ?>contact"><span
                                    style="transition: opacity 0.22s ease 0.27s, transform 0.22s ease 0.27s, color 0.22s ease 0s;">دریافت مشاوره</span><span
                                    class="button-original-content">  دریافت مشاوره</span></a></div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>

    function set_like(item, product_id, param) {
        var url = "<?= SITE_URL ?>ecomm/set_like";
        var data = {"product_id": product_id, "param": param};
        var item_old_class = $(item).find("span").attr("class");
        $(item).find("span").removeClass();
        $(item).find("span").addClass("fa fa-spinner");
        $.post(url, data, function (msg) {
            if (msg == true) {
            } else if (msg == "login") {
                swal("", "لطفا وارد حساب کاربری شوید", "warning");
            } else if (msg == "was") {
                swal("", "قبلا رای شما افزوده شده ", "warning");
            } else {
                swal(" ", "مشکل در ثبت", "danger");
            }
            $(item).find("span").removeClass();
            $(item).find("span").addClass(item_old_class);
        })
    }

    function add_favorit(item, product_id) {
        var url = "<?= SITE_URL ?>ecomm/add_favorit";
        var data = {"product_id": product_id};
        var item_old_class = $(item).find("span").attr("class");
        $(item).find("span").removeClass();
        $(item).find("span").addClass("fa fa-spinner");
        $.post(url, data, function (msg) {
            if (msg == true) {
                ////
            } else if (msg == "login") {
                swal(" ", "لطفا وارد حساب کاربری شوید ", "warning");
            } else if (msg == "was") {
                swal(" ", "قبلا به لیست مورد علاقه افزوده شده ", "warning");
            } else {
                swal(" ", "مشکل در ثبت", "danger");
            }
            $(item).find("span").removeClass();
            $(item).find("span").addClass(item_old_class);
        })
    }

    function add_basket(item, product_id) {
        var url = "<?= SITE_URL ?>ecomm/add_basket";
        var data = {"product_id": product_id};
        var item_old_class = $(item).find("span").attr("class");
//        $(item).find("span").removeClass();
//        $(item).find("span").addClass("fa fa-spin fa-spinner");
        $.post(url, data, function (msg) {
            if (msg == true) {
                swal({
                    text: "",
                    title: "ثبت شد",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "اتمام خرید و پرداخت",
                    cancelButtonText: "ادامه خرید",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        window.location = "<?= SITE_URL ?>ecomm/basket";
                    }
                });
            } else if (msg == "login") {
                // swal("", "لطفا وارد حساب کاربری شوید", "warning");
                window.location = "<?= SITE_URL ?>users/user_login"
            } else if (msg == "was") {
                // swal("", "قبلا به لیست مورد علاقه افزوده شده ", "warning");
            } else {
                swal(" ", "مشکل در ثبت", "danger");
            }
//            $(item).find("span").removeClass();
//            $(item).find("span").addClass(item_old_class);
        })
    }

</script>