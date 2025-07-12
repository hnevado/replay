<?php 
$routes = require_once __DIR__ . '/../routes/web.php';

$requestUri = $_SERVER['REQUEST_URI'];

$route = $routes[$requestUri] ?? null;

if ($route) {
    require_once __DIR__ . '/../' . $route;
} else {
    http_response_code(404);
    echo '404 Not Found';
}