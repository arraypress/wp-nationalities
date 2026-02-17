<?php
/**
 * Global Nationality Helper Functions
 *
 * Provides convenient global functions for common nationality operations.
 * These functions are wrappers around the ArrayPress\Nationalities\Nationalities class.
 *
 * @package ArrayPress\Nationalities
 * @since   1.0.0
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

use ArrayPress\Nationalities\Nationalities;

if ( ! function_exists( 'get_nationality_name' ) ) {
	/**
	 * Get nationality by country code.
	 *
	 * @param string $code Country code (case-insensitive).
	 *
	 * @return string Nationality or original code if not found.
	 */
	function get_nationality_name( string $code ): string {
		return Nationalities::get_name( $code );
	}
}

if ( ! function_exists( 'get_nationality_flag' ) ) {
	/**
	 * Get emoji flag for a nationality's country.
	 *
	 * @param string $code Country code.
	 *
	 * @return string Emoji flag or empty string.
	 */
	function get_nationality_flag( string $code ): string {
		return Nationalities::get_flag( $code );
	}
}

if ( ! function_exists( 'sanitize_nationality_code' ) ) {
	/**
	 * Validate and sanitize a country code for nationality lookup.
	 *
	 * @param string $code Country code to validate.
	 *
	 * @return string|null Sanitized country code or null if invalid.
	 */
	function sanitize_nationality_code( string $code ): ?string {
		return Nationalities::sanitize( $code );
	}
}

if ( ! function_exists( 'get_nationality_options' ) ) {
	/**
	 * Get all nationalities as code => name pairs.
	 *
	 * @return array Array of country code => nationality pairs.
	 */
	function get_nationality_options(): array {
		return Nationalities::all();
	}
}

if ( ! function_exists( 'render_nationality' ) ) {
	/**
	 * Render a nationality as formatted HTML with flag and name.
	 *
	 * @param string $code         Country code (ISO 3166-1 alpha-2).
	 * @param bool   $include_flag Include emoji flag (default true).
	 * @param bool   $include_name Include nationality name (default true).
	 *
	 * @return string|null Formatted nationality HTML or null if empty/invalid.
	 */
	function render_nationality( string $code, bool $include_flag = true, bool $include_name = true ): ?string {
		return Nationalities::render( $code, $include_flag, $include_name );
	}
}
