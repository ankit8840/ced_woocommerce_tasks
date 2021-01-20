<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://cedcoss.com/
 * @since             1.0.0
 * @package           Ced_woo_updation
 *
 * @wordpress-plugin
 * Plugin Name:       ced_woo_updation
 * Plugin URI:        www.cedcoss.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            cedcoss
 * Author URI:        https://cedcoss.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ced_woo_updation
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CED_WOO_UPDATION_VERSION', '1.0.0' );
define('PLUGIN_DIR_PATH',plugin_dir_path(__FILE__));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ced_woo_updation-activator.php
 */
function activate_ced_woo_updation() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ced_woo_updation-activator.php';
	Ced_woo_updation_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ced_woo_updation-deactivator.php
 */
function deactivate_ced_woo_updation() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ced_woo_updation-deactivator.php';
	Ced_woo_updation_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ced_woo_updation' );
register_deactivation_hook( __FILE__, 'deactivate_ced_woo_updation' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ced_woo_updation.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ced_woo_updation() {

	$plugin = new Ced_woo_updation();
	$plugin->run();

}
run_ced_woo_updation();
