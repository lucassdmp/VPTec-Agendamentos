<?php

namespace VPTec\Agendamentos\Core\Classes\Base;

use VPTec\Agendamentos\Core\Classes\Entities\Customer;
use VPTec\Agendamentos\Core\Utils\Enum\TablesName;

require_once plugin_dir_path( __FILE__ ) . '/../Utils/Enum.php';
require_once plugin_dir_path( __FILE__ ) . '/../Entities/Customer.php';

class CustomerDAO {

    private $table_name;

    function __construct(){
        global $wpdb;
        $this->table_name = $wpdb->prefix . TablesName::CUSTOMER_TABLE;
    }

    public function Insert(Customer $customer): int {
        global $wpdb;
        $confirmation = $wpdb->insert($this->table_name, 
            array(
                'user_id' => $customer->getUserID(),
                'name' => $customer->getName(),
                'email' => $customer->getEmail(),
                'phone' => $customer->getPhone(),
                'creation_date' => $customer->getCreationDate(),
                'update_date' => $customer->getUpdateDate()
            ));
        return $confirmation ? true : false;
    }

    function GetById(int $customer_id): Customer|null {
        global $wpdb;
        $result = $wpdb->get_row("SELECT * FROM $this->table_name WHERE customer_id = $customer_id");
        if($result){
            $customer = new Customer();
            return $customer->InitializeExistingCustomer(
                $result->customer_id,
                $result->user_id,
                $result->name,
                $result->email,
                $result->phone,
                $result->creation_date,
                $result->update_date
            );
        }
        return null;
    }

    function GetAllCustomers(): array {
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM $this->table_name");
        $customers = array();
        foreach($results as $result){
            $customer = new Customer();
            $customer->InitializeExistingCustomer(
                $result->customer_id,
                $result->user_id,
                $result->name,
                $result->email,
                $result->phone,
                $result->creation_date,
                $result->update_date
            );
            array_push($customers, $customer);
        }
        return $customers;
    }

    function Update(Customer $customer): int {
        global $wpdb;
        $confirmation = $wpdb->update($this->table_name, 
            array(
                'user_id' => $customer->getUserID(),
                'name' => $customer->getName(),
                'email' => $customer->getEmail(),
                'phone' => $customer->getPhone(),
                'update_date' => $customer->getUpdateDate()
            ),
            array('customer_id' => $customer->getID())
        );
        return $confirmation ? true : false;
    }

    function Delete(int $customer_id): int {
        global $wpdb;
        $confirmation = $wpdb->delete($this->table_name, array('customer_id' => $customer_id));
        return $confirmation ? true : false;
    }

}