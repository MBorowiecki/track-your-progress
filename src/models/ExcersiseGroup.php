<?php

class ExcersiseGroup {
    private ?int $id;
    private $owner_id;
    private $name;

    public function __construct(int $owner_id, string $name, ?int $id = null) {
        $this->owner_id = $owner_id;
        $this->name = $name;
        $this->id = $id;
    }

    public function getOwnerId(): int {
        return $this->owner_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setOwnerId(int $owner_id) {
        $this->owner_id = $owner_id;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }
}