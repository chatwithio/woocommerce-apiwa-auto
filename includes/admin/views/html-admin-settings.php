<?php
/**
 * Admin View: Settings page.
 *
 * @package WOOAWA\Admin
 *
 * @version 1.0.0
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><div class="wrap">
	<h1><?php esc_html_e( 'WooCommerce APIWA AUTO', 'wooawa' ); ?></h1>
	<?php settings_errors(); ?>
	<hr />

	<form action="options.php" method="post">
		<?php settings_fields( 'wooawa_option_group' ); ?>

		<table class="form-table">

			<tr>
				<th scope="row">
					<label><?php esc_html_e( 'Business Name', 'wooawa' ); ?> <sup style="color: #d50000;">*</sup></label>
				</th>
				<td>
					<input type="text" name="wooawa_business_name" value="<?php echo esc_attr( get_option( 'wooawa_business_name' ) ); ?>" class="regular-text" required />
					<p class="description"><?php esc_html_e( 'Enter your business name.', 'wooawa' ); ?></p>
					<p class="description">
					<?php
					echo wp_kses_post(
						wp_sprintf(
							/* translators: %s: code */
							__( '%s will be replaced by brand name in the templates.', 'wooawa' ),
							'<code>{{3}}</code>'
						)
					);
					?>
					</p>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label><?php esc_html_e( 'Phone Number', 'wooawa' ); ?> <sup style="color: #d50000;">*</sup></label>
				</th>
				<td>
					<input type="tel" name="wooawa_phone_number" value="<?php echo esc_attr( get_option( 'wooawa_phone_number' ) ); ?>" class="regular-text" pattern="[0-9]+" title="<?php esc_attr_e( 'Only numbers allowed', 'wooawa' ); ?>" required />
					<p class="description"><?php esc_html_e( 'Please add your phone number with country code but no + sign. This number will be include in the templates for contact.', 'wooawa' ); ?></p>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label><?php esc_html_e( 'Language', 'wooawa' ); ?> <sup style="color: #d50000;">*</sup></label>
				</th>
				<td>
					<select name="wooawa_language">
						<option value="en" <?php selected( 'en', get_option( 'wooawa_language' ) ); ?>><?php esc_html_e( 'English', 'wooawa' ); ?></option>
						<option value="fr" <?php selected( 'fr', get_option( 'wooawa_language' ) ); ?>><?php esc_html_e( 'France', 'wooawa' ); ?></option>
						<option value="es" <?php selected( 'es', get_option( 'wooawa_language' ) ); ?>><?php esc_html_e( 'Spanish', 'wooawa' ); ?></option>
						<option value="pt" <?php selected( 'pt', get_option( 'wooawa_language' ) ); ?>><?php esc_html_e( 'Portuguese', 'wooawa' ); ?></option>
					</select>
					<p class="description"><?php esc_html_e( 'Select the template language.', 'wooawa' ); ?></p>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label><?php esc_html_e( 'Brand Logo', 'wooawa' ); ?> <sup style="color: #d50000;">*</sup></label>
				</th>
				<td>
					<div class="wooawa-upload-file">
						<input type="text" class="regular-text " name="wooawa_brand_logo_url" value="<?php echo esc_url( get_option( 'wooawa_brand_logo_url' ) ); ?>">
						<input type="button" class="button" value="<?php esc_attr_e( 'Upload File', 'wooawa' ); ?>">
					</div>
					<p class="description"><?php esc_html_e( 'Select your brand logo. Best size is 200x200 pixels.', 'wooawa' ); ?></p>
					<p class="description"><?php esc_html_e( 'Image size should not be more than 5MB.', 'wooawa' ); ?></p>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label><?php esc_html_e( 'Templates', 'wooawa' ); ?></label>
				</th>
				<td>
					<fieldset class="wooawa-template-selector">
						<?php
							$order_statuses = array(
								'wc-pending'    => _x( 'Pending payment', 'Order status', 'wooawa' ),
								'wc-processing' => _x( 'Processing', 'Order status', 'wooawa' ),
								'wc-on-hold'    => _x( 'On hold', 'Order status', 'wooawa' ),
								'wc-completed'  => _x( 'Completed', 'Order status', 'wooawa' ),
								'wc-cancelled'  => _x( 'Cancelled', 'Order status', 'wooawa' ),
								'wc-refunded'   => _x( 'Refunded', 'Order status', 'wooawa' ),
								'wc-failed'     => _x( 'Failed', 'Order status', 'wooawa' ),
							);

							foreach ( $order_statuses as $order_status_key => $order_statuse ) {
								?>
								<label>
									<p><input type="checkbox" name="wooawa_template_order_statuses[]" value="<?php echo esc_attr( $order_status_key ); ?>" <?php checked( in_array( $order_status_key, (array) get_option( 'wooawa_template_order_statuses', array() ) ) ); ?>> <span><?php echo esc_html( $order_statuse ); ?></span></p>
									<div class="wooawa-preview-message" data-wooawa-template="<?php echo esc_attr( $order_status_key ); ?>"></div>
								</label>
								<?php
							}
							?>
					</fieldset>
				</td>
			</tr>

		</table>

		<p><?php echo wp_kses_post( '<strong>Note: </strong> For this plugin to work, you need to have your customer`s phone number with the country code. This is mandatory.', 'wooawa' ); ?></p>

		<?php submit_button(); ?>

	</form>

</div>
