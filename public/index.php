<?php
session_start();
require_once __DIR__ . '/../framework/Database.php';
require_once __DIR__ . '/../framework/Validator.php';
require_once __DIR__ . '/../framework/Router.php';
require_once __DIR__ . '/../framework/helpers.php';

$db = new Database();

$router = new Router();

$router->run();