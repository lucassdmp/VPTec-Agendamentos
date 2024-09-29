<?php

namespace VPTec\Agendamentos\Core;

use VPTec\Agendamentos\Core\Migrations;

class VPTecAgendamentos {

    public function __construct(){
        register_activation_hook( __FILE__, array(&$this, 'activate'));
    }

    public function activate(){
        Migrations\RunTableMigrations();
    }

}