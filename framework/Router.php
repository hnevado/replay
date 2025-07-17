<?php
class Router {


    protected $routes = [];

    public function __construct() {
        $this->loadRoutes('web');
    }

    public function run() {
    

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //PHP_URL_QUERY

        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'POST' && isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
        }

        $action = $this->routes[$method][$uri] ?? null; //La acción se compone de controlador y método

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

    public function delete(string $uri, array $action) {
        $this->routes['DELETE'][$uri] = $action;
    }

    public function loadRoutes(string $file) {

        $router = $this;

        $filePath = __DIR__ . '/../routes/' . $file . '.php';

        if (!file_exists($filePath)) {
            throw new Exception("Routes file not found: " . $filePath);
        }

        require_once $filePath;
    }
}