<?php
session_start();
define('ROOT', dirname(__FILE__));
//echo ROOT.'<br>';

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];

//print_r($url);
require_once ROOT.'/core/bootstrap.php';