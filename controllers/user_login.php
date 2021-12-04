<?php

/**
 * Created by PhpStorm.
 * User: mani mohamadi
 * Date: 11/09/2018
 * Time: 01:23 PM
 */
class user_login extends controller
{
    function __construct()
    {
    }

    function index()
    {
        if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) {
            header("location:" . SITE_URL . "user_panel");
        } else {
            $data = [];
            $this->view('user/login/user_login', $data, 1, 1);
        }
    }

    function register()
    {
        $data = [];
        $this->view('user/login/user_register', $data);
    }

    function register_users()
    {
        if ($this->model->register_users($_POST) == true) {
            $_SESSION['register_msg'] = 'ثبت نام با موفقیت انجام شد، میتوانید وارد شوید';
            header('location:' . SITE_URL . 'users/user_login');
        } else {
            $_SESSION['register_msg'] = 'ثبت نام با مشکل مواجه شد ، دوباره تلاش کنید';
            header('location:' . SITE_URL . 'user_login/register');
        }
    }

    function mobile_check()
    {
        echo $this->model->mobile_check($_POST['mobile']);
    }

    function check_login()
    {
        unset($_SESSION['user']);
        $login_info = $this->model->check_login($_POST['mobile'], $_POST['password']);
        if ($login_info == true and isset($_SESSION['user'])) {
            echo 'ok';
        } else if ($login_info == 'pass') {
            echo 'pass';
        } else if ($login_info == 'info') {
            echo 'info';
        } else {
            echo 'none';
        }
    }

    function logout()
    {
        $this->model->set_logout_log('user');
        unset($_SESSION['user']);
        unset($_SESSION['user_id']);
        unset($_SESSION['user_sex']);
        unset($_SESSION['factor_id']);
        setcookie("user", '', time() + 1, "/");
        header("location:" . SITE_URL . "users/user_login");
    }

}
