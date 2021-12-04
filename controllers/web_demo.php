<?php

/**
 * Created by PhpStorm.
 * User: mani mohamadi
 * Date: 11/08/2018
 * Time: 11:04 PM
 */
class  web_demo extends controller
{

    function __construct()
    {
    }

    function index()
    {
        $get_demo_sub_category = $this->model->get_demo_category();
        $get_projects = $this->model->get_projects();
        $data = [
            'projects' => $get_projects,
            'demo_sub_category' => $get_demo_sub_category,
        ];
        $this->view('web/demoes', $data);
    }

//    function get_all_demo()
//    {
//        $this->model->get_all_demo($_POST);
//    }

    function single($demo_id = "")
    {
        $get_single_demo = $this->model->single($demo_id);
        $similar_demo = $this->model->similar_demo($get_single_demo['category'], $get_single_demo['id']);
        $data = [
            'get_single_demo' => $get_single_demo,
            'similar_demo' => $similar_demo
        ];
        $this->view('web/single_demo', $data);
    }

    function seen_demo()
    {
        $this->model->seen_demo($_POST['demo_id']);
    }

//    function all_demo($category = "")
//    {
//        $get_all_demo = $this->model->get_all_demo2($category);
//        $category_info = $this->model->category_info($category);
//        $data = [
//            'category_info' => $category_info,
//            'all_demo' => $get_all_demo,
//        ];
//        $this->view('demo/demoes', $data);
//    }

}