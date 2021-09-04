<?php

class Product
{
    const SHOW_BY_DEFAULT = 6;

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT){
        
        $count = intval($count);

        $db = Db::getConnection();

        $productsList = [];

        $res = $db->query('SELECT id, name, price, image, is_new FROM product 
        WHERE status = "1" ORDER BY id DESC LIMIT ' . $count);

        foreach ($res as $row) {
            $productsList[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'image' => $row['image'],
                'is_new' => $row['is_new'],
            ];
        }

        return $productsList;
    }

    public static function getProductById ($id) {

        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $res = $db->query('SELECT * FROM product WHERE id=' . $id);
            $res->setFetchMode(PDO::FETCH_ASSOC);

            return $res->fetch();
        }
    }

    public static function getTotalProductsInCategory($categoryId) {

        $db = Db::getConnection();

        $res = $db->query('SELECT count(id) AS count FROM product 
        WHERE status="1" AND category_id="' . $categoryId . '"' );

        $res->setFetchMode(PDO::FETCH_ASSOC);
        $row = $res->fetch();

        return $row['count'];
    }

    public static function getProductListByCategory($categoryId = false, $page = 1){
        
        if ($categoryId) {

            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();

            $products = [];
    
            $res = $db->query("SELECT id, name, price, image, is_new FROM product 
            WHERE status = '1' AND category_id = '$categoryId' ORDER BY id DESC LIMIT " . 
            self::SHOW_BY_DEFAULT . " OFFSET $offset");
    
            foreach ($res as $row) {
                $products[] = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'price' => $row['price'],
                    'image' => $row['image'],
                    'is_new' => $row['is_new'],
                ];
            }
    
        }

       
        return $products;
    }

    public static function getProductsByIds($idsArr){
        $products = [];

        $db = Db::getConnection();

        $idsString = implode(',', $idsArr);

        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $res = $db->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        

        $i = 0;
        while ($row = $res->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }

        return $products;
    }

    public static function getRecommendedProducts() {
        
        $db = Db::getConnection();

        $sql = "SELECT id, name, price, is_new FROM product 
        WHERE status = '1' AND is_recommended = '1' ORDER BY id DESC";

        $result = $db->query($sql);

        foreach ($result as $row) {
            $productList[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'is_new' => $row['is_new'],
            ];
        }

        return  $productList;
    }

    public static function getProductsList()
    {
        $db = Db::getConnection();

        $productsList = [];

        $res = $db->query('SELECT * FROM product ORDER BY id ASC');

        foreach ($res as $row) {
            $productsList[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'code' => $row['code'],
                'brand' => $row['brand'],
            ];
        }

        return $productsList;
    }

    public static function createProduct($options)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO product (name, code, price, category_id, brand, availability, description, is_new,
        is_recommended, status)' . 
        'VALUES '. 
        '(:name, :code, :price, :category_id, :brand, :availability, :description, :is_new,
        :is_recommended, :status)';

        $res = $db->prepare($sql);
        $res->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $res->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $res->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $res->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $res->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $res->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $res->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $res->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $res->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $res->bindParam(':status', $options['status'], PDO::PARAM_INT);

        if ($res->execute()) {
           return $db->lastInsertId();
        }
        return 0;
    }

    public static function updateProductById($id, $options) 
    {
        $db = Db::getConnection();

        $sql = 'UPDATE product SET name = :name, code = :code, price = :price, category_id = :category_id, 
        brand = :brand, availability = :availability, description = :description, is_new = :is_new, 
        is_recommended = :is_recommended, status = :status WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        
        return $result->execute();
    }

    public static function deleteProductById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM product WHERE id = :id';

        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();

    }

    public static function getImage($id)
    {
        $noImage = 'noimage.jpg';

        $path = '/upload/images/products/';

        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
            return $pathToProductImage;
        }

        return $path . $noImage;
    }
}
