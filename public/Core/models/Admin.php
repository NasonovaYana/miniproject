<?php


namespace Core;


class Admin extends Model
{
    public static function logIn(){
        $arr = $_POST;
        if (!empty($arr)){
            $json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/config/admin.json');
            $admin = json_decode($json, true);
            if ($arr['admin_password'] == $admin['pass'] and $arr['admin_login'] == $admin['login']) {
                $_SESSION['adminLogin'] = 1;
                $new_url = 'http://localhost:8080/admin/main';
                header('Location: ' . $new_url);
            } else {
                header('HTTP/1.0 403 Forbidden');
                exit();
            }
        }
    }



}