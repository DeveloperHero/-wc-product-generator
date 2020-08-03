<?php

if (!defined('ABSPATH')) {
   wp_die();
}

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
   // only run if there's no other class with this name

   if (!class_exists('Wc_Product_Generator')) {

      class Wc_Product_Generator
      {
         /**
          * Initialize the plugin
          */
         public function __construct()
         {
            // add_action('init', array($this, 'init'));
            add_filter('woocommerce_settings_tabs_array', [$this, 'add_product_details'], 50);

            add_action('woocommerce_settings_product_details', [$this, 'add_product_settings'], 10);
 
            add_action('init',[$this, 'init'] );

         }

         /**
          * Create WooCommerce product
          * @return [type]
          */
         public function init()
         {
            // $this->create_woocommerce_product();
         }

       

         /**
          * Add settings tab in WooCommerce Settings
          * @param mixed $settings_tabs
          * 
          * @return $settings_tabs
          */
         public function add_product_details($settings_tabs)
         {
            $settings_tabs['product_details'] = __('Product Generator', 'wc-product-generator');

            return
               $settings_tabs;
         }

         /**
          * Add a Upload button in settings page to update the product.
          * @return 
          */
         public function add_product_settings()
         {
            woocommerce_admin_fields(self::get_settings());

            ?>
            <button type="submit" class="button-primary woocommerce-save-button" value="Upload" >Upload product</button>
            <?php 
         }

         /**
          * Add settings to settings tab
          * @return array
          */
         public static function get_settings()
         {
            $settings = array(
               'section_title' => array(
                  'name' => __('WooCommerce Product Generator', 'wc-product-generator'),
                  'type' => 'title',
                  'desc' => '',
                  'id' => 'wc_product_generator_section_title',
                  'default' => 'yes'
               ),

               'product_title' => array(
                  'name' => __('Product title', 'wc-product-generator'),
                  'type' => 'text',
                  'dir' => 'ltr',
                  'placeholder' => 'Product title',
                  'desc_tip' => __('Title of your product', 'wc-product-generator'),
                  'id' => 'wc_product_generator_product_title',
               ),

               'product_description' => array(
                  'name' => __('Product description', 'wc-product-generator'),
                  'type' => 'textarea',
                  'dir' => 'ltr',
                  'placeholder' => 'Product description',
                  'desc_tip' => __('Describe your product', 'wc-product-generator'),
                  'id' => 'wc_product_generator_product_description'
               ),

               'product_short_description' => array(
                  'name' => __('Product short description', 'wc-product-generator'),
                  'type' => 'textarea',
                  'dir' => 'ltr',
                  'placeholder' => 'Product short description',
                  'desc_tip' => __('Shortly Describe your product', 'wc-product-generator'),
                  'id' => 'wc_product_generator_product_short_description',
               ),

               'submit' => array(
                  'name' => __('submit data', 'wc-product-generator'),
                  'type' => 'button',
                  'id' => 'wc_product_generator_product_button',
               ),



               array(
                  'type' => 'sectionend',
                  'id' => 'wc_product_generator_section_end'
               )
            );
            return $settings;
         }

         
         /**
          * Create WooCommerce product on initialize.
          * @return 
          */
         public function create_woocommerce_product()
         {
            $settings = self::get_settings();
            $wc_product = new WC_Product_Simple();

            $wc_product->set_name(uniqid($settings['product_title']));


            $wc_product->set_description(uniqid($settings['product_description']));

            $wc_product->set_short_description(uniqid($settings['product_short_description']));
            $wc_product->set_slug(uniqid());
            $wc_product->save();
         }
      }

      $GLOBALS['wc_product_generator'] = new Wc_Product_Generator();
   }
}
