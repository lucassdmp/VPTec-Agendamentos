<?php

namespace VPTec\Agendamentos\Core\Classes\Entities;

use VPTec\Agendamentos\Core\Utils\Enum\AppointmentStatus;

require_once plugin_dir_path( __FILE__ ) . '/../Utils/Enum.php';

class Appointment{
    private int $ID;
    private AppointmentStatus $status;
    private int $service_time_slot_id;
    private int $customer_id;
    private int $location_id;
    private string $creation_date;
    private string $update_date;

    public function __construct(){}

    public function InitializeNewAppointment(int $service_time_slot_id, int $customer_id, int $location_id): Appointment{
        $this->status = AppointmentStatus::CREATED;
        $this->service_time_slot_id = $service_time_slot_id;
        $this->customer_id = $customer_id;
        $this->location_id = $location_id;
        $this->creation_date = date('Y-m-d H:i:s');
        $this->update_date = date('Y-m-d H:i:s');
        return $this;
    }

    public function InitializeExistingAppointment(int $ID, AppointmentStatus $status, int $service_time_slot_id, int $customer_id, int $location_id, string $creation_date, string $update_date): Appointment{
        $this->ID = $ID;
        $this->status = $status;
        $this->service_time_slot_id = $service_time_slot_id;
        $this->customer_id = $customer_id;
        $this->location_id = $location_id;
        $this->creation_date = $creation_date;
        $this->update_date = $update_date;
        return $this;
    }

    public function getID(): int{
        return $this->ID;
    }

    public function getStatus(): AppointmentStatus{
        return $this->status;
    }

    public function getServiceTimeSlotID(): int{
        return $this->service_time_slot_id;
    }

    public function getCustomerID(): int{
        return $this->customer_id;
    }

    public function getLocationID(): int{
        return $this->location_id;
    }

    public function getCreationDate(): string{
        return $this->creation_date;
    }

    public function getUpdateDate(): string{
        return $this->update_date;
    }

    public function setStatus(AppointmentStatus $status): void{
        $this->status = $status;
    }

    public function setServiceTimeSlotID(int $service_time_slot_id): void{
        $this->service_time_slot_id = $service_time_slot_id;
    }

    public function setCustomerID(int $customer_id): void{
        $this->customer_id = $customer_id;
    }

    public function setLocationID(int $location_id): void{
        $this->location_id = $location_id;
    }

    public function setCreationDate(string $creation_date): void{
        $this->creation_date = $creation_date;
    }

    public function setUpdateDate(string $update_date): void{
        $this->update_date = $update_date;
    }


    
}