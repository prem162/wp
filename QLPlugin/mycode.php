<?php
/*
Plugin Name: test short code
Plugin URI: 
Description: This plugin adds a custom widget.
Version: 1.0
Author:Qurati Lab
Author URI: 
License: GPL2
*/

define( 'QL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
require_once( plugin_dir_path( __FILE__ ) . 'ql-shortcode.php' );


function wptuts_scripts_basic()
{
	wp_deregister_script( 'axios_script' );
	wp_deregister_script( 'ql_script' );
	wp_deregister_style( 'ql_style' );

	wp_register_script( 'axios_script','https://unpkg.com/axios/dist/axios.min.js' );
    wp_register_script( 'ql_script', plugins_url( '/js/qljs.js', __FILE__ ) );
	wp_register_style( 'ql_style', plugins_url( '/css/qlcss.css', __FILE__ ) );
    
    wp_enqueue_script( 'axios_script' );
	wp_enqueue_script( 'ql_script' );
	wp_enqueue_style( 'ql_style' );
}
add_action( 'wp_enqueue_scripts', 'wptuts_scripts_basic' );