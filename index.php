<?php
// Front CONTROLLER

session_start();

const ROOT = __DIR__;

require_once ROOT . '/components/Autoload.php';



$router = new Router;

$router->run();

// var_dump($router->$actionName);