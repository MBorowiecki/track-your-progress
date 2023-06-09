<?php

require 'Routing.php';

session_start();

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('login', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('logout', 'DefaultController');
Routing::get('dashboard', 'DefaultController');
Routing::get('new-group', 'DefaultController');
Routing::get('delete-group', 'ExcersiseGroupsController');
Routing::get('excersise', 'ExcersiseGroupsController');
Routing::get('new-excersise', 'ExcersiseGroupsController');
Routing::get('delete-excersise', 'ExcersiseGroupsController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('create-group', 'ExcersiseGroupsController');
Routing::post('add-excersise', 'ExcersiseGroupsController');

Routing::run($path);