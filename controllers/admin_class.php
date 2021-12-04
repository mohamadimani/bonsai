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
    class admin_class extends controller
    {

        function __construct()
        {
        }

//        student   *****************************
        function index()
        {
            $langs = $this->model->lang_list();
            $terms = $this->model->term_list();
            $class_list = $this->model->class_list();
            $data = [
                "langs" => $langs,
                "terms" => $terms,
                "class_list" => $class_list,
            ];
            $this->admin_view("admin/institute/class/admin_class_list", $data);
        }

        function add_class()
        {
            $langs = $this->model->lang_list();
            $terms = $this->model->term_list();
            $teachers = $this->model->teacher_list();
            $data = [
                "langs" => $langs,
                "terms" => $terms,
                "teachers" => $teachers,
            ];
            $this->admin_view("admin/institute/class/admin_add_class", $data);
        }

        function add_new_class()
        {
            $this->model->add_new_class($_POST);
        }

        function class_status_change()
        {
            $this->model->class_status_change($_POST);
        }

        function edit_class($class_id = "")
        {
            $langs = $this->model->lang_list();
            $terms = $this->model->term_list();
            $teachers = $this->model->teacher_list();
            $class_info = $this->model->class_list($class_id);
            $data = [
                "class_info" => $class_info,
                "class_id" => $class_id,
                "langs" => $langs,
                "terms" => $terms,
                "teachers" => $teachers,
            ];
            $this->admin_view("admin/institute/class/admin_edit_class", $data);
        }

        function AJAX_class_time($class_id = '')
        {
            $class_time = $this->model->class_time($class_id);
        }

        function save_class_days()
        {
            $this->model->save_class_days($_POST);
        }

//        ******


        function update_class($class_id = "")
        {
            $this->model->update_class($_POST, $class_id);
        }

        function student_sharge()
        {
            $this->model->student_sharge($_POST);
        }


        function get_credit_story()
        {
            $this->model->get_credit_story($_POST["user_id"]);
        }

//        teacher   ****************************

        function teachers_list()
        {
            $students = $this->model->teachers_list();
            $data = ["students" => $students];
            $this->admin_view("admin/institute/teacher/admin_teacher_list", $data);
        }

        function search_by_ajax()
        {
            $this->model->search_by_ajax($_POST);
        }
    }
}
