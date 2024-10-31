<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       muizzit.com/porosh-bio
 * @since      1.0.0
 *
 * @package    Mz_Newsticker
 * @subpackage Mz_Newsticker/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Mz_Newsticker
 * @subpackage Mz_Newsticker/includes
 * @author     Porosh Ahammed <porosh.ahammed@gmail.com>
 */
class Mz_Newsticker_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'mz-newsticker',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
