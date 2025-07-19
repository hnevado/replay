<?php

return [
    'host' => $_ENV['DB_HOST'] ?? 'localhost',
    'dbname' => $_ENV['DB_NAME'] ?? 'my_database',
    'username' => $_ENV['DB_USER'] ?? 'root',
    'password' => $_ENV['DB_PASS'] ?? '',
    'charset' => $_ENV['DB_CHARSET'] ?? 'utf8mb4',
    'options' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ],
    'app_name' => $_ENV['APP_NAME'] ?? 'REPLAY',
    'app_description' => $_ENV['APP_DESCRIPTION'] ?? '',
    'app_version' => $_ENV['APP_VERSION'] ?? '',
    'app_author' => $_ENV['APP_AUTHOR'] ?? '',
    'app_url' => $_ENV['APP_URL'] ?? '',
    'csrf_token' => $_ENV['CSRF_TOKEN'] ?? true,
];