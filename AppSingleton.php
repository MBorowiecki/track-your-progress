<?php

class AppSingleton {
    protected static $instance;
    public $user;

    final private function __construct() {
        $user = unserialize($_SESSION['user']);
    }

    final private function __clone() {}

    public static function getInstance() {
        if (! self::$instance) {
            self::$instance = new static;
        }
        return self::$instance;
    }

    public function __destruct() {
        $_SESSION["user"] = serialize($this->user);
    }
}