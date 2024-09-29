<?php

namespace VPTec\Agendamentos\Core\Migrations;

function RunTableMigrations()
{
    CreateServiceTable();
    CreateCustomerTable();
    CreateLocationTable();
    CreateEmployeeTable();
    CreateServiceTimeSlotsTable();
    CreateAppointmentTable();
}