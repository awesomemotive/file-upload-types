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

/**
 * Plugin constants.
 */
define( 'FILE_UPLOAD_TYPES_PLUGIN_FILE', __FILE__ );
define( 'FILE_UPLOAD_TYPES_PLUGIN_PATH', dirname( __FILE__ ) );
define( 'FILE_UPLOAD_TYPES_VERSION', '1.0.0' );

/**
 * Return the main instance of File_Upload_Types.
 *
 * @since 1.0.0
 *
 * @return File_Upload_Types
 */
function file_upload_types() {

	require_once dirname( __FILE__ ) . '/includes/class-file-upload-types.php';

	return File_Upload_Types::get_instance();
}

file_upload_types();
