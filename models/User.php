<?php

class User
{
    #getAll()
    static function getAll($page = 1){
        $page = intval($page);
        $db = Db::getConnection();
        $offset = ($page-1)*SHOW_BY_DEFAULT;
        $result = $db->query('SELECT *
                      FROM user ORDER BY id DESC LIMIT '.SHOW_BY_DEFAULT.' OFFSET '.$offset);
        $i =0;
        while($row=$result->fetch()){
            $userItems[$i]['id'] = $row['id'];
            $userItems[$i]['first_name'] = $row['first_name'];
            $userItems[$i]['last_name'] = $row['last_name'];
            $userItems[$i]['email'] = $row['email'];
            $userItems[$i]['is_admin'] = $row['is_admin'];
            $i++;

        }
        return $userItems;
    }
    #getOnebyId()
    static function getOneById($id = 1){
        $id = intval($id);
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM user WHERE id='.$id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $user = $result->fetch();
        $user['name'] = $user['first_name'].' '.$user['last_name'];
        return $user;
    }
    static function getNameById($id = 1){
        $id = intval($id);
        $db = Db::getConnection();
        $result = $db->query('SELECT first_name, last_name FROM user WHERE id='.$id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $user = $result->fetch();
        return $user['first_name']." ".$user['last_name'];
    }



    public static function register($firstName, $lastName, $login, $password, $email){
        $db = Db::getConnection();
        $password = md5($password);
        $sql = 'INSERT INTO user(first_name, last_name, login, password, email)
                VALUES (:first_name, :last_name, :login, :password, :email)';
        $result = $db->prepare($sql);
        $result->bindParam(':first_name', $firstName, PDO::PARAM_STR);
        $result->bindParam(':last_name', $lastName, PDO::PARAM_STR);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        return $result->execute();
    }


    public static function auth($userId){
        $_SESSION['is_auth'] = md5($userId);
        $_SESSION["user"] = $userId;
    }


    public static function logout(){
        unset($_SESSION["user"]);
        unset($_SESSION['is_auth']);
        header("Location: /");
    }


    public static function checkName($name){
        if(strlen($name) >= 2){
            return true;
        }
        return false;
    }


    public static function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }


    public static function checkLoginExist($login){
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM user WHERE login=:login';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        if($result->fetchColumn())
            return false;
        return true;
    }


    public static function checkEmailExist($email){
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM user WHERE email=:email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if($result->fetchColumn())
            return false;
        return true;
    }


    public static function checkPassword($password){
        if(strlen($password) >= 6){
            return true;
        }
        return false;
    }
    public static function checkUserExist($login, $password){
        $db = Db::getConnection();
        $password = md5($password);
        $sql = 'SELECT * FROM user WHERE login=:login AND password=:password';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if($user)
            return $user["id"];
        return false;
    }
    public static function checkUserLogged(){
        if(isset($_SESSION["is_auth"])){
            $userId = $_SESSION['user'];
            if ($_SESSION['is_auth'] == md5($userId)){
                return $_SESSION["user"];
            }
        }
        return false;
    }
    public static function isAdmin($idUser){
        $db = Db::getConnection();
        $sql = 'SELECT is_admin FROM user WHERE id=:id';
        $result = $db->prepare($sql);
        $result->bindParam(":id", $idUser, PDO::PARAM_INT);
        $result->execute();
        if($result->fetchColumn()){
            return true;
        }
        return false;
    }
    public static function isGuest(){
        if (isset($_SESSION["user"]) || isset($_SESSION['is_auth']) || md5($_SESSION['user']) != isset($_SESSION['is_auth'])){
            return false;
        }
        return true;
    }



}