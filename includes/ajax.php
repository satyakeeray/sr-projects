<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
    exit; 
}

add_action( 'wp_ajax_load_projects', 'sr_load_projects_callback' );
add_action( 'wp_ajax_nopriv_load_projects', 'sr_load_projects_callback' );
if( !function_exists( 'sr_load_projects_callback' ) ) {
    function sr_load_projects_callback() {  
        if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'my_ajax_nonce' ) ) {
            wp_send_json_error( ['message' => 'Invalid nonce'] , 403);
        }
        $args = array(
            'post_type'         => 'projects',
            'post_status'       => 'publish',
            'posts_per_page'    => -1,
            'meta_query'       => array(
                array(
                    'key'       => 'project_status',
                    'value'     => 'active',
                    'compare'   => '='
                )
            )
        );
        $projects = get_posts( $args );
        $data = array();
        if( !empty( $projects ) ) {
            foreach ( $projects as $project ) {
                $status         =  get_field( 'project_status', $project->ID );
                $client_name    = get_field( 'client_name', $project->ID );
                $budget         = get_field( 'budget', $project->ID );
                $data[]         = array(
                    'id'            => $project->ID,
                    'title'         => $project->post_title,
                    'content'       => $project->post_content,
                    'status'        => $status,
                    'client_name'   => $client_name,
                    'budget'        => $budget
                );
            }
        }
        wp_send_json_success( $data );
    }
}