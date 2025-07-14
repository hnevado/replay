<?php 
$title = 'Links';

$links = $db->query('SELECT * FROM links ORDER BY id DESC')->get();

//print_r($links);
require_once __DIR__ . '/../../resources/links.template.php';
