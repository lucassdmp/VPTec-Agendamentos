<?php

namespace VPTec\Agendamentos\Core\Classes\Entities;

class Service {
    private int $ID;
    private string $name;
    private string $description;
    private float $price;
    private string $creationDate;
    private string $updateDate;

    function __construct() {}

    public function InitializeExistingService(int $ID, string $name, string $description, float $price, string $creationDate, string $updateDate): Service {
        $this->ID = $ID;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->creationDate = $creationDate;
        $this->updateDate = $updateDate;
        return $this;
    }

    public function InitializeService(string $name, string $description, float $price): Service {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->creationDate = date('Y-m-d H:i:s');
        $this->updateDate = date('Y-m-d H:i:s');
        return $this;
    }

    public function getID(): int {
        return $this->ID;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getCreationDate(): string {
        return $this->creationDate;
    }

    public function getUpdateDate(): string {
        return $this->updateDate;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function setCreationDate(string $creationDate): void {
        $this->creationDate = $creationDate;
    }

    public function setUpdateDate(string $updateDate): void {
        $this->updateDate = $updateDate;
    }

}