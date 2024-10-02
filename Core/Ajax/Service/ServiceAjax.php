<?php

namespace VPTec\Agendamentos\Core\Ajax\Service;

require_once plugin_dir_path( __FILE__ ) . "CreateServiceAjax.php";

class ServiceAjax {
    public function __construct(){
        $create_service_ajax = new CreateServiceAjax();
    }
}
