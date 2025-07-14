<?php 
$title = 'Artículos';

$postId = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

if ($postId) {
    $postId = (int)explode('=', $postId)[1];
    $post = $db->query('SELECT * FROM posts WHERE id = ?', [$postId])->firstOrFail();
} else {
    $posts = $db->query('SELECT * FROM posts ORDER BY id DESC')->get();
}

require_once __DIR__ . '/../../resources/post.template.php';
