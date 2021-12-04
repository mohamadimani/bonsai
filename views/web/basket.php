<?php
/**
 * Created by PhpStorm.
 * User: mani
 * Date: 03/10/2019
 * Time: 03:44 PM
 */

$basket = $data["basket_info"];
?>

<style>

    table {
        font-family: 'aviny', sans-serif !important;
        font-size: 20px;
    }

    .error_pay {
        background-color: #ff89a4;
        text-align: center;
        padding: 15px auto;

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
    <div class="container container-wide">
        <?php if (isset($_SESSION["pay_error"])) { ?>
            <h3 class="error_pay"><?= $_SESSION["pay_error"] ?></h3>
        <?php }
        unset($_SESSION["pay_error"]); ?>
        <div class="row justify-content-lg-center">
            <?php
            if (is_array($basket)) {
                ?>
                <div class="col-xl-11 col-xxl-8">
                    <div class="table-novi table-custom-responsive table-shop-responsive">
                        <table class="table-custom table-shop">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>محصول</th>
                                <th>قیمت</th>
                                <th>تعداد</th>
                                <th>جمع قیمت</th>
                                <th>حذف</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sum_prices = 0;
                            $sum_discounts = 0;
                            foreach ($basket as $key => $bas) {
                                $sum_price[$key] = ($bas["price"] * $bas["count"]);
                                $sum_discount[$key] = ceil(($sum_price[$key] * $bas["discount"]) / 100);
                                $sum_prices += $sum_price[$key];
                                $sum_discounts += $sum_discount[$key];
                                ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td>
                                        <div class="unit flex-row align-items-center">
                                            <div class="unit-left"><a><img
                                                            src="<?= SITE_URL ?>public/product/<?= $bas['id'] . '/gallery/s/' . $bas['image'] ?>"
                                                            alt="<?= $bas['seo'] ?>" style="max-height: 100px"/></a>
                                            </div>
                                            <div class="unit-body"><a class="text-gray-darker"
                                                                      style="white-space: normal;"
                                                                      target="_blank"
                                                                      href="<?= SITE_URL ?>ecomm/product/<?= $bas['id'] ?>"><?= $bas['name'] ?></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span><?= $bas['price'] ?></span> <span>تومان</span></td>
                                    <td><span><?= $bas['count'] ?></span></td>
                                    <td><span><?= $bas['price'] * $bas['count'] ?></span> <span>تومان</span></td>
                                    <td><a class="icon mdi mdi-close icon-md-middle icon-gray-1"
                                           href="<?= SITE_URL ?>ecomm/remode_basket_item/<?= $bas['id'] ?>"></a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-between align-items-md-center text-center">
                        <div class="col-md-5 col-xl-6 col-xxl-5 text-md-right">
                            <ul class="inline-list">
                                <li class="text-middle">
                                    <h4 class=" "><span>مبلغ قابل پرداخت : </span> <span><?= $sum_prices ?></span>
                                        <span>تومان</span>
                                    </h4>
                                </li>
                                <li class="text-middle"><a class="button button-secondary button-nina"
                                                           href="<?= SITE_URL ?>ecomm/checkout"><span
                                                style="transition: opacity 0.22s ease 0.27s, transform 0.22s ease 0.27s, color 0.22s ease 0s;">تکمیل خرید</span><span
                                                class="button-original-content">تکمیل خرید</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <h3 class="error_pay" style="width: 100%;">سبد خرید شما خالی است ... </h3>
            <?php } ?>
        </div>
    </div>
</section>

<script>
    function show_pay(item) {
        if ($(item).prop('checked')) {
            // swal(" ", "انتخاب این گزینه به منزله قبول قرارداد فروش سایت میباشد ", "success");
            $("div.cart-actions a.primary").css({"display": "inline-block"})
        } else {
            $("div.cart-actions a.primary").css({"display": "none"})
        }
    }
</script>

