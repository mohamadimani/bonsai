<?php

/**
 * Created by PhpStorm.
 * User: Novin Pendar
 * Date: 08/08/2019
 * Time: 10:04 PM
 */
class model_admin_student extends model
{
    public $clerk_id;

    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['clerk_id'])) {
            $this->clerk_id = base64_decode($_SESSION['clerk_id']);//for log system
        }
    }

//    students
    function students_list()
    {
        $students = $this->Do_Select("select * from institute_users WHERE user_type='student' ORDER by `id` desc");
        $all_students = [];
        foreach ($students as $student) {
            if (!empty($student["last_login"])) {
            } else {
                $student["last_login"] = "بدون ورود";
            }
            $all_students[] = $student;
        }

        return $all_students;
    }

    function student_sharge($data = [])
    {
        $student_id = $this->filter($data["user_id"]);
        $amount = $this->filter($data["amount"]);
        $summary = $this->filter($data["summary"]);
        if (!empty($student_id) and !empty($amount)) {
            $result = $this->Do_Query("update institute_users set credit=credit+? where id=? ", [$amount, $student_id]);
            if ($result == true) {
                $this->Do_Query("insert into credit_log (clerk_id,user_id,amount,summary,`pay_port`, `pay_status` ) VALUES (?,?,?,?,'پنل مدیریت','payed')", [$this->clerk_id, $student_id, $amount, $summary]);
                echo true;
            } else {
                echo "server";
            }
        } else {
            echo "null_info";
        }
    }

    function student_status_change($data = [])
    {
        $student_id = $this->filter($data["id"]);
        $status = $this->filter($data["status"]);
        if ($status == "active") {
            $status = "ACTIVE";
        } elseif ($status == "inactive") {
            $status = "INACTIVE";
        } else {
            echo "wrong_info";
        }
        if (!empty($status) and !empty($student_id)) {
            $result = $this->Do_Query("update institute_users set status=? where id=?", [$status, $student_id]);
            if ($result == true) {
                echo true;
            } else {
                echo "server";
            }
        } else {
            echo "null_info";
        }
    }

    function add_new_student($data = [])
    {
        $user_name = $this->filter($data["user_name"]);
        $password = $this->filter($data["password"]);
        $re_password = $this->filter($data["re_password"]);
        $email = $this->filter($data["email"]);
        $type = $this->filter($data["type"]);
        if ($type == "teacher") {
            $type = "teacher";
        } elseif ($type == "student") {
            $type = "student";
        } else {
            $type = "";
        }
        $ashnaei = $this->filter($data["ashnaei"]);
        $name = $this->filter($data["name"]);
        $family = $this->filter($data["family"]);
        $birth_date = $this->filter($data["birth_date"]);
        $national_code = $this->filter($data["national_code"]);
        $ostan = $this->filter($data["ostan"]);
        $city = $this->filter($data["city"]);
        $address = $this->filter($data["address"]);
        $postal_code = $this->filter($data["postal_code"]);
        $phone = $this->filter($data["phone"]);
        $mobile = $this->filter($data["mobile"]);
        $emergency_phone = $this->filter($data["emergency_phone"]);
        $education = $this->filter($data["education"]);
        $study_field = $this->filter($data["study_field"]);
        if ($password == $re_password) {
            $password = $this->password_hash($password);
            if (!empty($user_name) and !empty($password) and !empty($name) and !empty($family) and !empty($mobile)) {
                $is_user_name = $this->Do_Select(" select `id` from institute_users where username=?", [$user_name], 1);
                if (empty($is_user_name["id"])) {
                    $param = [$user_name, $password, $email, $type, $ashnaei, $name, $family, $birth_date, $national_code, $ostan, $city, $address, $education, $emergency_phone, $mobile, $phone, $postal_code, $study_field];
                    $result = $this->Do_Query("insert into institute_users (`username`,`password`,email,user_type,ashnaei,`name`,family,birthdate,code_meli,state,city,address,education,emergency_phone,mobile,phone,postal_code,study_field) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $param);
                    $user_id = $this->conn->lastInsertId();
                    if ($result == true) {
                        $_SESSION["add_student"] = "success";
                        $_SESSION["add_student_user_id"] = $user_id;
                        if ($type == "teacher") {
                            header("location:" . SITE_URL . "admin_student/teachers_list");
                        } elseif ($type == "student") {
                            header("location:" . SITE_URL . "admin_student");
                        }
                    } else {
                        $_SESSION["add_student"] = "server";
                        $_SESSION["add_student_info"] = $data;
                        header("location:" . SITE_URL . "admin_student/add_student");
                    }
                } else {
                    $_SESSION["add_student"] = "is_user_name";
                    $_SESSION["add_student_info"] = $data;
                    header("location:" . SITE_URL . "admin_student/add_student");
                }
            } else {
                $_SESSION["add_student"] = "empty";
                $_SESSION["add_student_info"] = $data;
                header("location:" . SITE_URL . "admin_student/add_student");
            }

        } else {
            $_SESSION["add_student"] = "re_password";
            $_SESSION["add_student_info"] = $data;
            header("location:" . SITE_URL . "admin_student/add_student");
        }

    }

    function user_info($user_id = "")
    {
        $user_id = $this->filter($user_id);
        return $this->Do_Select("select * from institute_users where `id`=? ", [$user_id], 1);
    }

    function update_user($data = [], $user_id)
    {
        $user_id = $this->filter($user_id);
        $user_name = $this->filter($data["user_name"]);
        $password = $this->filter($data["password"]);
        $re_password = $this->filter($data["re_password"]);
        $email = $this->filter($data["email"]);
        $type = $this->filter($data["user_type"]);
        if ($type == "teacher") {
            $type = "teacher";
        } elseif ($type == "student") {
            $type = "student";
        } else {
            $type = "";
        }
        $ashnaei = $this->filter($data["ashnaei"]);
        $name = $this->filter($data["name"]);
        $family = $this->filter($data["family"]);
        $birth_date = $this->filter($data["birthdate"]);
        $national_code = $this->filter($data["code_meli"]);
        $ostan = $this->filter($data["state"]);
        $city = $this->filter($data["city"]);
        $address = $this->filter($data["address"]);
        $postal_code = $this->filter($data["postal_code"]);
        $phone = $this->filter($data["phone"]);
        $mobile = $this->filter($data["mobile"]);
        $emergency_phone = $this->filter($data["emergency_phone"]);
        $education = $this->filter($data["education"]);
        $study_field = $this->filter($data["study_field"]);
        if ($password == $re_password) {
            if (!empty($password)) {
                $password = $this->password_hash($password);
                if (!empty($user_name) and !empty($name) and !empty($family) and !empty($mobile)) {
                    $is_user_name = $this->Do_Select(" select `id` from institute_users where username=?", [$user_name], 1);
                    if (empty($is_user_name["id"]) or $is_user_name["id"] == $user_id) {
                        $param = [$user_name, $password, $email, $type, $ashnaei, $name, $family, $birth_date, $national_code, $ostan, $city, $address, $education, $emergency_phone, $mobile, $phone, $postal_code, $study_field, $user_id];
                        $result = $this->Do_Query("update    institute_users set `username`=? ,`password`=?,email=?,user_type=?,ashnaei=?,`name`=?,family=?,birthdate=?,code_meli=?,state=?,city=?,address=?,education=?,emergency_phone=?,mobile=?,phone=?,postal_code=?,study_field=?   where  `id`=?  ", $param);
                        if ($result == true) {
                            $_SESSION["update_student"] = "success";
                            $_SESSION["update_student_user_id"] = $user_id;
                            if ($type == "teacher") {
                                header("location:" . SITE_URL . "admin_student/teachers_list");
                            } elseif ($type == "student") {
                                header("location:" . SITE_URL . "admin_student");
                            }
                        } else {
                            $_SESSION["update_student"] = "server";
                            $_SESSION["update_student_info"] = $data;
                            header("location:" . SITE_URL . "admin_student/edit_student/$user_id");
                        }
                    } else {
                        $_SESSION["update_student"] = "is_user_name";
                        $_SESSION["update_student_info"] = $data;
                        header("location:" . SITE_URL . "admin_student/edit_student/$user_id");
                    }
                } else {
                    $_SESSION["update_student"] = "empty";
                    $_SESSION["update_student_info"] = $data;
                    header("location:" . SITE_URL . "admin_student/edit_student/$user_id");
                }
            } else {
                if (!empty($user_name) and !empty($name) and !empty($family) and !empty($mobile)) {
                    $is_user_name = $this->Do_Select(" select `id` from institute_users where username=?", [$user_name], 1);
                    if (empty($is_user_name["id"]) or $is_user_name["id"] == $user_id) {
                        $param = [$user_name, $email, $type, $ashnaei, $name, $family, $birth_date, $national_code, $ostan, $city, $address, $education, $emergency_phone, $mobile, $phone, $postal_code, $study_field, $user_id];
                        $result = $this->Do_Query("update    institute_users set `username`=? ,email=?,user_type=?,ashnaei=?,`name`=?,family=?,birthdate=?,code_meli=?,state=?,city=?,address=?,education=?,emergency_phone=?,mobile=?,phone=?,postal_code=?,study_field=?   where  `id`=?  ", $param);
                        if ($result == true) {
                            $_SESSION["update_student"] = "success";
                            $_SESSION["update_student_user_id"] = $user_id;
                            if ($type == "teacher") {
                                header("location:" . SITE_URL . "admin_student/teachers_list");
                            } elseif ($type == "student") {
                                header("location:" . SITE_URL . "admin_student");
                            }
                        } else {
                            $_SESSION["update_student"] = "server";
                            $_SESSION["update_student_info"] = $data;
                            header("location:" . SITE_URL . "admin_student/edit_student/$user_id");
                        }
                    } else {
                        $_SESSION["update_student"] = "is_user_name";
                        $_SESSION["update_student_info"] = $data;
                        header("location:" . SITE_URL . "admin_student/edit_student/$user_id");
                    }
                } else {
                    $_SESSION["update_student"] = "empty";
                    $_SESSION["update_student_info"] = $data;
                    header("location:" . SITE_URL . "admin_student/edit_student/$user_id");
                }
            }
        } else {
            $_SESSION["update_student"] = "re_password";
            $_SESSION["update_student_info"] = $data;
            header("location:" . SITE_URL . "admin_student/edit_student/$user_id");
        }
    }

    function get_credit_story($user_id = "")
    {
        $user_id = $this->filter($user_id);
        $result = $this->Do_Select("select credit_log.* , institute_users.credit,institute_users.name,institute_users.family from credit_log left join institute_users on credit_log.user_id=institute_users.id   where credit_log.user_id=?", [$user_id]);
        if (!empty($result)) {
            $all_story = [];
            foreach ($result as $row) {
                $row["add_date"] = $this->time_to_jalali_date('DT', $row["add_date"]);
                $row["add_date"] = $row["add_date"]["date"] . " " . $row["add_date"]["time"];
                $all_story[] = $row;
            }
            echo json_encode($all_story);
        } else {
            echo json_encode("null");
        }
    }

//teachers
    function teachers_list()
    {
        $students = $this->Do_Select("select * from institute_users WHERE user_type='teacher' ORDER by `id` desc");
        $all_students = [];
        foreach ($students as $student) {
            if (!empty($student["last_login"])) {
                $student["last_login"] = $this->time_to_jalali_date("DT", $student["last_login"]);
                $student["last_login"] = $student["last_login"] ["date"] . " " . $student["last_login"] ["time"];
            } else {
                $student["last_login"] = "بدون ورود";
            }

            $all_students[] = $student;
        }

        return $all_students;

    }

    function search_by_ajax($data = [])
    {
        $search_text = $this->filter($data["search_text"]);
        $type = $this->filter($data["type"]);
        if ($type == "teacher") {
            $type = "teacher";
        } elseif ($type == "student") {
            $type = "student";
        }
        $selection = " `id` , `name` , `family`,`username`, `last_login`,`status`, `mobile` , `user_type` ";
//        $students = $this->Do_Select("select $selection from institute_users WHERE user_type=? AND   `name`  like '%$search_text%' or `username` like '%$search_text%' ORDER by `id` desc", [$type]);
        $students = $this->Do_Select("select $selection from institute_users WHERE  `name`  like '%$search_text%'  and  user_type=?  or `username` like '%$search_text%'   and  user_type=?  order by id desc", [$type, $type]);
        $all_students = [];
        foreach ($students as $student) {
            if (!empty($student["last_login"])) {
                $student["last_login"] = $this->time_to_jalali_date("DT", $student["last_login"]);
                $student["last_login"] = $student["last_login"] ["date"] . " " . $student["last_login"] ["time"];
            } else {
                $student["last_login"] = "بدون ورود";
            }
            $all_students[] = $student;
        }
        if (isset($all_students) and is_array($all_students) and !empty($all_students)) {
            echo json_encode($all_students);
        } else {
            echo json_encode(null);
        }
    }

//    --------------- feed

    function get_user_physique($id = "")
    {
        if (!empty($id)) {
            $dates = [];
            $result_physique = $this->Do_Select('select id,in_date from  feed_user_physique  where  user_id=?', [$id]);
            foreach ($result_physique as $result) {
                $result['in_date'] = $this->convert_date($result['in_date']);
                $dates[] = $result;
            }
            return $dates;
        }

    }

    function get_user_physique_by_id($id = "")
    {
        if (!empty($id)) {
            $result_physique = $this->Do_Select('select * from  feed_user_physique  where  id=?', [$id], 1);
            $result_physique['in_date'] = $this->convert_date($result_physique['in_date']);
            return $result_physique;
        }

    }

    function get_food_unit($need_calory = "")
    {
        $need_calory = $this->filter(round($need_calory));
        $result_physique = $this->Do_Select('select * from  food_unit  where calori_min<= ? and calori_max >=? ', [$need_calory, $need_calory], 1);
        return $result_physique;

    }

    function get_user_feed_plan($user_id = "", $physique_id = "")
    {
        $user_id = $this->filter($user_id);
        $physique_id = $this->filter($physique_id);
        $result_physique = $this->Do_Select('select * from  users_feed_plan  where user_id=? and physique_id=?', [$user_id, $physique_id], 1);
        return $result_physique;
    }

    function insert_plan($data = [], $user_id = "", $physique_id = "", $plan_id = "")
    {
        $plan_id = $this->filter($plan_id);
        $physique_id = $this->filter($physique_id);
        $user_id = $this->filter($user_id);
        $title = $this->filter($data["title"]);
        $plan = $data["plan"];

        if (!empty($title) and !empty($plan)) {
            if (!empty($plan_id) and is_numeric($plan_id)) {
                $result = $this->Do_Query("update users_feed_plan set title= ? , plan=? where id=? ", [$title, $plan, $plan_id]);
                if ($result) {
                    $_SESSION['save_plan'][0] = 'success';
                    $_SESSION['save_plan'][1] = 'اطلاعات با موفقیت بروز شد';
                    header('location:' . SITE_URL . "admin_student/write_plan/$user_id/$physique_id ");
                } else {
                    $_SESSION['save_plan'][0] = 'danger';
                    $_SESSION['save_plan'][1] = 'مشکل در بروز رسانی';
                    header('location:' . SITE_URL . "admin_student/write_plan/$user_id/$physique_id ");
                }
            } else {
                $result2 = $this->Do_Query("insert into users_feed_plan (title,plan,user_id,physique_id ) VALUES (?,?,?,? )", [$title, $plan, $user_id, $physique_id]);
                if ($result2) {
                    $_SESSION['save_plan'][0] = 'success';
                    $_SESSION['save_plan'][1] = 'اطلاعات با موفقیت ثبت شد';
                    header('location:' . SITE_URL . "admin_student/write_plan/$user_id/$physique_id ");
                } else {
                    $_SESSION['save_plan'][0] = 'danger';
                    $_SESSION['save_plan'][1] = 'مشکل در ثبت';
                    header('location:' . SITE_URL . "admin_student/write_plan/$user_id/$physique_id ");
                }
            }
        } else {
            $_SESSION['save_plan'][0] = 'danger';
            $_SESSION['save_plan'][1] = 'مقادیر رو وارد کنید';
            header('location:' . SITE_URL . "admin_student/write_plan/$user_id/$physique_id ");
        }
    }

}