<?php

class User
{
    public static function signup($name, $email, $password) {

        $db = Db::getConnection();

        $sql = 'INSERT INTO user (name, email, password) VALUES (:name, :email, :password)';
        
        $result = $db->prepare($sql);
        
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        
        return $result->execute();
        
    }

    public static function checkUserData($email, $password) {

        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email';

        $res = $db->prepare($sql);
        $res->bindParam(':email', $email, PDO::PARAM_STR);
        $res->execute();
        $user = $res->fetch(PDO::FETCH_ASSOC);
        
        if (is_array($user)) {
            if (password_verify($password, $user['password']))
            return $user['id'];
        } else {
            return  false;
        }

    }


    public static function auth($userId) {

        $_SESSION['user'] = $userId;
        
    }

    public static function checkLogged() {

        //Возвращаем айди пользователя с сессии
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        return false;
        header('Location: /user/signin');
    }

    public static function isGuest() {
        if (isset($_SESSION['user'])) {
           return false;
        }
        return true;
    }
    
    public static function checkName($name) {
        if (strlen($name) >= 2) {
            return true;
        } 

       return false;
    }

    public static function checkPassword($password) {
        if (strlen($password) >= 6) {
            return true;
        }

        return false;
    }
    
    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
           return true;
        }

        return false;
    }

    public static function checkPhone($phone) {
        
        if (strlen($phone) >= 10) {
           return true;
        }
        return false;
    }

    public static function checkEmailExists($email) {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $res = $db->prepare($sql);
        $res->bindParam(':email', $email, PDO::PARAM_STR);
        $res->execute();

        if ($res->fetchColumn()) {
            return true;
        } else {
            return false;
        }

    }

    public static function getUserById($id) {
        if ($id) {
           $db = Db::getConnection();
           $sql = 'SELECT * FROM user WHERE id = :id';

           $res = $db->prepare($sql);
           $res->bindParam('id', $id, PDO::PARAM_INT);
            
           //указываем что хотим получить данные ввиде массива

           $res->setFetchMode(PDO::FETCH_ASSOC);
           $res->execute();
        

            return $res->fetch();
        }
    }

    public static function edit($id, $name, $password) {
        $db = Db::getConnection();
        $sql = 'UPDATE user SET name = :name, password = :password WHERE id  = :id';

        $res = $db->prepare($sql);
        $res->bindParam('id', $id, PDO::PARAM_INT);
        $res->bindParam(':name', $name, PDO::PARAM_STR);
        $res->bindParam(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        
        
        return $res->execute();

    }

    
}