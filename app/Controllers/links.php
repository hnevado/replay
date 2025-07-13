<?php 
$title = 'Links';
$dsn = 'mysql:host=localhost;dbname=web-php;charset=utf8mb4';
$pdo = new PDO($dsn, 'root', '');

$links = $pdo->query('SELECT * FROM links ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);

//print_r($links);
require_once __DIR__ . '/../../resources/links.template.php';
