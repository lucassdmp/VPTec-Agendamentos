<?php

namespace VPTec\Agendamentos\Core\Ajax\Service;

use VPTec\Agendamentos\Core\Classes\Base\ServiceDAO;
use VPTec\Agendamentos\Core\Classes\Entities\Service;

require_once plugin_dir_path(__FILE__) . "/../../Classes/Base/ServiceDAO.php";
require_once plugin_dir_path(__FILE__) . "/../../Classes/Entities/Service.php";

class CreateServiceAjax
{
    public function __construct()
    {
        add_action('wp_ajax_create_service_ajax', array($this, 'CreateServiceAjax'));
    }

    public function CreateServiceAjax()
    {
        file_put_contents('teste.txt', 'teste');

        $name = $_POST['name'];
        $wc_product_id = $_POST['wc_product_id'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        $service = new Service();
        $service->InitializeService($name, $wc_product_id, $description, $price);

        $serviceDAO = new ServiceDAO();
        $confirmation = $serviceDAO->Insert($service);

        if ($confirmation) {
            $response = array(
                'success' => true,
                'message' => 'Serviço cadastrado com sucesso!',
                'service_id' => $service->getID()
            );
            wp_send_json_success($response);
        } else {
            $response = array(
                'success' => false,
                'message' => 'Erro ao cadastrar serviço!'
            );
            wp_send_json_error($response);
        }

        wp_die();
    }
}