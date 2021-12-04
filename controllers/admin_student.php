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
    class admin_student extends controller
    {

        function __construct()
        {
        }

//        student   *****************************
        function index()
        {
            $students = $this->model->students_list();
            $data = ["students" => $students];
            $this->admin_view("admin/institute/student/admin_students_list", $data);
        }

        function add_student()
        {
            $data = [];
            $this->admin_view("admin/institute/student/admin_add_student", $data);
        }

        function add_new_student()
        {
            $this->model->add_new_student($_POST);
        }

        function edit_student($user_id = "")
        {
            $user_info = $this->model->user_info($user_id);
            $data = ["user_info" => $user_info, "user_id" => $user_id];
            $this->admin_view("admin/institute/student/admin_edit_student", $data);
        }

        function update_user($user_id = "")
        {
            $this->model->update_user($_POST, $user_id);
        }

        function student_sharge()
        {
            $this->model->student_sharge($_POST);
        }

        function student_status_change()
        {
            $this->model->student_status_change($_POST);
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

//      feed  --------------------------
        function old_feed($user_id = "")
        {
            $user_physique = $this->model->get_user_physique($user_id);
            $data = [
                "user_physique" => $user_physique
            ];
            $this->admin_view('admin/institute/student/old_feed', $data);

        }

        function feed_review($user_id = "")
        {
            $user_physique = $this->model->get_user_physique_by_id($user_id);
            $food_unit = $this->model->get_food_unit($user_physique['need_calory']);
            $data = [
                "user_physique" => $user_physique,
                "food_unit" => $food_unit
            ];
            $this->admin_view('admin/institute/student/review', $data);

        }

        function write_plan($user_id = '', $physique_id = '')
        {
            $user_feed_plan = $this->model->get_user_feed_plan($user_id, $physique_id);
            $data = ["user_id" => $user_id, "physique_id" => $physique_id, "user_feed_plan" => $user_feed_plan];
            $this->admin_view('admin/institute/student/write_plan', $data);
        }

        function insert_plan($user_id = '', $physique_id = '',$plan_id='')
        {
            $user_feed_plan = $this->model->insert_plan($_POST,$user_id, $physique_id,$plan_id);
        }

    }
}
