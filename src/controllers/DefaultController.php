<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function login() {
        $user = unserialize($_SESSION['user']);

        if($user) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dashboard");
        } else {
            $this->render('login');
        }
    }

    public function register() {
        $user = unserialize($_SESSION['user']);

        if($user) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dashboard");
        } else {
            $this->render('register');
        }
    }

    public function dashboard() {
        $user = unserialize($_SESSION['user']);

        if(!$user) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        } else {
            $this->render('dashboard');
        }
    }

    public function logout() {
        session_unset();
        session_destroy();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }
}