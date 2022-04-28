<?php


class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = include($_SERVER['DOCUMENT_ROOT'] . '/config/routes.php');
    }

    /**
     * @return string*
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim(str_replace('/controllers/index.php//', '', $_SERVER['REQUEST_URI']), '/');
        }
    }

    public function run()
    {
        //получить строку запроса
        $uri = $this->getURI();
        echo $uri;
        //проверить наличие его в роутсах
        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("#$uriPattern#", $uri)) {
                $internalRoute = preg_replace("#$uriPattern#",$path,$uri);
                $pathParts = explode('/', $internalRoute);
                $className = ucfirst(array_shift($pathParts)) . 'Controller';
                $actionName = 'action' . ucfirst(array_shift($pathParts));
            }
        }
        $parametrs = $pathParts;
        //если есть, определить контроллер и экшн
        $fileName = 'controllers/' . $className . '.php';
        echo '<br>' . $fileName . '<br>';
        //подключить класс контроллера
        if (file_exists($fileName)) {
            include_once($fileName);
        }
        //создать объект и вызвать метод
        echo "<br> Вызываем метод $actionName<br>";
        $controllerObj = new $className;
        $result = call_user_func_array(array($controllerObj,$actionName),$parametrs);

    }

}