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
        max-width: 100% !important;
        height: 200px !important;
        width: auto !important;
    }

    select#search1 option:nth-child(1) {
        font-weight: bold;
        background-color: #cfceca
    }

    select#search1 option:nth-child(2) {
        font-weight: bold;
    }

    .search_parent2, .search_parent {
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
</style>
<!-- Forms -->
<div style="margin-top: 50px"></div>
<div class="row">
    <div class="col-sm-12 col-xs-12 col-md-8 col-md-push-3  ">
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-t-0 header-title pull-left"><b>لیست محصولات</b></h4>
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
                <div class="col-sm-12 col-xs-12  search_row">
                    <!-- ************* search  ************** -->
                    <!--search by lang-->
                    <div class="col-xs-12 col-md-6  col-lg-4 search_parent search_parent2 ">
                        <span>جست و جو بر اساس : </span>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-4 search_parent">
                        <select name="search_by_lang" id="search1" class="selectpicker form-control search"
                                onchange="search_product(this)" data-original-title="انتخاب زبان"
                                data-toggle="tooltip" data-placement="top" tabindex="-98" title="انتخاب زبان">
                            <option>براساس دسته بندی</option>
                            <option value="all">نمایش همه</option>
                            <?php foreach ($data['get_product_category'] as $cat) { ?>
                                <option value="<?= $cat['id'] ?>"><?= $cat['title'] ?>  </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <br>
                <br>
                <br>

                <!-- ============================================================== -->
                <!-- Start right Content here -->
                <!-- ============================================================== -->
                <?php if ($data['products']) { ?>
                    <div class="container">
                        <div class="row">
                            <div class="m-b-15 products_item">
                                <?php foreach ($data['products'] as $product) { ?>
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

                                                <button type="button" class="btn btn-pink"
                                                        onclick="add_favorit(this, <?= $product['id'] ?>) "
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        data-original-title="  افزودن به مورد علاقه">
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
<!--   add amount   -->
<div class="sharge  con-close-modal" data-userid="" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="hide_modal('.con-close-modal')">
                    ×
                </button>
                <h4 class="modal-title"> افزودن شارژ حساب </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">مقدار شارژ (تومان)</label>
                            <input required type="number" class="form-control" id="amount" placeholder="0"
                                   name="amount">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label"> توضیحات</label>
                            <input required type="text" class="form-control" id="note" placeholder="..."
                                   name="summary">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"
                        onclick="hide_modal('.con-close-modal')">بستن
                </button>
                <button type="button" onclick=" hide_modal('.con-close-modal');charge_user(this) "
                        class="btn btn-info waves-effect waves-light">ذخیره
                    تغیرات
                </button>
            </div>
        </div>
    </div>
</div><!-- /.modal -->

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

    function search_product(item) {
        var search_val = $(item).val();
        var url = "<?= SITE_URL ?>users/get_product_by_ajax";
        var data = {'cat_id': search_val};
        $("div.products_item").html(" ");
        $.post(url, data, function (msg) {
            if (msg[0]) {
                $.each(msg, function (index, value) {
                        if (value['likes'] > 0) {
                            var all_likes = parseInt(value['likes']) + parseInt(value['dislikes']);
                            var like_stars = (((parseInt(value['likes']) * 100) / all_likes) / 10) / 2;
                            var empty_stars = 5 - like_stars;
                            like_stars = Math.floor(like_stars);
                            empty_stars = Math.floor(empty_stars);
                            var half_star = 5 - (like_stars + empty_stars);

                            var full_stars = '';
                            var half_stars = '';
                            var empty_st = '';
                            var stars_empty = '';
                            for (var i = 1; i <= like_stars; i++) {
                                full_stars += '<li><a class="fa fa-star"></a></li>'
                            }
                            if (half_star >= 1) {
                                for (var i2 = 1; i2 <= half_star; i2++) {
                                    half_stars += '<li><a class="fa fa-star-half-o"></a></li>';
                                }
                            }
                            if (empty_stars >= 1) {
                                for (var x = 1; x <= empty_stars; x++) {
                                    empty_st += '<li><a class="fa fa-star-o"></a></li>'
                                }
                            }

                        } else {
                            stars_empty = '<li><a class="fa fa-star-o"></a></li>' +
                                '<li><a class="fa fa-star-o"></a></li>' +
                                '<li><a class="fa fa-star-o"></a></li>' +
                                '<li><a class="fa fa-star-o"></a></li>' +
                                '<li><a class="fa fa-star-o"></a></li>';
                        }

                        var item_row = '     <div class="col-sm-6 col-lg-4 col-md-4 mobiles">' +
                            '     <div class="product-list-box thumb">' +
                            '     <a href="javascript:void(0);" class="image-popup" title="Screenshot-1">' +
                            '     <img src="<?= SITE_URL ?>public/product/' + value['id'] + '/gallery/l/' + value['image'] + '"' +
                            ' class="thumb-img" alt="bambo web">' +
                            '     </a>' +
                            '     <div class="like_items">' +
                            '     <a href="<?= SITE_URL ?>users/product/' + value['id'] + '">' +
                            '     <button type="button" class="btn btn-info right" title="dislike">' +
                            '     مشاهده' +
                            '     </button>' +
                            '     </a>' +
                            '    <button type="button" class="btn btn-pink" title="Add to favorite"' +
                            ' onclick="add_favorit(this, ' + value['id'] + ') ">' +
                            '     <i class="fa fa-heart-o"></i></button>' +
                            '    <button type="button" class="btn btn-success" title="like"' +
                            'onclick="set_like(this, ' + value['id'] + ', \'like\')">' +
                            '     <i class="fa  fa-thumbs-o-up"></i></button>' +
                            '    <button type="button" class="btn btn-danger" title="dislike"' +
                            'onclick="set_like(this, ' + value['id'] + ', \'dislike\')">' +
                            '     <i class="fa  fa-thumbs-o-down"></i></button>' +
                            '     </div>' +
                            '    <div class="price-tag"><span>' + value['pro_count'] + '</span> عدد</div>' +
                            '     <div class="detail">' +
                            '     <h4 class="m-t-0">' +
                            '     <a href="<?= SITE_URL ?>users/product/' + value['id'] + '"' +
                            'class="text-dark">' +
                            value['name'] + '</a></h4>' +
                            '     <div class="rating">' +
                            '     <ul class="list-inline">' +
                            full_stars + half_stars + empty_st + stars_empty +
                            '</ul>' +
                            '</div>' +
                            '<h5 class="m-0">' +
                            '<span class="text-muted"> قیمت :<span>' + value['price'] + '</span> تومان</span>' +
                            '</h5>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                        $("div.products_item").append(item_row);
                    }
                )
            } else {
                swal("موردی یافت نشد !", '', 'warning');
            }
        }, 'json')
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
        var
            url = "<?= SITE_URL ?>users/add_favorit";
        var
            data = {
                "product_id": product_id
            };
        var item_old_class = $(item).find("i").attr("class");
        $(item).find("i").removeClass();
        $(item).find("i").addClass("fa fa-spin fa-spinner");
        $.post(url, data, function (msg) {
            if (msg == true) {
                swal("در لیست مورد علاقه ثبت شد", "", "success");
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

</script>
