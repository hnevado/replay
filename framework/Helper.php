<?php
namespace Framework;
use Framework\Csrf;

class Helper {
    
    public static function csrf_token() {
        return Csrf::token();
    }
    
    public static function view($view, $data = []) {
        extract($data);
        require Helper::root_path('resources/' . $view . '.template.php');
    }

    public static function root_path(string $path = ''): string {
        return dirname(__DIR__) . '/'. $path;
    }
}
