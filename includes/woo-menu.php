<?php

if (!defined('ABSPATH')) {
	wp_die();
}

/**
 * Tools submenu.
 */
class WOO_Faker_Menu
{
	public $errors = [];
	public function __construct()
	{
		add_action('init', array($this, 'init'));
	}

	public function init()
	{
		add_action('admin_menu', array($this, 'add_submenu'));
	}

	public function add_submenu()
	{
		$hook = add_submenu_page('tools.php', 'WooFaker Product Generator', 'WooFaker Product Generator', 'manage_options', 'woofaker-product-generator', array($this, 'menu_hook'), PHP_INT_MAX);
		add_action('load-' . $hook, array($this, 'handle_form_submit'));
	}

	public function menu_hook()
	{
		require_once dirname(dirname(__FILE__)) . '/templates/form.php';
	}

	public function handle_form_submit()
	{
		if (empty($_POST['submit_button'])) {
			return;
		}

		if ( ! wp_verify_nonce($_POST['_wpnonce'], 'woofaker_submit_product_gen') ) {
			wp_die('You are not authorized to access this page.');
		}

		update_option('__woofaker_options', array(
			'create_products_title' 	=> esc_attr($_POST['create_products_title']),
			'create_simple_products' 	=> esc_attr($_POST['create_simple_products']),
			'create_variable_products'  => esc_attr($_POST['create_variable_products']),
			'create_grouped_products'   => esc_attr($_POST['create_grouped_products']),
			'create_external_products'  => esc_attr($_POST['create_external_products']),
			'add_random_images'    	    => esc_attr($_POST['add_random_images']),
		));

		$product_title    = isset($_POST['create_products_title']) ? sanitize_text_field($_POST['create_products_title']) : '';


		$simple  = isset($_POST['create_simple_products']) ? sanitize_text_field($_POST['create_simple_products']) : '';
		$variable = isset($_POST['create_variable_products']) ? sanitize_text_field($_POST['create_variable_products']) : '';
		$grouped = isset($_POST['create_grouped_products']) ? sanitize_textarea_field($_POST['create_grouped_products']) : '';
		$external = isset($_POST['create_external_products']) ? sanitize_text_field($_POST['create_external_products']) : '';

		if (empty($simple) && empty($variable) && empty($grouped) && empty($external)) {
			$this->errors['product_type'] = __('Please select a product type', 'woofaker');
		}

		if (empty($product_title)) {
			$this->errors['product_title'] = __('Please provide a product title', 'woofaker');
		}
	}
}

new WOO_Faker_Menu();
