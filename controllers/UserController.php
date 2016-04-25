<?php

include_once $_SERVER['DOCUMENT_ROOT']."/models/User.php";

class UserController
{
    public function actionRegister(){
        $view = new View();
        $firstName = "";
        $lastName = "";
        $password = "";
        $email = "";
        $phone = "";


        if(isset($_POST["action"])){
            $firstName = $_POST["first_name"];
            $lastName = $_POST["last_name"];
            $password = $_POST["password"];
            $password2 = $_POST["password2"];
            $email = $_POST["email"];
            $phone = $_POST['phone'];
            $errors = false;
            if(!User::checkName($firstName)){
                $errors[] = "Имя пользователя слишком короткое";
            }
            if(!User::checkName($lastName)){
                $errors[] = "Фамилия пользователя слишком короткая";
            }
            if(!User::checkEmail($email)){
                $errors[] = "E-mail введен не корректно";
            }
            if(!User::checkPassword($password)){
                $errors[] = "Пароль слишком короткий";
            }
            if(!User::checkEmailExist($email)){
                $errors[] = "Такой e-mail уже существует";
            }
            $view->assign("errors", $errors);
            if($errors == false){
                print('registreation');
                $result = User::register($firstName, $lastName, $password, $email, $phone);
                print('registration');
                if($result){
                    header("Location: /user/login");
//                    $view2 = new View();
//                    $view->assign("password", $password);
//                    $view->assign("last_name", $lastName);
//                    $view->assign("first_name", $firstName);
//                    $view->assign("email", $email);
//                    $view->assign("phone", $phone);
//                    $view2->assign("register", true);
//                    $view2->display("auth/auth.php");
//                    return true;
                }
            }
        }

        View::userControl($view);
        $view->assign("hide_baner", true);
        $view->display('register.php');
        return true;
    }

    public function actionLogin(){
        $email = '';
        $password = '';
        $errors = false;
        if(isset($_POST["action"])){
            $email = $_POST["email"];
            $password = $_POST["password"];
            if(!User::checkPassword($password)){
                $errors[] = "Пароль слишком короткий";
            }
            if(!User::checkEmail($email)){
                $errors[] = "Не верный электронный адрес";
            }
            $userId = User::checkUserExist($email, $password);
            if($userId==false){
                $errors[] = "Невереный логин или пароль";
            }else {
                User::auth($userId);
                header("Location: /");
            }
        }
        $view = new View();
        View::userControl($view);
        $view->assign("email", $email);
        $view->assign("password", $password);
        $view->assign("errors", $errors);
        $view->display("login.php");
        return true;
    }

    public function actionLogout(){
        User::logout();
        return true;
    }



}