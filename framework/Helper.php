<?php
namespace Framework;
use Framework\Csrf;

class Helper {
    public static function csrf_token() {
        return Csrf::token();
    }
}
