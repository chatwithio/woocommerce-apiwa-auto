<?php
/**
 * Send message.
 *
 * @package WOOAWA\Classes
 * @version 1.0.0
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WOOAWA_Send class.
 *
 * @since 1.0.0
 */
class WOOAWA_Send {

	/**
	 * Class constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'woocommerce_order_status_changed', array( $this, 'send_message' ), 10, 3 );
	}

	/**
	 * Sends a message based on the order status.
	 *
	 * @since 1.0.0
	 *
	 * @param int    $order_id   The order ID.
	 * @param string $old_status The old order status.
	 * @param string $new_status The new order status.
	 *
	 * @return void
	 */
	public function send_message( $order_id, $old_status, $new_status ) {
		$order              = wc_get_order( $order_id );
		$billing_phone      = $order->get_billing_phone();
		$business_name      = get_option( 'wooawa_business_name' );
		$brand_logo_url     = get_option( 'wooawa_brand_logo_url' );
		$brand_phone_number = get_option( 'wooawa_phone_number' );
		$language_code      = get_option( 'wooawa_language' );

		if ( ! $billing_phone ) {
			return;
		}

		$phone_number = preg_replace( '/^(\+|0|00)/', '', $billing_phone );
		$message_args = array(
			'language_code' => $language_code,
			'phone_number'  => $phone_number,
			'placeholders'  => array(
				$order->get_billing_first_name(),
				$order_id,
				$business_name ? $business_name : get_bloginfo( 'name' ),
			),
			'media_url'     => esc_url( $brand_logo_url ),
			'button_param'  => sanitize_text_field( $brand_phone_number ),
		);

		WOOAWA_Api::send_message( $new_status, $message_args );
	}
}

return new WOOAWA_Send();
