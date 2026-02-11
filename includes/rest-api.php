<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
    exit; 
}

add_action( 'rest_api_init', 'sr_projects_resr_api_program' );
if( !function_exists( 'sr_projects_resr_api_program' ) ) {
    function sr_projects_resr_api_program() {
        register_rest_route( 'sr-projects/v1', '/projects', array(
            'methods' => 'GET',
            'callback' => 'sr_get_all_projects',
        ) );
    }
    function sr_get_all_projects() {
        $projects = get_posts( array(
            'post_type' => 'projects',
            'post_per_page' => -1,
        ) );
        $response = array();
        if( !empty( $projects ) ) {
            foreach( $projects as $project ) {
                $response[] = array(
                    'id'            => $project->ID,
                    'title'         => $project->post_title,
                    'status'        => get_field( 'project_status', $project->ID ) ?: '',
                    'client_name'   => get_field( 'client_name', $project->ID ) ?: '',
                    'budget'        => get_field( 'budget', $project->ID ) ?: '',
                );
            }
        }
        return rest_ensure_response( $response );
    }
}