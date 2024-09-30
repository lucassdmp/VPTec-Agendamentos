<?php

namespace VPTec\Agendamentos\Core;

use VPTec\Agendamentos\Core\Migrations\Migration;

require_once plugin_dir_path( __FILE__ ) . "Migrations/Migration.php";
class VPTecAgendamentos {

    public function __construct(){}

    public static function initialize(){
        Migration::run();
    }
}