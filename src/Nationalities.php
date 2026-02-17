<?php
/**
 * WordPress Nationalities Library
 *
 * A simple, lightweight library for nationality data and utilities in WordPress.
 *
 * @package     ArrayPress\Nationalities
 * @copyright   Copyright (c) 2025, ArrayPress Limited
 * @license     GPL2+
 * @version     1.0.0
 * @author      David Sherlock
 */

namespace ArrayPress\Nationalities;

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Nationalities class
 *
 * Provides static methods for working with nationality data including
 * ISO 3166-1 alpha-2 country codes mapped to nationality demonyms.
 *
 * @since 1.0.0
 */
class Nationalities {

	/**
	 * ISO 3166-1 alpha-2 country codes mapped to nationalities.
	 *
	 * Each entry maps a country code to its commonly used nationality/demonym.
	 */
	private const NATIONALITIES = [
		'AF' => 'Afghan',
		'AX' => 'Ålandic',
		'AL' => 'Albanian',
		'DZ' => 'Algerian',
		'AS' => 'American Samoan',
		'AD' => 'Andorran',
		'AO' => 'Angolan',
		'AI' => 'Anguillan',
		'AQ' => 'Antarctic',
		'AG' => 'Antiguan',
		'AR' => 'Argentine',
		'AM' => 'Armenian',
		'AW' => 'Aruban',
		'AU' => 'Australian',
		'AT' => 'Austrian',
		'AZ' => 'Azerbaijani',
		'BS' => 'Bahamian',
		'BH' => 'Bahraini',
		'BD' => 'Bangladeshi',
		'BB' => 'Barbadian',
		'BY' => 'Belarusian',
		'BE' => 'Belgian',
		'PW' => 'Palauan',
		'BZ' => 'Belizean',
		'BJ' => 'Beninese',
		'BM' => 'Bermudian',
		'BT' => 'Bhutanese',
		'BO' => 'Bolivian',
		'BQ' => 'Bonairean',
		'BA' => 'Bosnian',
		'BW' => 'Motswana',
		'BV' => 'Bouvet Island',
		'BR' => 'Brazilian',
		'IO' => 'British Indian Ocean Territory',
		'BN' => 'Bruneian',
		'BG' => 'Bulgarian',
		'BF' => 'Burkinabé',
		'BI' => 'Burundian',
		'KH' => 'Cambodian',
		'CM' => 'Cameroonian',
		'CA' => 'Canadian',
		'CV' => 'Cape Verdean',
		'KY' => 'Caymanian',
		'CF' => 'Central African',
		'TD' => 'Chadian',
		'CL' => 'Chilean',
		'CN' => 'Chinese',
		'CX' => 'Christmas Islander',
		'CC' => 'Cocos Islander',
		'CO' => 'Colombian',
		'KM' => 'Comorian',
		'CG' => 'Congolese',
		'CD' => 'Congolese',
		'CK' => 'Cook Islander',
		'CR' => 'Costa Rican',
		'HR' => 'Croatian',
		'CU' => 'Cuban',
		'CW' => 'Curaçaoan',
		'CY' => 'Cypriot',
		'CZ' => 'Czech',
		'DK' => 'Danish',
		'DJ' => 'Djiboutian',
		'DM' => 'Dominican',
		'DO' => 'Dominican',
		'EC' => 'Ecuadorian',
		'EG' => 'Egyptian',
		'SV' => 'Salvadoran',
		'GQ' => 'Equatoguinean',
		'ER' => 'Eritrean',
		'EE' => 'Estonian',
		'ET' => 'Ethiopian',
		'FK' => 'Falkland Islander',
		'FO' => 'Faroese',
		'FJ' => 'Fijian',
		'FI' => 'Finnish',
		'FR' => 'French',
		'GF' => 'French Guianese',
		'PF' => 'French Polynesian',
		'TF' => 'French Southern Territories',
		'GA' => 'Gabonese',
		'GM' => 'Gambian',
		'GE' => 'Georgian',
		'DE' => 'German',
		'GH' => 'Ghanaian',
		'GI' => 'Gibraltarian',
		'GR' => 'Greek',
		'GL' => 'Greenlandic',
		'GD' => 'Grenadian',
		'GP' => 'Guadeloupean',
		'GU' => 'Guamanian',
		'GT' => 'Guatemalan',
		'GG' => 'Guernsey',
		'GN' => 'Guinean',
		'GW' => 'Bissau-Guinean',
		'GY' => 'Guyanese',
		'HT' => 'Haitian',
		'HM' => 'Heard Island and McDonald Islands',
		'HN' => 'Honduran',
		'HK' => 'Hong Konger',
		'HU' => 'Hungarian',
		'IS' => 'Icelandic',
		'IN' => 'Indian',
		'ID' => 'Indonesian',
		'IR' => 'Iranian',
		'IQ' => 'Iraqi',
		'IE' => 'Irish',
		'IM' => 'Manx',
		'IL' => 'Israeli',
		'IT' => 'Italian',
		'CI' => 'Ivorian',
		'JM' => 'Jamaican',
		'JP' => 'Japanese',
		'JE' => 'Jersey',
		'JO' => 'Jordanian',
		'KZ' => 'Kazakhstani',
		'KE' => 'Kenyan',
		'KI' => 'I-Kiribati',
		'KW' => 'Kuwaiti',
		'KG' => 'Kyrgyzstani',
		'LA' => 'Laotian',
		'LV' => 'Latvian',
		'LB' => 'Lebanese',
		'LS' => 'Mosotho',
		'LR' => 'Liberian',
		'LY' => 'Libyan',
		'LI' => 'Liechtensteiner',
		'LT' => 'Lithuanian',
		'LU' => 'Luxembourgish',
		'MO' => 'Macanese',
		'MK' => 'Macedonian',
		'MG' => 'Malagasy',
		'MW' => 'Malawian',
		'MY' => 'Malaysian',
		'MV' => 'Maldivian',
		'ML' => 'Malian',
		'MT' => 'Maltese',
		'MH' => 'Marshallese',
		'MQ' => 'Martiniquais',
		'MR' => 'Mauritanian',
		'MU' => 'Mauritian',
		'YT' => 'Mahoran',
		'MX' => 'Mexican',
		'FM' => 'Micronesian',
		'MD' => 'Moldovan',
		'MC' => 'Monégasque',
		'MN' => 'Mongolian',
		'ME' => 'Montenegrin',
		'MS' => 'Montserratian',
		'MA' => 'Moroccan',
		'MZ' => 'Mozambican',
		'MM' => 'Burmese',
		'NA' => 'Namibian',
		'NR' => 'Nauruan',
		'NP' => 'Nepali',
		'NL' => 'Dutch',
		'NC' => 'New Caledonian',
		'NZ' => 'New Zealander',
		'NI' => 'Nicaraguan',
		'NE' => 'Nigerien',
		'NG' => 'Nigerian',
		'NU' => 'Niuean',
		'NF' => 'Norfolk Islander',
		'MP' => 'Northern Mariana Islander',
		'KP' => 'North Korean',
		'NO' => 'Norwegian',
		'OM' => 'Omani',
		'PK' => 'Pakistani',
		'PS' => 'Palestinian',
		'PA' => 'Panamanian',
		'PG' => 'Papua New Guinean',
		'PY' => 'Paraguayan',
		'PE' => 'Peruvian',
		'PH' => 'Filipino',
		'PN' => 'Pitcairn Islander',
		'PL' => 'Polish',
		'PT' => 'Portuguese',
		'PR' => 'Puerto Rican',
		'QA' => 'Qatari',
		'RE' => 'Réunionese',
		'RO' => 'Romanian',
		'RU' => 'Russian',
		'RW' => 'Rwandan',
		'BL' => 'Barthélemois',
		'SH' => 'Saint Helenian',
		'KN' => 'Kittitian',
		'LC' => 'Saint Lucian',
		'MF' => 'Saint-Martinoise',
		'SX' => 'Sint Maartener',
		'PM' => 'Saint-Pierrais',
		'VC' => 'Vincentian',
		'SM' => 'Sammarinese',
		'ST' => 'São Toméan',
		'SA' => 'Saudi',
		'SN' => 'Senegalese',
		'RS' => 'Serbian',
		'SC' => 'Seychellois',
		'SL' => 'Sierra Leonean',
		'SG' => 'Singaporean',
		'SK' => 'Slovak',
		'SI' => 'Slovenian',
		'SB' => 'Solomon Islander',
		'SO' => 'Somali',
		'ZA' => 'South African',
		'GS' => 'South Georgia and the South Sandwich Islands',
		'KR' => 'South Korean',
		'SS' => 'South Sudanese',
		'ES' => 'Spanish',
		'LK' => 'Sri Lankan',
		'SD' => 'Sudanese',
		'SR' => 'Surinamese',
		'SJ' => 'Svalbard and Jan Mayen',
		'SZ' => 'Swazi',
		'SE' => 'Swedish',
		'CH' => 'Swiss',
		'SY' => 'Syrian',
		'TW' => 'Taiwanese',
		'TJ' => 'Tajikistani',
		'TZ' => 'Tanzanian',
		'TH' => 'Thai',
		'TL' => 'Timorese',
		'TG' => 'Togolese',
		'TK' => 'Tokelauan',
		'TO' => 'Tongan',
		'TT' => 'Trinidadian',
		'TN' => 'Tunisian',
		'TR' => 'Turkish',
		'TM' => 'Turkmen',
		'TC' => 'Turks and Caicos Islander',
		'TV' => 'Tuvaluan',
		'UG' => 'Ugandan',
		'UA' => 'Ukrainian',
		'AE' => 'Emirati',
		'GB' => 'British',
		'US' => 'American',
		'UM' => 'United States Minor Outlying Islands',
		'UY' => 'Uruguayan',
		'UZ' => 'Uzbekistani',
		'VU' => 'Ni-Vanuatu',
		'VA' => 'Vatican',
		'VE' => 'Venezuelan',
		'VN' => 'Vietnamese',
		'VG' => 'Virgin Islander (British)',
		'VI' => 'Virgin Islander (US)',
		'WF' => 'Wallisian',
		'EH' => 'Sahrawi',
		'WS' => 'Samoan',
		'XK' => 'Kosovar',
		'YE' => 'Yemeni',
		'ZM' => 'Zambian',
		'ZW' => 'Zimbabwean',
	];

	/**
	 * Alternate demonyms / common aliases.
	 *
	 * Maps alternative names to their canonical country code so searches
	 * and reverse lookups work with informal terms too.
	 */
	private const ALIASES = [
		'Argentinian'  => 'AR',
		'Aussie'       => 'AU',
		'Basotho'      => 'LS',
		'Batswana'     => 'BW',
		'Boricua'      => 'PR',
		'Brit'         => 'GB',
		'Burkinabè'    => 'BF',
		'Canuck'       => 'CA',
		'Catracha'     => 'HN',
		'Catracho'     => 'HN',
		'Chapín'       => 'GT',
		'Chapina'      => 'GT',
		'Deutsch'      => 'DE',
		'Filipina'     => 'PH',
		'Kiwi'         => 'NZ',
		'Luxembourger' => 'LU',
		'Mex'          => 'MX',
		'Nepalese'     => 'NP',
		'Nica'         => 'NI',
		'Ozzie'        => 'AU',
		'Pinay'        => 'PH',
		'Pinoy'        => 'PH',
		'Pom'          => 'GB',
		'Saffa'        => 'ZA',
		'Tica'         => 'CR',
		'Tico'         => 'CR',
		'Yank'         => 'US',
		'Yankee'       => 'US',
	];

	/* ========================================================================
	 * NATIONALITY DATA
	 * ======================================================================== */

	/**
	 * Get all nationalities.
	 *
	 * @return array Array of country code => nationality pairs.
	 */
	public static function all(): array {
		return self::NATIONALITIES;
	}

	/**
	 * Get nationality by country code.
	 *
	 * @param string $code Country code (case-insensitive).
	 *
	 * @return string Nationality or original code if not found.
	 */
	public static function get_name( string $code ): string {
		return self::NATIONALITIES[ strtoupper( trim( $code ) ) ] ?? $code;
	}

	/**
	 * Check if nationality exists for a country code.
	 *
	 * @param string $code Country code to check.
	 *
	 * @return bool True if a nationality exists for the code.
	 */
	public static function exists( string $code ): bool {
		return isset( self::NATIONALITIES[ strtoupper( trim( $code ) ) ] );
	}

	/**
	 * Get country code by nationality name (case-insensitive).
	 *
	 * Searches both canonical nationalities and common aliases.
	 *
	 * @param string $name Nationality name to search for.
	 *
	 * @return string|null Country code or null if not found.
	 */
	public static function get_code( string $name ): ?string {
		$name = trim( $name );

		// Check canonical nationalities
		foreach ( self::NATIONALITIES as $code => $nationality ) {
			if ( strcasecmp( $nationality, $name ) === 0 ) {
				return $code;
			}
		}

		// Check aliases
		foreach ( self::ALIASES as $alias => $code ) {
			if ( strcasecmp( $alias, $name ) === 0 ) {
				return $code;
			}
		}

		return null;
	}

	/**
	 * Search nationalities by partial name match.
	 *
	 * Searches both nationalities and aliases.
	 *
	 * @param string $search Search term.
	 * @param int    $limit  Maximum results to return (0 = unlimited).
	 *
	 * @return array Array of matching country code => nationality pairs.
	 */
	public static function search( string $search, int $limit = 0 ): array {
		$search = strtolower( trim( $search ) );
		if ( empty( $search ) ) {
			return [];
		}

		$matches = [];

		// Search canonical nationalities
		foreach ( self::NATIONALITIES as $code => $name ) {
			if ( str_contains( strtolower( $name ), $search ) || str_contains( strtolower( $code ), $search ) ) {
				$matches[ $code ] = $name;

				if ( $limit > 0 && count( $matches ) >= $limit ) {
					return $matches;
				}
			}
		}

		// Search aliases for additional matches
		foreach ( self::ALIASES as $alias => $code ) {
			if ( ! isset( $matches[ $code ] ) && str_contains( strtolower( $alias ), $search ) ) {
				$matches[ $code ] = self::NATIONALITIES[ $code ] ?? $alias;

				if ( $limit > 0 && count( $matches ) >= $limit ) {
					return $matches;
				}
			}
		}

		return $matches;
	}

	/**
	 * Validate and sanitize a country code for nationality lookup.
	 *
	 * @param string $code Country code to validate.
	 *
	 * @return string|null Sanitized country code or null if invalid.
	 */
	public static function sanitize( string $code ): ?string {
		$code = strtoupper( trim( $code ) );

		return self::exists( $code ) ? $code : null;
	}

	/* ========================================================================
	 * FORMATTING & RENDERING
	 * ======================================================================== */

	/**
	 * Format nationality for display with optional flag and code.
	 *
	 * @param string $code         Country code.
	 * @param bool   $include_flag Include emoji flag.
	 * @param bool   $include_code Include code in parentheses.
	 *
	 * @return string Formatted nationality string.
	 */
	public static function format( string $code, bool $include_flag = false, bool $include_code = false ): string {
		$code = strtoupper( trim( $code ) );
		$name = self::get_name( $code );

		if ( $name === $code && ! self::exists( $code ) ) {
			return $code;
		}

		$parts = [];

		if ( $include_flag ) {
			$flag = self::get_flag( $code );
			if ( $flag ) {
				$parts[] = $flag;
			}
		}

		$parts[] = $name;

		if ( $include_code ) {
			$parts[] = '(' . $code . ')';
		}

		return implode( ' ', $parts );
	}

	/**
	 * Render a nationality as formatted HTML.
	 *
	 * Displays a nationality with optional emoji flag.
	 * Returns null for empty or invalid codes.
	 *
	 * @param string $code         Country code (ISO 3166-1 alpha-2, e.g., 'US', 'GB').
	 * @param bool   $include_flag Include emoji flag (default true).
	 * @param bool   $include_name Include nationality name (default true).
	 *
	 * @return string|null Formatted nationality HTML or null if empty/invalid.
	 */
	public static function render( string $code, bool $include_flag = true, bool $include_name = true ): ?string {
		if ( empty( $code ) ) {
			return null;
		}

		$code = strtoupper( trim( $code ) );

		if ( ! self::exists( $code ) ) {
			return esc_html( $code );
		}

		$parts = [];

		if ( $include_flag ) {
			$flag = self::get_flag( $code );
			if ( $flag ) {
				$parts[] = $flag;
			}
		}

		if ( $include_name ) {
			$parts[] = self::get_name( $code );
		}

		return esc_html( implode( ' ', $parts ) );
	}

	/**
	 * Get emoji flag for country.
	 *
	 * @param string $code Country code.
	 *
	 * @return string Emoji flag or empty string.
	 */
	public static function get_flag( string $code ): string {
		$code = strtoupper( trim( $code ) );

		if ( strlen( $code ) !== 2 ) {
			return '';
		}

		$flag        = '';
		$code_points = [];

		for ( $i = 0; $i < 2; $i ++ ) {
			$code_points[] = 127397 + ord( $code[ $i ] );
		}

		foreach ( $code_points as $code_point ) {
			$flag .= mb_convert_encoding( '&#' . $code_point . ';', 'UTF-8', 'HTML-ENTITIES' );
		}

		return $flag;
	}

	/* ========================================================================
	 * ALIASES
	 * ======================================================================== */

	/**
	 * Get all aliases.
	 *
	 * @return array Array of alias => country code pairs.
	 */
	public static function get_aliases(): array {
		return self::ALIASES;
	}

	/**
	 * Get all aliases for a specific country code.
	 *
	 * @param string $code Country code.
	 *
	 * @return array Array of alias names for the country.
	 */
	public static function get_aliases_for( string $code ): array {
		$code    = strtoupper( trim( $code ) );
		$aliases = [];

		foreach ( self::ALIASES as $alias => $alias_code ) {
			if ( $alias_code === $code ) {
				$aliases[] = $alias;
			}
		}

		return $aliases;
	}

}