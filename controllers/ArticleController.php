<?php


include_once $_SERVER['DOCUMENT_ROOT'].'/models/Article.php';
class ArticleController
{
    public function actionTest(){
        echo "test!";
        return true;
    }

    public function actionOne($id = 1){
        $article = Article::getOneById($id);
        echo "Article Controller actionOne method";
        print_r($article);
        return true;
    }

    public function actionAll(){
        $articles = Article::getAll(1);
        echo "Article Controller actionAll method";
        print_r($articles);
        return true;
    }
}