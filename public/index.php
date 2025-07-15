<?php 
require_once __DIR__ . '/../framework/Database.php';
require_once __DIR__ . '/../framework/Validator.php';

$db = new Database();

$routes = require_once __DIR__ . '/../routes/web.php';

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //PHP_URL_QUERY

$route = $routes[$requestUri] ?? null;

if ($route) {
    require_once __DIR__ . '/../' . $route;
} else {
    http_response_code(404);
    echo '404 Not Found';
}