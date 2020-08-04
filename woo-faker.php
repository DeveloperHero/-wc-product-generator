<?php

/**
 * WooFaker
 *
 * @package           WooFaker
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

final class WooFaker_Main
{
	/**
	 * Object instance
	 */
	protected static $_instance = null;

	/**
	 * Constructor
	 **/
	private function __construct()
	{
		if ($this->check_woo_active() === false) {
			return;
		}

		$this->define_constants();
		$this->include_required_classes();
	}

	/**
	 * Get instance
	 */
	public static function instance()
	{
		if (self::$_instance == null) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * define constants
	 */
	public function define_constants()
	{
		define('WOOFAKER_VERSION', '1.0');
		define('WOOFAKER_PATH', plugin_dir_url(__FILE__));
		define('WOOFAKER_ASSETS', WOOFAKER_PATH . '/assets');
	}

	/**
	 * Include required classes.
	 */
	public function include_required_classes()
	{
		// require_once 'includes/woo-options.php';
		require_once 'includes/woo-menu.php';
		require_once 'includes/woo-assets.php';
		require_once 'includes/woo-generate.php';
	}

	public function check_woo_active()
	{
		return (bool) in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')));
	}
}


/**
 * Get an instance of the main class.
 */
function WooFaker()
{
	return WooFaker_Main::instance();
}

// Global for backwards compatibility.
$GLOBALS['WooFaker'] = WooFaker();
