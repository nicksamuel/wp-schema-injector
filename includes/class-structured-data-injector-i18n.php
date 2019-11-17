<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       willsamuel.co.uk
 * @since      1.0.0
 *
 * @package    Structured_Data_Injector
 * @subpackage Structured_Data_Injector/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Structured_Data_Injector
 * @subpackage Structured_Data_Injector/includes
 * @author     William Samuel <mail@willsamuel.co.uk>
 */
class Structured_Data_Injector_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'structured-data-injector',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
