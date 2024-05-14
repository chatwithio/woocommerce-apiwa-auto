<?php
/**
 * Install class.
 *
 * @package WOOAWA\Classes
 * @version 1.0.0
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WOOAWA_Install class.
 *
 * @since 1.0.0
 */
class WOOAWA_Install {

	/**
	 * Install the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function install() {
		self::add_settings();

		// Update current version.
		update_option( 'wooawa_db_version', WOOAWA_PLUGIN_VERSION );
	}

	/**
	 * Add plugin settings.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function add_settings() {
		add_option( 'wooawa_business_name', get_bloginfo( 'name' ) );
		add_option( 'wooawa_phone_number', '' );
		add_option( 'wooawa_language', 'en' );
		add_option( 'wooawa_template_order_statuses', array( 'wc-pending', 'wc-processing', 'wc-on-hold', 'wc-completed', 'wc-cancelled', 'wc-refunded', 'wc-failed' ) );
	}
}
