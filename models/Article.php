<?php


require_once $_SERVER['DOCUMENT_ROOT'].'/models/User.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/Tag.php';

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

    public static function getAllByTag($tagId, $page = 1){
        //$tagId = intval($tagId);
        $offset = ($page-1)*SHOW_BY_DEFAULT;
        $db = Db::getConnection();
        //получить имя тэга
        $tagName = $db->query("SELECT name FROM tag WHERE id=".$tagId);
        $tagName->setFetchMode(PDO::FETCH_ASSOC);
        $name = $tagName->fetch();
        $query = 'SELECT * FROM article, tag
            WHERE tag.name=\''.$name['name'].'\' AND article.id=tag.article_id
            ORDER BY article.id DESC LIMIT '.SHOW_BY_DEFAULT.' OFFSET '.$offset;
        $result = $db->query($query);
        $i =0;
        while($row=$result->fetch()){
            $articleItems[$i]['id'] = $row['id'];
            $articleItems[$i]['title'] = $row['title'];
            $articleItems[$i]['author'] = $row['author'];
            $articleItems[$i]['price'] = $row['price'];
            $articleItems[$i]['text'] = $row['text'];
            $articleItems[$i]['status'] = $row['status'];
            $articleItems[$i]['image'] = $row['image'];
            $i++;

        }
        return $articleItems;

    }

    //getAllByCategory
    public static function getAllByCategory($categoryId = 0, $page = 1){
        $categoryId = intval($categoryId);
        $offset = ($page-1)*SHOW_BY_DEFAULT;
        $db = Db::getConnection();
        if($categoryId == 0){
            $query = 'SELECT *
                      FROM article ORDER BY id DESC LIMIT '.SHOW_BY_DEFAULT.' OFFSET '.$offset;
        }
        else{
            $query = 'SELECT article.id, article.title, article.author, article.text, article.image, article.status, article.price, article.date FROM article, category, tag
            WHERE category.id='.$categoryId.' AND article.id=tag.article_id AND category.id = tag.category_id
            ORDER BY article.id DESC LIMIT '.SHOW_BY_DEFAULT.' OFFSET '.$offset;
        }
        $result = $db->query($query);
        $i =0;
        while($row=$result->fetch()){
            $articleItems[$i]['id'] = $row['id'];
            $articleItems[$i]['title'] = $row['title'];
            $articleItems[$i]['author'] = $row['author'];
            $articleItems[$i]['author_name'] = User::getNameById(intval($row['author']));
            $articleItems[$i]['text'] = $row['text'];
            $articleItems[$i]['status'] = $row['status'];
            $articleItems[$i]['price'] = $row['price'];
            $articleItems[$i]['image'] = $row['image'];
            $articleItems[$i]['date'] = $row['date'];
            $i++;

        }
        return $articleItems;

    }
    //getAll
    public static function getAll($page = 1){
        $page = intval($page);
        $db = Db::getConnection();
        $offset = ($page-1)*SHOW_BY_DEFAULT;
        $result = $db->query('SELECT *
                      FROM article ORDER BY id DESC LIMIT '.SHOW_BY_DEFAULT.' OFFSET '.$offset);
        $i =0;
        while($row=$result->fetch()){
            $articleItems[$i]['id'] = $row['id'];
            $articleItems[$i]['title'] = $row['title'];
            $articleItems[$i]['author'] = $row['author'];
            $articleItems[$i]['text'] = $row['text'];
            $articleItems[$i]['status'] = $row['status'];
            $articleItems[$i]['price'] = $row['price'];
            $articleItems[$i]['image'] = $row['image'];
            $articleItems[$i]['date'] = $row['date'];
            $i++;

        }
        return $articleItems;
    }

    public static function addArticle($authorId, $title, $text, $category, $count = 0, $price =0, $image = '', $tag=''){
        $status = 1; //do not published
        $db = Db::getConnection();
        $sql = 'INSERT INTO article(author, title, text, price, status, image, count) VALUES (
                :author, :title, :text, :price, :status, :image, :count)';
        $result = $db->prepare($sql);
        $result->bindParam(':author', $authorId, PDO::PARAM_INT);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':count', $count, PDO::PARAM_INT);
        $result->bindParam(':price', $price, PDO::PARAM_INT);
        $result->bindParam(':image', $image, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        if($result->execute()){
            return Tag::addTag($tag, $db->lastInsertId(), $category);
        }
        return false;
    }

}