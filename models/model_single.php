<?php

/**
 * Created by PhpStorm.
 * User: mani mohamadi
 * Date: 11/09/2018
 * Time: 12:24 AM
 */
class model_single extends model
{


    function __construct()
    {
        parent::__construct();
    }

    function get_blog($post_id = '')
    {
        $post_id = $this->filter($post_id);
        $options = $this->Do_Select("select  * from   `posts`    WHERE  `id`=?   AND  `status`='ACTIVE' ", [$post_id], 1);
        $options["creat_date"] = $this->convert_date($options["creat_date"]);
        return $options;
    }

    function seen_post($post_id = "")
    {
        $post_id = $this->filter($post_id);
       echo $this->Do_Query("update `posts` set `view_count`=`view_count`+1 WHERE `id`=?", [$post_id]);
        print_r($post_id);
    }

    function get_last_blog()
    {
        $options = $this->Do_Select("select `posts_category`.`name` as `category_name`  , `posts`.* from `posts_category` LEFT JOIN `posts` ON  `posts_category`.`id`=`posts`.`category` WHERE `posts_category`.`EN_name`='blog'  or `posts_category`.`EN_name`='news'  AND `posts`.`status`='ACTIVE'  ORDER by  `posts`.`id` DESC   LIMIT  0 , 16  ", []);
        $options_new = [];
        foreach ($options as $option) {
            $date = $this->convert_date($option["creat_date"]);
            $option['new_date'] = $date;

            $option["contect"] = $this->sub_text($option['contect'], 50);
            array_push($options_new, $option);
        }
        return $options_new;
    }

}