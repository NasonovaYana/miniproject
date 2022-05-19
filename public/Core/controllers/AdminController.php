<?php


namespace Core;


class AdminController extends Controller
{
    //страница регистрации
    public function actionRegistration()
    {
        $arr = Admin::logIn();
        $this->view->render('main', []);
    }

    //главная страница
    public function actionMain()
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
    }

    //удаление
    public function actionDelete($id)
    {
        $del = DBConnection::deleteFromDb($id);
        if ($del) {
            $delStatus = true;
            $new_url = 'http://localhost:8080/admin/main';
            header('Location: ' . $new_url);
        }
    }
}