<?php
/**
 * WooCommerce APIWA AUTO
 *
 * @package WOOAWA
 *
 * @wordpress-plugin
 * Plugin Name:       WooCommerce APIWA AUTO
 * Plugin URI:        #
 * Description:       This plugin is a WooCommerce APIWA AUTO
 * Version:           1.1.0
 * Requires at least: 5.0
 * Requires PHP:      5.6
 * Author:            tochat.be
 * Author URI:        https://tochat.be/
 * Text Domain:       wooawa
 * License:           GPL v2 or later
 * Domain Path:       /languages/
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Constants.
define( 'WOOAWA_PLUGIN_FILE', __FILE__ );
define( 'WOOAWA_PLUGIN_PATH', untrailingslashit( plugin_dir_path( WOOAWA_PLUGIN_FILE ) ) );
define( 'WOOAWA_PLUGIN_URL', untrailingslashit( plugin_dir_url( WOOAWA_PLUGIN_FILE ) ) );
define( 'WOOAWA_PLUGIN_VERSION', '1.1.0' );

// Include the main plugin class.
if ( ! class_exists( 'WOOAWA' ) ) {
	include_once WOOAWA_PLUGIN_PATH . '/includes/class-wooawa.php';
}

/**
 * Main instance of WOOAWA.
 *
 * Returns the main instance of WOOAWA to prevent the need to use globals.
 *
 * @since  1.0.0
 *
 * @return WOOAWA
 */
function wooawa() {
	return WOOAWA::instance();
}

// Global for backwards compatibility.
$GLOBALS['wooawa'] = wooawa();
