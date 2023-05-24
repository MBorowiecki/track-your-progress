<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/ExcersiseGroup.php';
require_once __DIR__.'/../models/Excersise.php';

class ExcersisesRepository extends Repository {
    public function getExcersises(int $groupId): ?array {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.excersises WHERE group_id = :group_id ORDER BY date DESC
        ');
        $stmt->bindParam(':group_id', $groupId, PDO::PARAM_STR);
        $stmt->execute();

        $excersisesResponse = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($excersisesResponse == false) {
            return null;
        }

        $foundExcersises = [];

        foreach($excersisesResponse as $excersise) {
            $foundExcersises[] = new Excersise(
                $excersise['group_id'],
                $excersise['name'],
                $excersise['date'],
                $excersise['reps'],
                $excersise['sets'],
                $excersise['weight'],
                $excersise['id']
            );
        }

        return $foundExcersises;
    }

    public function getLatestExcersises(int $groupId): ?array {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.excersises WHERE group_id = :group_id ORDER BY date DESC LIMIT 5
        ');
        $stmt->bindParam(':group_id', $groupId, PDO::PARAM_STR);
        $stmt->execute();

        $excersisesResponse = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($excersisesResponse == false) {
            return null;
        }

        $foundExcersises = [];

        foreach($excersisesResponse as $excersise) {
            $foundExcersises[] = new Excersise(
                $excersise['group_id'],
                $excersise['name'],
                $excersise['date'],
                $excersise['reps'],
                $excersise['sets'],
                $excersise['weight'],
                $excersise['id']
            );
        }

        return $foundExcersises;
    }

    public function addExcersise(Excersise $excersise) {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.excersises (group_id, name, date, reps, sets, weight)
            VALUES (?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $excersise->getGroupId(),
            $excersise->getName(),
            $excersise->getDate(),
            $excersise->getReps(),
            $excersise->getSets(),
            $excersise->getWeight()
        ]);
    }

    public function deleteExcersise(int $id) {
        $stmt = $this->database->connect()->prepare('
            DELETE FROM public.excersises WHERE id = :id
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
}