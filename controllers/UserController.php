<?php

class UserController 
{
    public function actionSignup()
    {

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $email = $_POST['email'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя должно быть больше одного символа';
            } 

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен иметь больше 6 символов';
            }
            
            if ($password_confirm !== $password) {
                $errors[] = 'Пароли не совпадают';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Email неправильный';
            } 
            
            if (User::checkEmailExists($email)) {
                $errors[] = 'email уже используется';
            }

            if ($errors == false) {
                $reg = User::signup($name, $email, $password);
            }

        }

        require_once ROOT . '/views/user/signup.php';

        return true;
    }

    public static function actionSignin()
    {

        if (isset($_POST['submit'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            

            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = 'Непаравильный email';
            } 

            if (!User::checkPassword($password)) {
                $errors[] = 'пароль должен быть длиннее 6-ти символов';
            } 

            
            //Чи иснуе користувач
            $user = User::checkUserData($email, $password);
            //$userName = User::checkUserName($email, $password);

            if ($user == false) {
                $errors[] = 'Неправильный Email или пароль неправильный'; 
            } else {
                User::auth($user);

                header("Location: /cabinet/");
            }
            

        }
                
        require_once ROOT . '/views/user/signin.php';

        return true;
    }

    public static function actionSignout() {
       
        
        unset($_SESSION['user']);
        header('Location: /');
    }

    
}