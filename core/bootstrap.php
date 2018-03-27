<?php

require_once (ROOT.'/config/config.php');
require_once (ROOT.'/app/lib/helpers/functions.php');

function __autoload($className){
    if (file_exists(ROOT . '/core/' . $className . '.php')){
        require_once (ROOT . '/core/' . $className . '.php');
    } elseif(file_exists(ROOT . '/app/controllers/' . $className . '.php')){
        require_once (ROOT . '/app/controllers/' . $className . '.php');
    } elseif(file_exists(ROOT . '/app/models/' . $className . '.php')){
        require_once (ROOT . '/app/models/' . $className . '.php');
    } else {
        require_once (ROOT . '/app/controllers/ErrorPage.php');
        //die();
    }
}

Router::route($url);