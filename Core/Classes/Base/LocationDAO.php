<?php

namespace VPTec\Agendamentos\Core\Classes\Base;

use VPTec\Agendamentos\Core\Classes\Entities\Location;
use VPTec\Agendamentos\Core\Utils\Enum\LocationType;
use VPTec\Agendamentos\Core\Utils\Enum\TablesName;

require_once __DIR__ . '/../Entities/Employee.php';
require_once __DIR__ . '/../../Utils/Enum.php';


class LocationDAO
{
    private $table_name;

    function __construct()
    {
        global $wpdb;
        $this->table_name = $wpdb->prefix . TablesName::LOCATION_TABLE;
    }

    public function Create(Location $location): bool
    {
        global $wpdb;
        $confirmation = $wpdb->insert(
            $this->table_name,
            array(
                'location_type' => $location->getLocationType()->value,
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
        return $confirmation ? true : false;
    }

    public function Read(int $location_id): Location | null
    {
        global $wpdb;
        $result = $wpdb->get_row("SELECT * FROM $this->table_name WHERE location_id = $location_id");
        if ($result) {
            $location = new Location();
            return $location->InitializeExistingLocation(
                $result->location_id,
                LocationType::from($result->location_type),
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

    public function ReadAll(): array
    {
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM $this->table_name");
        $locations = array();
        foreach ($results as $result) {
            $location = new Location();
            array_push($locations, $location->InitializeExistingLocation(
                $result->location_id,
                LocationType::from($result->location_type),
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

    public function Update(Location $location): bool
    {
        global $wpdb;
        $confirmation = $wpdb->update(
            $this->table_name,
            array(
                'location_type' => $location->getLocationType()->value,
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
        return $confirmation !== false;
    }

    public function Delete(int $location_id): bool
    {
        global $wpdb;
        $confirmation = $wpdb->delete(
            $this->table_name,
            array('location_id' => $location_id)
        );
        return $confirmation !== false;
    }
}