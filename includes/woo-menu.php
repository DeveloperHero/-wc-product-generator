<?php

if ( ! defined( 'ABSPATH' ) ) {
	wp_die();
}

/**
 * Tools submenu.
 */
class WOO_Faker_Menu {
	public function __construct() {
		add_action( 'init', array( $this, 'init' ) );
	}

	public function init() {
		add_action( 'admin_menu', array( $this, 'add_submenu' ) );
	}

	public function add_submenu() {
		$hook = add_submenu_page( 'tools.php', 'WooFaker Product Generator', 'WooFaker Product Generator', 'manage_options', 'woofaker-product-generator', array( $this, 'menu_hook' ), PHP_INT_MAX );
		add_action( 'load-' . $hook, array( $this, 'handle_form_submit' ) );
	}

	public function menu_hook() {
		require_once dirname( dirname( __FILE__ ) ) . '/templates/form.php';
	}

	public function handle_form_submit() {
		if ( empty( $_POST['submit']) ) {
			return;
		}

		if ( ! wp_verify_nonce($_POST['_wpnonce'], 'woofaker_submit_product_gen') ) {
			wp_die('You are not authorized to access this page.');
		}

		update_option( '__woofaker_options', array(
			'create_simple_products' 	=> esc_attr( $_POST['create_simple_products'] ),
			'create_variable_products'  => esc_attr( $_POST['create_variable_products'] ),
			'create_grouped_products'   => esc_attr( $_POST['create_grouped_products'] ),
			'create_external_products'  => esc_attr( $_POST['create_external_products'] ),
			'add_random_images'    	    => esc_attr( $_POST['add_random_images'] ),
		));
	}
}

new WOO_Faker_Menu();
