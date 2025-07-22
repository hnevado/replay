<?php
namespace Framework\Middleware;

class Authenticated {

    public function __invoke() {
        if (!isset($_SESSION['is_admin'])) {
            http_response_code(403);
            exit('Access denied. Please log in.');
        }
    }
}