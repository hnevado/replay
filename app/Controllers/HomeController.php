<?php 
namespace App\Controllers;
use Framework\Database;
use Framework\Helper;

class HomeController {
    public function index() {
        
        $db = new Database();
        $posts = $db->query('SELECT * FROM posts ORDER BY id DESC LIMIT 3')->get();    
        $title = 'Inicio';
       
        //require_once __DIR__ . '/../../resources/home.template.php';

        Helper::view('home', [
            'posts' => $posts,
            'title' => $title
        ]);

    }

}

