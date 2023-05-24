<?php

require 'Routing.php';

session_start();

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('login', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('logout', 'DefaultController');
Routing::get('dashboard', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');

Routing::run($path);