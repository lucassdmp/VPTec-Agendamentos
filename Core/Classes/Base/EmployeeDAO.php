<?php

namespace VPTec\Agendamentos\Core\Classes\Base;

use VPTec\Agendamentos\Core\Utils\EmployeeType;
use VPTec\Agendamentos\Core\Utils\TablesName;
use VPTec\Agendamentos\Core\Classes\Entities\Employee;

class EmployeeDAO {

    private $table_name;

    function __construct(){
        global $wpdb;
        $this->table_name = $wpdb->prefix . TablesName::EMPLOYEES_TABLE;
    }

    public function Create(int $user_id, EmployeeType $type, string $name, string $email, string $phone): bool{
        global $wpdb;
        $insert_id = $wpdb->insert(
            $this->table_name,
            array(
                'user_id' => $user_id,
                'employee_type' => $type,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'creation_date' => current_time('mysql'),
                'update_date' => current_time('mysql')
            )
        );

        return $insert_id ? true : false;
    }

    public function Read($employee_id): Employee|null{
        global $wpdb;
        $result = $wpdb->get_row("SELECT * FROM $this->table_name WHERE employee_id = $employee_id");
        if($result){
            return new Employee(
                $result->employee_id,
                $result->user_id,
                $result->employee_type,
                $result->name,
                $result->email,
                $result->phone,
                $result->creation_date,
                $result->update_date
            );
        }
        return null;    
    }

    public function ReadAll(): array{
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM $this->table_name");
        $employees = array();
        foreach ($results as $result) {
            array_push($employees, new Employee(
                $result->employee_id,
                $result->user_id,
                $result->employee_type,
                $result->name,
                $result->email,
                $result->phone,
                $result->creation_date,
                $result->update_date
            ));
        }
        return $employees;
    }

    public function Update($employee): bool{
        global $wpdb;
        $updated = $wpdb->update(
            $this->table_name,
            array(
                'user_id' => $employee->getUserID(),
                'employee_type' => $employee->getType(),
                'name' => $employee->getName(),
                'email' => $employee->getEmail(),
                'phone' => $employee->getPhone(),
                'update_date' => current_time('mysql')
            ),
            array('employee_id' => $employee->getID())
        );

        return $updated ? true : false;
    }

    public function Delete($employee_id): bool{
        global $wpdb;
        $deleted = $wpdb->delete(
            $this->table_name,
            array('employee_id' => $employee_id)
        );

        return $deleted ? true : false;
    }
}