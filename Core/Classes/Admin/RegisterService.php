<?php

namespace VPTec\Agendamentos\Core\Ajax\Service;

use VPTec\Agendamentos\Templates\RegisterServiceForm;

require_once plugin_dir_path( __FILE__ ) . "/../../../Templates/RegisterServiceForm.php";

class RegisterService {
    public function __construct(){
        add_submenu_page(
            "vptec-agendamentos",
            "Cadastrar Serviço",
            "Cadastrar Serviço",
            "manage_options",
            "create_service",
            array($this, 'CreateProductForm'),
        );


    }

    public function CreateProductForm(){
        $register_service_form = new RegisterServiceForm();
        $register_service_form->Render();
    }
}

?>