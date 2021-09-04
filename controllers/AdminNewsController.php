<?php

class AdminNewsController extends AdminBase 
{
    public function actionIndex()
    {
        self::checkAdmin();

        $articlesList = News::getArticlesAdmin();

        require_once ROOT . '/views/admin_news/index.php';
        return true;
    }

    public static function actionDelete($id)
    {
        self::checkAdmin();

        News::deleteArticleById($id);

        return true;
    }

    public static function actionCreate()
    {
        self::checkAdmin();

        //$categoriesList = Category::getCategoriesListAdmin();
        
        if (isset($_POST['submit'])) {

            $options['title'] = $_POST['title'];
            $options['description'] = $_POST['description'];
            $options['user_id'] = User::checkLogged();
            $options['text'] = $_POST['text'];
            //$options['category_id'] = $_POST['category_id'];
            $options['date'] = $_POST['date'];
            //$options['status'] = $_POST['status'];

            $errors = false;

            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'заполните поля';
            } 

            if ($errors == false){
                
                $id = News::createArticle($options);

                $imageName = "article-$id";

                if ($id) {
                    
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] 
                        . "/upload/images/news/$imageName.jpg");
                    }
                }

                header("Location: /admin/news");
            }


        }

        require_once ROOT . '/views/admin_news/create.php';
        return true;
    }

    public static function actionUpdate($id)
    {
        self::checkAdmin();

        //$categoriesList = Category::getCategoriesListAdmin();

        $article = News::getArticleById($id);
        
        if (isset($_POST['submit'])) {

            $options['title'] = $_POST['title'];
            $options['description'] = $_POST['description'];
            $options['user_id'] = User::checkLogged();
            $options['text'] = $_POST['text'];
            //$options['category_id'] = $_POST['category_id'];
            $options['date'] = $_POST['date'];
            //$options['status'] = $_POST['status'];

            $errors = false;

            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'заполните поля';
            } 

            if ($errors == false){
                
                $articleId = News::updateArticleById($id, $options);

                $imageName = "article-$id";

                if ($articleId) {
                    
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] 
                        . "/upload/images/news/$imageName.jpg");
                    }
                }

                header("Location: /admin/news");
            }


        }

        require_once ROOT . '/views/admin_news/update.php';
        return true;
    }

}