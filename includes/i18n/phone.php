<?php
/**
 * Calling codes.
 *
 * Returns an array of calling codes.
 *
 * @package WOOAWA\i18n
 * @since 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Calling codes.
 *
 * @since 1.1.0
 *
 * @link https://en.wikipedia.org/wiki/List_of_mobile_telephone_prefixes_by_country
 *
 * @return array {
 *      An array of calling codes.
 *
 *      @type array {
 *          An array of calling code data.
 *
 *          @type string $country The name of the country.
 *          @type string $code    The country code without the '+' sign.
 *          @type int[]  $length  The length of the phone number.
 *                                If the phone number length is fixed, it is an integer.
 *                                If the phone number length is variable, it is an array of integers.
 *      }
 * }
 */
return array(
	'AD' => array(
		'country' => 'Andorra',
		'code'    => '376',
		'length'  => 6,
	),
	'AE' => array(
		'country' => 'United Arab Emirates',
		'code'    => '971',
		'length'  => 9,
	),
	'AF' => array(
		'country' => 'Afghanistan',
		'code'    => '93',
		'length'  => 9,
	),
	'AG' => array(
		'country' => 'Antigua and Barbuda',
		'code'    => '1268',
		'length'  => 10,
	),
	'AI' => array(
		'country' => 'Anguilla',
		'code'    => '1264',
		'length'  => 10,
	),
	'AL' => array(
		'country' => 'Albania',
		'code'    => '355',
		'length'  => 9,
	),
	'AM' => array(
		'country' => 'Armenia',
		'code'    => '374',
		'length'  => 6,
	),
	'AO' => array(
		'country' => 'Angola',
		'code'    => '244',
		'length'  => 9,
	),
	'AQ' => array(
		'country' => 'Antarctica',
		'code'    => '672',
		'length'  => 6,
	),
	'AR' => array(
		'country' => 'Argentina',
		'code'    => '54',
		'length'  => array( 6, 7, 8 ),
	),
	'AS' => array(
		'country' => 'American Samoa',
		'code'    => '1684',
		'length'  => 10,
	),
	'AT' => array(
		'country' => 'Austria',
		'code'    => '43',
		'length'  => array( 10, 11 ),
	),
	'AU' => array(
		'country' => 'Australia',
		'code'    => '61',
		'length'  => 9,
	),
	'AW' => array(
		'country' => 'Aruba',
		'code'    => '297',
		'length'  => 7,
	),
	'AX' => array(
		'country' => 'Alland Islands',
		'code'    => '358',
		'length'  => array( 7, 8, 9, 10 ),
	),
	'AZ' => array(
		'country' => 'Azerbaijan',
		'code'    => '994',
		'length'  => 9,
	),
	'BA' => array(
		'country' => 'Bosnia and Herzegovina',
		'code'    => '387',
		'length'  => 8,
	),
	'BB' => array(
		'country' => 'Barbados',
		'code'    => '1246',
		'length'  => 10,
	),
	'BD' => array(
		'country' => 'Bangladesh',
		'code'    => '880',
		'length'  => 10,
	),
	'BE' => array(
		'country' => 'Belgium',
		'code'    => '32',
		'length'  => 9,
	),
	'BF' => array(
		'country' => 'Burkina Faso',
		'code'    => '226',
		'length'  => 8,
	),
	'BG' => array(
		'country' => 'Bulgaria',
		'code'    => '359',
		'length'  => 9,
	),
	'BH' => array(
		'country' => 'Bahrain',
		'code'    => '973',
		'length'  => 8,
	),
	'BI' => array(
		'country' => 'Burundi',
		'code'    => '257',
		'length'  => 8,
	),
	'BJ' => array(
		'country' => 'Benin',
		'code'    => '229',
		'length'  => 8,
	),
	'BL' => array(
		'country' => 'Saint Barthelemy',
		'code'    => '590',
		'length'  => 9,
	),
	'BM' => array(
		'country' => 'Bermuda',
		'code'    => '1441',
		'length'  => 10,
	),
	'BN' => array(
		'country' => 'Brunei Darussalam',
		'code'    => '673',
		'length'  => 7,
	),
	'BO' => array(
		'country' => 'Bolivia',
		'code'    => '591',
		'length'  => 9,
	),
	'BR' => array(
		'country' => 'Brazil',
		'code'    => '55',
		'length'  => 11,
	),
	'BS' => array(
		'country' => 'Bahamas',
		'code'    => '1242',
		'length'  => 10,
	),
	'BT' => array(
		'country' => 'Bhutan',
		'code'    => '975',
		'length'  => 7,
	),
	'BV' => array(
		'country' => 'Bouvet Island',
		'code'    => '47',
		'length'  => 10,
	),
	'BW' => array(
		'country' => 'Botswana',
		'code'    => '267',
		'length'  => 7,
	),
	'BY' => array(
		'country' => 'Belarus',
		'code'    => '375',
		'length'  => 9,
	),
	'BZ' => array(
		'country' => 'Belize',
		'code'    => '501',
		'length'  => 7,
	),
	'CA' => array(
		'country' => 'Canada',
		'code'    => '1',
		'length'  => 10,
	),
	'CC' => array(
		'country' => 'Cocos (Keeling) Islands',
		'code'    => '61',
		'length'  => 10,
	),
	'CD' => array(
		'country' => 'Congo, Democratic Republic of the',
		'code'    => '243',
		'length'  => 7,
	),
	'CF' => array(
		'country' => 'Central African Republic',
		'code'    => '236',
		'length'  => 8,
	),
	'CG' => array(
		'country' => 'Congo, Republic of the',
		'code'    => '242',
		'length'  => 9,
	),
	'CH' => array(
		'country' => 'Switzerland',
		'code'    => '41',
		'length'  => 9,
	),
	'CI' => array(
		'country' => "Cote d'Ivoire",
		'code'    => '225',
		'length'  => 8,
	),
	'CK' => array(
		'country' => 'Cook Islands',
		'code'    => '682',
		'length'  => 5,
	),
	'CL' => array(
		'country' => 'Chile',
		'code'    => '56',
		'length'  => 9,
	),
	'CM' => array(
		'country' => 'Cameroon',
		'code'    => '237',
		'length'  => 9,
	),
	'CN' => array(
		'country' => 'China',
		'code'    => '86',
		'length'  => 11,
	),
	'CO' => array(
		'country' => 'Colombia',
		'code'    => '57',
		'length'  => 10,
	),
	'CR' => array(
		'country' => 'Costa Rica',
		'code'    => '506',
		'length'  => 8,
	),
	'CU' => array(
		'country' => 'Cuba',
		'code'    => '53',
		'length'  => 8,
	),
	'CV' => array(
		'country' => 'Cape Verde',
		'code'    => '238',
		'length'  => 7,
	),
	'CW' => array(
		'country' => 'Curacao',
		'code'    => '599',
		'length'  => 7,
	),
	'CX' => array(
		'country' => 'Christmas Island',
		'code'    => '61',
		'length'  => 9,
	),
	'CY' => array(
		'country' => 'Cyprus',
		'code'    => '357',
		'length'  => 8,
	),
	'CZ' => array(
		'country' => 'Czech Republic',
		'code'    => '420',
		'length'  => 9,
	),
	'DE' => array(
		'country' => 'Germany',
		'code'    => '49',
		'length'  => 10,
	),
	'DJ' => array(
		'country' => 'Djibouti',
		'code'    => '253',
		'length'  => 10,
	),
	'DK' => array(
		'country' => 'Denmark',
		'code'    => '45',
		'length'  => 8,
	),
	'DM' => array(
		'country' => 'Dominica',
		'code'    => '1767',
		'length'  => 10,
	),
	'DO' => array(
		'country' => 'Dominican Republic',
		'code'    => '1809',
		'length'  => 10,
	),
	'DZ' => array(
		'country' => 'Algeria',
		'code'    => '213',
		'length'  => 9,
	),
	'EC' => array(
		'country' => 'Ecuador',
		'code'    => '593',
		'length'  => 9,
	),
	'EE' => array(
		'country' => 'Estonia',
		'code'    => '372',
		'length'  => 8,
	),
	'EG' => array(
		'country' => 'Egypt',
		'code'    => '20',
		'length'  => 10,
	),
	'EH' => array(
		'country' => 'Western Sahara',
		'code'    => '212',
		'length'  => 9,
	),
	'ER' => array(
		'country' => 'Eritrea',
		'code'    => '291',
		'length'  => 7,
	),
	'ES' => array(
		'country' => 'Spain',
		'code'    => '34',
		'length'  => 9,
	),
	'ET' => array(
		'country' => 'Ethiopia',
		'code'    => '251',
		'length'  => 9,
	),
	'FI' => array(
		'country' => 'Finland',
		'code'    => '358',
		'length'  => array( 9, 10, 11 ),
	),
	'FJ' => array(
		'country' => 'Fiji',
		'code'    => '679',
		'length'  => 7,
	),
	'FK' => array(
		'country' => 'Falkland Islands (Malvinas)',
		'code'    => '500',
		'length'  => 5,
	),
	'FM' => array(
		'country' => 'Micronesia, Federated States of',
		'code'    => '691',
		'length'  => 7,
	),
	'FO' => array(
		'country' => 'Faroe Islands',
		'code'    => '298',
		'length'  => 5,
	),
	'FR' => array(
		'country' => 'France',
		'code'    => '33',
		'length'  => 9,
	),
	'GA' => array(
		'country' => 'Gabon',
		'code'    => '241',
		'length'  => 7,
	),
	'GB' => array(
		'country' => 'United Kingdom',
		'code'    => '44',
		'length'  => 10,
	),
	'GD' => array(
		'country' => 'Grenada',
		'code'    => '1473',
		'length'  => 10,
	),
	'GE' => array(
		'country' => 'Georgia',
		'code'    => '995',
		'length'  => 9,
	),
	'GF' => array(
		'country' => 'French Guiana',
		'code'    => '594',
		'length'  => 9,
	),
	'GG' => array(
		'country' => 'Guernsey',
		'code'    => '44',
		'length'  => 10,
	),
	'GH' => array(
		'country' => 'Ghana',
		'code'    => '233',
		'length'  => 9,
	),
	'GI' => array(
		'country' => 'Gibraltar',
		'code'    => '350',
		'length'  => 8,
	),
	'GL' => array(
		'country' => 'Greenland',
		'code'    => '299',
		'length'  => 6,
	),
	'GM' => array(
		'country' => 'Gambia',
		'code'    => '220',
		'length'  => 7,
	),
	'GN' => array(
		'country' => 'Guinea',
		'code'    => '224',
		'length'  => 9,
	),
	'GP' => array(
		'country' => 'Guadeloupe',
		'code'    => '590',
		'length'  => 9,
	),
	'GQ' => array(
		'country' => 'Equatorial Guinea',
		'code'    => '240',
		'length'  => 9,
	),
	'GR' => array(
		'country' => 'Greece',
		'code'    => '30',
		'length'  => 10,
	),
	'GS' => array(
		'country' => 'South Georgia and the South Sandwich Islands',
		'code'    => '500',
		'length'  => 5,
	),
	'GT' => array(
		'country' => 'Guatemala',
		'code'    => '502',
		'length'  => 8,
	),
	'GU' => array(
		'country' => 'Guam',
		'code'    => '1671',
		'length'  => 10,
	),
	'GW' => array(
		'country' => 'Guinea-Bissau',
		'code'    => '245',
		'length'  => 9,
	),
	'GY' => array(
		'country' => 'Guyana',
		'code'    => '592',
		'length'  => 7,
	),
	'HK' => array(
		'country' => 'Hong Kong',
		'code'    => '852',
		'length'  => 8,
	),
	'HM' => array(
		'country' => 'Heard Island and McDonald Islands',
		'code'    => '672',
		'length'  => 10,
	),
	'HN' => array(
		'country' => 'Honduras',
		'code'    => '504',
		'length'  => 8,
	),
	'HR' => array(
		'country' => 'Croatia',
		'code'    => '385',
		'length'  => 9,
	),
	'HT' => array(
		'country' => 'Haiti',
		'code'    => '509',
		'length'  => 8,
	),
	'HU' => array(
		'country' => 'Hungary',
		'code'    => '36',
		'length'  => 9,
	),
	'ID' => array(
		'country' => 'Indonesia',
		'code'    => '62',
		'length'  => 11,
	),
	'IE' => array(
		'country' => 'Ireland',
		'code'    => '353',
		'length'  => 9,
	),
	'IL' => array(
		'country' => 'Israel',
		'code'    => '972',
		'length'  => 9,
	),
	'IM' => array(
		'country' => 'Isle of Man',
		'code'    => '44',
		'length'  => 10,
	),
	'IN' => array(
		'country' => 'India',
		'code'    => '91',
		'length'  => 10,
	),
	'IO' => array(
		'country' => 'British Indian Ocean Territory',
		'code'    => '246',
		'length'  => 7,
	),
	'IQ' => array(
		'country' => 'Iraq',
		'code'    => '964',
		'length'  => 10,
	),
	'IR' => array(
		'country' => 'Iran, Islamic Republic of',
		'code'    => '98',
		'length'  => 11,
	),
	'IS' => array(
		'country' => 'Iceland',
		'code'    => '354',
		'length'  => 7,
	),
	'IT' => array(
		'country' => 'Italy',
		'code'    => '39',
		'length'  => 10,
	),
	'JE' => array(
		'country' => 'Jersey',
		'code'    => '44',
		'length'  => 10,
	),
	'JM' => array(
		'country' => 'Jamaica',
		'code'    => '1876',
		'length'  => 10,
	),
	'JO' => array(
		'country' => 'Jordan',
		'code'    => '962',
		'length'  => array( 8, 9 ),
	),
	'JP' => array(
		'country'   => 'Japan',
		'code'      => '81',
		'suggested' => true,
	),
	'KE' => array(
		'country' => 'Kenya',
		'code'    => '254',
		'length'  => 10,
	),
	'KG' => array(
		'country' => 'Kyrgyzstan',
		'code'    => '996',
		'length'  => 9,
	),
	'KH' => array(
		'country' => 'Cambodia',
		'code'    => '855',
		'length'  => 9,
	),
	'KI' => array(
		'country' => 'Kiribati',
		'code'    => '686',
		'length'  => 8,
	),
	'KM' => array(
		'country' => 'Comoros',
		'code'    => '269',
		'length'  => 7,
	),
	'KN' => array(
		'country' => 'Saint Kitts and Nevis',
		'code'    => '1869',
		'length'  => 10,
	),
	'KP' => array(
		'country' => "Korea, Democratic People's Republic of",
		'code'    => '850',
		'length'  => array( 4, 6, 7, 13 ),
	),
	'KR' => array(
		'country' => 'Korea, Republic of',
		'code'    => '82',
		'length'  => array( 7, 8 ),
	),
	'KW' => array(
		'country' => 'Kuwait',
		'code'    => '965',
		'length'  => 8,
	),
	'KY' => array(
		'country' => 'Cayman Islands',
		'code'    => '1345',
		'length'  => 7,
	),
	'KZ' => array(
		'country' => 'Kazakhstan',
		'code'    => '7',
		'length'  => 10,
	),
	'LA' => array(
		'country' => "Lao People's Democratic Republic",
		'code'    => '856',
		'length'  => array( 8, 9 ),
	),
	'LB' => array(
		'country' => 'Lebanon',
		'code'    => '961',
		'length'  => array( 7, 8 ),
	),
	'LC' => array(
		'country' => 'Saint Lucia',
		'code'    => '1758',
		'length'  => 7,
	),
	'LI' => array(
		'country' => 'Liechtenstein',
		'code'    => '423',
		'length'  => 7,
	),
	'LK' => array(
		'country' => 'Sri Lanka',
		'code'    => '94',
		'length'  => 7,
	),
	'LR' => array(
		'country' => 'Liberia',
		'code'    => '231',
		'length'  => array( 8, 9 ),
	),
	'LS' => array(
		'country' => 'Lesotho',
		'code'    => '266',
		'length'  => 8,
	),
	'LT' => array(
		'country' => 'Lithuania',
		'code'    => '370',
		'length'  => 8,
	),
	'LU' => array(
		'country' => 'Luxembourg',
		'code'    => '352',
		'length'  => 9,
	),
	'LV' => array(
		'country' => 'Latvia',
		'code'    => '371',
		'length'  => 8,
	),
	'LY' => array(
		'country' => 'Libya',
		'code'    => '218',
		'length'  => 10,
	),
	'MA' => array(
		'country' => 'Morocco',
		'code'    => '212',
		'length'  => 9,
	),
	'MC' => array(
		'country' => 'Monaco',
		'code'    => '377',
		'length'  => 8,
	),
	'MD' => array(
		'country' => 'Moldova, Republic of',
		'code'    => '373',
		'length'  => 8,
	),
	'ME' => array(
		'country' => 'Montenegro',
		'code'    => '382',
		'length'  => 8,
	),
	'MF' => array(
		'country' => 'Saint Martin (French part)',
		'code'    => '590',
		'length'  => 6,
	),
	'MG' => array(
		'country' => 'Madagascar',
		'code'    => '261',
		'length'  => 7,
	),
	'MH' => array(
		'country' => 'Marshall Islands',
		'code'    => '692',
		'length'  => 7,
	),
	'MK' => array(
		'country' => 'Macedonia, the Former Yugoslav Republic of',
		'code'    => '389',
		'length'  => 8,
	),
	'ML' => array(
		'country' => 'Mali',
		'code'    => '223',
		'length'  => 8,
	),
	'MM' => array(
		'country' => 'Myanmar',
		'code'    => '95',
		'length'  => array( 7, 8, 9, 10 ),
	),
	'MN' => array(
		'country' => 'Mongolia',
		'code'    => '976',
		'length'  => 8,
	),
	'MO' => array(
		'country' => 'Macao',
		'code'    => '853',
		'length'  => 8,
	),
	'MP' => array(
		'country' => 'Northern Mariana Islands',
		'code'    => '1670',
		'length'  => 7,
	),
	'MQ' => array(
		'country' => 'Martinique',
		'code'    => '596',
		'length'  => 9,
	),
	'MR' => array(
		'country' => 'Mauritania',
		'code'    => '222',
		'length'  => 8,
	),
	'MS' => array(
		'country' => 'Montserrat',
		'code'    => '1664',
		'length'  => 10,
	),
	'MT' => array(
		'country' => 'Malta',
		'code'    => '356',
		'length'  => 8,
	),
	'MU' => array(
		'country' => 'Mauritius',
		'code'    => '230',
		'length'  => 8,
	),
	'MV' => array(
		'country' => 'Maldives',
		'code'    => '960',
		'length'  => 7,
	),
	'MW' => array(
		'country' => 'Malawi',
		'code'    => '265',
		'length'  => array( 7, 8, 9 ),
	),
	'MX' => array(
		'country' => 'Mexico',
		'code'    => '52',
		'length'  => 10,
	),
	'MY' => array(
		'country' => 'Malaysia',
		'code'    => '60',
		'length'  => 7,
	),
	'MZ' => array(
		'country' => 'Mozambique',
		'code'    => '258',
		'length'  => 12,
	),
	'NA' => array(
		'country' => 'Namibia',
		'code'    => '264',
		'length'  => 7,
	),
	'NC' => array(
		'country' => 'New Caledonia',
		'code'    => '687',
		'length'  => 6,
	),
	'NE' => array(
		'country' => 'Niger',
		'code'    => '227',
		'length'  => 8,
	),
	'NF' => array(
		'country' => 'Norfolk Island',
		'code'    => '672',
		'length'  => 6,
	),
	'NG' => array(
		'country' => 'Nigeria',
		'code'    => '234',
		'length'  => 8,
	),
	'NI' => array(
		'country' => 'Nicaragua',
		'code'    => '505',
		'length'  => 8,
	),
	'NL' => array(
		'country' => 'Netherlands',
		'code'    => '31',
		'length'  => 9,
	),
	'NO' => array(
		'country' => 'Norway',
		'code'    => '47',
		'length'  => 8,
	),
	'NP' => array(
		'country' => 'Nepal',
		'code'    => '977',
		'length'  => 10,
	),
	'NR' => array(
		'country' => 'Nauru',
		'code'    => '674',
		'length'  => 7,
	),
	'NU' => array(
		'country' => 'Niue',
		'code'    => '683',
		'length'  => 4,
	),
	'NZ' => array(
		'country' => 'New Zealand',
		'code'    => '64',
		'length'  => array( 8, 9 ),
	),
	'OM' => array(
		'country' => 'Oman',
		'code'    => '968',
		'length'  => 8,
	),
	'PA' => array(
		'country' => 'Panama',
		'code'    => '507',
		'length'  => 8,
	),
	'PE' => array(
		'country' => 'Peru',
		'code'    => '51',
		'length'  => 9,
	),
	'PF' => array(
		'country' => 'French Polynesia',
		'code'    => '689',
		'length'  => 8,
	),
	'PG' => array(
		'country' => 'Papua New Guinea',
		'code'    => '675',
		'length'  => 8,
	),
	'PH' => array(
		'country' => 'Philippines',
		'code'    => '63',
		'length'  => 10,
	),
	'PK' => array(
		'country' => 'Pakistan',
		'code'    => '92',
		'length'  => 10,
	),
	'PL' => array(
		'country' => 'Poland',
		'code'    => '48',
		'length'  => 9,
	),
	'PM' => array(
		'country' => 'Saint Pierre and Miquelon',
		'code'    => '508',
		'length'  => 6,
	),
	'PN' => array(
		'country' => 'Pitcairn',
		'code'    => '870',
		'length'  => 9,
	),
	'PR' => array(
		'country' => 'Puerto Rico',
		'code'    => '1',
		'length'  => 10,
	),
	'PS' => array(
		'country' => 'Palestine, State of',
		'code'    => '970',
		'length'  => 9,
	),
	'PT' => array(
		'country' => 'Portugal',
		'code'    => '351',
		'length'  => 9,
	),
	'PW' => array(
		'country' => 'Palau',
		'code'    => '680',
		'length'  => 7,
	),
	'PY' => array(
		'country' => 'Paraguay',
		'code'    => '595',
		'length'  => 9,
	),
	'QA' => array(
		'country' => 'Qatar',
		'code'    => '974',
		'length'  => 8,
	),
	'RE' => array(
		'country' => 'Reunion',
		'code'    => '262',
		'length'  => 10,
	),
	'RO' => array(
		'country' => 'Romania',
		'code'    => '40',
		'length'  => 10,
	),
	'RS' => array(
		'country' => 'Serbia',
		'code'    => '381',
		'length'  => 9,
	),
	'RU' => array(
		'country' => 'Russian Federation',
		'code'    => '7',
		'length'  => 10,
	),
	'RW' => array(
		'country' => 'Rwanda',
		'code'    => '250',
		'length'  => 9,
	),
	'SA' => array(
		'country' => 'Saudi Arabia',
		'code'    => '966',
		'length'  => 9,
	),
	'SB' => array(
		'country' => 'Solomon Islands',
		'code'    => '677',
		'length'  => 7,
	),
	'SC' => array(
		'country' => 'Seychelles',
		'code'    => '248',
		'length'  => 7,
	),
	'SD' => array(
		'country' => 'Sudan',
		'code'    => '249',
		'length'  => 7,
	),
	'SE' => array(
		'country' => 'Sweden',
		'code'    => '46',
		'length'  => 7,
	),
	'SG' => array(
		'country' => 'Singapore',
		'code'    => '65',
		'length'  => 8,
	),
	'SH' => array(
		'country' => 'Saint Helena',
		'code'    => '290',
		'length'  => 4,
	),
	'SI' => array(
		'country' => 'Slovenia',
		'code'    => '386',
		'length'  => 9,
	),
	'SJ' => array(
		'country' => 'Svalbard and Jan Mayen',
		'code'    => '47',
		'length'  => 8,
	),
	'SK' => array(
		'country' => 'Slovakia',
		'code'    => '421',
		'length'  => 9,
	),
	'SL' => array(
		'country' => 'Sierra Leone',
		'code'    => '232',
		'length'  => 8,
	),
	'SM' => array(
		'country' => 'San Marino',
		'code'    => '378',
		'length'  => 10,
	),
	'SN' => array(
		'country' => 'Senegal',
		'code'    => '221',
		'length'  => 9,
	),
	'SO' => array(
		'country' => 'Somalia',
		'code'    => '252',
		'length'  => array( 8, 9 ),
	),
	'SR' => array(
		'country' => 'Suriname',
		'code'    => '597',
		'length'  => array( 6, 7 ),
	),
	'SS' => array(
		'country' => 'South Sudan',
		'code'    => '211',
		'length'  => 7,
	),
	'ST' => array(
		'country' => 'Sao Tome and Principe',
		'code'    => '239',
		'length'  => 7,
	),
	'SV' => array(
		'country' => 'El Salvador',
		'code'    => '503',
		'length'  => 8,
	),
	'SX' => array(
		'country' => 'Sint Maarten (Dutch part)',
		'code'    => '1721',
		'length'  => 10,
	),
	'SY' => array(
		'country' => 'Syrian Arab Republic',
		'code'    => '963',
		'length'  => 7,
	),
	'SZ' => array(
		'country' => 'Swaziland',
		'code'    => '268',
		'length'  => 8,
	),
	'TC' => array(
		'country' => 'Turks and Caicos Islands',
		'code'    => '1649',
		'length'  => 10,
	),
	'TD' => array(
		'country' => 'Chad',
		'code'    => '235',
		'length'  => 6,
	),
	'TF' => array(
		'country' => 'French Southern Territories',
		'code'    => '262',
		'length'  => 10,
	),
	'TG' => array(
		'country' => 'Togo',
		'code'    => '228',
		'length'  => 8,
	),
	'TH' => array(
		'country' => 'Thailand',
		'code'    => '66',
		'length'  => 9,
	),
	'TJ' => array(
		'country' => 'Tajikistan',
		'code'    => '992',
		'length'  => 9,
	),
	'TK' => array(
		'country' => 'Tokelau',
		'code'    => '690',
		'length'  => 5,
	),
	'TL' => array(
		'country' => 'Timor-Leste',
		'code'    => '670',
		'length'  => 7,
	),
	'TM' => array(
		'country' => 'Turkmenistan',
		'code'    => '993',
		'length'  => 8,
	),
	'TN' => array(
		'country' => 'Tunisia',
		'code'    => '216',
		'length'  => 8,
	),
	'TO' => array(
		'country' => 'Tonga',
		'code'    => '676',
		'length'  => 5,
	),
	'TR' => array(
		'country' => 'Turkey',
		'code'    => '90',
		'length'  => 11,
	),
	'TT' => array(
		'country' => 'Trinidad and Tobago',
		'code'    => '1868',
		'length'  => 7,
	),
	'TV' => array(
		'country' => 'Tuvalu',
		'code'    => '688',
		'length'  => 5,
	),
	'TW' => array(
		'country' => 'Taiwan, Province of China',
		'code'    => '886',
		'length'  => 9,
	),
	'TZ' => array(
		'country' => 'United Republic of Tanzania',
		'code'    => '255',
		'length'  => 7,
	),
	'UA' => array(
		'country' => 'Ukraine',
		'code'    => '380',
		'length'  => 9,
	),
	'UG' => array(
		'country' => 'Uganda',
		'code'    => '256',
		'length'  => 7,
	),
	'US' => array(
		'country' => 'United States',
		'code'    => '1',
		'length'  => 10,
	),
	'UY' => array(
		'country' => 'Uruguay',
		'code'    => '598',
		'length'  => 8,
	),
	'UZ' => array(
		'country' => 'Uzbekistan',
		'code'    => '998',
		'length'  => 9,
	),
	'VA' => array(
		'country' => 'Holy See (Vatican City State)',
		'code'    => '379',
		'length'  => 10,
	),
	'VC' => array(
		'country' => 'Saint Vincent and the Grenadines',
		'code'    => '1784',
		'length'  => 7,
	),
	'VE' => array(
		'country' => 'Venezuela',
		'code'    => '58',
		'length'  => 7,
	),
	'VG' => array(
		'country' => 'British Virgin Islands',
		'code'    => '1284',
		'length'  => 7,
	),
	'VI' => array(
		'country' => 'US Virgin Islands',
		'code'    => '1340',
		'length'  => 10,
	),
	'VN' => array(
		'country' => 'Vietnam',
		'code'    => '84',
		'length'  => 9,
	),
	'VU' => array(
		'country' => 'Vanuatu',
		'code'    => '678',
		'length'  => 5,
	),
	'WF' => array(
		'country' => 'Wallis and Futuna',
		'code'    => '681',
		'length'  => 6,
	),
	'WS' => array(
		'country' => 'Samoa',
		'code'    => '685',
		'length'  => array( 5, 6, 7 ),
	),
	'XK' => array(
		'country' => 'Kosovo',
		'code'    => '383',
		'length'  => 8,
	),
	'YE' => array(
		'country' => 'Yemen',
		'code'    => '967',
		'length'  => 9,
	),
	'YT' => array(
		'country' => 'Mayotte',
		'code'    => '262',
		'length'  => 9,
	),
	'ZA' => array(
		'country' => 'South Africa',
		'code'    => '27',
		'length'  => 9,
	),
	'ZM' => array(
		'country' => 'Zambia',
		'code'    => '260',
		'length'  => 9,
	),
	'ZW' => array(
		'country' => 'Zimbabwe',
		'code'    => '263',
		'length'  => 9,
	),
);
