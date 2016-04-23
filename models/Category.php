<?php

class Category
{
    //getAll
    public static function getAll(){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM category");
        $i = 0;
        while($row = $result->fetch()){
            $categoryItems[$i]['id'] = $row['id'];
            $categoryItems[$i]['name'] = $row['name'];
            $i++;
        }
        return $categoryItems;

    }
    //getOneById
    public static function getOneById($id){
        $id = intval($id);
        if($id){
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM category WHERE id=".$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $category = $result->fetch();
            return $category;
        }
    }

}