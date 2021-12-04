<?php

/**
 * Created by PhpStorm.
 * User: mani mohamadi
 * Date: 11/08/2018
 * Time: 11:04 PM
 */
class contact extends controller
{

    function __construct()
    {

    }


    function index()
    {
        $data = [ ];
        $this->view('web/contact', $data);
    }


    function save_conmment()
    {
        $contact = $this->model->save_conmment($_POST);

    }


}