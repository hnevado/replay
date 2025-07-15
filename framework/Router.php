<?php
class Router {


    protected $routes = [];

    public function run() {
    
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //PHP_URL_QUERY

        $method = $_SERVER['REQUEST_METHOD'];

        $action = $this->routes[$method][$uri] ?? null;

        if (!$action) {
            http_response_code(404);
            exit ('Route not found'. $method. ' ' .$uri);
        }
        
        [$controller, $method] = $action;

        (new $controller())->$method();

    }

    public function get(string $uri, array $action) {
        $this->routes['GET'][$uri] = $action;
    }

    public function post(string $uri, array $action) {
        $this->routes['POST'][$uri] = $action;
    }
}