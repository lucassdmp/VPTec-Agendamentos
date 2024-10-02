<?php

namespace VPTec\Agendamentos\Core;

require_once plugin_dir_path( __FILE__ ) . "Migrations/Migration.php";
require_once plugin_dir_path( __FILE__ ) . "Classes/Admin/Admin.php";
require_once plugin_dir_path( __FILE__ ) . "EnqueueScripts.php";
require_once plugin_dir_path( __FILE__ ) . "Ajax/Ajax.php";


use VPTec\Agendamentos\Core\Migrations\Migration;
use VPTec\Agendamentos\Core\Ajax\Service\RegisterService;
use VPTec\Agendamentos\Core\EnqueueScript;
use VPTec\Agendamentos\Core\Ajax\Ajax;

class VPTecAgendamentos {
    public function __construct(){
        register_activation_hook( __FILE__, array( $this, 'initializeMigrations' ) );

        add_action('admin_menu', array($this, 'initialize_admin_menu'));

        $enqueue_script = new EnqueueScript();
        $enqueue_script->EnqueueServiceAjaxScripts();

        $ajax = new Ajax();


    }

    public function initializeMigrations(){
        Migration::run();
    }

    public function initialize_admin_menu(){
        add_menu_page(
            "VPTec Agendamentos",
            "VPTec Agendamentos",
            "manage_options",
            "vptec-agendamentos",
            array($this, 'admin_page'),
            "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gVXBsb2FkZWQgdG86IFNWRyBSZXBvLCB3d3cuc3ZncmVwby5jb20sIEdlbmVyYXRvcjogU1ZHIFJlcG8gTWl4ZXIgVG9vbHMgLS0+DQo8c3ZnIHdpZHRoPSI4MDBweCIgaGVpZ2h0PSI4MDBweCIgdmlld0JveD0iMCAwIDEwMjQgMTAyNCIgY2xhc3M9Imljb24iICB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTcxNCA3NjIuMmgtOTguMmMtMTYuNiAwLTMwIDEzLjQtMzAgMzBzMTMuNCAzMCAzMCAzMEg3MTRjMTYuNiAwIDMwLTEzLjQgMzAtMzBzLTEzLjQtMzAtMzAtMzB6TTQ4Ny40IDc2Mi4ySDE0Ny4xYy0xNi42IDAtMzAgMTMuNC0zMCAzMHMxMy40IDMwIDMwIDMwaDM0MC4zYzE2LjYgMCAzMC0xMy40IDMwLTMwcy0xMy40LTMwLTMwLTMweiIgZmlsbD0iIzMzQ0M5OSIgLz48cGF0aCBkPSJNODM4LjI1MyAxMzAuMDIzbDY1LjU0OCA2NS41NDgtNTcuOTgyIDU3Ljk4My02NS41NDktNjUuNTQ5eiIgZmlsbD0iI0ZGQjg5QSIgLz48cGF0aCBkPSJNNzQzLjcgOTU1LjlIMTk1LjhjLTUzLjcgMC05Ny40LTQzLjctOTcuNC05Ny40VjE3NC44YzAtNTMuNyA0My43LTk3LjQgOTcuNC05Ny40SDYxNWMxNi42IDAgMzAgMTMuNCAzMCAzMHMtMTMuNCAzMC0zMCAzMEgxOTUuOGMtMjAuNiAwLTM3LjQgMTYuOC0zNy40IDM3LjR2NjgzLjdjMCAyMC42IDE2LjggMzcuNCAzNy40IDM3LjRoNTQ3LjljMjAuNiAwIDM3LjQtMTYuOCAzNy40LTM3LjR2LTM5NWMwLTE2LjYgMTMuNC0zMCAzMC0zMHMzMCAxMy40IDMwIDMwdjM5NS4xYzAgNTMuNi00My43IDk3LjMtOTcuNCA5Ny4zeiIgZmlsbD0iIzQ1NDg0QyIgLz48cGF0aCBkPSJNOTA3LjcgMTIyLjFsLTM5LjItMzkuMmMtMjQtMjQtNjUuMS0yMS45LTkxLjcgNC43TDQxOS41IDQ0NSAzNDcgNjQzLjZsMTk4LjYtNzIuNEw5MDMgMjEzLjhjMTIuMS0xMi4xIDE5LjYtMjcuNyAyMS4xLTQ0IDEuOC0xOC4xLTQuMy0zNS41LTE2LjQtNDcuN3pNNTEyLjYgNTE5LjNMNDQ3LjUgNTQzbDIzLjctNjUuMSAyNjQuNy0yNjQuNyA0MC45IDQxLjctMjY0LjIgMjY0LjR6IG0zNDgtMzQ3LjlsLTQxLjMgNDEuMy00MC45LTQxLjcgNDAuOS00MC45YzMuMS0zLjEgNi4yLTMuOSA3LjYtMy45bDM3LjYgMzcuNmMtMC4xIDEuMy0wLjkgNC41LTMuOSA3LjZ6IiBmaWxsPSIjNDU0ODRDIiAvPjwvc3ZnPg==",
            1
        );
        $register_service = new RegisterService();
    }

    public function admin_page() {
        echo '<div class="wrap">';
        echo '<h1>Bem-vindo ao Meu Plugin</h1>';
        echo '<p>Esta é a página de administração</p>';
        echo '</div>';
    }
}