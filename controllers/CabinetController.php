<?php

class CabinetController 
{

    public function actionIndex() 
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        require_once ROOT . '/views/cabinet/index.php';

        return true;
    }

    public function actionEdit() {

        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];
        $password_confirm = $_POST['password_confirm'];

        $result = false;

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $password = $_POST['password'];
            

            $errors = false;

            
            if (!User::checkName($name)) {
                $errors[] = 'Имя должно содержать больше одного символа';
            } 

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен содержать больше одного символа';
            } 

            if ($password_confirm !== $password) {
                $errors[] = 'Пароли не совпадают';
            }
            
            if ($errors == false) {
                $result = User::edit($userId, $name, $password);
            }

        }

        require_once ROOT . '/views/cabinet/edit.php';

        return true;
    }
}