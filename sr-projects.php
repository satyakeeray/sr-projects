<?php
/*
Plugin Name: SR Projects
Plugin URI: https://github.com/satyakeeray/sr-projects
Description: A plugin to manage projects and display them on the front end.
Version: 1.0
Author: Satyakee Ray
Author URI: 
License: GPL2
*/

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
    exit; 
}

include_once plugin_dir_path( __FILE__ ) . '/includes/custom-post-type.php';
include_once plugin_dir_path( __FILE__ ) . '/includes/load-assets.php';
include_once plugin_dir_path( __FILE__ ) . '/includes/shortcodes.php';
include_once plugin_dir_path( __FILE__ ) . '/includes/ajax.php';
include_once plugin_dir_path( __FILE__ ) . '/includes/rest-api.php';
//include_once plugin_dir_path( __FILE__ ) . '/includes/admin-page.php';
