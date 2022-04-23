<?php 
/**
 * Plugin Name: S&F Pro Accordion
 * Description: Accordion feature for S&F Pro checkboxes
 * Plugin URI: https://github.com/krishneup/search-filter-pro-accordion/
 * Version:     1.0.0
 * Author:      Krishna Neupane
 * Author URI:  https://twitter.com/krishneup
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function sfpro_accordion_load_js_file(){

	 wp_enqueue_script( 'sfpro-accordion-js', plugins_url( '/sfpro-accordion.js', __FILE__ ), 'jQuery', '1.0', true);

}


add_action('wp_enqueue_scripts','sfpro_accordion_load_js_file', 999);