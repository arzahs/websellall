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
        $result = $db->query('SELECT *
                      FROM tag WHERE article_id='.$id.' ORDER BY id');
        $i =0;
        while($row=$result->fetch()){
            $tagItems[$i]['id'] = $row['id'];
            $tagItems[$i]['name'] = $row['name'];
            $i++;

        }
        return $tagItems;
    }

    public static function addTag($name, $article_id, $category_id){
        $db = Db::getConnection();
        $sql = 'INSERT INTO tag(name, article_id, category_id) VALUES(:name, :article_id, :category_id)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':article_id', $article_id, PDO::PARAM_INT);
        $result->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        return $result->execute();
    }
}