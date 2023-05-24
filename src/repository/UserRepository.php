<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository {
    public function getUser(string $email): ?User {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        $foundUser = new User(
            $user['email'],
            $user['password'],
            $user['username'],
            $user['id']
        );

        return $foundUser;
    }

    public function addUser(User $user) {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users (email, password, username)
            VALUES (?, ?, ?)
        ');

        $hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        
        $stmt->execute([
            $user->getEmail(),
            $hashedPassword,
            $user->getUsername()
        ]);

        return new User(
            $user->getEmail(),
            $hashedPassword,
            $user->getUsername()
        );
    }
}