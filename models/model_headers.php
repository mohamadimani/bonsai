<?php

/**
 * Created by PhpStorm.
 * User: mani mohamadi
 * Date: 11/09/2018
 * Time: 12:24 AM
 */
class model_headers extends model
{


    function __construct()
    {
        parent::__construct();
    }

    function get_ecomm_menu()
    {
        $ecomm_menu = $this->Do_Select("select  * from   `ecomm_menu`    WHERE    `status`='ACTIVE'  ORDER by `position` ASC ");
        return $ecomm_menu;
    }

    function get_institute_user_info()
    {
        if (isset($_SESSION['user_id']) and !empty($_SESSION['user_id'])) {
            $user_id = $this->filter(base64_decode($_SESSION['user_id']));
            $user_info = $this->Do_Select("select  * from   `institute_users` where id=?", [$user_id], 1);
            return $user_info;
        } else {
            return "";
        }
    }

    function get_institute_teacher_info()
    {
        if (isset($_SESSION['teacher_id']) and !empty($_SESSION['teacher_id'])) {
            $user_id = $this->filter(base64_decode($_SESSION['teacher_id']));
            $user_info = $this->Do_Select("select  * from   `institute_users` where id=?", [$user_id], 1);
            return $user_info;
        } else {
            return "";
        }
    }

    function get_ecomm_category()
    {
        $ecomm_full_menu = [];
        $ecomm_menus = $this->Do_Select("select  * from   `ecomm_product_category`    WHERE    `status`='ACTIVE' and parent=0  ");
        foreach ($ecomm_menus as $ecomm_menu) {
            $ecomm_inner_menu = $this->Do_Select("select    * from   `ecomm_product_category`  WHERE    `status`='ACTIVE' and parent=?  ", [$ecomm_menu["id"]]);
            $ecomm_menu["inner_menu"] = $ecomm_inner_menu;
            $ecomm_full_menu[] = $ecomm_menu;
        }
        return $ecomm_full_menu;
    }

    //   =======   SITE OPTIPNS ========
    function get_options()
    {
        $sql = ("select * from `options` WHERE `status`='ACTIVE'  ");
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $options = $stmt->fetchAll(2);
        $push_options = [];
        foreach ($options as $option) {
            $push_options[$option["EN_name"]] = $option["value"];
        }
        return $push_options;
    }

    function get_bout_us()
    {
        $options = $this->Do_Select("select `posts_category`.`id` as `category_id`  , `posts`.* from `posts_category` LEFT JOIN `posts` ON  `posts_category`.`id`=`posts`.`category` WHERE `posts_category`.`EN_name`='about_us'  AND `posts`.`status`='ACTIVE' ", [], 1);
        $options["contect"] = str_replace("<br/>", "\n", $options["contect"]);
        $options["contect"] = str_replace("<br />", "\n", $options["contect"]);
        $options["contect"] = str_replace("<br>", "\n", $options["contect"]);
        $options["contect"] = str_replace("<br >", "\n", $options["contect"]);
        $options["contect"] = strip_tags($options["contect"]);
        $options["contect"] = $this->sub_text($options['contect'], 350, 1);
        return $options;
    }

    function get_social()
    {
        $options = $this->Do_Select("select * from `social` WHERE  `status`='ACTIVE' ", []);
        return $options;
    }

    function get_services()
    {
        $optionss = $this->Do_Select("select `posts_category`.`name` as `category_name`  , `posts`.* from `posts_category` LEFT JOIN `posts` ON  `posts_category`.`id`=`posts`.`category` WHERE `posts_category`.`EN_name`='services'  AND `posts`.`status`='ACTIVE'  ORDER by  `posts`.`id` ASC   LIMIT  0 , 6  ", []);
        foreach ($optionss as $options) {
            $options["contect"] = str_replace("<br/>", "\n", $options["contect"]);
            $options["contect"] = str_replace("<br />", "\n", $options["contect"]);
            $options["contect"] = str_replace("<br>", "\n", $options["contect"]);
            $options["contect"] = str_replace("<br >", "\n", $options["contect"]);
//            $options["contect"] = strip_tags($options["contect"]);
            $options["contect"] = $this->sub_text($options['contect'], 100, 1);
            $optionsss[] = $options;
        }
        return $optionsss;
    }

    function site_views()
    {
        $all_views = $this->Do_Select("select count(`views`) as all_seener , sum(`views`) as all_seen from  `page_views_log` WHERE `page_name`='index' ", [], 1);
        if (empty($all_views["all_seener"])) {
            $all_views["all_seener"] = 0;
        }
        if (empty($all_views["all_seen"])) {
            $all_views["all_seen"] = 0;
        }

        $today_views = $this->Do_Select("SELECT count(id) as `all_seener` , sum(`views`) as `all_seen`  FROM `page_views_log`  where `page_name`='index' and `view_date`>=? ", [strtotime('today midnight')], 1);
        if (empty($today_views["all_seener"])) {
            $today_views["all_seener"] = 0;
        }
        if (empty($today_views["all_seen"])) {
            $today_views["all_seen"] = 0;
        }

        return ["all_views" => $all_views, "today_views" => $today_views];
    }

}