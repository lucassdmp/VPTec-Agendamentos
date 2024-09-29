<?php

namespace VPTec\Agendamentos\Core\Migrations;

use Vptec\Agendamentos\Core\Utils\TablesName;


function CreateAppointmentTable()
{
    global $wpdb;
    $table_name = $wpdb->prefix . TablesName::APPOINTMENT_TABLE;
    $charset_collate = $wpdb->get_charset_collate();

    $does_table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;
    if ($does_table_exists) {
        return;
    }

    $sql = "CREATE TABLE $table_name (
        appointment_id int(11) NOT NULL AUTO_INCREMENT,
        status int(2) NOT NULL,
        service_time_slot_id int(11) NOT NULL,
        customer_id int(11) NOT NULL,
        location_id int(11) NOT NULL,
        creation_date datetime NOT NULL,
        update_date datetime NOT NULL,
        PRIMARY KEY (appointment_id),
        FOREIGN KEY (location_id) REFERENCES {$wpdb->prefix}_vptec_locations(location_id),
        FOREIGN KEY (service_time_slot_id) REFERENCES {$wpdb->prefix}_vptec_service_time_slots(service_time_slot_id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}