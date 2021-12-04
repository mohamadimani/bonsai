<style>
    .overflow_none {
        overflow: hidden;
    }

    .m-both-10 {
        margin: auto 10px;
        font-weight: bold;
    }

    .search_icon {
        position: absolute;
        top: 12px;
        right: 20px;
    }

    tbody tr:hover {
        color: #000000 !important;
        text-shadow: 2px 2px 4px #5f5f5f;
    }

    /*tr:active {*/
    /*color: #000;*/
    /*}*/

    .story_owner_name {
        color: #00c000;
    }

    .story_owner_balance {
        color: #00c000;
    }

    .full_black_cover {
        width: 100%;
        height: 100%;
        float: right;
        background-color: black;
        opacity: 0.5;
        position: fixed;
        top: 0;
        right: 0;
        display: none;
        z-index: 9999;
    }

    .new_item {
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

    i {
        font-size: 16px !important;
        /*cursor: pointer;*/
        /*margin: 0 3px;*/
    }

    .tooltip-inner {
        font-family: "IRANSans-web", "Helvetica Neue", Helvetica, Arial, IRANSans-web, "B Koodak";
        border-radius: 5px;
    }

    .operation i:hover, .operation .submit:hover {
        background: rgba(255, 203, 96, 0.71);
    }

    .operation .fa-book {
        color: #1b30ab;
    }

    .operation .glyphicon-list {
        color: #42a7ec;
    }

    .operation .fa-dollar {
        color: #0086ff;
    }

    .operation .fa-line-chart {
        color: #00ff11;
    }

    .operation .fa-money {
        color: #ffb700;
    }

    .operation .glyphicon-comment {
        color: #ab7f40;
    }

    .operation .fa-diamond {
        color: #00ff5f;
    }

    .operation .glyphicon-gift {
        color: #9e61ff;
    }

    .con-close-modal {
        position: fixed;
        top: 15%;
        right: 10%;
        z-index: 9999999;
        width: 80%;
    }

    span.capacity {
        background-color: #86d410;
        display: inline-block;
        color: black;
        float: right;
        max-width: 100% !important;
        right: 0;
        height: 100%;
    }

    div.capacity {
        width: 100%;
        border-radius: 4px;
        border: 1px solid silver;
        float: right;
        text-align: center;
        position: relative;
        overflow: hidden;
        height: 20px;
    }

    label.normal {
        font-weight: normal !important;
        line-height: 40px !important;
        cursor: pointer;
    }

    hr {
        border-top: 1px solid rgba(0, 0, 0, 0.21) !important;
        margin: 0 0 5px 0 !important;
    }

    .m_b_0 {
        margin-bottom: 0 !important;
    }

    input.input-sm {
        margin-top: 5px !important;
    }

    span.capacity {
        /*position: absolute;*/
    }

    .search_row {
        border: 1px solid silver;
        border-radius: 4px;
    }

    img.pro_image {
        max-width: 80px;
        max-height: 80px;
    }
</style>
<!-- Forms -->
<div style="margin-top: 50px"></div>
<div class="row">
    <div class="col-sm-8 col-xs-12 col-md-push-3  ">
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-t-0 header-title pull-left"><b>سبد خرید </b></h4>
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
            <?php
            if (!empty($_SESSION["pay_error"])) {
                ?>
                <div class="alert alert-<?= $_SESSION["pay_error_success"] ?>  alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <a class="alert-link"><?= $_SESSION["pay_error"] ?></a>
                </div>
            <?php }
            unset($_SESSION['pay_error']);
            unset($_SESSION['pay_error_success']);
            ?>

            <div class="table-responsive">
                <?php if (!empty($data['basket_list']) and is_array($data['basket_list'])) { ?>

                    <table class="table table-hover mails m-0 table table-actions-bar">
                        <thead>
                        <tr>
                            <th> تصویر</th>
                            <th>نام محصول</th>
                            <th>قیمت</th>
                            <th> تعداد</th>
                            <th>مبلغ کل</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody class="users_row">
                        <?php
                        $sum_prices = 0;
                        $sum_discounts = 0;
                        foreach ($data['basket_list'] as $key => $product) {
                            $sum_price[$key] = ($product["price"] * $product["count"]);
                            $sum_discount[$key] = ceil(($sum_price[$key] * $product["discount"]) / 100);
                            $sum_prices += $sum_price[$key];
                            $sum_discounts += $sum_discount[$key];
                            ?>
                            <tr class="active">
                                <td>
                                    <img src="<?= SITE_URL ?>public/product/<?= $product['pro_id'] ?>/gallery/s/<?= $product['image'] ?>"
                                         alt="" class="pro_image"></td>
                                <td><?= $product['name'] ?></td>
                                <td><?= $product['price'] ?></td>
                                <td><?= $product['count'] ?></td>
                                <td><?= $product['count'] * $product['price'] ?></td>
                                <td class="operation">
                                    <i data-toggle="tooltip" data-placement="top" title=""
                                       class="btn btn-danger btn-xs md md-close "
                                       data-original-title="حذف محصول" style="color: #48d2df;cursor: pointer"
                                       onclick="remove_basket(<?= $product['id'] ?>,this,<?= $product['count'] * $product['price'] ?>);$('table').load()"></i>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>جمع سبد خرید</th>
                            <th><span class="sum_price"><?= $sum_prices ?></span> <span>تومان</span></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>تخفیف</th>
                            <th><span><?= $sum_discounts ?></span> <span>تومان</span></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>مبلغ قابل پرداخت</th>
                            <th><span class="pay_price"><?= $sum_prices - $sum_discounts ?></span> <span>تومان</span>
                            </th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><a class="btn btn-success" href="javascript:void(0)"
                                   onclick="pay_basket(this);$(this).remove()"> پذیرش قوانین پرداخت</a></th>
                        </tr>
                        </thead>
                    </table>

                <?php } else { ?>
                    <div class="alert alert-danger alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <a class="alert-link"> هیچ محصولی در سبد شما یافت نشد!</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<br>
<br>
<br>
<br>

<!--   add amount   -->
<div class="sharge  con-close-modal" data-userid="" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= SITE_URL ?>users/add_credit" method="post">
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
                                <input type="number" class="form-control" id="amount" placeholder="0" name="amount"
                                       onkeyup=" $(this).val($(this).val().replace(/\D/g, ''));" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label"> توضیحات</label>
                                <input type="text" class="form-control" id="note" placeholder="..." name="summary"
                                       required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"
                            onclick="hide_modal('.con-close-modal')">انصراف
                    </button>
                    <!--                    <button type="button" onclick=" hide_modal('.con-close-modal');charge_user(this) "-->
                    <!--                            class="btn btn-info waves-effect waves-light">ذخیره تغیرات-->
                    <!--                    </button>-->
                    <button type="submit" class="btn btn-info waves-effect waves-light" >پرداخت</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- /.modal -->

<div class="full_black_cover"></div>
<div style="margin: 50px 0"></div>

<style>
    p.lead.text-muted {
        margin-top: 30px !important;
    }
</style>
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
        window.location = '<?= SITE_URL ?>users/orders';
    }
    //    *************
    function show_pay(item) {
        if ($(item).prop('checked')) {
            // swal(" ", "انتخاب این گزینه به منزله قبول قرارداد فروش سایت میباشد ", "success");
            $("div.cart-actions a.primary").css({"display": "inline-block"})
        } else {
            $("div.cart-actions a.primary").css({"display": "none"})
        }
    }

    function remove_basket(product_id, item, pro_price) {
        var url = '<?= SITE_URL ?>users/delete_basket';
        var data = {'product_id': product_id};
        $.post(url, data, function (msg) {
            if (msg == true) {
                swal("حذف شد", "", 'success');
                $(item).parents('tr').remove();
                var sum_price = parseInt($('span.sum_price').text());
                $('span.sum_price').text(sum_price - pro_price);
                var pay_price = parseInt($('span.pay_price').text());
                $('span.pay_price').text(pay_price - pro_price);
            } else if (msg == 'login') {
                swal("    لطفا وارد حساب شوید !", "", "warning");
            } else {
                swal("مشکل در حذف !", "", "warning");
            }
        })
    }

    function pay_basket(class_id, item) {
        var url = "<?= SITE_URL ?>users/pay_basket";
        var data = {};
        $.post(url, data, function (msg) {
            if (msg == true) {
                swal({
                    title: "",
                    text: 'فاکتور شما با موفقیت ثبت شد ',
                    type: "success",
                    showCancelButton: false,
                    cancelButtonClass: 'btn-white btn-md waves-effect',
                    confirmButtonClass: 'btn-success btn-md waves-effect waves-light',
                    confirmButtonText: 'مشاهده فاکتور'
                }, function (isConfirm) {
                    if (isConfirm) {
                        window.location = '<?= SITE_URL ?>users/orders';
                    } else {
                    }
                });

            } else if (msg == 'login') {
                swal({
                    title: "",
                    text: "لطفا وارد حساب خود شوید",
                    type: "warning",
                    showCancelButton: false,
                    cancelButtonClass: 'btn-white btn-md waves-effect',
                    confirmButtonClass: 'btn-success btn-md waves-effect waves-light',
                    confirmButtonText: 'ورود'
                }, function (isConfirm) {
                    if (isConfirm) {
                        window.location = "<?= SITE_URL ?>users/user_login";
                    } else {
                        window.location = "<?= SITE_URL ?>users/user_login";
                    }
                });
            } else if (msg == 'credit') {
                swal({
                    title: "",
                    text: "موجودی حساب شما برای خرید پرداخت این فاکتور کافی نیست",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonClass: 'btn-white btn-md waves-effect',
                    confirmButtonClass: 'btn-success btn-md waves-effect waves-light',
                    confirmButtonText: 'افزایش موجودی'
                }, function (isConfirm) {
                    if (isConfirm) {
                        show_modal('sharge')
                    } else {
                        window.location = '<?= SITE_URL ?>users/orders';
                    }
                });
            } else if (msg == 'user_info') {
                swal({
                    title: "",
                    text: "اطلاعات پروفایل شما کامل نیست !",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonClass: 'btn-white btn-md waves-effect',
                    confirmButtonClass: 'btn-success btn-md waves-effect waves-light',
                    confirmButtonText: '  تکمیل اطلاعات '
                }, function (isConfirm) {
                    if (isConfirm) {
                        window.location = '<?= SITE_URL ?>users/edit_user';
                    } else {
                    }
                });
            } else {
                swal("مشکل در پرداخت !", " ", "error");
            }
        })
    }

</script>