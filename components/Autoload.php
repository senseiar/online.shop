<?php

function __autoload($class_name) {
    
    $arr_paths = [

        '/components/',
        '/models/',
        
    ];

    foreach ($arr_paths as $path) 
    {
        $path = ROOT . $path . $class_name . '.php';
        
        if(file_exists($path)) 
        {
            require_once $path;
                
            return;
        }   
    }

}