<?php
/**
 * Created by PhpStorm.
 * User: mani
 * Date: 03/18/2019
 * Time: 10:33 AM
 */
$orders = $data["orders"];
?>

<style>
    table.purchases-list {
        width: 100%;
        float: right;
        direction: rtl;
        text-align: right;
    }

    table.purchases-list tr {
        direction: rtl;
        padding: 5px 10px;

    }

    table.purchases-list th, table.purchases-list td {
        direction: rtl;
        padding: 5px 10px;

    }

    thead {
        border-bottom: 2px solid #9e9e9e !important;
    }

    .price {
        font-size: 13px !important;
        padding: 0 !important;
    }

    .success {
        width: 100%;
        padding: 10px 0;
        margin: 10px 0;
        font-size: 16px;
        text-align: center;
        color: #6ac668;
        background-color: rgba(148, 253, 146, 0.33);
        border-radius: 5px;
        direction: rtl;
    }

    .errore {
        width: 100%;
        padding: 10px 0;
        margin: 10px 0;
        font-size: 16px;
        text-align: center;
        border-radius: 5px;
        color: #ff4d54;
        background-color: rgba(255, 83, 83, 0.24);
        direction: rtl;
    }

    .no_item {
        width: 100%;
        float: right;
        text-align: center;
        font-size: 17px;
        color: #ff3c15;
        background-color: rgba(255, 54, 59, 0.1);
        padding: 10px 0;
        margin: 20px 0;
        direction: rtl;
    }
</style>
<div style="margin-top: 50px"></div>
<div class="row">
    <div class="col-sm-8 col-xs-12 col-md-push-3  ">
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-t-0 header-title pull-left"><b> لیست سفارش های من </b></h4>
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
            <!-- DASHBOARD BODY -->
            <div class="table-responsive">
                <div class="dashboard-body" style="padding: 20px ">
                    <?php if (is_array($orders)) { ?>
                        <!-- DASHBOARD CONTENT -->
                        <div class="dashboard-content">
                            <?php
                            if (!empty($_SESSION["user_pay"]) and $_SESSION["user_pay"] == "success") {
                                ?>
                                <div class="alert alert-success  alert-dismissable text-center">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    <a class="alert-link">پرداخت با موفقیت انجام شد</a>
                                </div>
                            <?php }
                            if (!empty($_SESSION["user_pay"]) and $_SESSION["user_pay"] == "connect") {
                                ?>
                                <div class="alert alert-danger  alert-dismissable text-center">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    <a class="alert-link">مشکل در اتصال به درگاه پرداخت</a>
                                </div>
                            <?php }
                            if (!empty($_SESSION["user_pay"]) and $_SESSION["user_pay"] == "danger") {
                                ?>
                                <div class="alert alert-danger  alert-dismissable text-center">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    <a class="alert-link"><?= $_SESSION["pay_error"] ?></a>
                                    <i class="btn btn-success " style="margin: auto 50px;"
                                       onclick="show_modal('sharge')">افزایش موجودی</i>
                                </div>
                            <?php }
                            unset($_SESSION["pay_error"]);
                            unset($_SESSION["user_pay"]);
                            ?>
                            <table class="purchases-list">
                                <thead>
                                <tr>
                                    <th><p>تاریخ </p></th>
                                    <th><p>شماره فاکتور </p></th>
                                    <th><p>تعداد محصول </p></th>
                                    <th><p>نام خریدار </p></th>
                                    <th><p> مبلغ فاکتور </p></th>
                                    <th><p>وضعیت فاکتور </p></th>
                                    <th><p>وضعیت پرداخت </p></th>
                                    <!--                <th><p>مشاهده محصولات </p></th>-->
                                    <th style="min-width: 80px;"><p>عملیات </p></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                foreach ($orders as $order) { ?>
                                    <tr class=" ">
                                        <td class=" ">
                                            <p class="price"><?= $order["date"] ?></p>
                                        </td>
                                        <td class=" ">
                                            <p class="price"><?= $order["factor_number"] ?></p>
                                        </td>
                                        <td class=" ">
                                            <p class="  price  "><?= $order["product_count"] ?></p>
                                        </td>
                                        <td class="  ">
                                            <p class="price" style="direction: rtl">
                                                <?= $order["user_name"] ?>
                                            </p>
                                        </td>
                                        <td class="  ">
                                            <p class="price" style="display: flex">
                                                <span class="price"> <?= $order["amount"] ?> </span>
                                                <span class="price"> تـومـان  </span>
                                            </p>
                                        </td>
                                        <td class="act_title"><?php if ($order['status'] == 'ACTIVE') {
                                                echo '<p class="price" style="color: #00c300"> فعال</p>';
                                            } elseif ($order['status'] == 'INACTIVE') {
                                                echo '<p class="price" style="color: #ff0e0e">غیر فعال</p>';
                                            } ?>
                                        </td>
                                        <td class="act_title"><?php if ($order['pay_status'] == 'PAID') {
                                                echo '<p class="price" style="color: #00c300"> پرداخت شده</p>';
                                            } elseif ($order['pay_status'] == 'UNPAID') {
                                                echo '<p class="price" style="color: #ff0e0e">  پرداخت نشده</p>';
                                            } ?>
                                        </td>
                                        <!--                                <td style="text-align: center">-->
                                        <!--                                    <a href=" -->
                                        <?//= SITE_URL ?><!--users/order_product/--><?//= $order["id"] ?><!-- ">-->
                                        <!--                                        <i class="sl-icon icon-eye"></i>-->
                                        <!--                                    </a>-->
                                        <!--                                </td>-->
                                        <td style="text-align: center">
                                            <?php if ($order['pay_status'] == 'PAID') {
                                                ?>
                                            <?php } elseif ($order['pay_status'] == 'UNPAID') { ?>
                                                <a class="button small secondary" style="width: 60px;"
                                                   onclick="$(this).remove()"
                                                   href="<?= SITE_URL ?>users/pay_order/<?= $order["id"] ?>">پرداخت</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                                </tbody>
                            </table>
                            <!-- /PURCHASES LIST -->
                        </div>
                        <!-- DASHBOARD CONTENT -->
                    <?php } else { ?>
                        <div class="alert alert-danger  alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <a class="alert-link">هیچ سفارشی به نام شما یافت نشد!</a>
                        </div>
                    <?php } ?>
                </div>
                <!-- /DASHBOARD BODY -->
            </div>
        </div>
    </div>
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
                    <button type="submit" class="btn btn-info waves-effect waves-light" >پرداخت </button>
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
    .con-close-modal {
        position: fixed;
        top: 15%;
        right: 10%;
        z-index: 9999999;
        width: 80%;
    }

</style>
<script>

    function show_modal(modal, class_id) {
        $(".full_black_cover").css("display", "block");
        var main_modal = $(".con-close-modal." + modal);

        main_modal.slideDown(650);
//        main_modal.attr("data-class_ld", class_id);
//        main_modal.find('input[type=hidden]').val(class_id);
    }

    function hide_modal(modal) {
        $(modal).css("display", "none");
        $(".full_black_cover").css("display", "none");
//        window.location = '<?//= SITE_URL ?>//users/orders';
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