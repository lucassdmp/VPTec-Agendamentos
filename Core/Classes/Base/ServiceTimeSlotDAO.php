<?php

namespace VPTec\Agendamentos\Core\Classes\Base;

use VPTec\Agendamentos\Core\Classes\Entities\ServiceTimeSlot;
use VPTec\Agendamentos\Core\Utils\Enum\TablesName;

require_once plugin_dir_path( __FILE__ ) . '/../Utils/Enum.php';
require_once plugin_dir_path( __FILE__ ) . '/../Entities/ServiceTimeSlot.php';

class ServiceTimeSlotDAO{
    private string $tableName;

    public function __construct(){
        global $wpdb;
        $this->tableName = $wpdb->prefix . TablesName::SERVICE_TIME_SLOTS_TABLE->value;
    }

    public function Insert(ServiceTimeSlot $serviceTimeSlot): bool{
        global $wpdb;
        $confirmation = $wpdb->insert(
            $this->tableName,
            array(
                'employee_id' => $serviceTimeSlot->getEmployeeID(),
                'service_id' => $serviceTimeSlot->getServiceID(),
                'start_time' => $serviceTimeSlot->getStartTime(),
                'end_time' => $serviceTimeSlot->getEndTime(),
                'creation_date' => $serviceTimeSlot->getCreationDate(),
                'update_date' => $serviceTimeSlot->getUpdateDate()
            )
        );
        return $confirmation ? true : false;
    }

    public function GetById(int $serviceTimeSlotID): ServiceTimeSlot|null{
        global $wpdb;
        $result = $wpdb->get_row("SELECT * FROM $this->tableName WHERE service_time_slot_id = $serviceTimeSlotID");
        if($result){
            $serviceTimeSlot = new ServiceTimeSlot();
            return $serviceTimeSlot->InitializeExistingServiceTimeSlot(
                $result->service_time_slot_id,
                $result->employee_id,
                $result->service_id,
                $result->start_time,
                $result->end_time,
                $result->creation_date,
                $result->update_date
            );
        }
        return null;
    }

    public function GetAllServiceTimeSlot(): array{
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM $this->tableName");
        $serviceTimeSlots = array();
        foreach ($results as $result) {
            $serviceTimeSlot = new ServiceTimeSlot();
            $serviceTimeSlot->InitializeExistingServiceTimeSlot(
                $result->service_time_slot_id,
                $result->employee_id,
                $result->service_id,
                $result->start_time,
                $result->end_time,
                $result->creation_date,
                $result->update_date
            );
            array_push($serviceTimeSlots, $serviceTimeSlot);
        }
        return $serviceTimeSlots;
    }

    public function ReadAllByEmployeeID(int $employeeID): array{
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM $this->tableName WHERE employee_id = $employeeID");
        $serviceTimeSlots = array();
        foreach ($results as $result) {
            $serviceTimeSlot = new ServiceTimeSlot();
            $serviceTimeSlot->InitializeExistingServiceTimeSlot(
                $result->service_time_slot_id,
                $result->employee_id,
                $result->service_id,
                $result->start_time,
                $result->end_time,
                $result->creation_date,
                $result->update_date
            );
            array_push($serviceTimeSlots, $serviceTimeSlot);
        }
        return $serviceTimeSlots;
    }

    public function Update(ServiceTimeSlot $serviceTimeSlot): bool{
        global $wpdb;
        $confirmation = $wpdb->update(
            $this->tableName,
            array(
                'employee_id' => $serviceTimeSlot->getEmployeeID(),
                'service_id' => $serviceTimeSlot->getServiceID(),
                'start_time' => $serviceTimeSlot->getStartTime(),
                'end_time' => $serviceTimeSlot->getEndTime(),
                'update_date' => $serviceTimeSlot->getUpdateDate()
            ),
            array('service_time_slot_id' => $serviceTimeSlot->getID())
        );
        return $confirmation ? true : false;
    }

    public function Delete(int $serviceTimeSlotID): bool{
        global $wpdb;
        $confirmation = $wpdb->delete(
            $this->tableName,
            array('service_time_slot_id' => $serviceTimeSlotID)
        );
        return $confirmation ? true : false;
    }
}