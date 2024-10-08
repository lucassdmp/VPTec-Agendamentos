<?php

namespace VPTec\Agendamentos\Core\Migrations;

use Vptec\Agendamentos\Core\Utils\Enum\TablesName;

require_once plugin_dir_path( __FILE__ ) . '/../Utils/Enum.php';

function CreateEmployeeTable(){
    global $wpdb;
    $table_name = $wpdb->prefix . TablesName::EMPLOYEE_TABLE->value;
    $charset_collate = $wpdb->get_charset_collate();

    $wp_user_table = $wpdb->prefix . 'users';

    $does_table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;
    if ($does_table_exists) {
        return;
    }

    $sql = "CREATE TABLE $table_name (
        employee_id int(11) NOT NULL AUTO_INCREMENT,
        user_id bigint(20) NOT NULL,
        employee_type int(2) NOT NULL,
        name varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        phone varchar(20) NOT NULL,
        creation_date datetime NOT NULL,
        update_date datetime NOT NULL,
        PRIMARY KEY (employee_id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}