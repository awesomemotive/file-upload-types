<?php
/**
 * Plugin Name: File Upload Types
 * Description: Manage the types of files that can be uploaded to your WordPress site.
 * Version: 1.0.0
 * Author: WPForms
 * Author URI: https://wpforms.com
 * Text Domain: file-upload-types
 * Domain Path: /languages/
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

// Plugin Root File.
if ( ! defined( 'FILE_UPLOAD_TYPES_PLUGIN_FILE' ) ) {
	define( 'FILE_UPLOAD_TYPES_PLUGIN_FILE', __FILE__ );
}

// Include the main File_Upload_Types class.
if ( ! class_exists( 'File_Upload_Types' ) ) {
	require_once dirname( __FILE__ ) . '/includes/class-file-upload-types.php';
}

/**
 * Return the main instance of File_Upload_Types.
 *
 * @return Object File_Upload_Types
 */
function file_upload_types() {

	return File_Upload_Types::get_instance();
}

file_upload_types();
