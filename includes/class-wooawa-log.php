<?php
/**
 * Logs.
 *
 * @package WOOAWA\Classes
 * @version 1.0.0
 * @since 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class WOOAWA_Log
 *
 * This class handles logging functionality for the Wooawa plugin.
 */
class WOOAWA_Log {

	/**
	 * Logs a message to the database.
	 *
	 * @param string $type    The type of log.
	 * @param string $subject The subject of the log.
	 * @param mixed  $log     The log message.
	 */
	public static function log( $type, $subject, $log ) {
		global $wpdb;

		$wpdb->insert(
			$wpdb->prefix . 'WOOAWA_logs',
			array(
				'type'       => sanitize_key( $type ),
				'subject'    => sanitize_text_field( $subject ),
				'log'        => maybe_serialize( $log ),
				'created_at' => current_time( 'mysql' ),
			)
		);
	}

	/**
	 * Logs an order-related message to the database.
	 *
	 * @param int    $order_id The ID of the order.
	 * @param string $type     The type of log.
	 * @param string $subject  The subject of the log.
	 * @param mixed  $log      The log message.
	 */
	public static function order_log( $order_id, $type, $subject, $log ) {
		$log = sprintf(
			'<strong>%s</strong> <a href="%s">#%s</a><br>%s',
			esc_html__( 'Order ID:', 'wooawa' ),
			esc_url( admin_url( 'post.php?post=' . absint( $order_id ) . '&action=edit' ) ),
			absint( $order_id ),
			$log
		);

		self::log( $type, $subject, $log );
	}
}
