<?php

namespace VPTec\Agendamentos\Core\Ajax\Customer;

use VPTec\Agendamentos\Core\Classes\Base\CustomerDAO;
use VPTec\Agendamentos\Core\Classes\Entities\Customer;

require_once plugin_dir_path( __FILE__ ) . "/../../Classes/Base/CustomerDAO.php";
require_once plugin_dir_path( __FILE__ ) . "/../../Classes/Entities/Customer.php";

function CreateCustomerAjax(){
    if(isset($_POST['create_customer_ajax'])){
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $customer = new Customer();
        $customer->InitializeNewCustomer($user_id, $name, $email, $phone);

        $customerDAO = new CustomerDAO();
        $id = $customerDAO->Insert($customer);

        if($id){
            $response = array(
                'success' => true,
                'message' => 'Cliente cadastrado com sucesso!',
                'customer_id' => $id
            );
        }else{
            $response = array(
                'success' => false,
                'message' => 'Erro ao cadastrar cliente!'
            );
        }
        $response = json_encode($response);
        echo $response;
        wp_die();
    }
    $response = array(
        'success' => false,
        'message' => 'Erro ao cadastrar cliente!'
    );
    $response = json_encode($response);
    echo $response;
    wp_die();
}

add_action('wp_ajax_create_customer_ajax', 'CreateCustomerAjax');