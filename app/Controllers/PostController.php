<?php 
namespace App\Controllers;
use Framework\Database;
use Framework\Helper;
class PostController {
    
    public function show($postId) {
        
        $db = new Database();
        
        $postId = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

        $postId = (int)explode('=', $postId)[1];
        $post = $db->query('SELECT * FROM posts WHERE id = ?', [$postId])->firstOrFail();
     
        $title = $post->title;
        
        //require_once __DIR__ . '/../../resources/post.template.php';

        Helper::view('post', [
            'post' => $post,
            'title' => $title
        ]);
    }
}