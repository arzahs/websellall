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
        return $user;
    }
}