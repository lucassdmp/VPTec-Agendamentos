<?php

namespace VPTec\Agendamentos\Core\Classes\Base;

use VPTec\Agendamentos\Core\Classes\Entities\Employee;
use VPTec\Agendamentos\Core\Utils\Enum\EmployeeType;
use VPTec\Agendamentos\Core\Utils\Enum\TablesName;

require_once __DIR__ . '/../Entities/Employee.php';
require_once __DIR__ . '/../../Utils/Enum.php';

class EmployeeDAO {

    private $table_name;

    function __construct(){
        global $wpdb;
        $this->table_name = $wpdb->prefix . TablesName::EMPLOYEE_TABLE;
    }

    public function Create(Employee $employee): int {
        global $wpdb;
        $confirmation = $wpdb->insert($this->table_name, 
            array(
                'user_id' => $employee->getUserID(),
                'type' => $employee->getType()->value,
                'name' => $employee->getName(),
                'email' => $employee->getEmail(),
                'phone' => $employee->getPhone(),
                'creation_date' => $employee->getCreationDate(),
                'update_date' => $employee->getUpdateDate()
            ));
        return $confirmation ? true : false;
    }

    function Read(int $employee_id): Employee|null {
        global $wpdb;
        $result = $wpdb->get_row("SELECT * FROM $this->table_name WHERE employee_id = $employee_id");
        if($result){
            $employee = new Employee();
            return $employee->InitializeExistingEmployee(
                $result->employee_id,
                $result->user_id,
                EmployeeType::from($result->type),
                $result->name,
                $result->email,
                $result->phone,
                $result->creation_date,
                $result->update_date
            );
        }
        return null;
    }

    function ReadAll(): array {
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM $this->table_name");
        $employees = array();
        foreach($results as $result){
            $employee = new Employee();
            array_push($employees, $employee->InitializeExistingEmployee(
                $result->employee_id,
                $result->user_id,
                EmployeeType::from($result->type),
                $result->name,
                $result->email,
                $result->phone,
                $result->creation_date,
                $result->update_date
            ));
        }
        return $employees;
    }

    function Update(Employee $employee): bool {
        global $wpdb;
        $confirmation = $wpdb->update($this->table_name, 
            array(
                'user_id' => $employee->getUserID(),
                'type' => $employee->getType()->value,
                'name' => $employee->getName(),
                'email' => $employee->getEmail(),
                'phone' => $employee->getPhone(),
                'creation_date' => $employee->getCreationDate(),
                'update_date' => $employee->getUpdateDate()
            ),
            array('employee_id' => $employee->getID())
        );
        return $confirmation ? true : false;
    }

    function Delete(int $employee_id): bool {
        global $wpdb;
        $confirmation = $wpdb->delete($this->table_name, array('employee_id' => $employee_id));
        return $confirmation ? true : false;
    }
}