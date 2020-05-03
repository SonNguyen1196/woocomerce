<?php
/*
Plugin Name: E Shopper Contact
Description: Used by millions, Akismet is quite possibly the best way in the world to <strong>protect your blog from spam</strong>. It keeps your site protected even while you sleep. To get started: activate the Akismet plugin and then go to your Akismet Settings page to set up your API key.
Version: 0.1
Text Domain: e-shopper-contact
*/


// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

define( 'E_SHOPPER_VERSION', '0.1' );
define( 'E_SHOPPER_WP_VERSION', '4.0' );
define( 'E_SHOPPER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require E_SHOPPER_PLUGIN_DIR . 'class/class.eshopper-init.php';


register_activation_hook( __FILE__, array( 'Eshopper', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'Eshopper', 'plugin_deactivation'));

add_action( 'plugins_loaded', array( 'Eshopper', 'init' ) );
//add_action( 'admin_menu', array( 'Eshopper', 'addOptionPage' ) );


//function addOptionPage(){
//    add_menu_page(
//        __( 'E-Shopper Contact', 'e-shopper-contact' ),
//        'Contact E-Shopper',
//        'manage_options',
//        'e-shopper-contact',
//        'admin_page_contact_setting',
//        'dashicons-format-chat',
//        6
//    );
//}
//
//add_action( 'admin_menu', 'addOptionPage' );
//
//
//function admin_page_contact_setting() {
//    if ( !current_user_can( 'manage_options' ) )  {
//        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
//    }
//}