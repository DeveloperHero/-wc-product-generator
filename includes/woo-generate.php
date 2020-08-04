<?php
if (!defined('ABSPATH')) {
   wp_die();
}

/**
 * Tools submenu.
 */
class WOO_Generator
{

   public function __construct()
   {
      //$this->simple_product_generator();
   }


   public function simple_product_generator()
   {
      $wc_product =  WC_Product_Simple();

      if ($_options['create_simple_products']  == 'yes') {
         $wc_product->set_name(uniqid($_options['create_products_title']));
      }
   }
}

new WOO_Generator();
