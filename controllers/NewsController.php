<?php

class NewsController
{
    
    public function actionIndex($page = 1)
    {
       
        //$categories = Category::getCategoriesList();

        //Получить список статей

        $total = News::getTotalArticles($page);
        $articles = News::getArticlesList($page);
        
        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');

        require_once ROOT. '/views/news/index.php';
        return true;
    }

    

    public static function actionView($id)
    {
        $categories = Category::getCategoriesList();

        $fullArticle = News::getArticleById($id);
        //$comments = News::getArticleComments($id);
        require_once ROOT. '/views/news/view.php';
        return true;
    }

    
}