<?php

require_once ROOT . '/models/Category.php';
require_once ROOT . '/models/Product.php';

class SiteController
{
    public function actionIndex()
    {
        
        $categories = Category::getCategoriesList();

        
        $latestProducts = Product::getLatestProducts(6);

        //возвращает список рекомендуемыхтоваров
        $sliderProducts = Product::getRecommendedProducts();

        require_once ROOT . '/views/site/index.php';

        return true;
    }

    public function actionContact() 
    {
        $userEmail = '';
        $userName = '';
        $userSubject = '';
        $userMessage = '';

        $result = false;

        if (isset($_POST['submit'])) {
            
            $userEmail = $_POST['userEmail'];
            $userName = $_POST['userName'];
            $userSubject = $_POST['userSubject'];
            $userMessage = $_POST['userMessage'];

            $errors = false;

            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if (!User::checkName($userName)) {
                $errors[] = 'Имя должно содержать от 2ух символов и больше';
            }

            if (empty($userSubject)) {
                $errors[] = 'Укажите тему сообщения';
            }

            if ($errors == false) {

                $adminEmail = 'aratkin77@gmail.com';
                $message = "Text: {$userMessage}. From: {$userEmail}. Name {$userName}";
                $subject = $userSubject;

                $result = mail($adminEmail, $subject, $message);
            }

        }

        require_once ROOT . '/views/site/contact.php';

        return true;



    }
}
