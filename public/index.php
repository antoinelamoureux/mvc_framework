<?php

// Front controller

// echo 'Request URL = "'.$_SERVER['QUERY_STRING'].'"';

// Require the controller class
// require '../App/Controllers/Posts.php';

// Routing
// require '../Core/Router.php';

// Composer
require '../vendor/autoload.php';

// Autoloader
/* spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);
    $file = $root.'/'.str_replace('\\', '/', $class).'.php';
    if (is_readable($file)) {
        require $root.'/'.str_replace('\\', '/', $class).'.php';
    }
}); */

// Error and Exception handling
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new Core\Router();

//Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
//$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
//$router->add('admin/{action}/{controller}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);


// Display the routing table
// echo '<pre>';
// var_dump($router->getRoutes());
// echo '</pre>';

// Match the requested route
/* $url = $_SERVER['QUERY_STRING'];

if ($router->match($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
} else {
    echo "No route found for URL '$url'";
} */

$router->dispatch($_SERVER['QUERY_STRING']);