<?php

$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/');
$uri = explode('/', $host)[$num];

if ($uri === '' || $uri === 'index.php') {
    $controller = new Controller();
    
    $response = $controller->home();
    
    return $response;
} elseif ($uri === 'services') {
    $controller = new Controller();
    $id = null;
    
    if (isset($_GET['id'])) $id = $_GET['id'];
    
    $response = $controller->services($id);
    
    return $response;
} elseif ($uri === 'order') {
    $controller = new Controller();
    
    $response = $controller->order();
    
    return $response;
} elseif ($uri === 'register') {
    $controller = new Controller();
    
    $response = $controller->register();
    
    return $response;
} elseif ($uri === 'login') {
    $controller = new Controller();
    
    $response = $controller->login();
    
    return $response;
} elseif ($uri === 'logout') {
    $controller = new Controller();
    
    $response = $controller->logout();
    
    return $response;
} else {
    echo '404';die;
}