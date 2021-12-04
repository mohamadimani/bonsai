<?php
/**
 * Created by PhpStorm.
 * User: mani mohamadi
 * Date: 11/08/2018
 * Time: 10:16 PM
 */

function filter($data)
{
    $data = filter_var($data, FILTER_SANITIZE_URL);
    $data = trim(htmlspecialchars(stripcslashes($data)));
    return $data;
}

define('ALT', 'feed');
define('SITE_URL', 'http://' . filter($_SERVER['HTTP_HOST']) . '/bonsai/');
//define('SITE_URL', 'http://' . filter($_SERVER['HTTP_HOST']) . '/');

define('zarinpalMerchantID', "8ba57c37-0483-4c70-913a-0591f74e9cbf");//bambo merchend code
//define('callbackURL', SITE_URL . 'ecomm/pay_verify');


if (isset($_SESSION["verify_callback"])) {
    define('callbackURL', SITE_URL . $_SESSION["verify_callback"]);
}

//if (isset($_SESSION["verify_callback"]) and $_SESSION['verify_callback'] == 'users') {
//    define('callbackURL', SITE_URL . 'users/pay_verify');
//} else if (isset($_SESSION["verify_callback"]) and $_SESSION['verify_callback'] == 'ecomm') {
//    define('callbackURL', SITE_URL . 'ecomm/pay_verify');
//}

//unset($_SESSION["verify_callback"]);
define('zarinpalWebAdress', 'https://www.zarinpal.com/pg/services/WebGate/wsdl');
define('mohlatPay', "604800"); //for a week
define('ADMIN_EMAIL', "info@bamboweb.ir"); //for pay
define('ADMIN_MOBILE', "09191930406"); //for sms

$zarinpalErrors = array(
    '-1' => 'اطلاعات ارسال شده ناقص شده است',
    '-2' => 'IP یا مرچنت کد صحیح نیست',
    '-3' => 'سطح تایید پذیرنده کمتر از نقره ای است',
    '-11' => 'درخواست مورد نظر يافت نشد.',
    '-21' => 'هيچ نوع عمليات مالي براي اين تراكنش يافت نشد.',
    '-22' => 'تراكنش نا موفق ميباشد.',
    '-33' => 'رقم تراكنش با رقم پرداخت شده مطابقت ندارد.',
    '-40' => 'اجازه دسترسي به متد مربوطه وجود ندارد.',
    '-54' => 'درخواست مورد نظر آرشيو شده است.',
    '100' => 'عمليات پرداخت با موفقيت انجام شد. ',
    '101' => 'این عمليات پرداخت قبلا  با موفقیت انجام شده است.',
);
define('zarinpalErrors', serialize($zarinpalErrors));




