<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/ExcersiseGroupsRepository.php';
require_once __DIR__.'/../repository/ExcersisesRepository.php';

class ExcersiseGroupsController extends AppController {
    public function creategroup() {
        $user = unserialize($_SESSION['user']);

        if(!$this->isPost()) {
            return $this->render('new-group');
        }

        if(!$user) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        } else {
            $excersiseGroupsRepository = new ExcersiseGroupsRepository();
            $excersiseGroup = new ExcersiseGroup($user->getId(), $_POST['name']);
            $excersiseGroupsRepository->addExcersiseGroup($excersiseGroup);

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dashboard");
        }
    }

    public function deletegroup() {
        $user = unserialize($_SESSION['user']);

        if(!$this->isGet()) {
            return $this->render('dashboard');
        }

        if(!$user) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        } else {
            $excersiseGroupsRepository = new ExcersiseGroupsRepository();
            $excersiseGroupsRepository->deleteExcersiseGroup($_GET['id']);

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dashboard");
        }
    }

    public function excersise() {
        $user = unserialize($_SESSION['user']);

        if(!$this->isGet()) {
            return $this->render('dashboard');
        }

        if(!$user) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        } else {
            $excersiseGroupsRepository = new ExcersiseGroupsRepository();
            $excersisesRepository = new ExcersisesRepository();
            $excersiseGroup = $excersiseGroupsRepository->getExcersiseGroup($_GET['id']);
            $excersises = $excersisesRepository->getExcersises($_GET['id']);

            $this->render('excersise', ['excersiseGroup' => $excersiseGroup, 'excersises' => $excersises]);
        }
    }

    public function newexcersise() {
        $user = unserialize($_SESSION['user']);

        if(!$this->isGet()) {
            return $this->render('excersise?id='.$_GET['id'].'');
        }

        if(!$user) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        } else {
            $this->render('new-excersise');
        }
    }

    public function addexcersise() {
        $user = unserialize($_SESSION['user']);

        if(!$this->isPost()) {
            return $this->render('dashboard');
        }

        if(!$user) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        } else {
            $excersisesRepository = new ExcersisesRepository();
            $excersise = new Excersise($_GET['id'], $_POST['name'], $_POST['date'], $_POST['reps'], $_POST['sets'], $_POST['weight']);
            $excersisesRepository->addExcersise($excersise);

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/excersise?id=".$_GET['id']."");
        }
    }

    public function deleteexcersise() {
        $user = unserialize($_SESSION['user']);

        if(!$this->isGet()) {
            return $this->render('dashboard');
        }

        if(!$user) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        } else {
            $excersisesRepository = new ExcersisesRepository();
            $excersisesRepository->deleteExcersise($_GET['id']);

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/excersise?id=".$_GET['group_id']."");
        }
    }
}