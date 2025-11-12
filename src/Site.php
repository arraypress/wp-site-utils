<?php
/**
 * Site Utility Class
 *
 * Provides utility functions for working with WordPress site information,
 * configuration, and settings. Focuses on site-level data and options.
 *
 * @package ArrayPress\SiteUtils
 * @since   1.0.0
 * @author  ArrayPress
 * @license GPL-2.0-or-later
 */

declare( strict_types=1 );

namespace ArrayPress\SiteUtils;

/**
 * Site Class
 *
 * Core operations for working with WordPress site information.
 */
class Site {

	/**
	 * Get the site name.
	 *
	 * @return string The decoded site name.
	 */
	public static function get_name(): string {
		return wp_specialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES );
	}

	/**
	 * Get the site URL.
	 *
	 * @param string      $path   Optional. Path relative to the site URL.
	 * @param string|null $scheme Optional. Scheme to give the site URL context.
	 *
	 * @return string Site URL link with optional path appended.
	 */
	public static function get_url( string $path = '', ?string $scheme = null ): string {
		return get_site_url( null, $path, $scheme );
	}

	/**
	 * Get the site's tagline.
	 *
	 * @return string The site's tagline.
	 */
	public static function get_tagline(): string {
		return get_bloginfo( 'description' );
	}

	/**
	 * Get the current site's language.
	 *
	 * @return string The site's language code.
	 */
	public static function get_language(): string {
		return get_bloginfo( 'language' );
	}

	/**
	 * Get the site's charset.
	 *
	 * @return string The site's charset (usually UTF-8).
	 */
	public static function get_charset(): string {
		return get_bloginfo( 'charset' );
	}

	/**
	 * Get the site's timezone.
	 *
	 * @return string The site's timezone string.
	 */
	public static function get_timezone(): string {
		return wp_timezone_string();
	}

	/**
	 * Get the site's admin email address.
	 *
	 * @return string The site admin email address.
	 */
	public static function get_admin_email(): string {
		return get_option( 'admin_email' );
	}

	/**
	 * Get the home URL for the current site.
	 *
	 * @param string      $path   Optional. Path relative to the home URL.
	 * @param string|null $scheme Optional. Scheme to give the home URL context.
	 *
	 * @return string Home URL link with optional path appended.
	 */
	public static function get_home_url( string $path = '', ?string $scheme = null ): string {
		return get_home_url( null, $path, $scheme );
	}

	/**
	 * Get the login URL for the current site.
	 *
	 * @param string $redirect     Optional. Path to redirect to on login.
	 * @param bool   $force_reauth Optional. Whether to force reauthorization.
	 *
	 * @return string The login URL.
	 */
	public static function get_login_url( string $redirect = '', bool $force_reauth = false ): string {
		return wp_login_url( $redirect, $force_reauth );
	}

	/**
	 * Get the logout URL for the current site.
	 *
	 * @param string $redirect Optional. Path to redirect to on logout.
	 *
	 * @return string The logout URL.
	 */
	public static function get_logout_url( string $redirect = '' ): string {
		return wp_logout_url( $redirect );
	}

	/**
	 * Get the registration URL for the current site.
	 *
	 * @return string The registration URL.
	 */
	public static function get_registration_url(): string {
		return wp_registration_url();
	}

	/**
	 * Get the lost password URL for the current site.
	 *
	 * @param string $redirect Optional. Path to redirect to after password reset.
	 *
	 * @return string The lost password URL.
	 */
	public static function get_lost_password_url( string $redirect = '' ): string {
		return wp_lostpassword_url( $redirect );
	}

	/**
	 * Get the privacy policy page URL.
	 *
	 * @return string The privacy policy URL, or empty string if not set.
	 */
	public static function get_privacy_policy_url(): string {
		return get_privacy_policy_url();
	}

	// ========================================
	// Site Status & Configuration
	// ========================================

	/**
	 * Check if the current site is a multisite installation.
	 *
	 * @return bool True if multisite, false otherwise.
	 */
	public static function is_multisite(): bool {
		return is_multisite();
	}

	/**
	 * Check if the site is currently in maintenance mode.
	 *
	 * @return bool True if in maintenance mode, false otherwise.
	 */
	public static function is_maintenance_mode(): bool {
		return wp_is_maintenance_mode();
	}

	/**
	 * Check if the site is running on HTTPS.
	 *
	 * @return bool True if the site is using HTTPS, false otherwise.
	 */
	public static function is_ssl(): bool {
		return is_ssl();
	}

	/**
	 * Check if user registration is enabled.
	 *
	 * @return bool True if users can register, false otherwise.
	 */
	public static function is_registration_enabled(): bool {
		return (bool) get_option( 'users_can_register' );
	}

	/**
	 * Check if comments are enabled globally.
	 *
	 * @return bool True if comments are enabled, false otherwise.
	 */
	public static function are_comments_enabled(): bool {
		return get_option( 'default_comment_status' ) === 'open';
	}

	/**
	 * Get the date format setting.
	 *
	 * @return string The site's date format.
	 */
	public static function get_date_format(): string {
		return get_option( 'date_format' );
	}

	/**
	 * Get the time format setting.
	 *
	 * @return string The site's time format.
	 */
	public static function get_time_format(): string {
		return get_option( 'time_format' );
	}

	/**
	 * Get the start of week setting.
	 *
	 * @return int The start of week (0 = Sunday, 1 = Monday, etc.).
	 */
	public static function get_start_of_week(): int {
		return (int) get_option( 'start_of_week' );
	}

	// ========================================
	// Content & Posts
	// ========================================

	/**
	 * Get the posts per page setting.
	 *
	 * @return int Number of posts per page.
	 */
	public static function get_posts_per_page(): int {
		return (int) get_option( 'posts_per_page' );
	}

	/**
	 * Get the page for posts setting.
	 *
	 * @return int The page ID set as the posts page, or 0 if not set.
	 */
	public static function get_page_for_posts(): int {
		return (int) get_option( 'page_for_posts' );
	}

	/**
	 * Get the page on front setting.
	 *
	 * @return int The page ID set as the front page, or 0 if not set.
	 */
	public static function get_page_on_front(): int {
		return (int) get_option( 'page_on_front' );
	}

	/**
	 * Check if the site is using a static front page.
	 *
	 * @return bool True if using a static front page, false if showing latest posts.
	 */
	public static function is_using_static_front_page(): bool {
		return get_option( 'show_on_front' ) === 'page';
	}

}