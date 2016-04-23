<?php

class Tag
{
    #getAllByCategoryId
    public static function getAllByCategoryId($id = 0){
        $id = intval($id);
        $db = Db::getConnection();
        $result = $db->query('SELECT id, name
                      FROM article WHERE category_id='.$id.' ORDER BY id');
        $i =0;
        while($row=$result->fetch()){
            $tagItems[$i]['id'] = $row['id'];
            $tagItems[$i]['name'] = $row['name'];
            $i++;

        }
        return $tagItems;

    }

    #getAllByArticleId
    public static function getAllByArticleId($id = 0){
        $id = intval($id);
        $db = Db::getConnection();
        $result = $db->query('SELECT id, name
                      FROM article WHERE article_id='.$id.' ORDER BY id');
        $i =0;
        while($row=$result->fetch()){
            $tagItems[$i]['id'] = $row['id'];
            $tagItems[$i]['name'] = $row['name'];
            $i++;

        }
        return $tagItems;
    }
}