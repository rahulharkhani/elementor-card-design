<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://thatpeoples.com/
 * @since      1.0.0
 *
 * @package    Elementor_Card_Design
 * @subpackage Elementor_Card_Design/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Elementor_Card_Design
 * @subpackage Elementor_Card_Design/includes
 * @author     Rahul Harkhani <rahul.harkhani11@gmail.com>
 */
class Elementor_Card_Design_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'elementor-card-design',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
