<?php
/**
 * Admin settings class.
 *
 * @package WOOAWA\Admin
 * @version 1.0.0
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WOOAWA_Admin_Settings class.
 *
 * @since 1.0.0
 */
class WOOAWA_Admin_Settings {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'register_settings' ) );
	}

	/**
	 * Register settings.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function register_settings() {
		register_setting( 'wooawa_option_group', 'wooawa_business_name', 'sanitize_text_field' );
		register_setting( 'wooawa_option_group', 'wooawa_phone_number', 'sanitize_text_field' );
		register_setting( 'wooawa_option_group', 'wooawa_language', 'sanitize_text_field' );
		register_setting( 'wooawa_option_group', 'wooawa_brand_logo_url', 'esc_url_raw' );
		register_setting(
			'wooawa_option_group',
			'wooawa_template_order_statuses',
			function ( $input ) {
				return array_map( 'sanitize_key', (array) $input );
			} 
		);
	}
}

return new WOOAWA_Admin_Settings();
