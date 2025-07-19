<?php 
namespace App\Controllers;
use Framework\Database;
use Framework\Helper;
class BlogController {
    
    public function index() {
        
        $db = new Database();
        $posts = $db->query('SELECT * FROM posts ORDER BY id DESC')->get();

        $title = 'Artículos recientes';
        Helper::view('post', [
            'posts' => $posts,
            'title' => $title
        ]);
        //require_once __DIR__ . '/../../resources/post.template.php';
    }
}