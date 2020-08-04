<form method="post" action="<?php echo admin_url('tools.php?page=woofaker-product-generator'); ?>">

	<!-- define form fields -->
	<table class="form-table">
		<tbody>
			<tr class="row">
				<th scope="row">
					<label for="product_title">
						<?php _e('Prodct title', 'woofaker'); ?>
					</label>
				</th>
				<td>
					<input type="text" name="name" id="name" class="regular-text" value="">
				</td>
			</tr>

			<tr class="row">
				<th scope="row">
					<label for="product_type">
						<?php _e('Prodct type', 'woofaker'); ?>
					</label>
				</th>
				<td>
					<input type="checkbox" name="create_simple_products" id="create_simple_products" class="regular-text" value="create_simple_products">
					<?php _e('Simple product' , 'woofaker') ; ?>
					<br>

					<input type="checkbox" name="create_variable_products" id="create_variable_products" class="regular-text" value="create_variable_products">
					<?php _e('Variable product' , 'woofaker') ; ?>
					<br>

					<input type="checkbox" name="create_grouped_products" id="create_grouped_products" class="regular-text" value="create_grouped_products">
					<?php _e('Grouped product' , 'woofaker') ; ?>
					<br>

					<input type="checkbox" name="create_external_products" id="create_external_products" class="regular-text" value="create_external_products">
					<?php _e('External product' , 'woofaker') ; ?>
					<br>
				</td>
			</tr>

			<tr class="row">
				<th scope="row">
					<label for="name">
					<?php _e('Random Image on Product' , 'woofaker') ; ?>
					</label>
				</th>
				<td>
				<input type="checkbox" name="add_random_images" id="add_random_images" class="regular-text" value="add_random_images">
					<?php _e('Yes' , 'woofaker') ; ?>
					<br>

					<input type="checkbox" name="" id="" class="regular-text" value="">
					<?php _e('No' , 'woofaker') ; ?>
					<br>

				</td>
			</tr>
	</table>

	<?php wp_nonce_field('woofaker_submit_product_gen'); ?>
	<?php submit_button(__('Submit', 'woofaker'), 'primary', 'submit_button');
	echo '<pre>';
	print_r(get_option('__woofaker_options'));
	echo '</pre>';

	?>


</form>