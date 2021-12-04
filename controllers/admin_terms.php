<?php

/**
 * Created by PhpStorm.
 * User: Novin Pendar
 * Date: 08/08/2019
 * Time: 02:07 PM
 */
if (!isset($_COOKIE['clerk']) or !isset($_SESSION['clerk']) or $_COOKIE['clerk'] != $_SESSION['clerk']) {
    header("location:" . SITE_URL . "admin_login");
} else {
    class admin_terms extends controller
    {

        function __construct()
        {
        }

//        student   *****************
        function index()
        {
            $terms_list = $this->model->terms_list();
            $data = ["terms" => $terms_list];
            $this->admin_view("admin/institute/admin_terms", $data);
        }

        function add_terms()
        {
            $this->model->add_terms($_POST);
        }

        function term_status_change()
        {
            $this->model->term_status_change($_POST);
        }

        function delete_term()
        {
            $this->model->delete_term($_POST);
        }

        function edit_term($term_id = "")
        {
            $term_list = $this->model->terms_list($term_id);
            $data = ["term_list" => $term_list];
            $this->admin_view("admin/institute/admin_edit_term", $data);
        }

        function update_term($lang_id = "")
        {
            $this->model->update_term($_POST, $lang_id);
        }
    }
}
