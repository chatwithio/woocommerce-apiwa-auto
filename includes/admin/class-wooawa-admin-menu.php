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

		$hook = add_submenu_page(
			'wooawa',
			__( 'Logs', 'wooawa' ),
			__( 'Logs', 'wooawa' ),
			'manage_options',
			'wooawa-logs',
			array( $this, 'admin_logs_page' )
		);

		add_action( 'load-' . $hook, array( $this, 'load_logs_page' ) );
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

	/**
	 * Admin logs page.
	 *
	 * @since 1.1.0
	 *
	 * @return void
	 */
	public function admin_logs_page() {
		require_once WOOAWA_PLUGIN_PATH . '/includes/admin/views/html-admin-logs.php';
	}

	/**
	 * Load logs page.
	 *
	 * @since 1.1.0
	 *
	 * @return void
	 */
	public function load_logs_page() {
		add_screen_option(
			'per_page',
			array(
				'label'   => esc_html__( 'Logs per page:', 'wooawa' ),
				'default' => 40,
				'option'  => 'wooawa_logs_per_page',
			)
		);

		new WOOAWA_Admin_Log_Table();
	}
}

return new WOOAWA_Admin_Menu();
