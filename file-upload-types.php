<?php
/**
 * Plugin Name: File Upload Types
 * Description: Easily allow WordPress to accept and upload any file type extension or MIME type, including custom file types.
 * Version: 1.3.0
 * Requires at least: 5.2
 * Requires PHP: 5.6
 * Author: WPForms
 * Author URI: https://wpforms.com
 * Text Domain: file-upload-types
 * Domain Path: /languages/
 */

use FileUploadTypes\Plugin as PluginAlias;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Deactivate the plugin.
 *
 * @since 1.0.0
 */
function file_upload_types_deactivate() {

	deactivate_plugins( plugin_basename( __FILE__ ) );
}

/**
 * The plugin requires PHP version 5.6+.
 * It will self-deactivate on older PHP versions and will notify an admin.
 */
if ( PHP_VERSION_ID < 50600 ) {

	add_action( 'admin_init', 'file_upload_types_deactivate' );

	/**
	 * Display a notice after deactivation.
	 *
	 * @since 1.0.0
	 */
	function file_upload_types_deactivate_msg() {

		// Display the message to admin only.
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		echo '<div class="notice notice-error"><p>';
		// phpcs:disable WPForms.PHP.ValidateDomain.InvalidDomain
		echo esc_html__( 'The File Upload Types plugin has been deactivated. Your site is running an outdated version of PHP that is no longer supported and is not compatible with the File Upload Types plugin.', 'file-upload-types' );
		// phpcs:enable WPForms.PHP.ValidateDomain.InvalidDomain
		echo '</p></div>';

		// In case this is on plugin activation.
		// phpcs:disable WordPress.Security.NonceVerification.Recommended
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
		// phpcs:enable WordPress.Security.NonceVerification.Recommended
	}
	add_action( 'admin_notices', 'file_upload_types_deactivate_msg' );

	// Do not process the plugin code further.
	return;
}

/**
 * The plugin requires WP version 5.2+.
 * It will self-deactivate on older WP versions and will notify an admin.
 */
if ( version_compare( $GLOBALS['wp_version'], '5.2', '<' ) ) {

	add_action( 'admin_init', 'file_upload_types_deactivate' );

	/**
	 * Display a notice after deactivation.
	 *
	 * @since {VERSION}
	 */
	function file_upload_types_wp_notice() {

		// Display the message to admin only.
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		echo '<div class="notice notice-error"><p>';
		// phpcs:disable WPForms.PHP.ValidateDomain.InvalidDomain
		printf( /* translators: %s - WordPress version. */
			esc_html__( 'The File Upload Types plugin has been deactivated because it requires WordPress %s or greater.', 'file-upload-types' ),
			'5.2'
		);
		// phpcs:enable WPForms.PHP.ValidateDomain.InvalidDomain
		echo '</p></div>';

		// In case this is on plugin activation.
		// phpcs:disable WordPress.Security.NonceVerification.Recommended
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
		// phpcs:enable WordPress.Security.NonceVerification.Recommended
	}
	add_action( 'admin_notices', 'file_upload_types_wp_notice' );

	// Do not process the plugin code further.
	return;
}

/**
 * Plugin file.
 *
 * @since 1.0.0
 */
define( 'FILE_UPLOAD_TYPES_PLUGIN_FILE', __FILE__ );

/**
 * Plugin path.
 *
 * @since 1.0.0
 */
define( 'FILE_UPLOAD_TYPES_PLUGIN_PATH', __DIR__ );

/**
 * Plugin version.
 *
 * @since {VERSION}
 */
define( 'FILE_UPLOAD_TYPES_VERSION', '1.3.0' );

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Return the main instance of Plugin class.
 *
 * @since 1.0.0
 *
 * @return PluginAlias
 */
function file_upload_types() {

	$instance = PluginAlias::get_instance();

	$instance->init();

	return $instance;
}

file_upload_types();
