<?php
$product_info = $data["product_info"];
$product_message = $data["product_message"];
$product_id = $data["product_id"];
$product_gallery = $data["product_gallery"];
$product_attr = $data["product_attr"];
$more_products = $data["more_products"];
//print_r($product_info);

?>

<style>
    .intro * {
        font-size: 18px !important;
        font-family: "B Koodak" !important;
    }
</style>
<!-- Product Page-->
<section class="section section-lg bg-default">
    <!-- section wave-->
    <div class="section-wave">
        <svg x="0px" y="0px" width="1920px" height="46px" viewbox="0 0 1920 46" preserveAspectRatio="none">
            <path d="M1920,0.5c-82.8,0-109.1,44-192.3,44c-78.8,0-116.2-44-191.7-44c-77.1,0-115.9,44-192,44c-78.2,0-114.6-44-192-44c-78.4,0-115.3,44-192,44c-76.9-0.1-119-44-192-44c-77,0-115.2,44-192,44c-73.6,0-114-44-190.9-44c-78.5,0-117.2,44-194.1,44c-75.9,0-113-44-191-44V46h1920V0.5z"></path>
        </svg>
    </div>
    <div class="container container-bigger product-single">
        <div class="row row-ten justify-content-sm-center justify-content-lg-between row-30 align-items-lg-center">
            <div class="col-lg-4 col-xl-5 col-xxl-4">
                <div class="product-single-preview">
                    <div class="unit flex-md-row align-items-md-center unit-spacing-md-midle unit--inverse unit-sm">
                        <div class="unit-body">
                            <ul class="product-thumbnails">
                                <?php foreach ($product_gallery as $key => $product_img) {
                                    $active = '';
                                    if ($key == 0) {
                                        $active = "active";
                                    }
                                    ?>
                                    <li class="<?= $active ?>"
                                        data-large-image="<?= SITE_URL ?>public/product/<?= $product_img['product_id'] ?>/gallery/l/<?= $product_img['img_name'] ?>">
                                        <img src="<?= SITE_URL ?>public/product/<?= $product_img['product_id'] ?>/gallery/s/<?= $product_img['img_name'] ?>"
                                             alt="<?= $product_info['name'] ?>">
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="unit-right product-single-image">
                            <div class="product-single-image-element">
                                <img class="product-image-area animateImageIn"
                                     src="<?= SITE_URL ?>public/product/<?= $product_info['id'] ?>/gallery/l/<?= $product_info['image'] ?>"
                                     alt="<?= $product_info['name'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-5 col-xxl-5 text-center text-lg-left">
                <h3><?= $product_info['name'] ?></h3>
                <div class="heading-5" style="font-family: 'B Koodak'"><?= $product_info['summary'] ?></div>
                <div class="divider divider-default"></div>
                <div class="intro">
                    <?= $product_info['introduction'] ?>
                </div>

                <ul class="inline-list">
                    <li class="text-middle">
                        <?php if ($product_info['price'] > 0) { ?>
                            <h4><span><?= $product_info['price'] ?></span><span>تومان</span></h4>
                        <?php } else { ?>
                            <h4><span>رایگان</span></h4>
                        <?php } ?>
                    </li>
                    <br>
                    <li class="text-middle"><a class="button button-sm button-secondary button-nina"
                                               href="javascript:void(0)"
                                               onclick="add_basket(this,<?= $product_info['id'] ?>)"><span
                                    style="transition: opacity 0.22s ease 0.27s, transform 0.22s ease 0.27s, color 0.22s ease 0s;">افزودن به سبد خرید</span><span
                                    class="button-original-content">افزودن به سبد خرید</span></a></li>
                    <li class="text-middle"><a class="button button-sm button-default-outline button-nina"
                                               href="javascript:void(0)" style="background-color: #58c1ff"
                                               onclick="add_favorit(this,<?= $product_info['id'] ?>)"><span
                                    style="transition: opacity 0.22s ease 0.27s, transform 0.22s ease 0.27s, color 0.22s ease 0s;">افزودن به علاقمندی ها</span><span
                                    class="button-original-content">افزودن به علاقمندی ها</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Similar products-->
<section class="section section-lg bg-gray-lighter text-center">
    <div class="container container-wide">
        <h3>محصولات مشابه</h3>
        <div class="divider divider-default"></div>
        <div class="row row-30">
            <?php foreach ($more_products as $more_product) { ?>
                <div class="col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                    <div class="product">
                        <div class="product-image"><a>
                                <img src="<?= SITE_URL ?>public/product/<?= $more_product["id"] ?>/gallery/l/<?= $more_product["image"] ?>"
                                     alt="<?= $more_product['seo'] ?>"
                                     height="246"/></a></div>
                        <div class="product-title">
                            <h4>
                                <a href="<?= SITE_URL ?>ecomm/product/<?= $more_product['id'] ?>"><?= $more_product['name'] ?></a>
                            </h4>
                        </div>
                        <div class="product-price">
                            <?php if ($more_product['price'] > 0) { ?>
                                <h4><span><?= $more_product['price'] ?></span><span>تومان</span></h4>
                            <?php } else { ?>
                                <h4><span>رایگان</span></h4>
                            <?php } ?>
                        </div>
                        <div class="product-button"><a class="button button-secondary button-nina"
                                                       onclick="add_basket(this,<?= $product_info['id'] ?>)"
                                                       href="javascript:void(0)"><span
                                        style="transition: opacity 0.22s ease 0.27s, transform 0.22s ease 0.27s, color 0.22s ease 0s;">افزودن به سبد خرید</span><span
                                        class="button-original-content">افزودن به سبد خرید</span></a></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<script>

    $("span.close").click(function () {
        $(this).parents("h3.alert").fadeOut()
    });


    function add_favorit(item, product_id) {
        var url = "<?= SITE_URL ?>ecomm/add_favorit";
        var data = {"product_id": product_id};
        var item_old_class = $(item).find("span").attr("class");
//        $(item).find("span").removeClass();
//        $(item).find("span").addClass("fa fa-spin fa-spinner");
        $.post(url, data, function (msg) {
            if (msg == true) {
                swal("", " به لیست مورد علاقه افزوده شد ", "success");
            } else if (msg == "login") {
                swal("", "لطفا وارد حساب کاربری شوید", "warning");
            } else if (msg == "was") {
                swal("", "قبلا به لیست مورد علاقه افزوده شده ", "warning");
            } else {
                swal(" ", "مشکل در ثبت", "danger");
            }
//            $(item).find("span").removeClass();
//            $(item).find("span").addClass(item_old_class);
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

    seen_product(<?= $product_id ?>);

    function seen_product(product_id) {
        var url = "<?= SITE_URL ?>ecomm/seen_product";
        var data = {'product_id': product_id};
        $.post(url, data, function (msg) {
        })
    }

</script>


