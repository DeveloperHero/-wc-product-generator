<?php

if ( ! defined( 'ABSPATH' ) ) {
	wp_die();
}

/**
 * Tools submenu.
 */
class WOO_Faker_Assets {
	public function __construct() {
		add_action( 'init', array( $this, 'init' ) );
		
		 add_action( 'admin_enqueue_scripts', [ $this, 'woofaker_enqueue_script' ] );
	}

	public function init() {

	}

	public function woofaker_enqueue_script() {
		wp_enqueue_script( 'woofaker' , WOOFAKER_ASSETS . '/main.js' );

		wp_enqueue_style( 'woofaker' , WOOFAKER_ASSETS . '/style.css' );
	}
}

new WOO_Faker_Assets();
