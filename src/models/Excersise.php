<?php 

class Excersise {
    private ?int $id;
    private $group_id;
    private $name;
    private $date;
    private $reps;
    private $sets;
    private $weight;

    # constructor
    public function __construct(int $group_id, string $name, string $date, int $reps, int $sets, int $weight, ?int $id = null) {
        $this->group_id = $group_id;
        $this->name = $name;
        $this->date = $date;
        $this->reps = $reps;
        $this->sets = $sets;
        $this->weight = $weight;
        $this->id = $id;
    }

    # getters
    public function getGroupId(): int {
        return $this->group_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDate(): string {
        return $this->date;
    }

    public function getReps(): int {
        return $this->reps;
    }

    public function getSets(): int {
        return $this->sets;
    }

    public function getWeight(): int {
        return $this->weight;
    }

    public function getId(): ?int {
        return $this->id;
    }

    # setters
    public function setGroupId(int $group_id) {
        $this->group_id = $group_id;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setDate(string $date) {
        $this->date = $date;
    }

    public function setReps(int $reps) {
        $this->reps = $reps;
    }

    public function setSets(int $sets) {
        $this->sets = $sets;
    }

    public function setWeight(int $weight) {
        $this->weight = $weight;
    }

    public function setId(int $id) {
        $this->id = $id;
    }
}