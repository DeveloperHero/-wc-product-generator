<form method="post" action="<?php echo admin_url('tools.php?page=woofaker-product-generator'); ?>"> 
	<?php wp_nonce_field( 'woofaker_submit_product_gen' ); ?>
	<!-- define form fields -->
	<?php submit_button(); ?>
</form>
