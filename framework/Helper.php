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

    public static function request_uri($uri): bool {

        if ($_SERVER['REQUEST_URI'] === $uri) {
            return true;
        }

        return false;
    }

    public static function config(string $key, $default = null) {
        static $config = null;

        if ($config === null) {
            //Solo cargo el fichero la primera vez que se llama a config
            $config = require self::root_path('config/app.php');
        }
        
        return $config[$key] ?? $default;
    }
}
