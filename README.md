# WordPress Nationalities

A lightweight PHP library for working with nationality/demonym data in WordPress. Simple, static methods for mapping
country codes to nationalities with search and formatting utilities.

## Features

- 🌍 Complete ISO 3166-1 alpha-2 mapped nationalities (250+ entries)
- 🔄 Common aliases and informal demonyms (Kiwi, Aussie, Canuck, etc.)
- 🎯 Simple static API - no instantiation needed
- 🔍 Search and validation utilities
- 🏳️ Emoji flag support

## Installation

```bash
composer require arraypress/nationalities
```

## Basic Usage

```php
use ArrayPress\Nationalities\Nationalities;

// Get all nationalities
$nationalities = Nationalities::all();
// Returns: ['AF' => 'Afghan', 'AL' => 'Albanian', ...]

// Get nationality
$name = Nationalities::get_name( 'US' ); // "American"

// Get country code by nationality
$code = Nationalities::get_code( 'German' ); // "DE"

// Also works with aliases
$code = Nationalities::get_code( 'Kiwi' ); // "NZ"

// Check if nationality exists
if ( Nationalities::exists( 'US' ) ) {
    // Valid country code with nationality
}

// Validate and sanitize user input
$code = Nationalities::sanitize( $_POST['nationality'] ); // "US" or null
```

## Formatting & Rendering

```php
// Get emoji flag
echo Nationalities::get_flag( 'US' ); // "🇺🇸"

// Format as plain string
echo Nationalities::format( 'US', true ); // "🇺🇸 American"
echo Nationalities::format( 'US', false, true ); // "American (US)"
echo Nationalities::format( 'US', true, true ); // "🇺🇸 American (US)"

// Render as HTML (for admin tables, templates)
echo Nationalities::render( 'US' ); // "🇺🇸 American" (escaped HTML)
echo Nationalities::render( 'US', true, false ); // "🇺🇸" (flag only)
echo Nationalities::render( 'US', false ); // "American" (name only)

// Returns null for empty codes
$html = Nationalities::render( '' ); // null
```

## Aliases

```php
// Lookup by informal demonym
$code = Nationalities::get_code( 'Aussie' ); // "AU"
$code = Nationalities::get_code( 'Canuck' ); // "CA"
$code = Nationalities::get_code( 'Pinoy' );  // "PH"

// Get all aliases
$aliases = Nationalities::get_aliases();
// Returns: ['Aussie' => 'AU', 'Kiwi' => 'NZ', ...]

// Get aliases for a specific country
$aliases = Nationalities::get_aliases_for( 'PH' );
// Returns: ['Filipino', 'Filipina', 'Pinoy', 'Pinay']
```

## Search

```php
// Search by nationality or code
$results = Nationalities::search( 'ish' );
// Returns: ['GB' => 'British', 'DK' => 'Danish', 'FI' => 'Finnish', ...]

// Also searches aliases
$results = Nationalities::search( 'kiwi' );
// Returns: ['NZ' => 'New Zealander']

// Limit results
$results = Nationalities::search( 'an', 5 );
```

## Helper Functions

Global functions are available for convenience:

```php
// Get nationality
$name = get_nationality_name( 'US' ); // "American"

// Get emoji flag
$flag = get_nationality_flag( 'US' ); // "🇺🇸"

// Get all nationalities as code => name pairs
$options = get_nationality_options();

// Render as HTML
$html = render_nationality( 'US' ); // "🇺🇸 American"

// Sanitize user input
$code = sanitize_nationality_code( $_POST['nationality'] ); // "US" or null
```

## API Reference

| Method                     | Description                  | Return    |
|----------------------------|------------------------------|-----------|
| `all()`                    | Get all nationalities        | `array`   |
| `get_name($code)`          | Get nationality name         | `string`  |
| `get_code($name)`          | Get code by nationality      | `?string` |
| `exists($code)`            | Check if exists              | `bool`    |
| `sanitize($code)`          | Validate/sanitize            | `?string` |
| `search($term, $limit)`    | Search nationalities         | `array`   |
| `format($code, $flag, $c)` | Format as plain string       | `string`  |
| `render($code, $flag, $n)` | Render as HTML               | `?string` |
| `get_flag($code)`          | Get emoji flag               | `string`  |
| `get_aliases()`            | Get all aliases              | `array`   |
| `get_aliases_for($code)`   | Get aliases for country code | `array`   |

## Requirements

- PHP 7.4 or higher
- WordPress 6.0 or higher

## License

GPL-2.0-or-later
