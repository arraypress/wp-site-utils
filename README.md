# WordPress Site Utilities

A lightweight WordPress library for working with site information, configuration, and settings. Provides clean APIs for accessing WordPress site data and options.

## Features

* 🏠 **Site Information**: Name, tagline, URLs, language, and basic site data
* ⚙️ **Configuration Access**: Site options, settings, and WordPress configuration
* 🕒 **Basic Timezone**: Simple timezone access using WordPress core functions
* 📝 **Content Settings**: Posts per page, default categories, front page settings
* 🔐 **URL Generation**: Login, logout, registration, and password reset URLs
* 🎯 **Clean API**: WordPress-style snake_case methods with consistent interfaces

## Requirements

* PHP 7.4 or later
* WordPress 5.0 or later

## Installation

```bash
composer require arraypress/wp-site-utils
```

## Usage

### Site Information

```php
use ArrayPress\SiteUtils\Site;

// Basic site information
$name       = Site::get_name();
$tagline    = Site::get_tagline();
$language   = Site::get_language();
$wp_version = Site::get_wp_version();

// URLs
$site_url         = Site::get_url();
$home_url         = Site::get_home_url();
$login_url        = Site::get_login_url();
$logout_url       = Site::get_logout_url();
$registration_url = Site::get_registration_url();

// With paths and schemes
$admin_url   = Site::get_url( '/wp-admin/', 'https' );
$secure_home = Site::get_home_url( '/', 'https' );
```

### Site Status & Configuration

```php
use ArrayPress\SiteUtils\Site;

// Site status checks
if ( Site::is_multisite() ) {
	// Multisite installation
}

if ( Site::is_maintenance_mode() ) {
	// Site in maintenance mode
}

if ( Site::is_ssl() ) {
	// Site using HTTPS
}

// Feature availability
if ( Site::is_registration_enabled() ) {
	// User registration is open
}

if ( Site::are_comments_enabled() ) {
	// Comments enabled by default
}

// Configuration settings
$date_format   = Site::get_date_format();
$time_format   = Site::get_time_format();
$start_of_week = Site::get_start_of_week();
$admin_email   = Site::get_admin_email();
```

### Site Options

```php
use ArrayPress\SiteUtils\Site;

// Get options
$posts_per_page   = Site::get_posts_per_page();
$default_category = Site::get_default_category();
```

### Content Settings

```php
use ArrayPress\SiteUtils\Site;

// Front page settings
if ( Site::is_using_static_front_page() ) {
	$front_page_id = Site::get_page_on_front();
	$posts_page_id = Site::get_page_for_posts();
}

// Default settings
$posts_per_page   = Site::get_posts_per_page();
$default_category = Site::get_default_category();
```

### Basic Timezone Operations

```php
use ArrayPress\SiteUtils\Site;

// Get site timezone
$timezone     = Site::get_timezone(); // 'America/New_York'
$timezone_obj = Site::get_timezone_object(); // DateTimeZone object

// Current time in site timezone  
$current_time   = Site::get_current_time(); // MySQL format
$formatted_time = Site::get_current_time( 'Y-m-d H:i:s' );
```

## Key Features

- **Site Information Access**: Easy access to all WordPress site data and configuration
- **URL Generation**: Consistent methods for generating WordPress URLs
- **Option Management**: Clean wrapper around WordPress options API
- **Simple Timezone Access**: Basic timezone operations using WordPress core
- **Status Checks**: Quick checks for multisite, SSL, maintenance mode, etc.
- **Content Configuration**: Access to posts per page, categories, and front page settings

## WordPress Core Integration

This library complements WordPress core functions:

**WordPress Core Provides:**
- `get_bloginfo()` - Basic site information
- `get_option()` - Option access
- `is_ssl()`, `is_multisite()` - Basic status checks
- `wp_timezone_string()`, `current_time()` - Timezone functions

**This Library Adds:**
- Clean, consistent API wrapper
- URL generation helpers
- Configuration status checks
- Type-safe option handling

## Requirements

- PHP 7.4+
- WordPress 5.0+

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is licensed under the GPL-2.0-or-later License.

## Support

- [Documentation](https://github.com/arraypress/wp-site-utils)
- [Issue Tracker](https://github.com/arraypress/wp-site-utils/issues)