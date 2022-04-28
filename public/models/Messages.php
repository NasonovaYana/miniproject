<?php

include_once ($_SERVER['DOCUMENT_ROOT'] . '/components/DBConnection.php');
class Messages
{
    /**
     * @param integer $id
     */
    public static function getMessagesById($id){
        $db = DBConnection::getConnection();
        $messages = array();
        $result = $db->query("SELECT * FROM miniproject.messages WHERE id = $id");
        var_dump($result);
        $i =0;
        while ($row=$result->fetch()){
            $messages[$i]['id']=$row['id'];
            $messages[$i]['username']=$row['username'];
            $messages[$i]['message_text']=$row['message_text'];
            $messages[$i]['datetime']=$row['datetime'];

        }
        return $messages;
    }

    public static function getMessagesList(){
        $db = DBConnection::getConnection();
        $messages = array();
        $result = $db->query('SELECT * FROM miniproject.messages');
        var_dump($result);
        $i =0;
        while ($row=$result->fetch()){
            $messages[$i]['id']=$row['id'];
            $messages[$i]['username']=$row['username'];
            $messages[$i]['message_text']=$row['message_text'];
            $messages[$i]['datetime']=$row['datetime'];

        }
        return $messages;

    }
}