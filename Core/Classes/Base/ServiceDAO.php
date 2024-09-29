<?php

namespace VPTec\Agendamentos\Core\Classes\Base;

use VPTec\Agendamentos\Core\Utils\TablesName;
use VPTec\Agendamentos\Core\Classes\Entities\Service;

class ServiceDAO
{
    private string $table_name;

    function __construct()
    {
        global $wpdb;
        $this->table_name = $wpdb->prefix . TablesName::SERVICE_TABLE;
    }

    public function Create(Service $service): int
    {
        global $wpdb;
        $wpdb->insert(
            $this->table_name,
            array(
                'name' => $service->getName(),
                'description' => $service->getDescription(),
                'price' => $service->getPrice(),
                'creation_date' => $service->getCreationDate(),
                'update_date' => $service->getUpdateDate()
            )
        );
        return $wpdb->insert_id;
    }

    public function Read(int $service_id): Service
    {
        global $wpdb;
        $result = $wpdb->get_row("SELECT * FROM $this->table_name WHERE service_id = $service_id");
        $service = new Service();
        return $service->InitializeExistingService(
            $result->service_id,
            $result->name,
            $result->description,
            $result->price,
            $result->creation_date,
            $result->update_date
        );
    }

    public function ReadAll(): array
    {
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM $this->table_name");
        $services = array();
        foreach ($results as $result) {
            $service = new Service();
            array_push($services, $service->InitializeExistingService(
                $result->service_id,
                $result->name,
                $result->description,
                $result->price,
                $result->creation_date,
                $result->update_date
            ));
        }
        return $services;
    }

    public function Update(Service $service): bool
    {
        global $wpdb;
        $update_id = $wpdb->update(
            $this->table_name,
            array(
                'name' => $service->getName(),
                'description' => $service->getDescription(),
                'price' => $service->getPrice(),
                'update_date' => current_time('mysql')
            ),
            array('service_id' => $service->getID())
        );
        return $update_id ? true : false;
    }

    public function Delete(int $service_id): bool
    {
        global $wpdb;
        $deleted = $wpdb->delete(
            $this->table_name,
            array('service_id' => $service_id)
        );
        return $deleted ? true : false;
    }

}