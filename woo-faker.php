<?php

/**
 * WooFaker
 *
 * @package           PluginPackage
 * @author            MD IMTIAZ
 * @copyright         2020 MD IMTIAZ  
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       WooFaker
 * Plugin URI:        https://wpmaestro.net/AA-WooCommerce
 * Description:       Create WooCommerce dummy products.
 * Version:           1.0
 * Requires at least: 5.3
 * Requires PHP:      7.2
 * Author:            MD IMTIAZ
 * Author URI:        https://wpmaestro.net
 * Text Domain:       woofaker
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

final WooFaker_Main {
	/**
	 * Object instance 
	 */
	private $_instance = null;

	/**
	 * Constructor
	 **/
	private function __construct() {

	}

	/**
	 * Get instance
	 */
	public static function instance() {
		if ( self::_instance == null ) {
			self::_instance = new self;
		}

		return self::_instance;
	}

	/**
	 * define constants
	 */
	public function define_constants() {

	}

	/**
	 * Include required classes. 
	*/
	public function include_required_classes() {

	}
}


/**
 * Get an instance of the main class.
 */
function WooFaker() {
	return WooFaker_Main::instance();
}

// Global for backwards compatibility.
$GLOBALS['WooFaker'] = WooFaker();