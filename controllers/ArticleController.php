<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/models/Article.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/models/Category.php';
include_once $_SERVER['DOCUMENT_ROOT']."/models/Tag.php";
include_once $_SERVER['DOCUMENT_ROOT']."/models/City.php";
class ArticleController
{
    public function actionTest(){
        echo "test!";
        return true;
    }

    public function actionOne($id = 1){
        $article = Article::getOneById($id);
        $author = User::getOneById(intval($article['author']));
        $city = City::getOneById($article['city_id']);
        $tags = Tag::getAllByArticleId($id);
        $category = Category::getOneById($tags[0]['category_id']);
        $view = new View();
        View::userControl($view);
        $view->assign('category', $category);
        $view->assign('city', $city);
        $view->assign('tags',$tags);
        $view->assign('author', $author);
        $view->assign('article', $article);
        $view->display("one_item.php");
        return true;
    }

    public function actionAll($page){
        $articles = Article::getAllByCategory(0, $page);
        $categories = Category::getAll();
        $view = new View();
        View::userControl($view);
        $view->assign('is_category', 0);
        $view->assign('categories', $categories);
        $view->assign('articles', $articles);
        $view->display("list.php");
        return true;
    }

    public function actionCategory($categoryId = 0,  $city_id=0, $page = 1){
        $userId = User::checkUserLogged();
//        $is_city = User::getCityById($userId);
        $articles = Article::getAllByCategory($categoryId, $page, $city_id);
        $categories = Category::getAll();
        $view = new View();
        $countItems = Article::getCountAllByCategory($categoryId, $city_id);
        $numberPages = intval(ceil($countItems/intval(SHOW_BY_DEFAULT)));
        View::userControl($view);
        $cities = City::getAll();
        $view->assign("page", $page);
        $view->assign('countPages', $numberPages);
        $view->assign('is_city', $city_id);
        $view->assign('cities', $cities);
        $view->assign('is_category', $categoryId);
        $view->assign('categories', $categories);
        $view->assign('articles', $articles);
        $view->display("list.php");
        return true;
    }

    public function actionTag($tagId, $page = 1){
        $articles = Article::getAllByTag($tagId, $page);
        echo "Article Controller actionTag method<br>";
        print_r($articles);
        return true;
    }

    public function actionIndex(){
        $articles = Article::getAll($page = 1);
        $categories = Category::getAll();
        $view = new View();
        View::userControl($view);
        $view->assign('main_banner', true);
        $view->assign('categories', $categories);
        $view->assign('articles', $articles);
        $view->display("index.php");
        return true;
    }

    public function actionAdd(){
        $title = '';
        $text = '';
        $count = '';
        $price = '';
        $errors = false;
        $image = '';
        $author = User::checkUserLogged();
        if(isset($_POST["action"])) {
            $title = $_POST['title'];
            $text = $_POST['text'];
            $count = $_POST['count'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $city = $_POST['city'];
            $tag = $_POST['tag'];
            if ($title == '') {
                $errors[] = 'Вы не ввели название';
            }
            if ($text == '') {
                $errors[] = 'Вы не ввели описание';
            }
            if (!is_numeric(intval($count))) {
                $count = 0;
            }
            if (!is_numeric(intval($price))) {
                $errors[] = 'Вы ввели не корректную цену';
            }
            if ($title == '') {
                $errors[] = 'Вы не ввели тэг';
            }
            if (!is_numeric(intval($category))) {
                $errors[] = 'Вы не выбрали категорию';
            }
            if (!is_numeric(intval($city))) {
                $errors[] = 'Вы не выбрали город';
            }
            if($errors == false){
                $name_image = $_FILES['image']['tmp_name'];
                $name_image = md5($name_image);
                $namePathToLoad = '';
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    $namePathToLoad = $_SERVER['DOCUMENT_ROOT'] . "/media/art/{$name_image}.jpg";
                    var_dump($namePathToLoad);
                    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $namePathToLoad)) {
                        $errors[] = "Ошибка записи файла!";
                    }else{
                        $image = "/media/art/{$name_image}.jpg";
                    }
                }
            }
            if ($errors == false) {
                $result = Article::addArticle($author, $title, $text, $category, $count, $price, $city, $image, $tag);
                if ($result) {
                    header("Location: /");
                } else {
                    $errors[] = "Ошибка записи в БД!";
                }


            }
        }
        $view = new View();
        $cities = City::getAll();
        $categories = Category::getAll();
        View::userControl($view);
        $view->assign('errors', $errors);
        $view->assign('categories', $categories);
        $view->assign('cities', $cities);
        $view->display('add_article.php');
        return true;
    }



}