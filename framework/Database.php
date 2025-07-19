<?php
namespace Framework;
use PDO;
use Framework\Helper;

class Database {
    private $connection;
    private $statement;

    public function __construct() {
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=%s',
            Helper::config('host'),
            Helper::config('dbname'),
            Helper::config('charset')
        );
        //$dsn = 'mysql:host=localhost;dbname=web-php;charset=utf8mb4';
        $this->connection = new PDO($dsn, Helper::config('username'), Helper::config('password'), Helper::config('options'));
    }

    public function query($sql, $params = []) {

        $this->statement = $this->connection->prepare($sql);
        $this->statement->execute($params);

        return $this;
    }

    public function firstOrFail() {
        $result = $this->statement->fetch();
        if (!$result) {
            http_response_code(404);
            echo '404 Not Found';
            exit;
        }
        return $result;
    }

    public function get() {
        return $this->statement->fetchAll();
    }
}