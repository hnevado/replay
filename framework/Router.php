<?php
namespace Framework;
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

        $action = $this->routes[$method][$uri]['action'] ?? null; //La acción se compone de controlador y método

        if (!$action) {
            http_response_code(404);
            exit ('Route not found'. $method. ' ' .$uri);
        }
        
        $middleware = $this->routes[$method][$uri]['middleware'] ?? null;

        if ($middleware) {
            $middlewareInstance = new $middleware();
            $middlewareInstance->__invoke();
        }

        [$controller, $method] = $action;

        (new $controller())->$method();

    }

    public function get(string $uri, array $action, string|null $middleware = null) {
        $this->routes['GET'][$uri] = [
            'action' => $action, 
            'middleware' => $middleware
        ];
    }

    public function post(string $uri, array $action, string|null $middleware = null) {
        $this->routes['POST'][$uri] = [
            'action' => $action, 
            'middleware' => $middleware
        ];
    }

    public function delete(string $uri, array $action, string|null $middleware = null) {
        $this->routes['DELETE'][$uri] = [
            'action' => $action, 
            'middleware' => $middleware
        ];
    }

    public function put(string $uri, array $action, string|null $middleware = null) {
        $this->routes['PUT'][$uri] = [
            'action' => $action, 
            'middleware' => $middleware
        ];
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