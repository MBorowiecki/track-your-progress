<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/ExcersiseGroup.php';

class ExcersiseGroupsRepository extends Repository {
    public function getExcersiseGroup(int $id): ?ExcersiseGroup {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.excersise_groups WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $excersiseGroup = $stmt->fetch(PDO::FETCH_ASSOC);

        if($excersiseGroup == false) {
            return null;
        }

        return new ExcersiseGroup(
            $excersiseGroup['owner_id'],
            $excersiseGroup['name'],
            $excersiseGroup['id']
        );
    }

    public function getExcersiseGroups(string $ownerId): ?array {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.excersise_groups WHERE owner_id = :owner_id
        ');
        $stmt->bindParam(':owner_id', $ownerId, PDO::PARAM_STR);
        $stmt->execute();

        $excersiseGroupsResponse = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($excersiseGroupsResponse == false) {
            return null;
        }

        $foundExcersiseGroups = [];

        foreach($excersiseGroupsResponse as $excersiseGroup) {
            $foundExcersiseGroups[] = new ExcersiseGroup(
                $excersiseGroup['owner_id'],
                $excersiseGroup['name'],
                $excersiseGroup['id']
            );
        }

        return $foundExcersiseGroups;
    }

    public function addExcersiseGroup(ExcersiseGroup $excersiseGroup) {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.excersise_groups (owner_id, name)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $excersiseGroup->getOwnerId(),
            $excersiseGroup->getName()
        ]);

        return new ExcersiseGroup(
            $excersiseGroup->getOwnerId(),
            $excersiseGroup->getName()
        );
    }

    public function deleteExcersiseGroup(int $id) {
        $stmt = $this->database->connect()->prepare('
            DELETE FROM public.excersise_groups WHERE id = :id
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
}