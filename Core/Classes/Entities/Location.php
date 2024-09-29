<?php

namespace VPTec\Agendamentos\Core\Classes\Entities;

use Vptec\Agendamentos\Core\Utils\LocationType;

class Location {
    private int $ID;
    private LocationType $locationType;
    private string $name;
    private string $addressline1;
    private string $addressline2;
    private string $city;
    private string $state;
    private string $zipCode;
    private string $creationDate;
    private string $updateDate;

    public function __construct() {}

    public function InitializeLocation(string $name, string $addressline1, string $addressline2, string $city, string $state, string $zipCode, LocationType $locationType): Location {
        $this->name = $name;
        $this->addressline1 = $addressline1;
        $this->addressline2 = $addressline2;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->locationType = $locationType;
        $this->creationDate = current_time('mysql');
        $this->updateDate = current_time('mysql');
        return $this;
    }

    public function InitializeExistingLocation(int $ID, LocationType $locationType, string $name, string $addressline1, string $addressline2, string $city, string $state, string $zipCode, string $creationDate, string $updateDate): Location {
        $this->ID = $ID;
        $this->locationType = $locationType;
        $this->name = $name;
        $this->addressline1 = $addressline1;
        $this->addressline2 = $addressline2;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->creationDate = $creationDate;
        $this->updateDate = $updateDate;
        return $this;
    }

    public function getID(): int {
        return $this->ID;
    }

    public function getLocationType(): LocationType {
        return $this->locationType;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getAddressLine1(): string {
        return $this->addressline1;
    }

    public function getAddressLine2(): string {
        return $this->addressline2;
    }

    public function getCity(): string {
        return $this->city;
    }

    public function getState(): string {
        return $this->state;
    }

    public function getZipCode(): string {
        return $this->zipCode;
    }

    public function getCreationDate(): string {
        return $this->creationDate;
    }

    public function getUpdateDate(): string {
        return $this->updateDate;
    }

    public function setID(int $ID): void {
        $this->ID = $ID;
    }

    public function setLocationType(LocationType $locationType): void {
        $this->locationType = $locationType;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setAddressLine1(string $addressline1): void {
        $this->addressline1 = $addressline1;
    }

    public function setAddressLine2(string $addressline2): void {
        $this->addressline2 = $addressline2;
    }

    public function setCity(string $city): void {
        $this->city = $city;
    }

    public function setState(string $state): void {
        $this->state = $state;
    }

    public function setZipCode(string $zipCode): void {
        $this->zipCode = $zipCode;
    }

    public function setCreationDate(string $creationDate): void {
        $this->creationDate = $creationDate;
    }

    public function setUpdateDate(string $updateDate): void {
        $this->updateDate = $updateDate;
    }

    

}