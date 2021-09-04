<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT. '/config/routes.php';
        $this->routes = include($routesPath); //Присвоюємо масив з роутами власт. $routes
    }

    /*
    *  Retruns request string
    *
    *  @return string
    */

    private function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run() //Управління від фронтконтролера
    {
       $uri = $this->getUri(); //Отримати строку запроса

        //Проганяєм через цикл чи існує такий запит в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            //зрівнюємо $uriPattern та $uri
            if (preg_match("~$uriPattern~", $uri)) {

                //отримуємо внутрішній шлях із зовнішнього згідно правила
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                
                //Оприділяємо контролер і action + параметри
               
                $segments = explode('/', $internalRoute);
                $controllerName = ucfirst(array_shift($segments) . 'Controller');

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                //Підключаємо файл класу контролера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                
                //Створюємо об'єкт і викликаємо метод (тобто потрібний action)
                $controllerObject = new $controllerName;

                $result = call_user_func_array([$controllerObject, $actionName], $parameters);


                if ($result != null) {
                    break;
                }
                
            }
        }

    }
    
}
