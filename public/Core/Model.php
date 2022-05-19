<?php


namespace Core;


class Model
{
    //данные для пагинации
    public static function pagination($limit, $pages)
    {
        $pageCount = ceil($pages / $limit);
        if (isset($_GET['page'])) {
            $nav = $_GET['page'];
        } else {
            $nav = 0;
        }
        $nav = intval($nav);
        if (!isset($_GET['page'])) {
            $page = 0;
        } else {
            $page = $_GET['page'] * $limit - $limit;
        }
        $num = $page + 5;
        return ['num' => $num, 'page' => $page, 'nav' => $nav, 'pageCount' => $pageCount];
    }

    //подготовка записи в бд
    public static function createPost()
    {
        $arr = $_POST;
        if (!empty($arr)) {
            $today = date("Y-m-d H:i:s", time());
            $arr['datetime'] = $today;
        }
        return $arr;
    }
}