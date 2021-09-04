<?php

class CartController
{
    // public function actionAdd($id)
    // {
    //     Cart::AddProduct($id);

    //     $reffer = $_SERVER['HTTP_REFERER'];
    //     header("Location: $reffer");
    // }

    public function actionAddAjax($id)
    {
        echo Cart::AddProduct($id);

        return true;
    }

    public function actionDelete($id) {
        
        Cart::deleteProduct($id);

        header("Location: /cart/");
    }

    public function actionIndex()
    {
        $categories = [];
        $categories = Category::getCategoriesList();

        $productsInCart = false;

        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
           
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);

            $total = Cart::getTotalPrice($products);
        }

        require ROOT . '/views/cart/index.php';

        return true;
    }

    public function actionCheckout() 
    {
        $productsInCart = Cart::getProducts(); // получить товары с корзины

        //категории для левого меню
        

        if ($productsInCart == false) {
            header("Location: /");
        }

        
        $categories = Category::getCategoriesList();
      
        $productsIds = array_keys($productsInCart);
        $products = Product::getProductsByIds($productsIds);

        $totalPrice = Cart::getTotalPrice($products);
       
        

        //поля для формы
        $userName = false;
        $userPhone = false;
        $userComment = false;
        

        //Статус успешного выполнения заказа по умолчанию
        $result = false;

        if (!User::isGuest()) {
            // Если пользователь не гость
            // Получаем информацию о пользователе из БД
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
        } else {
            // Если гость, поля формы останутся пустыми
            $userId = false;
        }

        if (isset($_POST['submit'])) {

            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];

            //по умолчанию ошибок нет
            $errors = false;

            if (!User::checkName($userName)) {
                $errors[] = 'incorrect Name';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'incorrect phone';
            }

            if ($errors == false)  {
                // Если ошибок нет
                // Сохраняем заказ в базе данных
                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);
                
    
                if ($result) {
                    // Если заказ успешно сохранен
                    // Оповещаем администратора о новом заказе по почте
                    // $adminEmail = 'php.start@mail.ru';
                    // $message = '<a href="http://digital-mafia.net/admin/orders">Список заказов</a>';
                    // $subject = 'Новый заказ!';
                    // mail($adminEmail, $subject, $message);
    
                    // Очищаем корзину
                    Cart::clear();
                }
            }
        }

       

        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }

}
