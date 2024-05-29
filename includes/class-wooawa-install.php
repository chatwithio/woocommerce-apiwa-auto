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
		self::create_tables();
		self::add_settings();

		// Update current version.
		update_option( 'wooawa_db_version', WOOAWA_PLUGIN_VERSION );
	}

	/**
	 * Create plugin tables.
	 *
	 * @since 1.1.0
	 *
	 * @return void
	 */
	public static function create_tables() {
		global $wpdb;

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		$tables          = array();
		$charset_collate = $wpdb->get_charset_collate();

		$tables['wooawa_logs'] = "CREATE TABLE {$wpdb->prefix}wooawa_logs (
			`id` BIGINT NOT NULL AUTO_INCREMENT ,
			`type` VARCHAR(32) NULL DEFAULT NULL ,
			`subject` VARCHAR(255) NULL DEFAULT NULL ,
			`log` LONGTEXT NULL DEFAULT NULL ,
			`created_at` DATETIME NULL DEFAULT NULL ,
			PRIMARY KEY (`id`)
		) $charset_collate;";

		// phpcs:disable WordPress.DB
		foreach ( $tables as $table => $sql ) {
			if ( ! $wpdb->get_var( "SHOW TABLES LIKE '{$wpdb->prefix}{$table}'" ) ) {
				dbDelta( $sql );
			}
		}
		// phpcs:enable
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
