<?php
$products = $data["products"];
$ecomm_category = $data["ecomm_category"];
?>
<style>
    .li_style::before {
        content: '' !important;
    }
</style>


<!-- product catalog-->
<section class="section section-lg bg-gray-lighter text-center">
    <!-- section wave-->
    <div class="section-wave">
        <svg x="0px" y="0px" width="1920px" height="46px" viewbox="0 0 1920 46" preserveAspectRatio="none">
            <path d="M1920,0.5c-82.8,0-109.1,44-192.3,44c-78.8,0-116.2-44-191.7-44c-77.1,0-115.9,44-192,44c-78.2,0-114.6-44-192-44c-78.4,0-115.3,44-192,44c-76.9-0.1-119-44-192-44c-77,0-115.2,44-192,44c-73.6,0-114-44-190.9-44c-78.5,0-117.2,44-194.1,44c-75.9,0-113-44-191-44V46h1920V0.5z"></path>
        </svg>
    </div>
    <div class="container container-wide">
        <h3> محصولات </h3>
        <div class="divider divider-default"></div>
        <div class="row row-md row-shop">
            <!-- Shop Sidebar-->
            <div class="col-xl-3 shop-aside text-left">
                <div class="shop-aside-item">
                    <h3 style="font-size: 28px">دسته بندی ها</h3>
                    <ul class="list-marked list-marked-secondary" style="padding: 0!important;">
                        <?php foreach ($ecomm_category as $category) {
                            if (!empty($category['inner_menu'])) {
                                ?>
                                <li class="li_style"><h4 style="font-size: 22px;"><?= $category['title'] ?></h4>
                                    <ul class="list-marked list-marked-secondary"
                                        style="padding: 0!important; ">
                                        <?php foreach ($category['inner_menu'] as $inner_manu) { ?>
                                            <li>
                                                <a href="<?= SITE_URL ?>ecomm/index/<?= $inner_manu['id'] ?>"><?= $inner_manu['title'] ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                </div>
            </div>

            <style>

                .item_box{
                    box-shadow: 1px 1px 3px #9e9c9c;
                }

            </style>
            <div class="col-xl-9">
                <div class="row row-70 text-left">
                    <?php
                    if (!empty($products)) {
                        foreach ($products as $product) { ?>
                            <div class="col-md-6 col-lg-4 item_box" >
                                <figure class="block-with-details book-info">
                                    <div class="perspective"><img
                                                src="<?= SITE_URL ?>public/product/<?= $product["id"] ?>/gallery/l/<?= $product["image"] ?>"
                                                alt="<?= $product["seo"] ?>" style="width: auto;height: 210px;"></div>
                                    <div class="figcaption">
                                        <h5 class="book-title"><a
                                                    href="<?= SITE_URL ?>ecomm/product/<?= $product['id'] ?>"><?= $product["name"] ?></a>
                                        </h5>
                                        <div class="book-price">
                                            <?php if ($product['price'] > 0) { ?>
                                                <h4><span><?= $product['price'] ?></span><span>تومان</span></h4>
                                            <?php } else { ?>
                                                <h4><span>رایگان</span></h4>
                                            <?php } ?>
                                        </div>
                                        <div class="book-button">
                                            <a class="button button-sm button-secondary button-nina"
                                               href="javascript:void(0)"
                                               onclick="add_basket(this,<?= $product["id"] ?>)"><span
                                                        style="transition: opacity 0.22s ease 0.27s, transform 0.22s ease 0.27s, color 0.22s ease 0s;">افزودن به سبد خرید</span><span
                                                        class="button-original-content">افزودن به سبد خرید</span></a>
                                        </div>
                                        <a href="<?= SITE_URL ?>ecomm/product/<?= $product['id'] ?>">
                                            <div class="show-details">دیدن جزئیات</div>
                                        </a>
                                    </div>
                                    <span class="close-details"></span>
                                </figure>
                            </div>
                        <?php }
                    } else { ?>
                        <h4> هیچ محصولی پیدا نشد ...</h4>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
</section>


<script>

    $(".item_box").hover(function () {
        $(this).css({"box-shadow":"0 0 35px #9e9c9c"});
    },function () {
        $(this).css({"box-shadow":"1px 1px 3px #9e9c9c"});

    });

    function set_like(item, product_id, param) {
        var url = "<?= SITE_URL ?>ecomm/set_like";
        var data = {"product_id": product_id, "param": param};
        var item_old_class = $(item).find("span").attr("class");
//        $(item).find("span").removeClass();
//        $(item).find("span").addClass("fa fa-spinner");
        $.post(url, data, function (msg) {
            if (msg == true) {
            } else if (msg == "login") {
                swal("", "لطفا وارد حساب کاربری شوید", "warning");
            } else if (msg == "was") {
                swal("", "قبلا رای شما افزوده شده ", "warning");
            } else {
                swal(" ", "مشکل در ثبت", "danger");
            }
//            $(item).find("span").removeClass();
//            $(item).find("span").addClass(item_old_class);
        })
    }

    function add_favorit(item, product_id) {
        var url = "<?= SITE_URL ?>ecomm/add_favorit";
        var data = {"product_id": product_id};
        var item_old_class = $(item).find("span").attr("class");
//        $(item).find("span").removeClass();
//        $(item).find("span").addClass("fa fa-spinner");
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

</script>
