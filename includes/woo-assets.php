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
	}

	public function init() {

	}
}

new WOO_Faker_Assets();
