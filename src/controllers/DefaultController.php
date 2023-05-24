<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/ExcersiseGroupsRepository.php';
require_once __DIR__.'/../repository/ExcersisesRepository.php';

class DefaultController extends AppController {
    public function login() {
        $this->render('login');
    }

    public function register() {
        $this->render('register');
    }

    public function dashboard() {
        $user = unserialize($_SESSION['user']);

        if(!$user) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        } else {
            $user_id = $user->getId();
            $excersiseGroupsRepository = new ExcersiseGroupsRepository();
            $excersisesRepository = new ExcersisesRepository();
            $excersiseGroups = $excersiseGroupsRepository->getExcersiseGroups($user_id);
            $latestExcersises = [];

            if(!$excersiseGroups) {
                $this->render('dashboard');
            } else {
                foreach($excersiseGroups as $excersiseGroup) {
                    $latestExcersises[] = $excersisesRepository->getLatestExcersises($excersiseGroup->getId());
                }
    
                $this->render('dashboard', ['excersiseGroups' => $excersiseGroups, 'latestExcersises' => $latestExcersises]);
            }
        }
    }

    public function logout() {
        session_unset();
        session_destroy();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }

    public function newgroup() {
        $user = unserialize($_SESSION['user']);

        if(!$user) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        } else {
            $this->render('new-group');
        }
    }
}