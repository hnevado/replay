<?php 
$title = 'Links';

$links = $db->query('SELECT * FROM links ORDER BY id DESC');

//print_r($links);
require_once __DIR__ . '/../../resources/links.template.php';
