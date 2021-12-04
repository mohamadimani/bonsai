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
        width: 100%;
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

    img.product_img {
        max-width: 100%;
        max-height: 100%;
    }

    img.product_gallery_img {
        max-width: 100% !important;
        height: 60px;
    }

    a.product_gallery_img {
        width: 28%;
        max-height: 100px !important;
        float: left;
        margin: 5% 5% 0 0;
        cursor: pointer;
        text-align: center;
    }

    .sp-loading {
        text-align: center;
        height: 200px;
    }

    .sp-wrap {
        width: 100%;
        float: right;
        margin: 1px 0 20px;
    }

    .m-l-10 {
        margin-right: 0 !important;
    }
</style>
<!-- Forms -->
<div style="margin-top: 50px"></div>
<div class="row">
    <div class="col-sm-8 col-xs-12 col-md-push-3  ">
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-t-0 header-title pull-left"><b>مشخصات محصول </b></h4>
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
    <div class="col-sm-8 col-sm-push-3 col-xs-12 col-md-push-3 ">
        <div class="card-box">
            <div class="table-responsive">
                <!-- ============================================================== -->
                <!-- Start right Content here -->
                <!-- ============================================================== -->
                <?php if ($data['product']) {
                    $product = $data['product'];
                    ?>
                    <div class="container">
                        <div class="m-b-15 products_item">
                            <!-- Start content -->
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="card-box product-detail-box">
                                        <div class="col-sm-4 product_slider">
                                            <div class="sp-loading">
                                                <img src="<?= SITE_URL ?>public/product/<?= $product['id'] ?>/gallery/l/<?= $product['image'] ?>"
                                                     alt="bambo web" class="product_img">
                                                <br>
                                            </div>
                                            <div class="sp-wrap">
                                                <?php foreach ($data['product_gallery'] as $image) { ?>
                                                    <a onclick="show_img_gallery(this)" class="product_gallery_img">
                                                        <img src="<?= SITE_URL ?>public/product/<?= $image['product_id'] ?>/gallery/s/<?= $image['img_name'] ?>"
                                                             alt="bambo web" class="product_gallery_img"
                                                             data-img_url="<?= SITE_URL ?>public/product/<?= $image['product_id'] ?>/gallery/l/<?= $image['img_name'] ?>">
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="product-right-info">
                                                <h3><b>  <?= $product["name"] ?></b></h3>
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
                                                <h2><b><span><?= $product['price'] ?></span> <span>تومان</span></b>
                                                    </b></h2>
                                                <h5 class="m-t-20"><b>موجودی: </b>
                                                    <span><?= $product['pro_count'] ?></span>
                                                    <span>عدد</span>
                                                    <?php if ($product['pro_count'] > 0) { ?>
                                                        <span class="label label-default m-l-5">موجود </span>
                                                    <?php } ?>
                                                </h5>
                                                <hr/>
                                                <h5 class="font-600">توضیحات محصول</h5>
                                                <div><?= $product['introduction'] ?></div>
                                                <div class="m-t-30">
                                                    <button type="button" class="btn btn-success"
                                                            onclick="set_like(this, <?= $product['id'] ?>, 'like')"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="میپسندم">
                                                        <i class="fa  fa-thumbs-o-up"></i></button>
                                                    <button type="button" class="btn btn-danger"
                                                            onclick="set_like(this, <?= $product['id'] ?>, 'dislike')"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="نمی پسندم">
                                                        <i class="fa  fa-thumbs-o-down"></i></button>
                                                    <button type="button" class="btn btn-pink"
                                                            onclick="add_favorit(this, <?= $product['id'] ?>)"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="افزودن به مورد علاقه">
                                                        <i class="fa fa-heart-o  "></i></button>
                                                    <button type="button"
                                                            onclick="add_basket(this,<?= $product['id'] ?>)"
                                                            class="btn btn-danger waves-effect waves-light m-l-10"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="افزودن به سبد خرید ">
                                                     <span class="btn-label"><i class="fa fa-shopping-cart"></i>
                                                   </span>خرید
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div> <!-- end card-box/Product detai box -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                        </div>
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

    function show_modal(modal, class_id) {
        $(".full_black_cover").css("display", "block");
        var main_modal = $(".con-close-modal." + modal);

        main_modal.slideDown(650);
        main_modal.attr("data-class_ld", class_id);
        main_modal.find('input[type=hidden]').val(class_id);
    }

    function hide_modal(modal) {
        $(modal).css("display", "none");
        $(".full_black_cover").css("display", "none");
    }
    //    ................

    function get_credit_story(user_id, modal) {
        var url = "<?= SITE_URL ?>admin_student/get_credit_story";
        var data = {"user_id": user_id};
        $("tbody.credit_story").html(" ");
        $("span.story_owner_name").text(" ");

        $.post(url, data, function (msg, status) {
            if (msg == "null") {
                swal('گزارشی یافت نشد', "", 'error');
            } else {
                if (status != "success") {
                    swal('خطا', "", 'error');
                } else {
                    $.each(msg, function (index, value) {
                        if (value["id"]) {
                            show_modal('amount', user_id);
                            index++;
                            var color = "success";
                            if (value["amount"] < 0) {
                                color = "danger"
                            }
                            $("span.story_owner_name").text(value["name"] + ' ' + value["family"]);
                            $("span.story_owner_balance").text(value["credit"]);
                            var credit_row = '<tr class="' + color + '"><td>' + index + '</td><td>' + value["add_date"] + '</td> <td><span>' + value["amount"] + ' </span >تومان </td><td>' + value["summary"] + '</td></tr>';
                            $("tbody.credit_story").append(credit_row);
                        }

                    })
                }
            }
        }, "json")
    }

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

    function add_favorit(item, product_id) {
        var url = "<?= SITE_URL ?>users/add_favorit";
        var data = {"product_id": product_id};
        var item_old_class = $(item).find("i").attr("class");
        $(item).find("i").removeClass();
        $(item).find("i").addClass("fa fa-spin fa-spinner");
        $.post(url, data, function (msg) {
            if (msg == true) {
                swal("ثبت شد", "", "success");
            } else if (msg == "login") {
                swal("", "لطفا وارد حساب کاربری شوید", "warning");
            } else if (msg == "was") {
                swal("", "قبلا به لیست مورد علاقه افزوده شده ", "warning");
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

    function show_img_gallery(item) {
        var gallery_url = $(item).find('img').attr('data-img_url');
        $('img.product_img').attr('src', gallery_url);
    }

</script>
