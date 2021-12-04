<?php

/**
 * Created by PhpStorm.
 * User: Novin Pendar
 * Date: 08/08/2019
 * Time: 02:07 PM
 */

if (!isset($_COOKIE['user']) or !isset($_SESSION['user']) or $_COOKIE['user'] != $_SESSION['user']) {
    header("location:" . SITE_URL . "users/user_login");
} else {
    class user_class extends controller
    {

        function __construct()
        {
        }

//        user class

        function index($class_id = '')
        {
            $langs = $this->model->lang_list();
            $terms = $this->model->term_list();
            $user_class_list = $this->model->user_class_list($class_id);
            $data = [
                "langs" => $langs,
                "terms" => $terms,
                "user_class_list" => $user_class_list,
            ];
            $this->user_view("user_class_list", $data);
        }

        function qualify_class_list($class_id = '')
        {
            $langs = $this->model->lang_list();
            $terms = $this->model->term_list();
            $qualify_class_list = $this->model->qualify_class_list($class_id);
            $data = [
                "langs" => $langs,
                "terms" => $terms,
                "qualify_class_list" => $qualify_class_list,
            ];
            $this->user_view("qualify_class_list", $data);
        }

        function AJAX_class_time($class_id = '')
        {
            $class_time = $this->model->class_time($class_id);
        }

        function search_by_ajax()
        {
            $this->model->search_by_ajax($_POST);
        }

        function register_in_class()
        {
            $this->model->register_in_class($_POST);
        }

        function add_credit()
        {
            $this->model->add_credit($_POST);
        }

        function pay_verify()
        {
            $this->model->pay_verify($_GET['Authority'], $_GET['Status']);
        }

        function get_class_numbers()
        {
            $this->model->get_class_numbers($_POST);
        }

//         user level request
        function request_level()
        {
            $langs = $this->model->lang_list();
            $request_level = $this->model->request_level_list();
            $data = [
                "langs" => $langs,
                "request_level" => $request_level,
            ];
            $this->user_view("request_level", $data);
        }

        function save_request_level()
        {
            $this->model->save_request_level($_POST);
        }

        function request_onvacation()
        {
            $class_list = $this->model->user_class_list_for_onv();
            $request_onvacation = $this->model->request_onvacation_list();
            $data = [
                "class_list" => $class_list,
                "request_onvacation" => $request_onvacation,
            ];
            $this->user_view("request_onvacation", $data);
        }

        function save_request_onvacation()
        {
            $this->model->save_request_onvacation($_POST);
        }


    }
}

