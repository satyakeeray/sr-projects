<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
    exit; 
}

add_action( 'wp_enqueue_scripts', 'sr_projects_enqueue_scripts' );
if( !function_exists( 'sr_projects_enqueue_scripts' ) ) {
    function sr_projects_enqueue_scripts() {
        wp_enqueue_script( 'sr-projects-script', plugin_dir_url( __FILE__ ) . '../assets/js/sr-projects.js', array('jquery'), '1.0', true );
        wp_localize_script( 'sr-projects-script', 'srProjectsAjax', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce('my_ajax_nonce'),
        ) );
    }
}
