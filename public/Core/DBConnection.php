<?php

namespace Core;

use \PDO;

class DBConnection
{
    //подключение
    public static function getConnection()
    {
        $params = include('db_params.php');
        //$dsn = "mysql:host=mariadb;dbname={$params['dbname']}";
        return new PDO("mysql:host=mariadb;dbname={$params['dbname']}", $params['user'], $params['password']);
    }

    //получение всех записей
    public static function getAllDb()
    {
        $db = DBConnection::getConnection();
        $result = $db->query('SELECT * FROM miniproject.messages ORDER BY datetime DESC');
        $i = 0;
        while ($row = $result->fetch()) {
            $messages[$i]['id'] = $row['id'];
            $messages[$i]['user_name'] = $row['user_name'];
            $messages[$i]['message_text'] = $row['message_text'];
            $messages[$i]['datetime'] = $row['datetime'];
            $i++;
        }
        return $messages;
    }

    //получение одной по id

    /**
     * @param integer $id
     */
    public static function getById($id)
    {
        $db = DBConnection::getConnection();
        $sth = $db->prepare("SELECT * FROM miniproject.messages WHERE id = :id");
        $sth->execute(array('id' => $id));
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    //запись в базу

    /**
     * @param array $arr
     */
    public static function addToDB($arr)
    {
        $db = DBConnection::getConnection();
        $userName = $arr['user_name'];
        $text = $arr['message_text'];
        $currentTime = $arr['datetime'];
        if (!empty($arr)) {
            $sth = $db->prepare("INSERT INTO miniproject.messages SET user_name = :username, message_text = :message_text, datetime = :time");
            $sth->execute(array('username' => $userName, 'message_text' => $text, 'time' => $currentTime));

        }
    }

    //подсчёт всех записей
    public static function countMessages(): int
    {
        $db = DBConnection::getConnection();
        $arr = DBConnection::getAllDb();
        $number = count($arr);
        //echo 'Записей'.$number;
        return $number;
    }

    //удаление по id

    /**
     * @param integer $id
     */
    public static function deleteFromDb($id): bool
    {
        $db = DBConnection::getConnection();
        $sth = $db->prepare("DELETE FROM miniproject.messages WHERE id = :id");
        $sth->execute(array('id' => $id));
        return true;
    }
}

