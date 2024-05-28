<?php
/**
 * WOOAWA functions.
 *
 * @package WOOAWA\Functions
 *
 * @since 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Retrieves the international phone data.
 *
 * This function returns the international phone data by including the 'phone.php' file located in the 'i18n' directory.
 *
 * @since 1.1.0
 *
 * @return array The international phone data.
 */
function wooawa_get_i18n_phone_data() {
	/**
	 * Filters the international phone data.
	 *
	 * @since 1.1.0
	 *
	 * @param array $phone_data The international phone data.
	 */
	return apply_filters( 'wooawa_get_i18n_phone_data', include WOOAWA_PLUGIN_PATH . '/includes/i18n/phone.php' );
}

/**
 * Retrieves phone data for a given country code.
 *
 * @since 1.1.0
 *
 * @param string $country_code The country code to retrieve phone data for. Example: 'US'.
 * @return array|false The phone data for the given country code, or false if not found.
 */
function wooawa_get_phone_data_by_country( $country_code ) {
	// Make sure the country code is in uppercase.
	$country_code = strtoupper( $country_code );

	$phone_data = wooawa_get_i18n_phone_data();

	if ( ! isset( $phone_data[ $country_code ] ) ) {
		return false;
	}

	return $phone_data[ $country_code ];
}

/**
 * Formats the WhatsApp number by removing non-numeric characters, removing leading zeros, and adding the country code if necessary.
 *
 * @since 1.1.0
 *
 * @param string $whatsapp_number The WhatsApp number to be formatted.
 * @param string $country_code    The country code associated with the WhatsApp number.
 * @return string|WP_Error The formatted WhatsApp number or WP_Error object if the country code is invalid.
 */
function wooawa_get_formatted_whatsapp_number( $whatsapp_number, $country_code ) {
	// Remove anyting other than numbers from $whatsapp_number.
	$whatsapp_number = preg_replace( '/[^0-9]/', '', $whatsapp_number );

	// Remove 0's from the beginning of the number.
	$whatsapp_number = ltrim( $whatsapp_number, '0' );

	// Get characters length of the $whatsapp_number.
	$whatsapp_number_length = strlen( $whatsapp_number );

	// Get the phone data for the given country code.
	$phone_data = wooawa_get_phone_data_by_country( $country_code );

	if ( ! $phone_data ) {
		return new WP_Error( 'invalid_country_code', __( 'Invalid country code.', 'wooawa' ) );
	}

	$code   = absint( $phone_data['code'] );
	$length = array_map( 'absint', (array) $phone_data['length'] );

	// Check if the $whatsapp_number length is in the $length array.
	if ( in_array( $whatsapp_number_length, $length ) ) {
		// Add the country code to the beginning of the $whatsapp_number.
		$whatsapp_number = $code . $whatsapp_number;
	}

	return $whatsapp_number;
}
