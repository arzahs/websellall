<?php

class Article
{
    //getOneById
    public static function getOneById($id){
        $id = intval($id);
        if($id){
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM article WHERE id=".$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $newsItem = $result->fetch();
            //$newsItem["category"] = Category::getById($newsItem["news_category_id"]);
            return $newsItem;
        }



    }
    //getAllByTag

    public static function getAllByTag($tagId = 1, $page = 1){
        $tagId = intval($tagId);
        $offset = ($page-1)*SHOW_BY_DEFAULT;
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM article, tag
            WHERE tag.id='.$tagId.' AND article.id=tag.article_id
            ORDER BY article.id DESC LIMIT '.SHOW_BY_DEFAULT.' OFFSET '.$offset);
        $i =0;
        while($row=$result->fetch()){
            $articleItems[$i]['id'] = $row['id'];
            $articleItems[$i]['title'] = $row['title'];
            $articleItems[$i]['author'] = $row['author'];
            $articleItems[$i]['text'] = $row['text'];
            $articleItems[$i]['status'] = $row['status'];
            $i++;

        }
        return $articleItems;

    }

    //getAllByCategory
    public static function getAllByCategory($categoryId = 1, $page = 1){
        $categoryId = intval($categoryId);
        $offset = ($page-1)*SHOW_BY_DEFAULT;
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM article, category, tag
            WHERE category.id='.$categoryId.' AND article.id=tag.article_id AND category.id = tag.category_id
            ORDER BY article.id DESC LIMIT '.SHOW_BY_DEFAULT.' OFFSET '.$offset);
        $i =0;
        while($row=$result->fetch()){
            $articleItems[$i]['id'] = $row['id'];
            $articleItems[$i]['title'] = $row['title'];
            $articleItems[$i]['author'] = $row['author'];
            $articleItems[$i]['text'] = $row['text'];
            $articleItems[$i]['status'] = $row['status'];
            $i++;

        }
        return $articleItems;

    }
    //getAll
    public static function getAll($page = 1){
        $page = intval($page);
        $db = Db::getConnection();
        $offset = ($page-1)*SHOW_BY_DEFAULT;
        $result = $db->query('SELECT id, title, text, author
                      FROM article ORDER BY id DESC LIMIT '.SHOW_BY_DEFAULT.' OFFSET '.$offset);
        $i =0;
        while($row=$result->fetch()){
            $articleItems[$i]['id'] = $row['id'];
            $articleItems[$i]['title'] = $row['title'];
            $articleItems[$i]['author'] = $row['author'];
            $articleItems[$i]['text'] = $row['text'];
            $articleItems[$i]['status'] = $row['status'];
            $i++;

        }
        return $articleItems;
    }

}