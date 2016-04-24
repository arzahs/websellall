<?php

class View
{
    protected $data = array();
    public function assign($key, $value){
        $this->data[$key]=$value;
    }
    public function __set($k, $v){
        $this->data[$k]=$v;
    }
    public function render($template)
    {
        foreach ($this->data as $key=>$val){
            $$key = $val;
        }
        ob_start();
        include $_SERVER["DOCUMENT_ROOT"]."/views/".$template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
    public function display($template){
        echo $this->render($template);
    }
//    public static function userControl($view){
//        $isLogged = false;
//        $isAdmin = false;
//        $userId = User::checkUserLogged();
//        if($userId != false){
//            $isLogged=true;
//            $isAdmin = User::isAdmin($userId);
//        }
//        $view->assign("userId", $userId);
//        $view->assign("isLogged", $isLogged);
//        $view->assign("isAdmin", $isAdmin);
//        return true;
//    }

}