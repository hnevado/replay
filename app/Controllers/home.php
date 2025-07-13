<?php 
$posts = $db->query('SELECT * FROM posts ORDER BY id DESC LIMIT 3');
require_once __DIR__ . '/../../resources/home.template.php';
