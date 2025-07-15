<?php 
require_once __DIR__ . '/../framework/Database.php';
require_once __DIR__ . '/../framework/Validator.php';
require_once __DIR__ . '/../framework/Router.php';

$db = new Database();

$router = new Router();

$routes = require_once __DIR__ . '/../routes/web.php';

$router->run();