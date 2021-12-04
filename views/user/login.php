<?php

?>
<style>
    @media (min-width: 768px) {

        .card-box {
            width: 45%;
            margin: 0 2% 10%;
        }
    }

    .wrapper-page {
        width: 100%;
        display: block;
    }

    @media (max-width: 600px) {
        .margi-tb-50 {
            margin: 30px 0 !important;
            float: right;
            display: block;
            width: 100%;
        }
    }
</style>

<div class="clearfix"></div>
<div class="wrapper-page ">
    <!--    login -->
    <div class="margi-tb-50"></div>
    <div class=" card-box login_box col-xs-12 col-md-6   ">
        <div class="panel-heading">
            <h3 class="text-center"> ورود <strong class="text-custom">
            </h3>
        </div>
        <!-- === alert for check username(mobile) and password === -->
        <div class="alert alert-danger  m-t-40 alert-dismissible hidden nok   alertsho" role="alert">
            <strong>اطلاعات وارد شده صحیح نمیباشد</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- === form inputs for insert mobile and password === -->
        <div class="panel-body">
            <form class="form-horizontal m-t-20" action="<?= SITE_URL ?>users/check_user_login" method="post">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input name="username" class="form-control" type="text" minlength="4" maxlength="32" required=""
                               placeholder=" نام کاربری " onkeydown="check_login(event)">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input name="password" class="form-control" type="password" minlength="4" maxlength="32"
                               required=""
                               placeholder="رمز ورود" onkeydown="check_login(event)">
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <span class="btn btn-pink btn-block text-uppercase waves-effect waves-light"
                              onclick="check_login(this,'s')" onkeydown="check_login(this,'s')">
                            ورود
                        </span>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!--    register-->
    <div class=" card-box register_box col-xs-12 col-md-6">
        <div class="panel-heading">
            <h3 class="text-center"> ثبت نام <strong class="text-custom">
            </h3>
        </div>
        <!-- === alert for check username(mobile) and password === -->
        <div class="alert alert-danger  m-t-40 alert-dismissible hidden nok2   alertsho" role="alert">
            <strong> </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- === form inputs for insert mobile and password === -->
        <div class="panel-body">
            <form class="form-horizontal m-t-20" action="<?= SITE_URL ?>users/check_user_login" method="post">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input name="username" class="form-control" type="text" minlength="4" maxlength="32" required=""
                               placeholder=" نام کاربری " onkeydown="check_register(event)">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input name="mobile" class="form-control" type="tel" minlength="4" maxlength="32" required=""
                               placeholder=" موبایل   " onkeydown="check_register(event)"
                               onkeyup="input_val_check(this,event);">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input name="password" class="form-control" type="password" minlength="4" maxlength="32"
                               required="" placeholder="رمز ورود" onkeydown="check_register(event)">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input name="re_password" class="form-control" type="password" minlength="4" maxlength="32"
                               required="" placeholder="تکرار رمز ورود" onkeydown="check_register(event)">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="captcha"><span style="color: red!important;">*</span><?= $data['captcha'] ?></label>
                        <input name="captcha" class="form-control" type="tel" minlength="4" maxlength="32"
                               required="" placeholder="کد امنیتی" onkeyup="input_val_check(this,event);" id="captcha">
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <span class="btn btn-pink btn-block text-uppercase waves-effect waves-light"
                              onclick="check_register(this,'s')" onkeydown="check_register(this,'s')">
                            ثبت نام
                        </span>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="margi-tb-50"></div>
</div>

<script>

    function error_check2(error) {
        $('div.nok2').removeClass('hidden');
        $('div.nok2').find('strong').text(error);
        $('div.nok2').fadeIn(100);
        setTimeout(function () {
            $('div.nok2').fadeOut(1000);
        }, 2000);
    }

    function error_check(error) {
        $('div.nok').removeClass('hidden');
        $('div.nok').find('strong').text(error);
        $('div.nok').fadeIn(100);
        setTimeout(function () {
            $('div.nok').fadeOut(1000);
        }, 2000);
    }

    function check_login(e, s) {
        if (e.keyCode == 13 || s == 's') {
            var user = $('div.login_box').find('input[name=username]').val();
            var pas = $('div.login_box').find('input[name=password]').val();
            var error = '';
            if (user.length < 4) {
                error = 'طول نام کاربری یا رمز عبور نباید کمتر از 4 حرف باشد';
                error_check(error)
            } else {
                var username = user;
            }

            if (pas.length < 4) {
                error = 'طول نام کاربری یا رمز عبور نباید کمتر از 4 حرف باشد';
                error_check(error)
            } else {
                var password = pas;
            }

            if (error.length < 1) {
                var url = "<?= SITE_URL ?>users/check_user_login";
                var data = {'username': username, 'password': password};
                $.post(url, data, function (msg) {
                    if (msg == true) {
                        window.location = '<?= SITE_URL ?>users';
                    } else if (msg == 'inactive') {
                        error = ' حساب کاربری شما غیر فعال میباشد !';
                        error_check(error)
                    } else {
                        error = ' نام کاربری یا رمز عبور نادرست است !';
                        error_check(error)
                    }
                })
            }
        }
    } //end register function

    function check_register(e, s) {
        if (e.keyCode == 13 || s == 's') {
            var user = $('div.register_box').find('input[name=username]').val();
            var mob = $('div.register_box').find('input[name=mobile]').val();
            var pas = $('div.register_box').find('input[name=password]').val();
            var re_pas = $('div.register_box').find('input[name=re_password]').val();
            var captcha = $('div.register_box').find('input[name=captcha]').val();
            var captcha_answer = <?= $_SESSION["captcha_answer"] ?>;
            var error = '';

            if (user.length < 4) {
                error = 'طول نام کاربری نباید کمتر از 4 حرف باشد';
                error_check2(error)
            } else {
                var username = user;
            }

            if (pas.length < 4) {
                error = 'طول رمز عبور نباید کمتر از 4 حرف باشد';
                error_check2(error)
            } else {
                var password = pas;
            }

            if (pas != re_pas) {
                error = 'رمز عبور و تکرار رمز عبور یکی نیست';
                error_check2(error)
            } else {
                var re_password = re_pas;
            }
            if (captcha != captcha_answer) {
                error = 'کد امنیتی صحیح نیست';
                error_check2(error)
            } else {
                var capt = captcha;
            }

            if (check_mobile(mob) && mob.length == 11) {
                var mobile = mob;
            } else {
                error = 'شماره موبایل صحیح نیست';
                error_check2(error)
            }


            if (error.length < 1) {
                var url = "<?= SITE_URL ?>users/user_register";
                var data = {
                    'username': username,
                    'password': password,
                    'mobile': mobile,
                    're_password': re_password,
                    'captcha':capt
                };
                $.post(url, data, function (msg) {
                    if (msg == true) {
                        window.location = '<?= SITE_URL ?>users';
                    } else if (msg == 'is_mobile') {
                        error = ' شماره موبایل تکراری است !';
                        error_check2(error)
                    } else if (msg == 'is_username') {
                        error = ' نام کاربری تکراری است !';
                        error_check2(error)
                    } else if (msg == 'empty') {
                        error = ' اطلاعات رو کامل پر کنید !';
                        error_check2(error)
                    } else if (msg == 'password') {
                        error = ' رمز عبور و تکرار رمز عبور یکی نیست !';
                        error_check2(error)
                    } else {
                        error = ' مشکل در ثبت !';
                        error_check2(error)
                    }
                })
            }
        }
    } //end register function


    //    input_val_check and convert to number
    function input_val_check(item, e) {
        var value = $(item).val();
        var rep_val = value.replace(/\D/g, '');
        $(item).val(rep_val);
    }


    function check_mobile(mobile) {
        var filter = /^[0-9-+]+$/;
        if (filter.test(mobile)) {
            return 'ok';
        } else {
            return 'nok';
        }
    }

</script>

