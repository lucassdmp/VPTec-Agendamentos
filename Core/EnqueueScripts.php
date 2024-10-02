<?php

namespace VPTec\Agendamentos\Core;

class EnqueueScript{
    public function __construct(){
        add_action('wp_enqueue_scripts', array($this, 'EnqueueServiceAjaxScripts'));
        add_action('admin_enqueue_scripts', array($this, 'EnqueueServiceAjaxScripts'));
    }

    public function EnqueueServiceAjaxScripts(){
        wp_register_script(
            'vptec-service-ajax',
            plugin_dir_url(__FILE__) . "Scripts/service-ajax.js",
            array('jquery'),
            '1.0',
            true
        );
    
        wp_enqueue_script('vptec-service-ajax');
    }
    
}