<?php


class DBConnection
{
    public static function getConnection()
    {
        $params = include('db_params.php');
        //$dsn = "mysql:host=mariadb;dbname={$params['dbname']}";
        return new PDO("mysql:host=mariadb;dbname={$params['dbname']}", $params['user'], $params['password']);
    }

}