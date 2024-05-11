<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://the-gujarati.free.nf
 * @since      1.0.0
 *
 * @package    Rendering_List_Gtc
 * @subpackage Rendering_List_Gtc/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Rendering_List_Gtc
 * @subpackage Rendering_List_Gtc/includes
 * @author     Parth Dodiya <parthdodiya.dodiya@gmail.com>
 */
class Rendering_List_Gtc_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'rendering-list-gtc',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
