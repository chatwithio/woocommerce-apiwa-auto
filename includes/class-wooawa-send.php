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
		$billing_country    = $order->get_billing_country();
		$business_name      = get_option( 'wooawa_business_name' );
		$brand_logo_url     = get_option( 'wooawa_brand_logo_url' );
		$brand_phone_number = get_option( 'wooawa_phone_number' );
		$language_code      = get_option( 'wooawa_language' );

		if ( ! $billing_phone ) {
			WOOAWA_Log::order_log( $order_id, 'error', __( 'No billing phone found!', 'wooawa' ), __( 'The billing phone number is empty.', 'wooawa' ) );
			return;
		}

		if ( $billing_country ) {
			$phone_number = wooawa_get_formatted_whatsapp_number( $billing_phone, $billing_country );

			if ( is_wp_error( $phone_number ) ) {
				WOOAWA_Log::order_log( $order_id, 'error', __( 'Invalid country code!', 'wooawa' ), $phone_number->get_error_message() );
				return;
			}
		} else {
			$phone_number = $billing_phone;
		}

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

		$response = WOOAWA_Api::send_message( $new_status, $message_args );

		if ( is_wp_error( $response ) ) {
			WOOAWA_Log::order_log(
				$order_id,
				'error',
				__( 'API error!', 'wooawa' ),
				wp_kses_post(
					wp_sprintf(
						/* Translators: %1$s: Error code, %2$s: Error message */
						__( '<strong>Code:</strong> %1$s<br>%2$s', 'wooawa' ),
						$response->get_error_code(),
						$response->get_error_message()
					)
				)
			);
		} else {
			WOOAWA_Log::order_log(
				$order_id,
				'success',
				__( 'Message sent!', 'wooawa' ),
				wp_kses_post(
					wp_sprintf(
						/* Translators: %s: Phone number */
						__( 'The message has been successfully sent to %s.', 'wooawa' ),
						esc_html( $phone_number )
					)
				)
			);
		}
	}
}

return new WOOAWA_Send();
