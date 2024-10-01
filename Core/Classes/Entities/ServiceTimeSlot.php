<?php

namespace VPTec\Agendamentos\Core\Classes\Entities;

use VPTec\Agendamentos\Core\Classes\Base\ServiceTimeSlotDAO;

require_once plugin_dir_path( __FILE__ ) . '/../Base/ServiceTimeSlotDAO.php';

class ServiceTimeSlot {
    private int $ID;
    private int $employee_id;
    private int $service_id;
    private string $start_time;
    private string $end_time;
    private string $creation_date;
    private string $update_date;
    public ServiceTimeSlotDAO $serviceTimeSlotDAO;

    public function __construct() {
        $this->serviceTimeSlotDAO = new ServiceTimeSlotDAO();
    }

    public function InitializeServiceTimeSlot(int $employee_id, int $service_id, string $start_time, string $end_time): ServiceTimeSlot {
        $this->employee_id = $employee_id;
        $this->service_id = $service_id;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->creation_date = date('Y-m-d H:i:s');
        $this->update_date = date('Y-m-d H:i:s');
        return $this;
    }

    public function InitializeExistingServiceTimeSlot(int $ID, int $employee_id, int $service_id, string $start_time, string $end_time, string $creation_date, string $update_date): ServiceTimeSlot {
        $this->ID = $ID;
        $this->employee_id = $employee_id;
        $this->service_id = $service_id;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->creation_date = $creation_date;
        $this->update_date = $update_date;
        return $this;
    }

    public function getID(): int {
        return $this->ID;
    }

    public function getEmployeeID(): int {
        return $this->employee_id;
    }

    public function getServiceID(): int {
        return $this->service_id;
    }

    public function getStartTime(): string {
        return $this->start_time;
    }

    public function getEndTime(): string {
        return $this->end_time;
    }

    public function getCreationDate(): string {
        return $this->creation_date;
    }

    public function getUpdateDate(): string {
        return $this->update_date;
    }

    public function setEmployeeID(int $employee_id): void {
        $this->employee_id = $employee_id;
    }

    public function setServiceID(int $service_id): void {
        $this->service_id = $service_id;
    }

    public function setStartTime(string $start_time): void {
        $this->start_time = $start_time;
    }

    public function setEndTime(string $end_time): void {
        $this->end_time = $end_time;
    }

    public function setUpdateDate(string $update_date): void {
        $this->update_date = $update_date;
    }

}