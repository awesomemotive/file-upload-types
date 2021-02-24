<?php
/**
 * Plugin Name: File Upload Types
 * Description: Easily allow WordPress to accept and upload any file type extension or MIME type, including custom file types.
 * Version: 1.2.1
 * Author: WPForms
 * Author URI: https://wpforms.com
 * Text Domain: file-upload-types
 * Domain Path: /languages/
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * The plugin requires PHP 5.6.0+.
 * It will self-deactivate on older PHP versions ad will notify an admin.
 */
if ( version_compare( PHP_VERSION, '5.6.0', '<' ) ) {

	/**
	 * Deactivate the plugin.
	 *
	 * @since 1.0.0
	 */
	function file_upload_types_deactivate() {

		deactivate_plugins( plugin_basename( __FILE__ ) );
	}
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
		echo esc_html__( 'The File Upload Types plugin has been deactivated. Your site is running an outdated version of PHP that is no longer supported and is not compatible with the File Upload Types plugin.', 'file-upload-types' );
		echo '</p></div>';

		if ( isset( $_GET['activate'] ) ) { // WPCS: CSRF ok.
			unset( $_GET['activate'] ); // WPCS: CSRF ok.
		}
	}
	add_action( 'admin_notices', 'file_upload_types_deactivate_msg' );

	return;
}

/**
 * Plugin constants.
 */
define( 'FILE_UPLOAD_TYPES_PLUGIN_FILE', __FILE__ );
define( 'FILE_UPLOAD_TYPES_PLUGIN_PATH', dirname( __FILE__ ) );
define( 'FILE_UPLOAD_TYPES_VERSION', '1.2.1' );

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Return the main instance of Plugin class.
 *
 * @since 1.0.0
 *
 * @return \FileUploadTypes\Plugin
 */
function file_upload_types() {

	$instance = \FileUploadTypes\Plugin::get_instance();
	$instance->init();

	return $instance;
}

file_upload_types();
