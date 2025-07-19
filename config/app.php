<?php

return [
    'host' => 'localhost',
    'dbname' => 'web-php',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',
    'options' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ],
    'app_name' => 'REPLAY',
    'app_description' => 'Un sitio web dedicado a los videojuegos retro.',
    'app_version' => '1.0.0',
    'app_author' => 'Hector Nevado',
    'app_url' => 'http://localhost/replay',
    'csrf_token' => true,
];