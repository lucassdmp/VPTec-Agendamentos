<?php

namespace VPTec\Agendamentos\Core\Ajax;

use VPTec\Agendamentos\Core\Ajax\Service\ServiceAjax;

require_once plugin_dir_path( __FILE__ ) . "Service/ServiceAjax.php";

class Ajax{
    public function __construct(){
        $service_ajax = new ServiceAjax();
    }
}