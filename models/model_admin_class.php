<?php

/**
 * Created by PhpStorm.
 * User: Novin Pendar
 * Date: 08/08/2019
 * Time: 10:04 PM
 */
class model_admin_class extends model
{
    public $clerk_id;

    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['clerk_id'])) {
            $this->clerk_id = base64_decode($_SESSION['clerk_id']);//for log system
        }
    }

    function class_list($class_id = '')
    {
        $class_id = $this->filter($class_id);
        if (empty($class_id)) {
            $class_list = $this->Do_Select("
                      select   langs.lang_name ,  terms.term_name ,teachers.name ,teachers.family , class.* from institute_class class 
                      LEFT JOIN institute_terms terms on class.term_id=terms.id 
                      LEFT JOIN institute_langs langs on class.lang_id=langs.id 
                      LEFT JOIN institute_users teachers on class.teacher_id=teachers.id order by class.id DESC 
                        ");
            return $class_list;
        } else {
            $class_list = $this->Do_Select("
                    select   langs.lang_name ,  terms.term_name ,teachers.name ,teachers.family , class.* from institute_class class 
                    LEFT JOIN institute_terms terms on class.term_id=terms.id 
                    LEFT JOIN institute_langs langs on class.lang_id=langs.id 
                    LEFT JOIN institute_users teachers on class.teacher_id=teachers.id where class.`id`=? order by class.id DESC 
                     ", [$class_id], 1);
            return $class_list;
        }
    }

    function lang_list()
    {
        $langs = $this->Do_Select("select * from institute_langs WHERE status='ACTIVE' ORDER by `id` desc");
        return $langs;
    }

    function term_list()
    {
        $terms = $this->Do_Select("select `id`,`term_name` from institute_terms WHERE status='ACTIVE' ORDER by `id` desc");
        return $terms;
    }

    function teacher_list()
    {
        $teachers = $this->Do_Select("select `name`,`family`,`id` from institute_users WHERE `user_type`='teacher' ORDER by `id` DESC");
        return $teachers;
    }

    function add_new_class($data = [])
    {
        $user_id = $this->filter($this->clerk_id);

        $days = $data['day'];
        $time = $data['time'];

        $lang_name = $this->filter($data['lang_name']);
        $lang_level = $this->filter($data['lang_level']);
        $term = $this->filter($data['term']);
        $teacher = $this->filter($data['teacher']);
        $tuition = $this->filter($data['tuition']);
        $capacity = $this->filter($data['capacity']);
        $session_count = $this->filter($data['session_count']);
        $class_type = $this->filter($data['class_type']);
        if ($class_type == "public") {
            $class_type = "public";
        } elseif ($class_type == "private") {
            $class_type = "private";
        } else if ($class_type == 'semiprivate') {
            $class_type = "semiprivate";
        }

        if (!empty($session_count) and !empty($class_type) and !empty($lang_name) and !empty($lang_level) and !empty($term) and !empty($tuition) and !empty($capacity)) {
            $param = [$lang_name, $lang_level, $term, $class_type, $teacher, $tuition, $capacity, $session_count, $user_id];
            $result = $this->Do_Query("insert into institute_class (`lang_id`,`lang_level`,`term_id`,`class_type`,`teacher_id`,`tuition`,`capacity`,`session_count`,`user_id`  ) VALUES (?,?,?,?,?,?,?,?,?)", $param);
            $class_id = $this->conn->lastInsertId();
            if ($result == true) {
                foreach ($days as $key => $day) {
                    if ($day == 'on') {
                        $param = [$class_id, $this->filter($key), $this->filter($time[$key]), $user_id];
                        $result = $this->Do_Query("insert into  institute_class_time (`class_id`,`day`,`time`, `user_id`  ) VALUES (?,?,?,? )", $param);
                    }
                }
                $_SESSION["add_class"] = "success";
                $_SESSION["add_class_user_id"] = $class_id;
                header("location:" . SITE_URL . "admin_class");
            } else {
                $_SESSION["add_class"] = "server";
                $_SESSION["add_class_info"] = $data;
                header("location:" . SITE_URL . "admin_class/add_class");
            }
        } else {
            $_SESSION["add_class"] = "empty";
            $_SESSION["add_class_info"] = $data;
            header("location:" . SITE_URL . "admin_class/add_class");
        }
    }

    function class_status_change($data = [])
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
            $result = $this->Do_Query("update institute_class set status=? where id=?", [$status, $student_id]);
            if ($result == true) {
                echo true;
            } else {
                echo "server";
            }
        } else {
            echo "null_info";
        }
    }

    function update_class($data = [], $class_id = '')
    {
        $user_id = $this->filter($this->clerk_id);
        $class_id = $this->filter($class_id);

        $lang_name = $this->filter($data['lang_id']);
        $lang_level = $this->filter($data['lang_level']);
        $term = $this->filter($data['term_id']);
        $teacher = $this->filter($data['teacher_id']);
        $tuition = $this->filter($data['tuition']);
        $capacity = $this->filter($data['capacity']);
        $session_count = $this->filter($data['session_count']);

        $class_type = $this->filter($data['class_type']);
        if ($class_type == "public") {
            $class_type = "public";
        } elseif ($class_type == "private") {
            $class_type = "private";
        } else if ($class_type == 'semiprivate') {
            $class_type = "semiprivate";
        }

        if (!empty($session_count) and !empty($class_type) and !empty($lang_name) and !empty($lang_level) and !empty($term) and !empty($tuition) and !empty($capacity)) {
            $param = [$lang_name, $lang_level, $term, $class_type, $teacher, $tuition, $capacity, $session_count, $user_id, $class_id];
            $result = $this->Do_Query("update   institute_class set `lang_id`=?,`lang_level`=?,`term_id`=?,`class_type`=?,`teacher_id`=?,`tuition`=?,`capacity`=?,`session_count`=?,`user_id`=?  WHERE id=?", $param);
            if ($result == true) {
                $_SESSION["update_class"] = "success";
                $_SESSION["updated_class_id"] = $class_id;
                header("location:" . SITE_URL . "admin_class");
            } else {
                $_SESSION["update_class"] = "server";
                $_SESSION["update_class_info"] = $data;
                header("location:" . SITE_URL . "admin_class/edit_class/" . $class_id);
            }
        } else {
            $_SESSION["update_class"] = "empty";
            $_SESSION["update_class_info"] = $data;
            header("location:" . SITE_URL . "admin_class/edit_class/" . $class_id);
        }

    }

    function class_time($class_id = '')
    {
        $class_id = $this->filter($class_id);
        $class_time = $this->Do_Select("select * from institute_class_time WHERE status='ACTIVE' AND `class_id`=? ORDER by `id` ASC ", [$class_id]);
        echo json_encode($class_time);
    }

    function save_class_days($data = [])
    {
        $class_id = $this->filter($data['class_id']);
        $time = $data['time'];
        $user_id = $this->filter($this->clerk_id);
        if (isset($class_id) and !empty($class_id)) {
            $result = $this->Do_Query('delete from institute_class_time where `class_id`=? ', [$class_id]);
            if ($result) {
                foreach ($data['day'] as $key => $day) {
                    $per_day = '';
                    if ($key == 'sat') {
                        $per_day = ' شنبه ';
                    } else if ($key == 'sun') {
                        $per_day = ' یک شنبه ';
                    } else if ($key == 'mon') {
                        $per_day = ' دو شنبه ';
                    } else if ($key == 'tue') {
                        $per_day = ' سه شنبه ';
                    } else if ($key == 'wed') {
                        $per_day = ' چهار شنبه ';
                    } else if ($key == 'tur') {
                        $per_day = ' پنج شنبه ';
                    } else if ($key == 'fri') {
                        $per_day = ' جمعه ';
                    }
                    if ($day == 'on') {
                        $param = [$class_id, $this->filter($key), $this->filter($time[$key]), $user_id, trim($per_day)];
                        $result = $this->Do_Query("insert into  institute_class_time (`class_id`,`day`,`time`, `user_id`,`persion_name`  ) VALUES (?,?,?,?,?)", $param);
                    }
                }
                $_SESSION['save_class_day'] = 'success';
                header("location:" . SITE_URL . "admin_class");
            } else {
                $_SESSION['save_class_day'] = 'danger';
                header("location:" . SITE_URL . "admin_class");
            }
        } else {
            $_SESSION['save_class_day'] = 'danger';
            header("location:" . SITE_URL . "admin_class");
        }
    }

    function search_by_ajax($data = [])
    {
        $search_type = $this->filter($data['search_type']);
        $search_id = $this->filter($data['search_id']);
        if (!empty($search_id) and $search_id == 'all') {
            $class_list = $this->Do_Select("
                      select   langs.lang_name ,  terms.term_name ,teachers.name ,teachers.family , class.* from institute_class class 
                      LEFT JOIN institute_terms terms on class.term_id=terms.id 
                      LEFT JOIN institute_langs langs on class.lang_id=langs.id 
                      LEFT JOIN institute_users teachers on class.teacher_id=teachers.id   order by class.id DESC  ");
            echo json_encode($class_list);
        } else {

            if (!empty($search_type) and $search_type == 'lang') {
                $class_list = $this->Do_Select("
                      select   langs.lang_name ,  terms.term_name ,teachers.name ,teachers.family , class.* from institute_class class 
                      LEFT JOIN institute_terms terms on class.term_id=terms.id 
                      LEFT JOIN institute_langs langs on class.lang_id=langs.id 
                      LEFT JOIN institute_users teachers on class.teacher_id=teachers.id where lang_id=?  order by class.id DESC  ", [$search_id]);
                echo json_encode($class_list);
            } else if (!empty($search_type) and $search_type == 'type') {
                $class_list = $this->Do_Select("
                      select   langs.lang_name ,  terms.term_name ,teachers.name ,teachers.family , class.* from institute_class class 
                      LEFT JOIN institute_terms terms on class.term_id=terms.id 
                      LEFT JOIN institute_langs langs on class.lang_id=langs.id 
                      LEFT JOIN institute_users teachers on class.teacher_id=teachers.id where class_type=?  order by class.id DESC  ", [$search_id]);
                echo json_encode($class_list);
            } else if (!empty($search_type) and $search_type == 'term') {
                $class_list = $this->Do_Select("
                      select   langs.lang_name ,  terms.term_name ,teachers.name ,teachers.family , class.* from institute_class class 
                      LEFT JOIN institute_terms terms on class.term_id=terms.id 
                      LEFT JOIN institute_langs langs on class.lang_id=langs.id 
                      LEFT JOIN institute_users teachers on class.teacher_id=teachers.id where term_id=?  order by class.id DESC  ", [$search_id]);
                echo json_encode($class_list);
            }
        }
    }

//    ****
    function student_sharge($data = [])
    {
        $student_id = $this->filter($data["user_id"]);
        $amount = $this->filter($data["amount"]);
        $summary = $this->filter($data["summary"]);
        if (!empty($student_id) and !empty($amount)) {
            $result = $this->Do_Query("update institute_users set credit=credit+? where id=? ", [$amount, $student_id]);
            if ($result == true) {
                $this->Do_Query("insert into credit_log (clerk_id,user_id,amount,summary) VALUES (?,?,?,?)", [$this->clerk_id, $student_id, $amount, $summary]);
                echo true;
            } else {
                echo "server";
            }
        } else {
            echo "null_info";
        }
    }

    function user_info($user_id = "")
    {
        $user_id = $this->filter($user_id);
        return $this->Do_Select("select * from institute_users where `id`=? ", [$user_id], 1);
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


}