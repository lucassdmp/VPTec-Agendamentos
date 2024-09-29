<?php

/**
 * Plugin Name: VPTec Agendamentos
 * Plugin Version: 1.0.0
 * 
 * Description: Plugin de gerenciamentos de agendamentos
 * Author: lucassdmp
 * Author URI: github.com/lucassdmp
 * 
 */

 

namespace VPTec\Agendamentos;

require_once plugin_dir_path( __FILE__ ) . "Core/VPTecAgendamentos.php";

use VPTec\Agendamentos\Core\VPTecAgendamentos;

VPTecAgendamentos::initialize();