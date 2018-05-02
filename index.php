<?php
session_start();

ini_set("display_errors","1");
ini_set("error_reporting", E_ALL);

define('ROOT', dirname(__FILE__));

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];

require_once ROOT.'/core/bootstrap.php';