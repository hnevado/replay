<?php 
namespace App\Controllers;
class AboutController {
    public function index() {
        $title = 'Sobre Replay';
        require_once __DIR__ . '/../../resources/about.template.php';
    }
}

