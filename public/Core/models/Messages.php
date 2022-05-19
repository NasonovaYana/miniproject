<?php

namespace Core;

use \PDO;

//Message в единственном числе
class Messages extends Model
{
    //передача id для переключения
    public static function nextPrevId($id)
    {
        $maxId = DBConnection::countMessages();
        $nextId = $id + 1;
        $previousId = $id - 1;
        if ($id == 1) {
            $previousId = $maxId;
        }
        if ($id == $maxId) {
            $nextId = 1;
        }
        return ['nextId' => $nextId, 'previousId' => $previousId];
    }
}