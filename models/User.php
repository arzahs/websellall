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
            $userItems[$i]['name'] = $row['first_name'].' '.$row['last_name'];
            $userItems[$i]['email'] = $row['email'];
            $userItems[$i]['is_admin'] = $row['is_admin'];
            $i++;

        }
        return $userItems;
    }
    static function getCountAll(){

        $db = Db::getConnection();
        $result = $db->query('SELECT COUNT(*) FROM user');
        $count = $result->fetch(PDO::FETCH_NUM);
        return intval($count[0]);

    }

    public static function updateStatus($id, $status){
        $db = Db::getConnection();
        $id = intval($id);
        $status = intval($status);
        $sql = 'UPDATE user SET is_admin=:status WHERE id=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
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

    static function updateCity($idUser, $idCity){
        $db = Db::getConnection();
        $sql = 'UPDATE user SET city_id=:city_id WHERE id=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':city_id', $idCity, PDO::PARAM_INT);
        $result->bindParam(':id', $idUser, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function getCityById($userId){
        $db = Db::getConnection();
        $result = $db->query("SELECT city_id FROM user WHERE id=".$id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $cityItem = $result->fetch();
        return $cityItem['city_id'];
    }


    public static function register($firstName, $lastName, $password, $email, $phone){
        $db = Db::getConnection();
        $password = md5($password);
        $sql = 'INSERT INTO user(first_name, last_name, password_hash, email, phone)
                VALUES (:first_name, :last_name, :password_hash, :email, :phone)';
        $result = $db->prepare($sql);
        $result->bindParam(':first_name', $firstName, PDO::PARAM_STR);
        $result->bindParam(':last_name', $lastName, PDO::PARAM_STR);
        $result->bindParam(':password_hash', $password, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        return $result->execute();
    }


    public static function auth($userId){
        $_SESSION['is_auth'] = md5($userId);
        $_SESSION["user"] = $userId;
        header("Location: /");
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
    public static function checkUserExist($email, $password){
        $db = Db::getConnection();
        $password = md5($password);
        var_dump($password);
        $sql = 'SELECT * FROM user WHERE email=:email AND password_hash=:password';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
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