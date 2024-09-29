<?php

namespace VPTec\Agendamentos\Core\Classes\Base;

use VPTec\Agendamentos\Core\Utils\TablesName;
use VPTec\Agendamentos\Core\Classes\Entities\Location;

class LocationDAO {
    private $table_name;

    function __construct(){
        global $wpdb;
        $this->table_name = $wpdb->prefix . TablesName::LOCATION_TABLE;
    }

    public function Create(Location $location): int {
        global $wpdb;
        $wpdb->insert(
            $this->table_name,
            array(
                'location_type' => $location->getLocationType(),
                'name' => $location->getName(),
                'address_line_1' => $location->getAddressLine1(),
                'address_line_2' => $location->getAddressLine2(),
                'city' => $location->getCity(),
                'state' => $location->getState(),
                'zip_code' => $location->getZipCode(),
                'creation_date' => $location->getCreationDate(),
                'update_date' => $location->getUpdateDate()
            )
        );
        return $wpdb->insert_id;
    }

    public function Read(int $location_id): Location {
        global $wpdb;
        $result = $wpdb->get_row("SELECT * FROM $this->table_name WHERE location_id = $location_id");
        $location = new Location();
        return $location->InitializeExistingLocation(
            $result->location_id,
            $result->location_type,
            $result->name,
            $result->address_line_1,
            $result->address_line_2,
            $result->city,
            $result->state,
            $result->zip_code,
            $result->creation_date,
            $result->update_date
        );
    }

    public function ReadAll(): array {
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM $this->table_name");
        $locations = array();
        foreach ($results as $result) {
            $location = new Location();
            array_push($locations, $location->InitializeExistingLocation(
                $result->location_id,
                $result->location_type,
                $result->name,
                $result->address_line_1,
                $result->address_line_2,
                $result->city,
                $result->state,
                $result->zip_code,
                $result->creation_date,
                $result->update_date
            ));
        }
        return $locations;
    }

    public function Update(Location $location): bool {
        global $wpdb;
        $update_id = $wpdb->update(
            $this->table_name,
            array(
                'location_type' => $location->getLocationType(),
                'name' => $location->getName(),
                'address_line_1' => $location->getAddressLine1(),
                'address_line_2' => $location->getAddressLine2(),
                'city' => $location->getCity(),
                'state' => $location->getState(),
                'zip_code' => $location->getZipCode(),
                'update_date' => $location->getUpdateDate()
            ),
            array('location_id' => $location->getID())
        );
        return $update_id !== false;
    }

    public function Delete(int $location_id): bool {
        global $wpdb;
        $delete_id = $wpdb->delete(
            $this->table_name,
            array('location_id' => $location_id)
        );
        return $delete_id !== false;
    }
}