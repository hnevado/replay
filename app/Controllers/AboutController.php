<?php 
namespace App\Controllers;
use Framework\Helper;

class AboutController {
    public function index() {
        
        Helper::view('about', [
            'title' => 'Sobre Replay'
        ]);
        
    }
}

