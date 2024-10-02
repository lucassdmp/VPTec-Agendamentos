<?php

namespace VPTec\Agendamentos\Core\Migrations;

require  "CreateServiceTable.php";
require  "CreateCustomerTable.php";
require  "CreateLocationTable.php";
require  "CreateEmployeeTable.php";
require  "CreateServiceTimeSlotsTable.php";
require  "CreateAppointmentTable.php";

class Migration {
    public static function run(){
        CreateServiceTable();
        CreateCustomerTable();
        CreateLocationTable();
        CreateEmployeeTable();
        CreateServiceTimeSlotsTable();
        CreateAppointmentTable();
    }
}