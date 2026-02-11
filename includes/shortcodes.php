<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
    exit; 
}

add_shortcode( 'sr_projects', 'sr_projects_shortcode' );
if( !function_exists( 'sr_projects_shortcode' ) ) {
    function sr_projects_shortcode( $atts ) {
        ob_start();
        ?>
        <button id="load-projects-button">Load Active Projects</button>
        <div id="projects-container"></div>
        <?php
        return ob_get_clean();
    }
}
