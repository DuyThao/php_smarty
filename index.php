<?php


ini_set('display_errors',1);

$GLOBALS['config'] = array (
    'mysql' => array (
        'username' => 'root',
        'password' => '',
        'database' => 'test',
        'host' => 'localhost'
    )
);


// Autoloading with Composer

require_once('vendor/autoload.php');
require_once('Loader.php');

//Load Smarty
require_once('app/smarty/Smarty.class.php');

//ROUTER
// Định nghĩa hằng Path của file index.php
define('PATH_ROOT', __DIR__);

// Autoload class trong PHP
spl_autoload_register(function (string $class_name) {
    include_once PATH_ROOT . '/' . $class_name . '.php';
});

require 'core/http/Route.php';
use Core\Http\Route;

$router = new Route();

include_once PATH_ROOT . '/app/routes.php';


$request_url = !empty($_GET['url']) ? '/' . $_GET['url'] : '/';
$method_url = !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';

$router->map($request_url, $method_url);

// $expected_controllers = array ( 'index', 'user' );
// $_GET['controller'] = 'user';
// if(!empty($_GET)) {
//    if(in_array($_GET['controller'], $expected_controllers )) {
//        $controller = new Loader($_GET);
//        $controller = $controller->createController();
//        $controller->executeAction();
//    }
// }


