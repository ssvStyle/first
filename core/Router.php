<?php

class Router {
    public static function route($url) {
        
        //
        
        $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
       //
       //var_dump($controller);
       //var_dump(class_exists($controller));
        class_exists($controller) ? $controller_name = $controller : $controller = 'ErrorPage';
        $controller_name = $controller;
       //var_dump($controller);
       
        array_shift($url);
        
        //
        
        $action = (isset($url[0]) && $url[0] != '') ? $url[0] . 'Action' : 'indexAction';
        $action_name = $controller;
        array_shift($url);
        
        //
        
        $queryParams=$url;
        
        $dispatch = new $controller($controller_name, $action);
        
        if (method_exists($controller, $action)) {
            call_user_func_array([$dispatch, $action], $queryParams);
        } else {
            //$controller = 'ErrorPage';
            //die('That method does not exist in the conttroller "' . $controller_name . '"');
            header ('Location: '.PROOT.'ErrorPage');
        }
    }

}