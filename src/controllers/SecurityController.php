<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController {
    public function login() {
        $exampleUser = new User(
            'example@example.com',
            'example',
            'example'
        );

        // $user = new User(
        //     $_POST['email'],
        //     $_POST['password'],
        //     $_POST['username']
        // );

        $email = $_POST['email'];
        $password = $_POST['password'];

        if($email !== $exampleUser->getEmail() || $password !== $exampleUser->getPassword()) {
            return $this->render('login', ['messages' => ['Credentials provided are incorrect!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");
    }
}