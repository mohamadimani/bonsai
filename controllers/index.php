<?php

/**
 * Created by PhpStorm.
 * User: mani mohamadi
 * Date: 11/08/2018
 * Time: 11:04 PM
 */
//header('location:' . SITE_URL . 'feed');

class index extends controller
{

    function __construct()
    {

    }


    function index()
    {
        $clients = $this->model->get_clients();
        $captcha = $this->model->get_captcha();
        $get_services = $this->model->get_services();
        $get_slider = $this->model->get_slider();
        $site_about = $this->model->get_about();
        $last_news = $this->model->get_last_news();
        $last_blog = $this->model->get_last_blog();
        $team_gallery = $this->model->get_team_gallery();
        $new_products = $this->model->get_new_products();
        $data = ["site_about" => $site_about,
            "last_news" => $last_news,
            "get_slider" => $get_slider,
            "get_services" => $get_services,
            "captcha" => $captcha,
            "clients" => $clients,
            "team_gallery" => $team_gallery,
            "last_blog" => $last_blog ,
            "new_products" => $new_products  ,
        ];
        $this->view('web/index', $data);
    }

    function save_idea_employ()
    {
        $data = [];
        if (!empty(trim($_POST["name"]))) {
            $name = $_POST["name"];
        } else {
            $data["name"] = "نام را وارد کنید !";
        }
        if (!empty(trim($_POST["mobile"])) and is_numeric($_POST["mobile"]) and strlen($_POST["mobile"]) > 10) {
            $mobile = $_POST["mobile"];
        } else {
            $data["mobile"] = "موبایل خود را وارد کنید !";
        }
        if (!empty(trim($_POST["comment"])) and strlen($_POST["comment"]) > 100) {
            $comment = $_POST["comment"];
        } else {
            $data["comment"] = "حداقل 100 کاراکتر در مورد خودتان بنویسید !";
        }

        if (!empty(trim($_POST["captcha"])) and trim($_POST["captcha"]) == $_SESSION["captcha_answer_idea"]) {

            $captcha = $_POST["captcha"];
        } else {
            $data["captcha"] = "کد تایید اشتباه است !";
        }

        if (!empty($data)) {
            print_r(json_encode($data));
        } else {
            $result = $this->model->save_idea_employ($name, $mobile, $comment);
            if ($result == "success") {
//                unset($_SESSION["captcha_answer_idea"]);
                $data2["success"] = "اطلاعات با موفقیت ثبت شد";
            } else if ($result == "mobile") {
                $data2["mobile"] = " این شماره قبلا ثبت   شده  !";
            } else {
                $data2["warning"] = "خطا در ثبت اطلاعات !";
            }
            print_r(json_encode($data2));
        }
    }

    function seen_page()
    {
        $this->model->seen_page($_POST["page_name"]);
    }
}