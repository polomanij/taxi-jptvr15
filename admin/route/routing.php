<?php

$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/');
$uri = explode('/', $host)[$num];

if ($uri === '' || $uri === 'index.php') {
    $controller = new Controller();
    
    $response = $controller->adminHome();
    
    return $response;
} if ($uri === 'logout') {
    $controller = new Controller();
    
    $response = $controller->logout();
} if ($uri === 'services') {
    $controller = new Controller;
    
    $response = $controller->services();
    
    return $response;
} if ($uri === 'service-create') {
    $controller = new Controller;

    $response = $controller->serviceCreate();
    
    return $response;
} if ($uri === 'service-delete') {
    $controller = new Controller;
    $serviceId = $_GET['id'];
    
    $response = $controller->serviceDelete($serviceId);
} else {
    echo '404';die;
}