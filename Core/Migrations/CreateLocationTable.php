<?php

namespace VPTec\Agendamentos\Core\Migrations;

use Vptec\Agendamentos\Core\Utils\TablesName;

require_once plugin_dir_path(__FILE__) . "../Utils/Enum.php";

function CreateLocationTable()
{
    global $wpdb;
    $table_name = $wpdb->prefix . TablesName::LOCATION_TABLE->value;
    $charset_collate = $wpdb->get_charset_collate();

    $does_table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;
    if ($does_table_exists) {
        return;
    }

    $sql = "CREATE TABLE $table_name (
        location_id int(11) NOT NULL AUTO_INCREMENT,
        location_type int(2) NOT NULL,
        name varchar(255) NOT NULL,
        address_line_1 varchar(255) NOT NULL,
        address_line_2 varchar(255) NULL,
        city varchar(255) NOT NULL,
        state varchar(255) NOT NULL,
        zip_code varchar(20) NOT NULL,
        creation_date datetime NOT NULL,
        update_date datetime NOT NULL,
        PRIMARY KEY (location_id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}