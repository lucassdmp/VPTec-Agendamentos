<?php

namespace VPTec\Agendamentos\Core\Migrations;

use Vptec\Agendamentos\Core\Utils\Enum\TablesName;

require_once plugin_dir_path( __FILE__ ) . '/../Utils/Enum.php';
function CreateServiceTable()
{
    global $wpdb;
    $table_name = $wpdb->prefix . TablesName::SERVICE_TABLE->value;
    $charset_collate = $wpdb->get_charset_collate();

    $does_table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;
    if ($does_table_exists) {
        return;
    }

    $sql = "CREATE TABLE $table_name (
        service_id int(11) NOT NULL AUTO_INCREMENT,
        wc_product_id int(11) NOT NULL,
        name varchar(255) NOT NULL,
        description text NULL,
        price decimal(10,2) NOT NULL,
        creation_date datetime NOT NULL,
        update_date datetime NOT NULL,
        PRIMARY KEY (service_id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}