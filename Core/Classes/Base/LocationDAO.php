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

    public function Create(Location $location): bool{
        global $wpdb;
        $insert_id = $wpdb->insert(
            $this->table_name,
            array(
                'location_type' => $location->getLocationType(),
                'name' => $location->getName(),
                'address_line_1' => $location->getAddressLine1(),
                'address_line_2' => $location->getAddressLine2(),
                'city' => $location->getCity(),
                'state' => $location->getState(),
                'zip_code' => $location->getZipCode(),
                'creation_date' => current_time('mysql'),
                'update_date' => current_time('mysql')
            )
        );

        return $insert_id ? true : false;
    }

    public function Read($location_id): Location|null{
        global $wpdb;
        $result = $wpdb->get_row("SELECT * FROM $this->table_name WHERE location_id = $location_id");
        if($result){
            return new Location(
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
        return null;    
    }

    public function ReadAll(): array{
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM $this->table_name");
        $locations = array();
        foreach ($results as $result) {
            array_push($locations, new Location(
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

    public function Update($location): bool{
        global $wpdb;
        $updated = $wpdb->update(
            $this->table_name,
            array(
                'location_type' => $location->getLocationType(),
                'name' => $location->getName(),
                'address_line_1' => $location->getAddressLine1(),
                'address_line_2' => $location->getAddressLine2(),
                'city' => $location->getCity(),
                'state' => $location->getState(),
                'zip_code' => $location->getZipCode(),
                'update_date' => current_time('mysql')
            ),
            array('location_id' => $location->getID())
        );

        return $updated ? true : false;
    }

    public function Delete($location_id): bool{
        global $wpdb;
        $deleted = $wpdb->delete(
            $this->table_name,
            array('location_id' => $location_id)
        );

        return $deleted ? true : false;
    }
}