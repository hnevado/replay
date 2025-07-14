<?php 
$posts = $db->query('SELECT * FROM posts ORDER BY id DESC LIMIT 3')->get();
require_once __DIR__ . '/../../resources/home.template.php';
