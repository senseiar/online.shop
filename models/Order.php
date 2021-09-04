<?php

class Order
{
    public static function save($userName, $userPhone, $userComment, $userId, $products) {

        $db = Db::getConnection();

        $sql = 'INSERT INTO product_order (user_id, user_phone, user_comment, user_name, products) '
        . 'VALUES (:user_id, :user_phone, :user_comment, :user_name, :products)';
       
        $products = json_encode($products);

        $result = $db->prepare($sql);
        
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);

        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();

        
    }

    public static function getOrdersList()
    {
        $db = Db::getConnection();
        
        $res = $db->query('SELECT id, user_name, user_phone, user_comment, date, status FROM product_order ORDER BY id DESC');
        $ordersList = [];

        foreach ($res as $row) {
            $ordersList[] = [
            
                'id' => $row['id'],
                'user_name' => $row['user_name'],
                'user_phone' => $row['user_phone'],
                'user_comment' => $row['user_comment'],
                'date' => $row['date'],
                'status' => $row['status']

            ];
        }
    
        return $ordersList;
    }

    public static function getStatusText($status)
    {
        switch ($status) {
            case '0':
                return 'Отменен';
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }

    public static function getOrderById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM product_order WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();
    }

    public static function deleteOrderById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM product_order WHERE id = :id';

        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateOrderById($id, $userName, $userPhone, $userComment, $date, $status)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE product_order
            SET 
                user_name = :user_name, 
                user_phone = :user_phone, 
                user_comment = :user_comment, 
                date = :date, 
                status = :status 
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }
}
