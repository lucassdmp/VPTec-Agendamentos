<?php

namespace VPTec\Agendamentos\Core\Classes\Entities;

use VPTec\Agendamentos\Core\Utils\Enum\EmployeeType;

require_once __FILE__ . '/../../Utils/Enum.php';

class Employee {
    private int $ID;
    private int $user_id;
    private EmployeeType $type;
    private string $name;
    private string $email;
    private string $phone;
    private string $creation_date;
    private string $update_date;

    function __construct(){}

    public function InitializeEmployee(int $user_id, EmployeeType $type, string $name, string $email, string $phone): Employee{
        $this->user_id = $user_id;
        $this->type = $type;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->creation_date = date('Y-m-d H:i:s');
        $this->update_date = date('Y-m-d H:i:s');
        return $this;
    }

    public function InitializeExistingEmployee(int $ID, int $user_id, EmployeeType $type, string $name, string $email, string $phone, string $creation_date, string $update_date): Employee {
        $this->ID = $ID;
        $this->user_id = $user_id;
        $this->type = $type;
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

    public function getType(){
        return $this->type;
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

    public function setID($ID){
        $this->ID = $ID;
    }

    public function setUserID($user_id){
        $this->user_id = $user_id;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPhone($phone){
        $this->phone = $phone;
    }

    public function setCreationDate($creation_date){
        $this->creation_date = $creation_date;
    }

    public function setUpdateDate($update_date){
        $this->update_date = $update_date;
    }
}