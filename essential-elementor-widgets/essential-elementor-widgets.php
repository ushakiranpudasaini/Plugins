<?php
/**
 * Plugin Name: Essential Elementor Widgets
 * Description: This is a custom widgets plugin for WordPress.
 * Version: 1.0
 * Author: Your Name
 * Text Domain: essential-elementor-widget
 */



// Your plugin code goes here
if (!defined('ABSPATH')) {
    exit;
} // this is for security-no one can access plugin files directly

/**
 * Register Widgets.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_essential_custom_widgets( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/card-widget.php' );
	require_once( __DIR__ . '/widgets/grid-widget.php' );

	//$widgets_manager->register( new \Essential_Elementor_Card_Widget() );
	  $widgets_manager->register( new \Monalgrid_Elementor_Card_Widget() );
 
}
add_action( 'elementor/widgets/register', 'register_essential_custom_widgets' );
