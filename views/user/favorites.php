<style>

    .search_row {
        border: 1px solid silver;
        border-radius: 4px;
    }

    .thumb {
        border-radius: 5px;
        border: 1px solid silver;
        position: relative;
    }

    .mobiles {
        display: inline-block;
    }

    .price-tag {
        position: absolute;
        bottom: 10px;
        left: 10px;
    }

    .like_items button {
        box-shadow: 1px 1px 3px silver;
    }

    .like_items {
        position: relative;
        float: left;
        width: 100%;
        text-align: left;
    }

    img.thumb-img {
        max-width: 100%;
        width: auto !important;
        height: 200px !important;
    }

    select#search1 option:nth-child(1) {
        font-weight: bold;
        background-color: #cfceca
    }

    select#search1 option:nth-child(2) {
        font-weight: bold;
    }

    .search_parent2 {
        position: relative;
    }

    .search_parent2 span {
        font-weight: bold;
        line-height: 40px
    }

    .list-inline {
        direction: ltr;
        font: right:;
        text-align: right;
    }

    .right {
        float: right;
    }

    .unfavorite i:after {
        content: '';
        width: 130%;
        height: 2px;
        background-color: #919191;
        position: relative;
        top: -9px;
        float: left;
        -webkit-transform: rotate(135deg);
        transform: rotate(135deg);
    }


</style>

<!-- Forms -->
<div style="margin-top: 50px"></div>
<div class="row">
    <div class="col-sm-12 col-xs-12 col-md-8 col-md-push-3  ">
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-t-0 header-title pull-left"><b> محصولات مورد علاقه</b></h4>
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
    <div class="col-sm-12   col-xs-12   col-md-8 col-md-push-3 ">
        <div class="card-box">
            <div class="table-responsive">

                <!-- ============================================================== -->
                <!-- Start right Content here -->
                <!-- ============================================================== -->
                <?php if ($data['favorites']) { ?>
                    <div class="container">
                        <div class="row">
                            <div class="m-b-15 products_item">
                                <?php foreach ($data['favorites'] as $product) { ?>
                                    <div class="col-xs-12 col-sm-6 col-lg-4 col-md-6 mobiles">
                                        <div class="product-list-box thumb">
                                            <a href="javascript:void(0);" class="image-popup" title="Screenshot-1">
                                                <img src="<?= SITE_URL ?>public\product\<?= $product['id'] ?>\gallery\l\<?= $product['image'] ?>"
                                                     class="thumb-img" alt="bambo web">
                                            </a>
                                            <div class="like_items">
                                                <a href="<?= SITE_URL ?>users/product/<?= $product['id'] ?>">
                                                    <button type="button" class="btn btn-info right"
                                                            data-toggle="tooltip" data-placement="bottom"
                                                            data-original-title="مشاهده محصول">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </a>

                                                <button type="button" class="btn btn-danger"
                                                        onclick="add_basket(this, <?= $product['id'] ?>) "
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        data-original-title="  افزودن به سبد خرید">
                                                    <i class="fa fa-shopping-cart"></i></button>

                                                <button type="button" class="btn btn-pink unfavorite"
                                                        data-toggle="tooltip" data-placement="bottom" title=""
                                                        data-original-title="حذف از مورد علاقه"
                                                        onclick="remove_favorit(this, <?= $product['id'] ?>) ">
                                                    <i class="fa fa-heart-o"></i></button>
                                                <button type="button" class="btn btn-success"
                                                        onclick="set_like(this, <?= $product['id'] ?>, 'like')"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        data-original-title="می پسندم">
                                                    <i class="fa  fa-thumbs-o-up"></i></button>

                                                <button type="button" class="btn btn-danger"
                                                        onclick="set_like(this, <?= $product['id'] ?>, 'dislike')"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        data-original-title="نمی پسندم">
                                                    <i class="fa  fa-thumbs-o-down"></i></button>

                                            </div>
                                            <div class="price-tag"><span><?= $product['pro_count'] ?></span> عدد</div>
                                            <div class="detail">
                                                <h4 class="m-t-0">
                                                    <a href="<?= SITE_URL ?>users/product/<?= $product['id'] ?>"
                                                       class="text-dark">
                                                        <?= $product['name'] ?></a></h4>
                                                <div class="rating">
                                                    <ul class="list-inline">
                                                        <?php
                                                        if ($product['likes'] > 0) {
                                                            $all_likes = $product['likes'] + $product["dislikes"];
                                                            $like_stars = ((($product['likes'] * 100) / $all_likes) / 10) / 2;
                                                            $empty_stars = 5 - $like_stars;
                                                            $like_stars = floor($like_stars);
                                                            $empty_stars = floor($empty_stars);
                                                            $half_star = 5 - ($like_stars + $empty_stars);

                                                            for ($i = 1; $i <= $like_stars; $i++) { ?>
                                                                <li><a class="fa fa-star"></a></li>
                                                            <?php }
                                                            if ($half_star >= 1) {
                                                                for ($i = 1; $i <= $half_star; $i++) { ?>
                                                                    <li><a class="fa fa-star-half-o"></a></li>
                                                                <?php }
                                                            }
                                                            if ($empty_stars >= 1) {
                                                                for ($i = 1; $i <= $empty_stars; $i++) { ?>
                                                                    <li><a class="fa fa-star-o"></a></li>
                                                                <?php }
                                                            }
                                                            ?>
                                                        <?php } else { ?>
                                                            <li><a class="fa fa-star-o"></a></li>
                                                            <li><a class="fa fa-star-o"></a></li>
                                                            <li><a class="fa fa-star-o"></a></li>
                                                            <li><a class="fa fa-star-o"></a></li>
                                                            <li><a class="fa fa-star-o"></a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                                <h5 class="m-0">
                                                    <span class="text-muted"> قیمت :<span><?= $product['price'] ?></span> تومان</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div> <!-- End row -->
                    </div> <!-- container -->
                <?php } else { ?>
                    <div class="alert alert-danger alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <a class="alert-link">هیچ محصولی یافت نشد!</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<div class="full_black_cover"></div>
<div style="margin: 50px 0"></div>

<?php
unset($_SESSION["add_class_user_id"]);
unset($_SESSION["updated_class_id"]) ?>

<script>

    function set_like(item, product_id, param) {
        var url = "<?= SITE_URL ?>users/set_like";
        var data = {
            "product_id": product_id, "param": param
        };
        var item_old_class = $(item).find("i").attr("class");
        $(item).find("i").removeClass();
        $(item).find("i").addClass("fa fa-spin fa-spinner");
        $.post(url, data, function (msg) {
            if (msg == true) {
                swal("ثبت شد", "", "success");
            } else if (msg == "login") {
                swal("", "لطفا وارد حساب کاربری شوید", "warning");
            } else if (msg == "was") {
                swal("", "قبلا رای شما افزوده شده ", "warning");
            } else {
                swal(" ", "مشکل در ثبت", "danger");
            }
            $(item).find("i").removeClass();
            $(item).find("i").addClass(item_old_class);
        })
    }

    function remove_favorit(item, product_id) {
        var
            url = "<?= SITE_URL ?>users/remove_favorite";
        var
            data = {
                "product_id": product_id
            };
        var item_old_class = $(item).find("i").attr("class");
        $(item).find("i").removeClass();
        $(item).find("i").addClass("fa fa-spin fa-spinner");
        $.post(url, data, function (msg) {
            if (msg == true) {
                swal("از لیست مورد علاقه حذف شد", "", "success");
            } else if (msg == "login") {
                swal("", "لطفا وارد حساب کاربری شوید", "warning");
            } else if (msg == "was") {
                swal("", "قبلا از لیست مورد علاقه حذف شده ", "warning");
            } else {
                swal(" ", "مشکل در ثبت", "danger");
            }
            $(item).find("i").removeClass();
            $(item).find("i").addClass(item_old_class);
        })
    }

    function add_basket(item, product_id) {
        var url = "<?= SITE_URL ?>users/add_basket";
        var data = {"product_id": product_id};
        var item_old_class = $(item).find("i").attr("class");
        $(item).find("i").removeClass();
        $(item).find("i").addClass("fa fa-spin fa-spinner");
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
                        window.location = "<?= SITE_URL ?>users/basket";
                    }
                });
            } else if (msg == "login") {
                // swal("", "لطفا وارد حساب کاربری شوید", "warning");
                window.location = "<?= SITE_URL ?>users/user_login"
            } else if (msg == "was") {
                // swal("", "قبلا به لیست  افزوده شده ", "warning");
            } else {
                swal(" ", "مشکل در ثبت", "danger");
            }
            $(item).find("i").removeClass();
            $(item).find("i").addClass(item_old_class);
        })
    }

</script>
