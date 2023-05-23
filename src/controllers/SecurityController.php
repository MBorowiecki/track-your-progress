<?php

require_once 'AppSingleton.php';
require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {
    public function login() {
        $userRepository = new UserRepository();

        if(!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($_POST['email']);

        if(!$user || $email !== $user->getEmail() || password_verify($password, $user->getPassword()) === false) {
            return $this->render('login', ['messages' => ['Credentials provided are incorrect!']]);
        }

        $app = AppSingleton::getInstance();

        $app->user = $user;

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");
    }

    public function register() {
        $userRepository = new UserRepository();

        if(!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);

        if($user) {
            return $this->render('register', ['messages' => ['User with this email already exists!']]);
        }

        $user = new User($email, $password, $username);

        $generatedUser = $userRepository->addUser($user);

        if(!$generatedUser) {
            return $this->render('register', ['messages' => ['Something went wrong! Try again later!']]);
        }

        $app = AppSingleton::getInstance();
        $app->user = $generatedUser;

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");
    }
}