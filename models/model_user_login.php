<?php

/**
 * Created by PhpStorm.
 * User: mani mohamadi
 * Date: 11/09/2018
 * Time: 12:24 AM
 */
class model_user_login extends model
{

    function __construct()
    {
        parent::__construct();
    }

    function set_logout_log($type = '')
    {
        $this->Do_Query("update `onlines` set `online`='off' WHERE `type`=? and `session`=? ", [$type, $_SESSION['user']]);
    }

    function mobile_check($mobile = '')
    {
        $mobile = $this->filter($mobile);
        if (!empty($mobile)) {
            $is_users_number = $this->Do_Select('select mobile from users WHERE mobile=?', [$mobile], 1);
            if (!empty($is_users_number['mobile'])) {
                return false;
            } else {
                return true;
            }
        }
    }

    function register_users($user_info = '')
    {
        $name = $this->filter($user_info['name']);
        $family = $this->filter($user_info['family']);
        $mobile = $this->filter($user_info['mobile']);
        $remobile = $this->filter($user_info['remobile']);
        $mobile = filter_var($mobile, FILTER_SANITIZE_NUMBER_INT);
        $address = $this->filter($user_info['address']);
        $password = $this->filter($user_info['password']);
        $repassword = $this->filter($user_info['repassword']);
        if (!empty($name) and !empty($family) and !empty($mobile) and is_numeric($mobile) and is_numeric($remobile) and ($remobile == $mobile) and (strlen($mobile) == 11) and !empty($address) and !empty($password) and ($password == $repassword)) {
            $password = $this->password_hash($password);
            return $this->Do_Query('insert into users(`name`,`family`,`mobile`,`address`,`password`)  VALUES (?,?,?,?,?)', [$name, $family, $mobile, $address, $password]);
        } else {
            return false;
        }
    }

    function check_login($mobile = '', $password = '')
    {
        $mobile = $this->filter($mobile);
        $password = $this->filter($password);
        if (!empty($mobile) and !empty($password)) {
            $is_users_number = $this->Do_Select('select * from `users` WHERE `mobile`=?', [$mobile], 1);
            if ($is_users_number and !empty($is_users_number['password'])) {
                if ($this->password_verify($password, $is_users_number['password'])) {
                    $last_login = $this->time_to_jalali_date('DT');
                    $this->Do_Query('update users set last_login=? where id=?', [$last_login['date'] . ' - ' . $last_login['time'], $is_users_number['id']]);

                    $str_cod = $this->str_cod(20);

                    $_SESSION['user_id'] = base64_encode($is_users_number['id']);
                    $_SESSION['user'] = $str_cod;
                    $_SESSION['user_sex'] = $is_users_number['sex'];
                    setcookie("user", $str_cod, time() + 1000, "/"); // 1000 = 16:30 min

                    $onlines_info = $this->Do_Select(" select * from `onlines` where `type`='user' and `user_id`=? and `online`='on'", [$is_users_number['id']]);
                    if (empty($onlines_info)) {
                        $this->Do_Query('insert into onlines (`type`,`user_id`,`name`,`username`,`IP`,`login_time`,`session`) VALUES (?,?,?,?,?,?,?)', ['user', $is_users_number['id'], $is_users_number['name'] . ' ' . $is_users_number['family'], $is_users_number['mobile'], $this->ip(), time(), $str_cod]);
                    } else if (!empty($onlines_info)) {
                        $this->Do_Query("update `onlines` set `online`='off' WHERE  `type`='user' and `user_id`=? and `online`='on' ", [$is_users_number['id']]);
                        $this->Do_Query('insert into onlines (`type`,`user_id`,`name`,`username`,`IP`,`login_time`,`session`) VALUES (?,?,?,?,?,?,?)', ['user', $is_users_number['id'], $is_users_number['name'] . ' ' . $is_users_number['family'], $is_users_number['mobile'], $this->ip(), time(), $str_cod]);
                    }

                    return true;
                } else {
                    return 'pass';
                }
            } else {
                return 'info';
            }
        }
    }

}