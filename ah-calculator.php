<?php



/**

 * Plugin Name: AH Calculator

 * Description: Calculator With Info Save Functionality: Use [agencyheight-calculator-form] shortcode to display the calculator

 * Version: 1.0.0

 * Text Domain: calculator

 * Author: Renegade Insurance

 */




/**
 * Register the "book" custom post type
 */
function calculator_before_setup() {
   
define('CALCULATOR_PLUGIN_PATH', plugin_dir_path(__FILE__));

define('CALCULATOR_PLUGIN_URL', plugin_dir_url(__FILE__));



/* Admin View */

include(CALCULATOR_PLUGIN_PATH . '/includes/admin/class-calculator-admin.php');

/* Front End View */

include(CALCULATOR_PLUGIN_PATH . '/includes/frontend/class-calculator-frontend.php');



} 
add_action( 'plugins_loaded', 'calculator_before_setup' );

/**
 * Activate the plugin.
 */
function calculator_create_directory() { 
    // Trigger our function that registers the custom post type plugin.
    calculator_before_setup(); 
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules(); 
}

/* Create directory after plugin activation*/

register_activation_hook(__FILE__, 'calculator_create_directory');

