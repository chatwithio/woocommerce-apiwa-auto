<?php
/**
 * Admin menu class.
 *
 * @package WOOAWA\Admin
 * @version 1.0.0
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WOOAWA_Admin_Menu class.
 *
 * @since 1.0.0
 */
class WOOAWA_Admin_Menu {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_menu' ) );
	}

	/**
	 * Add admin menu.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function add_menu() {
		add_menu_page(
			__( 'API WA Auto', 'wooawa' ),
			__( 'API WA Auto', 'wooawa' ),
			'manage_options',
			'wooawa',
			array( $this, 'admin_settings_page' ),
			'dashicons-whatsapp',
			58.9
		);
	}

	/**
	 * Admin settings page.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function admin_settings_page() {
		require_once WOOAWA_PLUGIN_PATH . '/includes/admin/views/html-admin-settings.php';
	}
}

return new WOOAWA_Admin_Menu();
