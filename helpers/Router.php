<?php

class Router
{
    private $routes = array();
    public function __construct(){
        //получить роуты
        $routesPath =  $_SERVER['DOCUMENT_ROOT'].'/configs/routes.php';
        $this->routes = include($routesPath);
    }
    //получать адрес
    //спарсить адрес по роутам
    //выбрать нужный контроллер
    //выбрать нужный метод контроллера
    //передать управления контроллеру
    private function getUri(){
        if(!empty($_SERVER["REQUEST_URI"])){
            return trim($_SERVER["REQUEST_URI"], '/');
        }
    }
    public function run(){
        $uri = $this->getUri();
        foreach($this->routes as $uriPattern => $path){
            if(preg_match("~$uriPattern~", $uri)){
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $segments  = explode('/', $internalRoute);
                $controllerName =  array_shift($segments)."Controller";
                $controllerName = ucfirst($controllerName);
                $methodName = "action".ucfirst(array_shift($segments));
                //подключаю нужный файл контроллера
                $parameter = $segments;
                $fileController = $_SERVER["DOCUMENT_ROOT"]."/controllers/".$controllerName.".php";
                if(file_exists($fileController)){
                    include_once($fileController);
                }
                //создаю объект нужного класса
                $controller = new $controllerName;
                $result = call_user_func_array(array($controller, $methodName), $parameter); //для передачи параметров в метод
                if($result != NULL){
                    break;
                }
            }
        }
    }
}