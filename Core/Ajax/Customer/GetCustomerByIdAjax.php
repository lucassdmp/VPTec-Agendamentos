<?php

namespace VPTec\Agendamentos\Core\Ajax\Customer;

use VPTec\Agendamentos\Core\Classes\Base\CustomerDAO;

require_once plugin_dir_path( __FILE__ ) . "/../../Classes/Base/CustomerDAO.php";
require_once plugin_dir_path( __FILE__ ) . "/../../Classes/Entities/Customer.php";

function GetCustomerByIdAjax(){
    if(isset($_POST['get_customer_by_id_ajax'])){
        $customer_id = $_POST['customer_id'];

        $customerDAO = new CustomerDAO();
        $customer = $customerDAO->GetById($customer_id);

        if($customer){
            $response = array(
                'success' => true,
                'message' => 'Cliente encontrado!',
                'customer' => array(
                    'ID' => $customer->getID(),
                    'user_id' => $customer->getUserID(),
                    'name' => $customer->getName(),
                    'email' => $customer->getEmail(),
                    'phone' => $customer->getPhone(),
                    'creation_date' => $customer->getCreationDate(),
                    'update_date' => $customer->getUpdateDate()
                )
            );
        }else{
            $response = array(
                'success' => false,
                'message' => 'Cliente não encontrado!'
            );
        }
        $response = json_encode($response);
        echo $response;
        wp_die();
    }
    $response = array(
        'success' => false,
        'message' => 'Cliente não encontrado!'
    );
    $response = json_encode($response);
    echo $response;
    wp_die();
}

add_action('wp_ajax_get_customer_by_id_ajax', 'GetCustomerByIdAjax');