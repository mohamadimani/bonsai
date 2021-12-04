<?php

/**
 * Created by PhpStorm.
 * User: mani mohamadi
 * Date: 11/09/2018
 * Time: 12:24 AM
 */
class model_blog extends model
{


    function __construct()
    {
        parent::__construct();
    }

    function get_blog()
    {
        $options = $this->Do_Select("select `posts_category`.`name` as cat_name ,`posts_category`.`id` as `category_id` , `posts`.* from `posts_category` LEFT JOIN `posts` ON  `posts_category`.`id`=`posts`.`category` WHERE `posts_category`.`EN_name`='news' or  `posts_category`.`EN_name`='blog'  AND `posts`.`status`='ACTIVE'  ORDER by  `posts`.`id` DESC ", []);
        $options_new = [];
        foreach ($options as $option) {
            $date = $this->convert_date($option["creat_date"]);
            $option['new_date'] = $date;

            $option["contect"] = str_replace("<br/>", "\n", $option["contect"]);
            $option["contect"] = str_replace("<br />", "\n", $option["contect"]);
            $option["contect"] = str_replace("<br>", "\n", $option["contect"]);
            $option["contect"] = str_replace("<br >", "\n", $option["contect"]);
            $option["contect"] = strip_tags($option["contect"]);
            $option["contect"] = $this->sub_text($option['contect'], 50, 1);
            array_push($options_new, $option);
        }
        return $options_new;
    }




}