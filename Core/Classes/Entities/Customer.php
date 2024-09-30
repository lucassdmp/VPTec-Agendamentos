<?php

namespace VPTec\Agendamentos\Core\Classes\Entities;

use VPTec\Agendamentos\Core\Utils\Enum;

class Customer {
    private int $ID;
    private int $user_id;
    private string $name;
    private string $email;
    private string $phone;
    private string $creation_date;
    private string $update_date;

    public function __construct(){}

    public function InitializeNewCustomer(int $user_id, string $name, string $email, string $phone): Customer
    {
        $this->user_id = $user_id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->creation_date = current_time('mysql');
        $this->update_date = current_time('mysql');
        return $this;
    }

    public function InitializeExistingCustomer(int $ID, int $user_id, string $name, string $email, string $phone, string $creation_date, string $update_date): Customer
    {
        $this->ID = $ID;
        $this->user_id = $user_id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->creation_date = $creation_date;
        $this->update_date = $update_date;
        return $this;
    }

    public function getID(){
        return $this->ID;
    }

    public function getUserID(){
        return $this->user_id;
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getCreationDate(){
        return $this->creation_date;
    }

    public function getUpdateDate(){
        return $this->update_date;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function setPhone(string $phone){
        $this->phone = $phone;
    }

    public function setUpdateDate(string $update_date){
        $this->update_date = $update_date;
    }

    public function setID(int $ID){
        $this->ID = $ID;
    }

    public function setUserID(int $user_id){
        $this->user_id = $user_id;
    }
}