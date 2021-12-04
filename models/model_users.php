<?php

/**
 * Created by PhpStorm.
 * User: mani mohamadi
 * Date: 11/09/2018
 * Time: 12:24 AM
 */
class model_users extends model
{
    public $user_id;

    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION["user_id"]) and !empty(trim($_SESSION["user_id"]))) {
            $this->user_id = $this->filter(base64_decode($_SESSION["user_id"]));
        }
    }

    function check_user_login($data = [])
    {
        $username = $this->filter($data["username"]);
        $password = $this->filter($data["password"]);

        if (!empty($username) and !empty($password)) {
            $user_info = $this->Do_Select(" select id , username,password,status  from `institute_users` where username=? and user_type='student' ", [$username], 1);
            if (!empty($user_info)) {
                if ($user_info["status"] == "ACTIVE") {
                    if ($this->password_verify($password, $user_info['password'])) {
                        $last_login = $this->time_to_jalali_date('DT');
                        $this->Do_Query('update `institute_users` set last_login=? where id=?', [$last_login['date'] . ' - ' . $last_login['time'], $user_info['id']]);
                        $str_cod = $this->str_cod(20);
                        $_SESSION['user_id'] = base64_encode($user_info['id']);
                        $_SESSION['user'] = $str_cod;
                        setcookie("user", $str_cod, time() + 4000, "/"); // 1000 = 16:30 min
                        $_SESSION["user_login_time"] = time() + 4000;
//                    $onlines_info = $this->Do_Select(" select * from `onlines` where `type`='clerk' and `user_id`=? and `online`='on'", [$user_info['id']]);
//                    if (empty($onlines_info)) {
//                        $this->Do_Query('insert into onlines (`type`,`user_id`,`name`,`username`,`IP`,`login_time`,`session`) VALUES (?,?,?,?,?,?,?)', ['clerk', $user_info['id'], $user_info['name'] . ' ' . $user_info['family'], $user_info['username'], $this->ip(), time(), $str_cod]);
//                    } else if (!empty($onlines_info)) {
//                        $this->Do_Query("update `onlines` set `online`='off' WHERE  `type`='clerk' and `user_id`=? and `online`='on' ", [$user_info['id']]);
//                        $this->Do_Query('insert into onlines (`type`,`user_id`,`name`,`username`,`IP`,`login_time`,`session`) VALUES (?,?,?,?,?,?,?)', ['clerk', $user_info['id'], $user_info['name'] . ' ' . $user_info['family'], $user_info['username'], $this->ip(), time(), $str_cod]);
//                    }
//                        $_SESSION["user_login"] = "success";
                        echo true;
                        if (isset($_SESSION["product_before_login"]) and !empty($_SESSION["product_before_login"])) {
                            $this->add_basket($_SESSION["product_before_login"]);
                            unset($_SESSION["product_before_login"]);
//                            header("location:" . SITE_URL . "ecomm/basket");
                        } else {
//                            header("location:" . SITE_URL . "ecomm");
                        }
                    } else {
//                        $_SESSION["user_login"] = "password";
//                        header("location:" . SITE_URL . "users/user_login");
                        echo false;
                    }
                } elseif ($user_info["status"] == "INACTIVE") {
//                    $_SESSION["user_login"] = "inactive";
//                    header("location:" . SITE_URL . "users/user_login");
                    echo "inactive";
                }
            } else {
//                $_SESSION["user_login"] = "username";
//                header("location:" . SITE_URL . "users/user_login");
                echo false;
            }
        } else {
//            $_SESSION["user_login"] = "empty";
//            header("location:" . SITE_URL . "users/user_login");
            echo false;
        }

    }

    function user_register($data = [])
    {
        $mobile = $this->filter($data["mobile"]);
        $user_name = $this->filter($data["username"]);
        $password = $this->filter($data["password"]);
        $re_password = $this->filter($data["re_password"]);

        $captcha = $this->filter($data["captcha"]);
        $captcha_answer = $this->filter($_SESSION["captcha_answer"]);
        if (empty($captcha) or trim($captcha) != trim($captcha_answer)) {
            echo false;
        } else {
            if (!empty($password) and $password == $re_password) {
                $password_hash = $this->password_hash($password);
                if (!empty($user_name) and !empty($mobile) and is_numeric($mobile) and !empty($password_hash)) {
                    $result = $this->Do_select("select * from `institute_users` where username=?", [$user_name], 1);
                    if (empty($result)) {
                        $is_mobile = $this->Do_select("select * from `institute_users` where mobile=?", [$mobile], 1);
                        if ($is_mobile["mobile"] == $mobile) {
//                        $_SESSION["user_register"] = "is_mobile";
                            echo "is_mobile";
                        } else {
                            $registered = $this->Do_Query("insert into `institute_users` (`username`,`password`,`mobile`,`user_type`) VALUES (?,?,?,'student')", [$user_name, $password_hash, $mobile]);
                            if ($registered == true) {
                                $user_id = $this->conn->lastInsertId();
                                echo true;
                                $last_login = $this->time_to_jalali_date('DT');
                                $this->Do_Query('update `institute_users` set last_login=? where id=?', [$last_login['date'] . ' - ' . $last_login['time'], $user_id]);
                                $str_cod = $this->str_cod(20);
                                $_SESSION['user_id'] = base64_encode($user_id);
                                $_SESSION['user'] = $str_cod;
                                setcookie("user", $str_cod, time() + 4000, "/"); // 1000 = 16:30 min
                                $_SESSION["user_login_time"] = time() + 4000;

//                            $_SESSION["user_register"] = "success";
//                            if (isset($_SESSION["product_before_login"]) and !empty($_SESSION["product_before_login"])) {
//                                $this->add_basket($_SESSION["product_before_login"]);
//                                unset($_SESSION["product_before_login"]);
//                                header("location:" . SITE_URL . "ecomm/basket");
//                            }
                                // insert SMS sender  code hear
//                            $text = "  ثبت نام شما انجام شد
//                            نام کاربری : $user_name
//                            رمز ورود : $password ";
//                            $this->send_sms($mobile, $text);
//                            $text = "کاربر جدید در فروشگاه ثبت نام کرده است
//                            نام کاربری : $user_name";
//                            $this->send_sms("09191930406", $text);
                            } else {
//                            $_SESSION["user_register"] = "danger";
                                echo "danger";
                            }
                        }
                    } else {
//                    $_SESSION["user_register"] = "is_username";
                        echo "is_username";
                    }
                } else {
//                $_SESSION["user_register"] = "empty";
                    echo "empty";
                }
            } else {
//            $_SESSION["user_register"] = "password";
                echo "password";
            }
        }
//        header("location:" . SITE_URL . "users/user_login");
    }

    function update_user_info($data = [])
    {
        $user_id = $this->filter($this->user_id);

        $email = $this->filter($data["email"]);
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
        $emergency_phone = $this->filter($data["emergency_phone"]);
        $education = $this->filter($data["education"]);
        $study_field = $this->filter($data["study_field"]);

        if (!empty($name) and !empty($family) and !empty($national_code)) {
            $is_user_name = $this->Do_Select(" select `id` from institute_users where id=?", [$user_id], 1);
            if (empty($is_user_name["id"]) or $is_user_name["id"] == $user_id) {
                $param = [$email, $ashnaei, $name, $family, $birth_date, $national_code, $ostan, $city, $address, $education, $emergency_phone, $phone, $postal_code, $study_field, $user_id];
                $result = $this->Do_Query("update    institute_users set email=?,ashnaei=?,`name`=?,family=?,birthdate=?,code_meli=?,state=?,city=?,address=?,education=?,emergency_phone=?,phone=?,postal_code=?,study_field=?   where  `id`=?  ", $param);
                if ($result == true) {
                    if (isset($_SESSION["check_user_status"])) {
                        $check_user_status = $_SESSION["check_user_status"];
                        unset($_SESSION["check_user_status"]);
                        $_SESSION["before_pay_info"] = "updated";
                        header("location:" . SITE_URL . 'ecomm/' . $check_user_status);
                    } else {
                        $_SESSION["update_student"] = "success";
                        header("location:" . SITE_URL . "users");
                    }
                } else {
                    $_SESSION["update_student"] = "server";
                    $_SESSION["update_student_info"] = $data;
                    header("location:" . SITE_URL . "users/edit_user");
                }
            } else {
                $_SESSION["update_student"] = "is_user_name";
                $_SESSION["update_student_info"] = $data;
                header("location:" . SITE_URL . "users/edit_user");
            }
        } else {
            $_SESSION["update_student"] = "empty";
            $_SESSION["update_student_info"] = $data;
            header("location:" . SITE_URL . "users/edit_user");
        }

    }

    function ajax_upload_profile_img($data)
    {
        $user_id = $this->user_id;

        $file = $data["userImage"];
        $filename = $this->filter($file['name']);
        $filesize = $this->filter($file['size']);
        $filetemp = $file['tmp_name'];
        $filetype = $file['type'];
        $fileerror = $file['error'];
        $uploadok = 0;

        $target = 'public/images/institute/users/' . $user_id . '/';
        if (is_dir('public/images/institute/users/' . $user_id)) {
        } else {
            mkdir('public/images/institute/users/' . $user_id);
        }
        $newname = time();

        if ($filetype == 'image/jpg' or $filetype == 'image/jpeg' or $filetype == 'image/png') {
            $uploadok = 1;
        }
        if ($filesize >= 16000000) {
            $uploadok = 0;
        }

        if ($uploadok == 1) {
            $exe = pathinfo($filename, PATHINFO_EXTENSION);
            $target2 = $target . $newname . '.' . $exe;
            move_uploaded_file($filetemp, $target2);
            $imgname = $newname . '.' . $exe;
            $url = SITE_URL . $target . $newname . '.' . $exe;
//            return $url;
            $sql = "update institute_users set `picture`=? WHERE id=?  ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(1, $imgname);
            $stmt->bindValue(2, $user_id);
            if ($stmt->execute()) {
                echo true;
            } else {
                echo false;
            }

        }
    }

    function save_message($data = [])
    {
        $user_id = $this->user_id;
        $message = $this->filter($data['message']);
        $department = $this->filter($data['department']);

        if (!empty($message) and !empty($department)) {
            $save_message = $this->Do_Query(' insert into institute_tickets  (user_id,partner_id,`message`,`sender_id`) VALUES (?,?,?,?)', [$user_id, $department, $message, $user_id]);
            if ($save_message) {
                $_SESSION["send_message"][0] = 'success';
                $_SESSION["send_message"][1] = 'پیام با موفقیت ارسال شد';
            } else {
                $_SESSION["send_message"][0] = 'danger';
                $_SESSION["send_message"][1] = 'مشکل در ذخیره پیام';
            }
        } else {
            $_SESSION["send_message"][0] = 'danger';
            $_SESSION["send_message"][1] = 'اطلاعات رو کامل پر کنید';
        }

        if (isset($_SERVER['HTTP_REFERER'])) {
            $last_page = $_SERVER['HTTP_REFERER'];
        } else {
            $last_page = 'users';
        }
        header('location:' . $last_page);
    }

    function last_messages($length = '')
    {
        $length = $this->filter($length);
        $user_id = $this->user_id;
        if (!empty($length) and is_numeric($length)) {
            $limit = " limit 0,$length ";
        } else if ($length == 'all') {
            $limit = '';
        }
        $last_messages_prent = $this->Do_Select("select * from `institute_tickets` where status='ACTIVE' and parent=0 and user_id=?    ORDER by id DESC $limit ", [$user_id]);
        $all_messages = [];
        foreach ($last_messages_prent as $parent) {
            $last_messages_prent = $this->Do_Select("select * from `institute_tickets` where status='ACTIVE' and parent=? and user_id=?   ORDER by `id` DESC  ", [$parent['id'], $user_id]);
            $parent['answers'] = $last_messages_prent;
            $all_messages[] = $parent;
        }
        return $all_messages;
    }

    function departments()
    {
        return $this->Do_Select("select id , department from `user` where status='ACTIVE'  ", []);
    }

//  ********  products
    function get_products($product_id = '')
    {
        if (empty($product_id)) {
            $all_products = [];
            $products = $this->Do_Select("select * from ecomm_products WHERE status='ACTIVE'  order by `id` DESC ", []);
            foreach ($products as $product) {
                $product["date"] = $this->convert_date($product["date"]);
                $all_products [] = $product;
            }
            return $all_products;
        } else {
            $products = $this->Do_Select("select * from ecomm_products  WHERE `id`=? and status='ACTIVE' order by `id` DESC ", [$product_id], 1);
            $products["date"] = $this->convert_date($products["date"]);
            return $products;
        }
    }

    function get_product_category()
    {
        $products_cat = $this->Do_Select("select * from ecomm_product_category WHERE parent=0 and status='ACTIVE'  order by `id` DESC ", []);
        return $products_cat;
    }

    function get_product_gallery($product_id = '')
    {
        $products_gallery = $this->Do_Select("select * from ecomm_product_gallery WHERE  status='ACTIVE' and product_id=?  order by `id` DESC ", [$product_id]);
        return $products_gallery;
    }

    function set_like($data = [])
    {
        $product_id = $this->filter($data["product_id"]);
        $param = $this->filter($data["param"]);
        if (!empty($_SESSION["user_id"])) {
            $user_id = $this->filter($this->user_id);
            if (!empty($user_id) and !empty($product_id)) {
                $was_favorit = $this->Do_Select("select * from ecomm_likes WHERE product_id=? and user_id =? ", [$product_id, $user_id]);
                if (empty($was_favorit)) {
                    if (!empty($param) and $param == "like") {
                        $result = $this->Do_Query("update ecomm_products set likes=likes+1 WHERE `id`=?", [$product_id]);
                        $this->Do_Query("insert into ecomm_likes ( `product_id`,`user_id`,`status`) VALUES (?,?,?)", [$product_id, $user_id, $param]);
                        if ($result == true) {
                            echo true;
                        } else {
                            echo false;
                        }
                    } elseif (!empty($param) and $param == "dislike") {
                        $result = $this->Do_Query("update ecomm_products set dislikes=dislikes+1 WHERE `id`=?", [$product_id]);
                        $this->Do_Query("insert into ecomm_likes ( `product_id`,`user_id`,`status`) VALUES (?,?,?)", [$product_id, $user_id, $param]);
                        if ($result == true) {
                            echo true;
                        } else {
                            echo false;
                        }
                    }
                } else {
                    echo "was";
                }
            } else {
                echo false;
            }
        } else {
            echo "login";
        }
    }

    function add_favorit($product_id = "")
    {
        if (!empty($_SESSION["user_id"]) and isset($_SESSION["user_id"])) {
            $user_id = $this->user_id;
            $product_id = $this->filter($product_id);
            if (!empty($user_id) and !empty($product_id)) {
                $was_favorit = $this->Do_Select("select * from ecomm_favorit WHERE product_id=? and user_id =? ", [$product_id, $user_id]);
                if (empty($was_favorit)) {
                    $result = $this->Do_Query("insert into ecomm_favorit ( `product_id`,`user_id`) VALUES (?,?)", [$product_id, $user_id]);
                    if ($result == true) {
                        echo true;
                    } else {
                        echo false;
                    }
                } else {
                    echo "was";
                }
            } else {
                echo false;
            }
        } else {
            echo "login";
        }
    }

    function add_basket($data = [])
    {
        $product_id = $this->filter($data["product_id"]);
        $user_id = $this->user_id;
        if (!empty($product_id) and !empty($user_id)) {
            $is_pro_basket = $this->Do_Select("select * from ecomm_basket WHERE `user_id`=? and `product_id`=? ", [$user_id, $product_id]);
            if (empty($is_pro_basket)) {
                $result = $this->Do_Query("insert into ecomm_basket (user_id,product_id) values(?,?)  ", [$user_id, $product_id]);
                if ($result) {
                    echo true;
                } else {
                    echo false;
                }
            } else {
                $result = $this->Do_Query("update   ecomm_basket set `count`=`count`+1 WHERE user_id=? and  product_id=?  ", [$user_id, $product_id]);
                if ($result) {
                    echo true;
                } else {
                    echo false;
                }
            }
        } else {
            echo false;
        }

    }

    function get_product_by_ajax($data = [])
    {
        $category_id = $this->filter($data["cat_id"]);
        if (empty($category_id) or $category_id == "0" or $category_id == "all") {
            echo json_encode($this->get_products(""));
        } else {
            $ids = $this->Do_Select("select `id` from ecomm_product_category where `cat_group`=? and   status='ACTIVE'", [$category_id]);
            $all_ids = [];
            foreach ($ids as $item) {
                $all_ids[] = $item['id'];
            }
            $all_ids = implode(',', $all_ids);
            $products = $this->Do_Select("select * from ecomm_products where `category` IN ($all_ids) and  status='ACTIVE'");
            $new_product = [];
            foreach ($products as $item) {
                $item["date"] = $this->convert_date($item["date"]);
                $new_product[] = $item;
            }
            echo json_encode($new_product);
        }


    }

    function get_favorites()
    {
        $user_id = $this->filter($this->user_id);
        $favorites = $this->Do_Select("select * from `ecomm_favorit` left join  ecomm_products  on  ecomm_favorit.product_id=ecomm_products.id  where   ecomm_favorit.`user_id`=? and ecomm_products.status='ACTIVE' ", [$user_id]);
        return $favorites;
    }

    function remove_favorite($data = [])
    {
        if (!empty($_SESSION["user_id"]) and isset($_SESSION["user_id"])) {
            $user_id = $this->filter($this->user_id);
            $product_id = $this->filter($data['product_id']);
            if (!empty($user_id) and !empty($product_id)) {
                $was_favorit = $this->Do_Select("select * from ecomm_favorit WHERE product_id=? and user_id =? ", [$product_id, $user_id]);
                if (!empty($was_favorit)) {
                    $result = $this->Do_Query("delete from ecomm_favorit  where product_id=? and user_id =? ", [$product_id, $user_id]);
                    if ($result == true) {
                        echo true;
                    } else {
                        echo false;
                    }
                } else {
                    echo "was";
                }
            } else {
                echo false;
            }
        } else {
            echo "login";
        }

    }

    function get_basket_list()
    {
        $user_id = $this->filter($this->user_id);
        $is_basket = $this->Do_Select("select ecomm_basket.* , ecomm_products.id as pro_id , ecomm_products.image , ecomm_products.price , ecomm_products.name, ecomm_products.discount   from ecomm_basket LEFT  JOIN ecomm_products on ecomm_basket.product_id=ecomm_products.id WHERE ecomm_basket.`user_id`=?  ", [$user_id]);
        if (!empty($is_basket)) {
            return $is_basket;
        } else {
            return " ";
        }

    }

    function delete_basket($data = [])
    {
        $product_id = $this->filter($data['product_id']);
        $result = $this->Do_Query("delete from ecomm_basket where id=? ", [$product_id]);
        if ($result) {
            echo true;
        } else {
            echo false;
        }
    }

    function pay_basket()
    {
        $user_info = $this->get_user_info($param = ' id,`name`,family,mobile,`credit` ');
        $name = trim($user_info["name"]);
        $family = trim($user_info["family"]);
        $user_mobile = trim($user_info["mobile"]);
        $user_id = trim($user_info["id"]);

        if (empty($name) or empty($family)) {
            $_SESSION["pay_error"] = "قبل از خرید باید اطلاعات خود را کامل کنید";
            $_SESSION["check_user_status"] = "users/basket";
            echo 'user_info';
        } else {

            $basket_products = $this->Do_Select("select * from ecomm_basket LEFT JOIN ecomm_products ON ecomm_basket.product_id=ecomm_products.id   where ecomm_basket.user_id=?    ", [$user_id]);
//            ............................................................
            if (!empty($basket_products) and is_array($basket_products)) {

                $basket_sum_price = 0;
                $sum_discounts = 0;
                $a = 0;
                foreach ($basket_products as $key => $products) {
                    $sum_price[$key] = ($products["price"] * $products["count"]);
                    $sum_discount[$key] = ceil(($sum_price[$key] * $products["discount"]) / 100);
                    $basket_sum_price += $sum_price[$key];
                    $sum_discounts += $sum_discount[$key];
                    $a++;
                }

                $user_name = $name . " " . $family;
                $product_count = $a;
                $amount = $basket_sum_price - $sum_discounts;

                $param = [$user_name, $user_id, $product_count, $amount];
                $set_factor = $this->Do_Query("insert into ecomm_factors (user_name,user_id,product_count,amount) VALUES(?,?,?,?) ", $param);
                $factor_id = $this->conn->lastInsertId();
//    *****   set factor number
                $year = date('Y', time());
                $month = date('m', time());
                $day = date('d', time());
                $jalali_date = $this->gregorian_to_jalali($year, $month, $day);
                $jalali_date[0] = substr($jalali_date[0], 2, 3);
                if (strlen($jalali_date[1]) == 1) {
                    $jalali_date[1] = "0" . $jalali_date[1];
                }
                $factor_number = "F-$jalali_date[0].$jalali_date[1]" . $factor_id;
                $_SESSION["factor_number"] = $factor_number;
                foreach ($basket_products as $key => $products) {
                    $param2 = [$factor_id, $products["name"], $products["price"], $products["count"], $products["category"], $products["discount"]];
                    $this->Do_Query("insert into ecomm_factor_products (factor_id,product_name,`price`,`count`,category_id,discount) VALUES(?,?,?,?,?,?) ", $param2);
                }
//            ...........................................................
                if ($set_factor) {
//                delete basket products from table after insert in factor table
                    $this->Do_Query("delete from  ecomm_basket where  user_id=?", [$user_id]);
                    if ($user_info['credit'] >= $amount) {
                        $credit = $user_info['credit'] - $amount;
                        $credited = $this->Do_Query("update institute_users set `credit`=? where  id=?   ", [$credit, $user_id]);
                        if ($credited) {
//         *****     insert into factor table
                            $set_factor_pay = $this->Do_Query("update ecomm_factors set `factor_number`=? , pay_status='PAID' where  id=?   ", [$factor_number, $factor_id]);
                            $log_summary = ' پرداخت فاکتور : ' . $factor_number;
                            $result_up = $this->Do_Query("insert into `credit_log` set  `clerk_id`=?, `user_id`=?, `amount`=?, `summary`=?, `pay_port`='پنل کاربری', `pay_status`='payed'    ", [$user_id, $user_id, $basket_sum_price, $log_summary]);


                            if (isset($_SESSION["before_pay_info"]) and $_SESSION["before_pay_info"] == 'updated') {
                                unset($_SESSION["before_pay_info"]);
                                $_SESSION["user_pay"] = 'success';
                                header('location:' . SITE_URL . 'users/orders');
                            } else {
                                echo true;
                            }
                        } else {
                            echo "server";
                        }
                    } else {
                        $set_factor_pay = $this->Do_Query("update ecomm_factors set `factor_number`=?  where  id=?   ", [$factor_number, $factor_id]);
                        if (isset($_SESSION["before_pay_info"]) and $_SESSION["before_pay_info"] == 'updated') {
                            unset($_SESSION["before_pay_info"]);
                            $_SESSION["user_pay"] = 'danger';
                            $_SESSION["pay_error"] = 'موجودی شما برای پرداخت کافی نمیباشد';
                            header('location:' . SITE_URL . 'users/orders');
                        } else {
                            echo "credit";
                        }
                    }
                } else {
                    echo "server";
                }
            }
        }

    }

    function pay_order($order_id = '')
    {
        $order_id = $this->filter($order_id);
        $user_info = $this->get_user_info($param = ' id,`name`,family,mobile,`credit` ');
        $name = trim($user_info["name"]);
        $family = trim($user_info["family"]);
        $user_mobile = trim($user_info["mobile"]);
        $user_id = trim($user_info["id"]);
        $user_credit = trim($user_info["credit"]);

        $factor_info = $this->Do_Select("select amount,factor_number  from ecomm_factors  where id=? ", [$order_id], 1);
//        print_r($factor_info);
//        die();
        if ($user_credit >= $factor_info['amount']) {
            $credit = $user_credit - $factor_info['amount'];
            $credited = $this->Do_Query("update institute_users set `credit`=? where  id=?   ", [$credit, $user_id]);
            if ($credited) {
//         *****     insert into factor table
                $set_factor_pay = $this->Do_Query("update ecomm_factors set  pay_status='PAID' where  id=?   ", [$order_id]);

                $log_summary = ' پرداخت فاکتور : ' . $factor_info['factor_number'];
                $result_up = $this->Do_Query("insert into `credit_log` set  `clerk_id`=?, `user_id`=?, `amount`=?, `summary`=?, `pay_port`='پنل کاربری', `pay_status`='payed'    ", [$user_id, $user_id, $factor_info['amount'], $log_summary]);

                $_SESSION["user_pay"] = 'success';
                header('location:' . SITE_URL . 'users/orders');
            } else {
                $_SESSION["user_pay"] = 'danger';
                $_SESSION["pay_error"] = 'خطلا در پرداخت';
                header('location:' . SITE_URL . 'users/orders');
            }
        } else {
            $_SESSION["user_pay"] = 'danger';
            $_SESSION["pay_error"] = 'موجودی شما برای پرداخت کافی نمیباشد';
            header('location:' . SITE_URL . 'users/orders');
        }

    }

    function add_credit($data = [])
    {
        $amount = $this->filter($data['amount']);
        $summary = $this->filter($data['summary']);
        $user_id = $this->filter($this->user_id);
        $_SESSION["verify_callback"] = 'users/add_credit_verify';

        if (!empty($amount)) {
//            connect for pay
            $user_info = $this->get_user_info($param = " id,name,family,mobile ");
            $name = trim($user_info["name"]);
            $family = trim($user_info["family"]);
            $mobile = trim($user_info["mobile"]);

            if (empty($name) or empty($family)) {
                $_SESSION["pay_error"] = "قبل از خرید باید اطلاعات خود را کامل کنید";
                header('location:' . SITE_URL . 'users/edit_user');
            } else {
                $result_pay = $this->zarinpalRequest($amount, $summary, ADMIN_EMAIL, $mobile);
                if ($result_pay['Status'] == 100) {
                    $log_res = $this->Do_Query("insert into credit_log (clerk_id,user_id,amount,summary,`befor_pay`,`pay_port`) VALUES (?,?,?,?,?, 'زرین پال')", [$user_id, $user_id, $amount, $summary, $result_pay['Authority']]);
                    header('Location: https://www.zarinpal.com/pg/StartPay/' . $result_pay['Authority']);

                } else {
                    $_SESSION["pay_error"] = "مشکل در اتصال به درگاه";
                    $_SESSION["user_pay"] = 'danger';
                    header('location:' . SITE_URL . 'users/orders');
                }
            }
        } else {
            $_SESSION["pay_error"] = "مبلغ شارژ به درستی وارد نشده است!";
            $_SESSION["user_pay"] = 'danger';
            header('location:' . SITE_URL . 'users/orders');
        }

    }

    function add_credit_verify($Authority = '', $status = '')
    {
        $user_id = $this->filter($this->user_id);
        $Authority = $this->filter($Authority);
        $status = $this->filter($status);

        $pay_amount = $this->Do_Select('select `amount` from credit_log where `befor_pay`=?', [$Authority], 1);
        $result2 = $this->zarinpalVerify($pay_amount ["amount"], $Authority);

        if ($result2['Status'] == 100) {
            $result_up = $this->Do_Query("update `credit_log` set  `pay_port` = 'زرین پال', `pay_status` = 'payed', `after_pay` =?  where `befor_pay` =?", [$result2['RefID'], $Authority]);
// ****   add credit to user acount
            $result = $this->Do_Query("update institute_users set credit = credit +? where id =? ", [$pay_amount ["amount"], $user_id]);

            $_SESSION["pay_error"] = "شارژ انجام شد ";
            $_SESSION["user_pay"] = 'success';
        } else {
            $result_up = $this->Do_Query("update `credit_log` set  `pay_port` = 'زرین پال', `pay_status` = 'unpayed' ,pay_error =?  where `befor_pay` =?", [$result2['Error'], $Authority]);

            $_SESSION["pay_error"] =$result2['Error'];
            $_SESSION["user_pay"] = 'danger';
        }
        header("location:" . SITE_URL . "users/orders");
    }


    function get_captcha()
    {
        $captcha = $this->captcha_cod();
        $captcha_question = $captcha["question"];
        $_SESSION["captcha_answer"] = $captcha["answer"];
        return $captcha_question;
    }

//  old
    function user_info()
    {
        if (!empty($this->user_id)) {
            $result = $this->Do_Select("select * from `institute_users`  where `id`=? ", [$this->user_id], 1);
        } else {
            $result = [];
        }
        return $result;
    }

    function pay_verify($Authority = '', $status = '')
    {
        $user_id = $this->filter($this->user_id);
        $Authority = $this->filter($Authority);
        $status = $this->filter($status);
        $pay_amount = $this->Do_Select('select `amount` from credit_log where `befor_pay`=?', [$Authority], 1);
        $result2 = $this->zarinpalVerify($pay_amount ["amount"], $Authority);

        if ($result2['Status'] == 100) {
// ****   add credit to user acount
            $result_up = $this->Do_Query("update `credit_log` set  `pay_port`='زرین پال', `pay_status`='payed', `after_pay`=?  where `befor_pay`=?", [$result2['RefID'], $Authority]);
            $result = $this->Do_Query("update institute_users set credit=credit+? where id=? ", [$pay_amount ["amount"], $user_id]);
            $_SESSION["pay_error"] = $result2['Error'];
            $_SESSION["pay_error_success"] = 'success';
        } else {
            $result_up = $this->Do_Query("update `credit_log` set  `pay_port`='زرین پال', `pay_status`='unpayed' ,pay_error=?  where `befor_pay`=?", [$result2['Error'], $Authority]);
            $_SESSION["pay_error"] = $result2['Error'];
            $_SESSION["pay_error_success"] = 'danger';
        }
    }

    function get_orders()
    {
        $new_orders = "";
        $user_id = $this->filter($this->user_id);
        $orders = $this->Do_Select("select * from ecomm_factors WHERE user_id=? order by `id` DESC ", [$user_id]);
        foreach ($orders as $order) {
            $order["date"] = $this->convert_date($order["date"]);
            $new_orders [] = $order;
        }
        return $new_orders;
    }

    function update_password($data = "")
    {

        $user_id = $this->user_id;
        $old_password = $this->filter($data["old_password"]);
        $new_password = $this->filter($data["new_password"]);
        $re_new_password = $this->filter($data["re_new_password"]);

        if ($old_password == $new_password) {
            $_SESSION["change_password"] = "repeat_old_new";
            header("location:" . SITE_URL . "users/change_password");
        } elseif ($new_password != $re_new_password) {
            $_SESSION["change_password"] = "repeat_new";
            header("location:" . SITE_URL . "users/change_password");
        } else if ($old_password != $new_password AND $new_password == $re_new_password) {

            if (!empty($old_password) and !empty($new_password) and !empty($re_new_password)) {
                $user_info = $this->Do_Select(" select * from  `institute_users` where `id`=?", [$user_id], 1);
                $success_old_pass = $this->password_verify($old_password, $user_info["password"]);
                if ($success_old_pass == true) {

                    $new_pass = $this->password_hash($new_password);
                    $change_pass_result = $this->Do_Query(" update   `institute_users` set `password`=? where `id`=?", [$new_pass, $user_id]);
                    if ($change_pass_result == true) {
                        $_SESSION["change_password"] = "success";
                        header("location:" . SITE_URL . "users/change_password");
                    } else {
                        $_SESSION["change_password"] = "danger";
                        header("location:" . SITE_URL . "users/change_password");
                    }
                } else if (empty($success_old_pass) OR $success_old_pass != true) {
                    $_SESSION["change_password"] = "old_pass";
                    header("location:" . SITE_URL . "users/change_password");
                }
            } else {
                $_SESSION["change_password"] = "empty";
                header("location:" . SITE_URL . "users/change_password");
            }
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

//-------------------------
    function get_user_physique($id = "")
    {
        if (!empty($id)) {
            $result_physique = $this->Do_Select('select * from  feed_user_physique  where  id=?', [$id], 1);
            $result_physique['in_date'] = $this->convert_date($result_physique['in_date']);
            return $result_physique;
        } else {
            $result_physique = $this->Do_Select('select id,in_date from  feed_user_physique  where user_id=?', [$this->user_id]);
            foreach ($result_physique as $result) {
                $result['in_date'] = $this->convert_date($result['in_date']);
                $dates[] = $result;
            }
            return $dates;
        }

    }

    function get_user_feed_plan($user_id = "", $physique_id = "")
    {
        $user_id = $this->filter($user_id);
        $physique_id = $this->filter($physique_id);
        $option = $this->Do_Select('select * from  users_feed_plan  where user_id=? and physique_id=?', [$user_id, $physique_id], 1);

//        $option["plan"] = str_replace("<br/>", "\n", $option["plan"]);
//        $option["plan"] = str_replace("<br />", "\n", $option["plan"]);
//        $option["plan"] = str_replace("<br>", "\n", $option["plan"]);
//        $option["plan"] = str_replace("<br >", "\n", $option["plan"]);
//        $option["plan"] = strip_tags($option["plan"]);
//        $option["plan"] = strip_tags($option["plan"]);
        return $option;
    }

}