<?php
/*
Plugin Name: WP Ek Health Check
Description: A plugin returns version of WP.
Version: 1.0
Author: eKreative
Author URI:  https://www.ekreative.com
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

add_action( 'parse_request', 'wpversion_parse_request' );
function wpversion_parse_request( &$wp )
{
    if ( in_array( 'healthcheck', $wp->query_vars, TRUE ) ) {
        global $wpdb;
        header("Cache-Control: no-cache");
        header("Content-type: application/json");
        echo json_encode(['app' => true, 'database' => $wpdb->check_connection(), 'version' => get_bloginfo( 'version'), 'framework' => 'Wordpress']);
        exit();
    }
    return;
}