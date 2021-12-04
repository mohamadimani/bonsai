 <?php

/**
 * Created by PhpStorm.
 * User: mani mohamadi
 * Date: 11/09/2018
 * Time: 12:24 AM
 */
class model_admin_clients_gallery extends model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_gallery()
    {
        $gallery = $this->Do_Select("select * from clients_gallery ORDER  by `id` DESC  ", []);
        return $gallery;
    }

    function save_change($name = '', $id = '', $status = '')
    {
        $name = $this->filter($name);
        $id = $this->filter($id);
        $status = $this->filter($status);

        if (!empty($name) and !empty($status) and !empty($id) and $name == "img_show" and $status == "YES") {
            $sql = "update clients_gallery set status='active' where `id`=? ";
            print_r($this->Do_Query($sql, [$id]));
        }
        if (!empty($name) and !empty($status) and !empty($id) and $name == "img_show" and $status == "NO") {
            $sql = "update clients_gallery set status='inactive' where `id`=? ";
            print_r($this->Do_Query($sql, [$id]));
        }
    }

    function set_link($value = '', $id = '')
    {
        $value = $this->filter($value);
        $id = $this->filter($id);
        if (!empty($id)) {
            $sql = "update clients_gallery set `name`=? where `id`=? ";
            print_r($this->Do_Query($sql, [$value, $id]));
        }
    }

    function set_alt($value = '', $id = '')
    {
        $value = $this->filter($value);
        $id = $this->filter($id);
        if (!empty($id)) {
            $sql = "update clients_gallery set `text`=? where `id`=? ";
            print_r($this->Do_Query($sql, [$value, $id]));
        }
    }

    function upload_gallery($file = "")
    {
        $filename = $this->filter($file['name']);
        $filesize = $this->filter($file['size']);
        $filetemp = $file['tmp_name'];
        $filetype = $this->filter($file['type']);
        $fileerror = $this->filter($file['error']);
        $uploadok = 0;


        $target = 'public/images/clients/';
//        $newname = time();
        $newname = explode(".", $filename);
        array_pop($newname);
        $newname = implode(" ", $newname);


        if ($filetype == 'image/jpg' or $filetype == 'image/jpeg' or $filetype == 'image/png') {
            $uploadok = 1;
        }
        if ($filesize >= 160000000) {
            $uploadok = 0;
        }
        if ($uploadok == 1) {
            $exe = pathinfo($filename, PATHINFO_EXTENSION);
            $target2 = $target . $newname . '.' . $exe;
            move_uploaded_file($filetemp, $target2);
            $imgname = $newname . '.' . $exe;
            $sql = "insert into  clients_gallery (`img_name`) VALUES (?)   ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(1, $imgname);
            $stmt->execute();
        }
        header("location:" . SITE_URL . "admin_clients_gallery");
    }

    function delete_img($id = "")
    {
        $id = $this->filter($id);
        if (!empty($id)) {
            $img_name = $this->Do_Select("select img_name from clients_gallery where `id`=?", [$id], 1);
            $file = "public/images/clients/" . $img_name["img_name"];
            if (file_exists($file)) {
                unlink($file);
            }
            $sql = "delete from clients_gallery   where `id`=? ";
            $this->Do_Query($sql, [$id]);
            return true;
        }
    }


}