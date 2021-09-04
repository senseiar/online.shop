<?php

class SearchController
{
    
    public function actionIndex()
    {
        
        $searchEl = $_POST['search'];
        
        //Список категорий для левого меню
        $categories = Category::getCategoriesList();
        
      
            if (isset($_POST['submit'])) {
                
                   
                
              
                
                $foundProducts = Search::findProducts($searchEl);
                $foundCategories = Search::findCategories($searchEl);

                
            }
        echo $_SERVER["REQUEST_URI"] . '<br>';
        echo $new_uri = str_replace("/news","", $_SERVER["REQUEST_URI"]);
        
        require_once ROOT . '/views/search/index.php';
        
        return true;
    }
}
