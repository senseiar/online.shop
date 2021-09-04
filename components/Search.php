<?php

class Search 
{
    
    public static function findProducts($searchEl){
        $db = Db::getConnection();
        $productList = [];
        //$searchEl = preg_replace("#[^0-9a-z]#i","",$searchEl);
        $sql = "SELECT * FROM product WHERE name LIKE '%$searchEl%' OR description LIKE '%$searchEl%'";
        $res = $db->query($sql);

        if ($res->rowCount() > 0) {
            foreach ($res as $row) {
                $productsList[] = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'price' => $row['price'],
                    'image' => $row['image'],
                    'description' => $row['description'],
                    'is_new' => $row['is_new']
                ];
            }

            return $productsList;
        }

        return false;

    }

    public static function findCategories($searchEl){

        $db = Db::getConnection();

        //$searchEl = preg_replace("#[^0-9a-z]#i","",$searchEl);
        $sql = "SELECT * FROM category WHERE name LIKE '%$searchEl%'";
        $res = $db->query($sql);

        if ($res->rowCount() > 0) {
            foreach ($res as $row) {
                $categoryList[] = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                ];
            }

            return $categoryList;
        }
        
        return false;
    }
}