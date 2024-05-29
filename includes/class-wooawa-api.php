<?php
/**
 * WAAPI API class.
 *
 * @package WOOAWA\Classes
 * @version 1.0.0
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WOOAWA_Api class.
 *
 * @since 1.0.0
 */
class WOOAWA_Api {

	/**
	 * The API URL for sending template messages.
	 *
	 * This constant defines the URL for sending template messages using the WooCommerce API.
	 * It is set to 'https://woo.tochat.be/send-template-message'.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	const API_URL = 'https://woo.tochat.be/send-template-message';

	/**
	 * Sends a message based on the order status.
	 *
	 * @since 1.0.0
	 *
	 * @param string $order_status The order status.
	 * @param array  $args         Additional arguments for the message.
	 *
	 * @return array|WP_Error The response from the API, or a WP_Error object on failure.
	 */
	public static function send_message( $order_status, $args ) {
		$template = '';
		if ( 'pending' === $order_status ) {
			$template = 'wo_pending_payment_22_04_24';
		} elseif ( 'processing' === $order_status ) {
			$template = 'wo_processing_22_04_24';
		} elseif ( 'on-hold' === $order_status ) {
			$template = 'wo_on_hold_22_04_24';
		} elseif ( 'completed' === $order_status ) {
			$template = 'wo_completed_22_04_24';
		} elseif ( 'cancelled' === $order_status ) {
			$template = 'wo_cancelled_22_04_24';
		} elseif ( 'refunded' === $order_status ) {
			$template = 'wo_refunded_22_04_24';
		} elseif ( 'failed' === $order_status ) {
			$template = 'wo_failed_22_04_24';
		}

		if ( ! $template ) {
			return new WP_Error(
				'invalid_order_status',
				wp_kses_post(
					wp_sprintf(
						/* Translators: %s: Order status */
						__( '%s: Order status not found in API templates.', 'wooawa' ),
						$order_status
					)
				)
			);
		}

		$language_code = isset( $args['language_code'] ) ? $args['language_code'] : 'en';
		$phone_number  = isset( $args['phone_number'] ) ? $args['phone_number'] : '';
		$media_url     = isset( $args['media_url'] ) ? $args['media_url'] : '';
		$button_param  = isset( $args['button_param'] ) ? $args['button_param'] : '';

		$placeholders    = array();
		$placeholders[0] = isset( $args['placeholders'][0] ) ? strval( $args['placeholders'][0] ) : '';
		$placeholders[1] = isset( $args['placeholders'][1] ) ? strval( $args['placeholders'][1] ) : '';
		$placeholders[2] = isset( $args['placeholders'][2] ) ? strval( $args['placeholders'][2] ) : '';

		$post_body_args = array(
			'template_name' => $template,
			'language_code' => $language_code,
			'phone_number'  => $phone_number,
			'placeholders'  => $placeholders,
			'media_url'     => $media_url,
			'button_param'  => $button_param,
		);

		$response = wp_remote_post(
			self::API_URL,
			array(
				'body'      => wp_json_encode( $post_body_args ),
				'sslverify' => false,
				'timeout'   => 10,
				'headers'   => array(
					'Content-Type' => 'application/json',
				),
			)
		);

		if ( is_wp_error( $response ) ) {
			return $response;
		}

		if ( 200 !== wp_remote_retrieve_response_code( $response ) ) {
			return new WP_Error(
				'api_error',
				wp_kses_post(
					wp_sprintf(
						/* Translators: %s: API response message */
						__( 'API error: %s', 'wooawa' ),
						wp_remote_retrieve_response_message( $response )
					)
				)
			);
		}

		$body = json_decode( wp_remote_retrieve_body( $response ), true );
		if ( empty( $body ) ) {
			return new WP_Error( 'api_error', esc_html__( 'API error: Empty API response.', 'wooawa' ) );
		}

		if ( ! isset( $body['status'] ) ) {
			return new WP_Error( 'api_error', esc_html__( 'API error: No status found in API response.', 'wooawa' ) );
		}

		if ( ! isset( $body['message'] ) ) {
			return new WP_Error( 'api_error', esc_html__( 'API error: No message found in API response.', 'wooawa' ) );
		}

		if ( ! $body['status'] ) {
			$message = json_decode( $body['message'] );
			$code    = isset( $message->errors[0]->code ) ? $message->errors[0]->code : '';
			$details = isset( $message->errors[0]->details ) ? $message->errors[0]->details : '';

			return new WP_Error(
				$code,
				wp_kses_post(
					wp_sprintf(
						/* Translators: %s: API error details */
						__( 'API error: %s', 'wooawa' ),
						$details
					)
				)
			);
		}

		return $body;
	}
}
