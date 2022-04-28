<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/models/Messages.php');
class MessagesController
{
    public function actionIndex():bool{
        echo
        $messageList = array();
        $messageList = Messages::getMessagesList();
        print_r($messageList);
        return true;
    }
    public function actionView($id):bool{
        if ($id){
            $messagesItem = Messages::getMessagesById($id);
            echo 'actionView, id '.$id;
        }
        return true;
    }
}