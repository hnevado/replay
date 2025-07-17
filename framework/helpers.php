<?php
require_once __DIR__ . '/Csrf.php';

function csrf_token() {
    return Csrf::token();
}
