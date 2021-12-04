<?php

/**
 * Created by PhpStorm.
 * User: mani mohamadi
 * Date: 11/09/2018
 * Time: 12:24 AM
 */
class model_contact extends model
{


    function __construct()
    {
        parent::__construct();
    }


    function save_conmment($data = "")
    {
        $name = $this->filter($data["name"]);
        $phone = $this->filter($data["phone"]);
        $email = $this->filter($data["email"]);
        $content = $this->filter($data["comment"]);
        if (!empty($name) and !empty($phone) and !empty($content)) {

            $result = $this->Do_Query("insert into `comments` (`name`,`email`,`comment`,`phone`) VALUES (?,?,?,?)", [$name, $email, $content, $phone]);
            if ($result == true) {
                $_SESSION["send_message"][0] = "success";
                $_SESSION["send_message"][1] = "پیام با موفقیت ذخیره شد";
                header("location:" . SITE_URL . "contact");
            } else {
                $_SESSION["send_message"][0] = "danger";
                $_SESSION["send_message"][1] = "مشکل در ذخیره پیام";
                header("location:" . SITE_URL . "contact");
            }
        } else {
            $_SESSION["send_message"][0] = "danger";
            $_SESSION["send_message"][1] = "همه اطلاعات رو کامل پر کنید!";
            header("location:" . SITE_URL . "contact");
        }
    }


}