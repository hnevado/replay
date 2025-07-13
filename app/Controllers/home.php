<?php 
$dsn = 'mysql:host=localhost;dbname=web-php;charset=utf8mb4';
$pdo = new PDO($dsn, 'root', '');

$posts = $pdo->query('SELECT * FROM posts ORDER BY id DESC LIMIT 3')->fetchAll(PDO::FETCH_ASSOC);
require_once __DIR__ . '/../../resources/home.template.php';
