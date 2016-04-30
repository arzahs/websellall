<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 28.04.16
 * Time: 21:07
 */
class City
{

    public static function getOneById($id){
        $id = intval($id);
        if($id){
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM city WHERE id=".$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $cityItem = $result->fetch();
            //$newsItem["category"] = Category::getById($newsItem["news_category_id"]);
            return $cityItem;
        }
    }

    public static function getAll($page = 1){
        $page = intval($page);
        $db = Db::getConnection();
        $result = $db->query('SELECT *
                      FROM city ORDER BY id');
        $i =0;
        while($row=$result->fetch()){
            $items[$i]['id'] = $row['id'];
            $items[$i]['name'] = $row['name'];
            $i++;

        }
        return $items;
    }




}