<?php 


class BlogController {
    
    public function index() {
        
        $db = new Database();
        $posts = $db->query('SELECT * FROM posts ORDER BY id DESC')->get();

        $title = 'Artículos recientes';
        
        require_once __DIR__ . '/../../resources/post.template.php';
    }
}