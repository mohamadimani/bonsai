<?php

/**
 * Created by PhpStorm.
 * User: mani mohamadi
 * Date: 11/09/2018
 * Time: 01:23 PM
 */
class users extends controller
{
    function __construct()
    {
    }

    function index()
    {
        if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) {
            $departments = $this->model->departments();
            $last_messages = $this->model->last_messages(3);
            $data = [
                "departments" => $departments,
                "last_messages" => $last_messages
            ];
            $this->user_view('user_info', $data);
        } else {
            header("location:" . SITE_URL . "users/user_login");
        }
    }

    function user_login()
    {
        if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) {
            header("location:" . SITE_URL . "users");
        } else {
            $captcha = $this->model->get_captcha();
            $data = ["captcha" => $captcha];
            $this->user_view('login', $data);
        }
    }

    function check_user_login()
    {
        $this->model->check_user_login($_POST);
    }

    function user_logout()
    {
//        $this->model->set_logout_log('clerk');
//        unset($_SESSION["user_id"]);
//        unset($_SESSION["user_login_time"]);
//        unset($_SESSION["user"]);
        session_destroy();
        setcookie("user", '', time() + 1, "/");
        header("location:" . SITE_URL . "users/user_login");
    }

    function user_register()
    {
        $this->model->user_register($_POST);
    }

    function edit_user()
    {
        if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) {
//            $user_info = $this->model->get_user_info();
            $data = [];
            $this->user_view('edit_student', $data);
        } else {
            header("location:" . SITE_URL . "users/user_login");
        }
    }

    function update_user_info()
    {
        $this->model->update_user_info($_POST);
    }

    function change_password()
    {
        if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) {
            $data = [];
            $this->user_view('password_change', $data);
        } else {
            header("location:" . SITE_URL . "users/user_login");
        }
    }

    function update_password()
    {
        $this->model->update_password($_POST);
    }

    function ajax_upload_profile_img()
    {
        $this->model->ajax_upload_profile_img($_FILES);
    }

    function send_messages()
    {
        if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) {
            $departments = $this->model->departments();
            $last_messages = $this->model->last_messages(3);
            $data = [
                "departments" => $departments,
                "last_messages" => $last_messages
            ];
            $this->user_view('send_messages', $data);
        } else {
            header("location:" . SITE_URL . "users/user_login");
        }
    }

    function all_messages()
    {
        if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) {
            $last_messages = $this->model->last_messages('all');
            $data = [
                "last_messages" => $last_messages
            ];
            $this->user_view('user_messages', $data);
        } else {
            header("location:" . SITE_URL . "users/user_login");
        }
    }

    function save_message()
    {
        $this->model->save_message($_POST);
    }

//...products
    function products()
    {
        if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) {
            $get_product_category = $this->model->get_product_category();
            $products = $this->model->get_products();
            $data = [
                "products" => $products,
                "get_product_category" => $get_product_category
            ];
            $this->user_view("products_list", $data);
        } else {
            header("location:" . SITE_URL . "users/user_login");
        }
    }

    function product($product_id = '')
    {
        if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) {
            $product = $this->model->get_products($product_id);
            $product_gallery = $this->model->get_product_gallery($product_id);
            $data = [
                "product" => $product,
                "product_gallery" => $product_gallery,
            ];
            $this->user_view("product_info", $data);
        } else {
            header("location:" . SITE_URL . "users/user_login");
        }
    }

    function get_product_by_ajax()
    {
        $this->model->get_product_by_ajax($_POST);
    }

    function set_like()
    {
        if (!isset($_COOKIE['user']) or !isset($_SESSION['user']) or $_COOKIE['user'] != $_SESSION['user']) {
            echo "login";
        } else {
            $this->model->set_like($_POST);
        }
    }

    function add_favorit()
    {
        if (!isset($_COOKIE['user']) or !isset($_SESSION['user']) or $_COOKIE['user'] != $_SESSION['user']) {
            echo "login";
        } else {
            $this->model->add_favorit($_POST["product_id"]);
        }
    }

    function add_basket()
    {
        if (!isset($_COOKIE['user']) or !isset($_SESSION['user']) or $_COOKIE['user'] != $_SESSION['user']) {
            $_SESSION["product_before_login"] = $_POST["product_id"];
            echo "login";
        } else {
            $this->model->add_basket($_POST);
        }
    }

    function favorites()
    {
        if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) {
            $favorites = $this->model->get_favorites();
            $data = ["favorites" => $favorites];
            $this->user_view("favorites", $data);
        } else {
            header("location:" . SITE_URL . "users/user_login");
        }
    }

    function remove_favorite()
    {
        $this->model->remove_favorite($_POST);
    }

    function basket()
    {
        if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) {
            $basket_list = $this->model->get_basket_list();
            $data = ["basket_list" => $basket_list];
            $this->user_view('basket', $data);
        } else {
            header("location:" . SITE_URL . "users/user_login");
        }
    }

    function delete_basket()
    {
        if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) {
            $this->model->delete_basket($_POST);
        } else {
            echo 'login';
        }
    }

    function pay_basket()
    {
        if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) {
            $this->model->pay_basket();
        } else {
            echo 'login';
        }
    }

    function add_credit()
    {
        $this->model->add_credit($_POST);
    }

    function add_credit_verify()
    {
        $result = $this->model->add_credit_verify($_GET['Authority'], $_GET['Status']);
    }


    function orders()
    {
        if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) {
            $orders = $this->model->get_orders();
            $data = ["orders" => $orders];
            $this->user_view("orders", $data);
        } else {
            header("location:" . SITE_URL . "users/user_login");
        }
    }

    function pay_order($order_id = '')
    {
        if (isset($_COOKIE['user']) and isset($_SESSION['user']) and $_COOKIE['user'] == $_SESSION['user']) {
            $this->model->pay_order($order_id);
        } else {
            header("location:" . SITE_URL . "users/user_login");
        }
    }

//    old
    function checkout($factor_id = "")
    {
        if (!isset($_COOKIE['user']) or !isset($_SESSION['user']) or $_COOKIE['user'] != $_SESSION['user']) {
            header("location:" . SITE_URL . "users/user_login");
        } else {
            $this->model->checkout($factor_id);
        }
    }

    function pay_verify()
    {
        if (!isset($_COOKIE['user']) or !isset($_SESSION['user']) or $_COOKIE['user'] != $_SESSION['user']) {
            header("location:" . SITE_URL . "users/user_login");
        } else {
            if (isset($_GET['Authority'])) {
                $result = $this->model->pay_verify($_GET['Authority'], $_GET['Status']);
                header('location:' . SITE_URL . 'users/orders');
            } else {
                header('location:' . SITE_URL . 'ecomm/basket');
            }
        }
    }

//--------------------

    function old_feed()
    {
        $user_physique = $this->model->get_user_physique();
        $data = [
            "user_physique" => $user_physique
        ];
        $this->user_view('old_feed', $data);

    }

    function feed_review($id = '')
    {
        if (!empty($id)) {
            $user_physique = $this->model->get_user_physique($id);
            $data = [
                "user_physique" => $user_physique
            ];
            $this->user_view('review', $data);
        } else {
            header('location:' . SITE_URL . 'users/feed');
        }
    }

    function plan($user_id = '', $physique_id = '')
    {
        $user_feed_plan = $this->model->get_user_feed_plan($user_id, $physique_id);
        $data = ["user_feed_plan" => $user_feed_plan];
        $this->user_view('plan', $data);
    }

}
