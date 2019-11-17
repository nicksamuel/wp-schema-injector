<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              willsamuel.co.uk
 * @since             1.0.0
 * @package           Structured_Data_Injector
 *
 * @wordpress-plugin
 * Plugin Name:       Structured Data Injector
 * Plugin URI:        willsamuel.co.uk
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            William Samuel
 * Author URI:        willsamuel.co.uk
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       structured-data-injector
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
define( 'STRUCTURED_DATA_INJECTOR_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-structured-data-injector-activator.php
 */
function activate_structured_data_injector() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-structured-data-injector-activator.php';
	Structured_Data_Injector_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-structured-data-injector-deactivator.php
 */
function deactivate_structured_data_injector() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-structured-data-injector-deactivator.php';
	Structured_Data_Injector_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_structured_data_injector' );
register_deactivation_hook( __FILE__, 'deactivate_structured_data_injector' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-structured-data-injector.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_structured_data_injector() {

	$plugin = new Structured_Data_Injector();
	$plugin->run();

}
run_structured_data_injector();
