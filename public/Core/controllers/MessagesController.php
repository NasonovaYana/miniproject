<?php


namespace Core;


class MessagesController extends Controller
{
    public function actionIndex(): bool
    {
        $addToDB = false;
        $arr = Messages::createPost();
        if (!empty($arr)) {
            DBConnection::addToDB($arr);
            $addToDB = true;
        }

        $messageList = DBConnection::getAllDb();
        $limit = 5;
        $pages = count($messageList);
        $arr = Model::pagination($limit, $pages);
        extract($arr);
        $messageListCut = array_slice($messageList, $page, $num);
        $this->view->render('main', ['messageList' => $messageListCut, 'pageCount' => $pageCount, 'nav' => $nav, 'addToDB' => $addToDB]);
        return true;
    }

    public function actionView($id): bool
    {
        if ($id) {
            $messagesItem = DBConnection::getById($id);
        }

        extract(Messages::nextPrevId($id));
        $this->view->render('main', ['messageNote' => $messagesItem, 'id' => $id, 'nextId' => $nextId, 'previousId' => $previousId]);
        return true;
    }
}