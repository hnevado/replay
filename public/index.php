<?php
session_start();

// Activar modo admin si se accede con ?admin=CLAVESECRETA y la IP es permitida
// Esta contraseña y ruta es solo para propósitos de desarrollo y docentes, no debe usarse en producción.
// En producción, se recomienda usar un sistema de autenticación más robusto
// Esta clave debería guardarse en un archivo .env fuera del repositorio

$ip_permitida = ['127.0.0.1', '::1'];
if (isset($_GET['admin']) && $_GET['admin'] === 'CLAVESECRETA' && in_array($_SERVER['REMOTE_ADDR'], $ip_permitida)) {
    $_SESSION['is_admin'] = true;
}
require_once __DIR__ . '/../framework/Database.php';
require_once __DIR__ . '/../framework/Validator.php';
require_once __DIR__ . '/../framework/Router.php';
require_once __DIR__ . '/../framework/helpers.php';

$db = new Database();

$router = new Router();

$router->run();