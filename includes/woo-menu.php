<?php

if (!defined('ABSPATH')) {
   wp_die();
}

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
   // only run if there's no other class with this name

   if (!class_exists('Woo_Menu')) {

      class Woo_Menu
      {
         /**
          * 
          */
          public function __construct()
          {
             add_action( 'admin_menu',[$this, 'woo_admin_menu']);
          }

          public function woo_admin_menu() {
             add_menu_page(
                 __('Basic Settings','woofaker'),
                 __('Basic Settings','woofaker'), 'manage_options', 
             'woofaker', 
             [$this, 'setting_page'], 
             'dashicons-album'
          );

          }

         public function setting_page() {
            ?>
		<h1 class="wp-heading-inline">Hello World</h1>
		 <?php
         }
      }

      $GLOBALS['woo_menu'] = new Woo_Menu();
   }
}
