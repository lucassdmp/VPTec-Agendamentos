<?php

namespace VPTec\Agendamentos\Core\Classes\Base;

use VPTec\Agendamentos\Core\Classes\Entities\Service;
use VPTec\Agendamentos\Core\Utils\Enum\TablesName;

require_once plugin_dir_path( __FILE__ ) . '/../Entities/Service.php';
require_once plugin_dir_path( __FILE__ ) . '/../../Utils/Enum.php';

class ServiceDAO
{
    private string $table_name;

    function __construct()
    {
        global $wpdb;
        $this->table_name = $wpdb->prefix . TablesName::SERVICE_TABLE->value;
    }

    public function Insert(Service $service): bool
    {
        global $wpdb;
        $confirmation = $wpdb->insert(
            $this->table_name,
            array(
                'name' => $service->getName(),
                'wc_product_id' => $service->getWcProductId(),
                'description' => $service->getDescription(),
                'price' => $service->getPrice(),
                'creation_date' => $service->getCreationDate(),
                'update_date' => $service->getUpdateDate()
            )
        );
        return $confirmation ? true : false;
    }

    public function GetById(int $service_id): Service|null
    {
        global $wpdb;
        $result = $wpdb->get_row("SELECT * FROM $this->table_name WHERE service_id = $service_id");
        if($result){
            $service = new Service();
            return $service->InitializeExistingService(
                $result->service_id,
                $result->wc_product_id,
                $result->name,
                $result->description,
                $result->price,
                $result->creation_date,
                $result->update_date
            );
        }
        return null;
    }

    public function GetAllServices(): array
    {
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM $this->table_name");
        $services = array();
        foreach ($results as $result) {
            $service = new Service();
            array_push($services, $service->InitializeExistingService(
                $result->service_id,
                $result->wc_product_id,
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
        $confirmation = $wpdb->update(
            $this->table_name,
            array(
                'name' => $service->getName(),
                'wc_product_id' => $service->getWcProductId(),
                'description' => $service->getDescription(),
                'price' => $service->getPrice(),
                'update_date' => $service->getCreationDate()
            ),
            array('service_id' => $service->getID())
        );
        return $confirmation ? true : false;
    }

    public function Delete(int $service_id): bool
    {
        global $wpdb;
        $confirmation = $wpdb->delete(
            $this->table_name,
            array('service_id' => $service_id)
        );
        return $confirmation ? true : false;
    }

}