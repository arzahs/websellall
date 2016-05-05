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

    public static function getAllByUser($userId=0, $page=1){
        $offset = ($page-1)*SHOW_BY_DEFAULT;
        $db = Db::getConnection();
        $query = 'SELECT * FROM article WHERE author='.$userId.' ORDER BY id DESC LIMIT '.SHOW_BY_DEFAULT.' OFFSET '.$offset;
        $result = $db->query($query);
        $i = 0;
        while($row=$result->fetch()){
            $articleItems[$i]['id'] = $row['id'];
            $articleItems[$i]['title'] = $row['title'];
            $articleItems[$i]['author'] = $row['author'];
            $articleItems[$i]['price'] = $row['price'];
            $articleItems[$i]['text'] = $row['text'];
            $articleItems[$i]['status'] = $row['status'];
            $articleItems[$i]['image'] = $row['image'];
            $articleItems[$i]['date'] = $row['date'];
            $i++;

        }
        return $articleItems;

    }

    public static function getCountByUser($userId=0){
        $db = Db::getConnection();
        $query = 'SELECT COUNT(*) FROM article WHERE author='.$userId;
        $result = $db->query($query);
        $count = $result->fetch(PDO::FETCH_NUM);
        return intval($count[0]);

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

    public static function getCountAllByCategory($categoryId = 0, $city_id = 0){
        $db = Db::getConnection();
        if($categoryId == 0 and $city_id == 0){
            $query = 'SELECT COUNT(*)
                      FROM article WHERE article.status = 1 ORDER BY id';
        }
        else if($categoryId == 0 and $city_id != 0){
            $query = 'SELECT COUNT(*)
                      FROM article WHERE article.status = 1 AND article.city_id='.$city_id.' ORDER BY id';
        }
        else{
            $query = 'SELECT COUNT(article.id) FROM article, category, tag
            WHERE category.id='.$categoryId.' AND article.id=tag.article_id AND article.status = 1 AND category.id = tag.category_id AND article.city_id = '.$city_id.'
            ORDER BY article.id';
        }
        $result = $db->query($query);
        $count = $result->fetch(PDO::FETCH_NUM);
        return intval($count[0]);
    }



    //getAllByCategory
    public static function getAllByCategory($categoryId = 0, $page = 1, $city_id = 0){
        $categoryId = intval($categoryId);
        $offset = ($page-1)*SHOW_BY_DEFAULT;
        $db = Db::getConnection();
        if($categoryId == 0 and $city_id == 0){
            $query = 'SELECT *
                      FROM article WHERE article.status = 1 ORDER BY id DESC LIMIT '.SHOW_BY_DEFAULT.' OFFSET '.$offset;
        }
        else if($categoryId == 0 and $city_id != 0){
            $query = 'SELECT *
                      FROM article WHERE  article.status = 1 AND article.city_id='.$city_id.' ORDER BY id DESC LIMIT '.SHOW_BY_DEFAULT.' OFFSET '.$offset;
        }
        else{
            $query = 'SELECT article.id, article.title, article.author, article.text, article.image, article.status, article.price, article.date, article.city_id FROM article, category, tag
            WHERE category.id='.$categoryId.' AND article.id=tag.article_id AND article.status = 1 AND category.id = tag.category_id AND article.city_id = '.$city_id.'
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
            $articleItems[$i]['city_id'] = $row['city_id'];
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
            $articleItems[$i]['city_id'] = $row['city_id'];
            $i++;

        }
        return $articleItems;
    }

    public static function addArticle($authorId, $title, $text, $category, $count = 0, $price =0, $city = 0, $image = '', $tag=''){
        $status = 2; //do not published
        $db = Db::getConnection();
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        $sql = 'INSERT INTO article(author, title, text, price, status, image, count, city_id) VALUES (
                :author, :title, :text, :price, :status, :image, :count, :city_id)';
        $result = $db->prepare($sql);
        $result->bindParam(':author', $authorId, PDO::PARAM_INT);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':count', $count, PDO::PARAM_INT);
        $result->bindParam(':price', $price, PDO::PARAM_INT);
        $result->bindParam(':image', $image, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':city_id', $city, PDO::PARAM_INT);
        if($result->execute()){
            return Tag::addTag($tag, $db->lastInsertId(), $category);
        }
        return false;
    }

    public static function updateStatus($id, $status){
        $db = Db::getConnection();
        $id = intval($id);
        $status = intval($status);
        $sql = 'UPDATE article SET status=:status WHERE id=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getByStatus($status, $page=1){
        $page = intval($page);
        $db = Db::getConnection();
        $offset = ($page-1)*SHOW_BY_DEFAULT;
        $result = $db->query('SELECT *
                      FROM article WHERE status ='.$status.' ORDER BY id DESC LIMIT '.SHOW_BY_DEFAULT.' OFFSET '.$offset);
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
            $articleItems[$i]['city_id'] = $row['city_id'];
            $i++;

        }
        return $articleItems;
    }


    public static function getCountByStatus($status, $page=1)
    {
        $page = intval($page);
        $db = Db::getConnection();
        $offset = ($page - 1) * SHOW_BY_DEFAULT;
        $result = $db->query('SELECT COUNT(*)
                      FROM article WHERE status =' . $status);
        $count = $result->fetch(PDO::FETCH_NUM);
        return intval($count[0]);
    }
}