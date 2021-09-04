<?php

class AdminCategoryController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        $categoryList = Category::getCategoriesListAdmin();

        require_once ROOT . '/views/admin_category/index.php';
        return true;
    }

    public static function actionCreate()
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {

            $options['name'] = $_POST['name'];
            $options['status'] = $_POST['status'];
            $options['sort_order'] = $_POST['sort_order'];

            $errors = false;

            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'заполните поля';
            } 

            if ($errors == false){
                
                Category::createCategory($options);

                header("Location: /admin/category");
            }


        }

        require_once ROOT . '/views/admin_category/create.php';
        return true;
    }

    public static function actionDelete($id)
    {
        self::checkAdmin();

        Category::deleteCategoryById($id);

        return true;
    }


    public static function actionUpdate($id)
    {
        self::checkAdmin();

        $category = Category::getCategoryById($id);

        if (isset($_POST['submit'])) {

            $options['name'] = $_POST['name'];
            $options['status'] = $_POST['status'];
            $options['sort_order'] = $_POST['sort_order'];

            $errors = false;

            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'заполните поля';
            } 

            if ($errors == false){
                
                Category::updateCategory($id, $options);

                header("Location: /admin/category");
            }
        }
        
        require_once ROOT . '/views/admin_category/update.php';
        return true;
    }
}