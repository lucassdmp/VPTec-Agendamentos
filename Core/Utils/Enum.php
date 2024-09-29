<?php

namespace VPTec\Agendamentos\Core\Utils;


enum AppointmentStatus : int{
    case CREATED = 1;
    case CONFIRMED = 2;
    case CANCELLED = 3;
    case FINISHED = 4;
}

enum TimeSlotStatus : int{
    case AVAILABLE = 1;
    case UNAVAILABLE = 2;
}

enum LocationType : int {
    case ONLINE = 1;
    case PHYSICAL = 2;
}

enum EmployeeType : int {
    case MANAGER = 1;
    case EMPLOYEE = 2;
}

enum TablesName : string {
    case EMPLOYEE_TABLE = 'vptec_employees';
    case CUSTOMER_TABLE = 'vptec_customers';
    case LOCATION_TABLE = 'vptec_locations';
    case SERVICE_TABLE = 'vptec_services';
    case SERVICE_TIME_SLOTS_TABLE = 'vptec_service_time_slots';
    case APPOINTMENT_TABLE = 'vptec_appointments';
}
