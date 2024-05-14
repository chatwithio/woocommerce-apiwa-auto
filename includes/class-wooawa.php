<?php
/**
 * Main plugin class.
 *
 * @package WOOAWA\Classes
 * @version 1.0.0
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WOOAWA class.
 *
 * @since 1.0.0
 */
final class WOOAWA {

	/**
	 * Instance of the class.
	 *
	 * @since 1.0.0
	 *
	 * @var WOOAWA
	 */
	protected static $instance = null;

	/**
	 * Get the instance of the class.
	 *
	 * @since 1.0.0
	 *
	 * @return WOOAWA
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cloning is forbidden.', 'wooawa' ), '1.0.0' );
	}

	/**
	 * Unserialize instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Unserialize instances of this class is forbidden.', 'wooawa' ), '1.0.0' );
	}

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->includes();
		$this->init_hooks();
	}

	/**
	 * Include required files.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function includes() {
		include_once WOOAWA_PLUGIN_PATH . '/includes/class-wooawa-install.php';
		include_once WOOAWA_PLUGIN_PATH . '/includes/class-wooawa-api.php';
		include_once WOOAWA_PLUGIN_PATH . '/includes/class-wooawa-send.php';

		if ( is_admin() ) {
			include_once WOOAWA_PLUGIN_PATH . '/includes/admin/class-wooawa-admin-settings.php';
			include_once WOOAWA_PLUGIN_PATH . '/includes/admin/class-wooawa-admin-scripts.php';
			include_once WOOAWA_PLUGIN_PATH . '/includes/admin/class-wooawa-admin-menu.php';
		}
	}

	/**
	 * Initialize hooks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init_hooks() {
		// Register activation hook.
		register_activation_hook( WOOAWA_PLUGIN_FILE, array( 'WOOAWA_Install', 'install' ) );

		// Load plugin text domain.
		$this->load_plugin_textdomain();

		// Run when plugin update.
		add_action( 'init', array( $this, 'upgrader_process_complete' ), 10 );
	}

	/**
	 * Load Localization files.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'wooawa', false, plugin_basename( dirname( WOOAWA_PLUGIN_FILE ) ) . '/languages' );
	}

	/**
	 *  This function runs when plugin update.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function upgrader_process_complete() {
		if ( get_option( 'wooawa_db_version' ) !== WOOAWA_PLUGIN_VERSION ) {
			// Run installation.
			WOOAWA_Install::install();
		}
	}
}
