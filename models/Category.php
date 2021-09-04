<?php

class Category 
{
    

    public static function getCategoriesList()
    {
        $db = Db::getConnection();

        $categoryList = [];
        
        $res = $db->query('SELECT id, name FROM category WHERE status="1" ORDER BY sort_order ASC;');

        foreach ($res as $row) {
            $categoryList[] = [
            
                'id' => $row['id'],
                'name' => $row['name'],
            ];
            
        }
    
        return $categoryList;
    }

    public static function getCategoryById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $res = $db->query('SELECT * FROM category WHERE id=' . $id);
            $res->setFetchMode(PDO::FETCH_ASSOC);

            return $res->fetch();
        }
    }

    public static function getCategoriesListAdmin() 
    {
        $db = Db::getConnection();

        $categoryList = [];
        
        $res = $db->query('SELECT id, name, sort_order, status FROM category ORDER BY sort_order ASC;');

        foreach ($res as $row) {
            $categoryList[] = [
            
                'id' => $row['id'],
                'name' => $row['name'],
                'sort_order' => $row['sort_order'],
                'status' => $row['status']
            ];
            
        }
    
        return $categoryList;
    }

    public static function createCategory($options)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO category (name, sort_order, status) VALUES ' . 
        '(:name, :sort_order, :status)';

        $res = $db->prepare($sql);
        $res->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $res->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
        $res->bindParam(':status', $options['status'], PDO::PARAM_INT);

        return $res->execute();
    }

    public static function updateCategory($id, $options)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE category SET name=:name, sort_order=:sort_order, status=:status WHERE id = :id';

        $res = $db->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $res->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
        $res->bindParam(':status', $options['status'], PDO::PARAM_INT);
        
        return $res->execute();

    }

    public static function deleteCategoryById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM category WHERE id = :id';

        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    
}