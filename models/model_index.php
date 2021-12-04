<?php

/**
 * Created by PhpStorm.
 * User: mani mohamadi
 * Date: 11/09/2018
 * Time: 12:24 AM
 */
class model_index extends model
{


    function __construct()
    {
        parent::__construct();
    }

    function get_captcha()
    {
        $captcha = $this->captcha_cod();
        $captcha_question = $captcha["question"];
        $_SESSION["captcha_answer_idea"] = $captcha["answer"];
        return $captcha_question;
    }


    function get_slider()
    {
        $options = $this->Do_Select("select * from    `gallery`  where `slider`='YES' ORDER by `id` DESC ", []);
        return $options;
    }

    function get_clients()
    {
        $options = $this->Do_Select("select *  from `clients_gallery`   WHERE   `status`='active' ");
        return $options;
    }

    function get_about()
    {
        $options = $this->Do_Select("select `posts_category`.`id` as `category_id`  , `posts`.* from `posts_category` LEFT JOIN `posts` ON  `posts_category`.`id`=`posts`.`category` WHERE `posts_category`.`EN_name`='about_us'  AND `posts`.`status`='ACTIVE' ", [], 1);
        $options["contect"] = str_replace("<br/>", "\n", $options["contect"]);
        $options["contect"] = str_replace("<br />", "\n", $options["contect"]);
        $options["contect"] = str_replace("<br>", "\n", $options["contect"]);
        $options["contect"] = str_replace("<br >", "\n", $options["contect"]);
        $options["contect"] = strip_tags($options["contect"]);
        $options["contect"] = $this->sub_text($options['contect'], 450, 1);
        return $options;
    }

    function get_last_news()
    {
        $options = $this->Do_Select("select `posts_category`.`name` as `category_name`  , `posts`.* from `posts_category` LEFT JOIN `posts` ON  `posts_category`.`id`=`posts`.`category` WHERE `posts_category`.`EN_name`='news'  AND `posts`.`status`='ACTIVE'  ORDER by  `posts`.`id` DESC   LIMIT  0 , 6  ", []);
        $options_new = [];
        foreach ($options as $option) {
            $date = $this->convert_date($option["creat_date"]);
            $option['new_date'] = $date;

            $option["contect"] = $this->sub_text($option['contect'], 50);
            array_push($options_new, $option);
        }
        return $options_new;
    }

    function get_last_blog()
    {
        $options = $this->Do_Select("select `posts_category`.`name` as `category_name`  , `posts`.* from `posts_category` LEFT JOIN `posts` ON  `posts_category`.`id`=`posts`.`category` WHERE `posts_category`.`EN_name`='blog'  AND `posts`.`status`='ACTIVE'  ORDER by  `posts`.`id` DESC   LIMIT  0 , 6  ", []);
        $options_new = [];
        foreach ($options as $option) {
            $date = $this->convert_date($option["creat_date"]);
            $option['new_date'] = $date;

            $option["contect"] = $this->sub_text($option['contect'], 50);
            array_push($options_new, $option);
        }
        return $options_new;
    }

    function get_services()
    {
        $options = $this->Do_Select("select `posts_category`.`name` as `category_name`  , `posts`.* from `posts_category` LEFT JOIN `posts` ON  `posts_category`.`id`=`posts`.`category` WHERE `posts_category`.`EN_name`='services'  AND `posts`.`status`='ACTIVE'  ORDER by  `posts`.`id` ASC    ", []);
//        $options_new = [];
//        foreach ($options as $option) {
//            $date = $this->convert_date($option["creat_date"]);
//            $option['new_date'] = $date;
//
//            $option["contect"] = $this->sub_text($option['contect'], 50);
//            array_push($options_new, $option);
//        }
//        return $options_new;
        return $options;
    }

    function get_team_gallery()
    {
        $options = $this->Do_Select("select * from team_gallery  WHERE  `status`='ACTIVE' ", []);
        return $options;
    }

    function save_idea_employ($name = "", $mobile = "", $comment = "")
    {
        $name = $this->filter($name);
        $mobile = $this->filter($mobile);
        $comment = $this->filter($comment);
        if (!empty($name) and !empty($mobile) and !empty($comment)) {
            $mobile_be = $this->Do_Select("select `mobile`  from `idea_room_employ`   WHERE `mobile`=? ", [$mobile], 1);
            if (empty($mobile_be["mobile"])) {
                $options = $this->Do_Query("insert into `idea_room_employ`(`name`,`mobile`,`comment`) VALUES(?,?,?)", [$name, $mobile, $comment]);
                if ($options == true) {
                    return "success";
                } else {
                    return "warning";
                }
            } else {
                return "mobile";
            }
        }
    }

    function seen_page($page_name = "")
    {
        $this->seen_pages($page_name);
    }


    function get_new_products()
    {
        return $this->DO_Select("select ecomm_products.* , ecomm_product_category.title from ecomm_products LEFT JOIN ecomm_product_category ON ecomm_products.`category`=ecomm_product_category.`id` where ecomm_products.`status`='ACTIVE' ORDER by ecomm_products.`id` desc limit 0,4  ");
    }

}