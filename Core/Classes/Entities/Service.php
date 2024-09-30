<?php

namespace VPTec\Agendamentos\Core\Classes\Entities;

class Service {
    private int $ID;
    private string $name;
    private string $description;
    private float $price;
    private string $creationDate;
    private string $updateDate;
    private int $wc_product_id;

    function __construct() {}

    public function InitializeExistingService(int $ID, int $wc_product_id, string $name, string $description, float $price, string $creationDate, string $updateDate): Service {
        $this->ID = $ID;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->creationDate = $creationDate;
        $this->updateDate = $updateDate;
        $this->wc_product_id = $wc_product_id;
        return $this;
    }

    public function InitializeService(string $name, int $wc_product_id, string $description, float $price): Service {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->creationDate = date('Y-m-d H:i:s');
        $this->updateDate = date('Y-m-d H:i:s');
        $this->wc_product_id = $wc_product_id;
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

    public function getWcProductId(): int {
        return $this->wc_product_id;
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

    public function setWcProductId(int $wc_product_id): void {
        $this->wc_product_id = $wc_product_id;
    }

}