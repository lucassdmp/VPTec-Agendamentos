<?php

namespace VPTec\Agendamentos\Core\Classes\Base;

use VPTec\Agendamentos\Core\Classes\Entities\Appointment;
use VPTec\Agendamentos\Core\Utils\Enum\TablesName;

require_once plugin_dir_path( __FILE__ ) . '../Entities/Appointment.php';

class AppointmentDAO{
    private string $table_name;

    public function __construct(){
        global $wpdb;
        $this->table_name = $wpdb->prefix . TablesName::APPOINTMENT_TABLE->value;
    }

    public function Create(Appointment $appointment): bool{
        global $wpdb;
        $confirmation = $wpdb->insert(
            $this->table_name,
            array(
                'status' => $appointment->getStatus()->value,
                'service_time_slot_id' => $appointment->getServiceTimeSlotID(),
                'customer_id' => $appointment->getCustomerID(),
                'location_id' => $appointment->getLocationID(),
                'creation_date' => $appointment->getCreationDate(),
                'update_date' => $appointment->getUpdateDate()
            )
        );
        return $confirmation ? true : false;
    }

    public function Read(int $appointment_id): Appointment|null{
        global $wpdb;
        $result = $wpdb->get_row("SELECT * FROM $this->table_name WHERE appointment_id = $appointment_id");
        if($result){
            $appointment = new Appointment();
            return $appointment->InitializeExistingAppointment(
                $result->appointment_id,
                $result->status,
                $result->service_time_slot_id,
                $result->customer_id,
                $result->location_id,
                $result->creation_date,
                $result->update_date
            );
        }
        return null;
    }

    public function ReadAll(): array{
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM $this->table_name");
        $appointments = array();
        foreach($results as $result){
            $appointment = new Appointment();
            $appointment->InitializeExistingAppointment(
                $result->appointment_id,
                $result->status,
                $result->service_time_slot_id,
                $result->customer_id,
                $result->location_id,
                $result->creation_date,
                $result->update_date
            );
            array_push($appointments, $appointment);
        }
        return $appointments;
    }

    public function Update(Appointment $appointment): bool{
        global $wpdb;
        $confirmation = $wpdb->update(
            $this->table_name,
            array(
                'status' => $appointment->getStatus()->value,
                'service_time_slot_id' => $appointment->getServiceTimeSlotID(),
                'customer_id' => $appointment->getCustomerID(),
                'location_id' => $appointment->getLocationID(),
                'creation_date' => $appointment->getCreationDate(),
                'update_date' => $appointment->getUpdateDate()
            ),
            array('appointment_id' => $appointment->getID())
        );
        return $confirmation ? true : false;
    }

    public function Delete(int $appointment_id): bool{
        global $wpdb;
        $confirmation = $wpdb->delete($this->table_name, array('appointment_id' => $appointment_id));
        return $confirmation ? true : false;
    }
}