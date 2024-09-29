<?php

namespace VPTec\Agendamentos\Core\Utils;


enum AppointmentStatus{
    case CREATED = 1;
    case CONFIRMED = 2;
    case CANCELLED = 3;
    case FINISHED = 4;
}

enum TimeSlotStatus{
    case AVAILABLE = 1;
    case UNAVAILABLE = 2;
}

enum LocationType {
    case ONLINE = 1;
    case PHYSICAL = 2;
}

enum EmployeeType {
    case MANAGER = 1;
    case EMPLOYEE = 2;
}

enum TablesName {
    case EMPLOYEES_TABLE = 'vptec_employees';
    case CUSTOMER_TABLE = 'vptec_customers';
    case LOCATION_TABLE = 'vptec_locations';
    case SERVICE_TABLE = 'vptec_services';
    case SERVICE_TIME_SLOTS_TABLE = 'vptec_service_time_slots';
    case APPOINTMENT_TABLE = 'vptec_appointments';
}
