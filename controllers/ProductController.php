<?php

require_once ROOT . '/models/Category.php';
require_once ROOT . '/models/Product.php';

class ProductController 
{

    public function actionView($productId)
    {
        $categories = [];
        $categories = Category::getCategoriesList();

        //$productId = $id;
        $product = Product::getProductById($productId);

        require_once(ROOT . '/views/product/view.php');

        return true;


    }

}
