<?php
/**
 * Plugin File Upload Types.
 *
 * @since             1.0.0
 * @author            WPForms
 * @package           FileUploadTypes
 * @license           GPL-2.0+
 * @copyright         Copyright (c) WPForms LLC
 *
 * Plugin Name:       File Upload Types by WPForms
 * Plugin URI:        https://wpforms.com
 * Description:       Easily allow WordPress to accept and upload any file type extension or MIME type, including custom file types.
 * Author:            WPForms
 * Author URI:        https://wpforms.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Version:           1.5.0
 * Requires at least: 5.5
 * Requires PHP:      7.0
 * Text Domain:       file-upload-types
 * Domain Path:       /languages/
 */

use FileUploadTypes\Plugin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Plugin version.
 *
 * @since {VERSION}
 */
const FILE_UPLOAD_TYPES_VERSION = '1.5.0';

/**
 * Plugin file.
 *
 * @since 1.0.0
 */
const FILE_UPLOAD_TYPES_PLUGIN_FILE = __FILE__;

/**
 * Plugin path.
 *
 * @since 1.0.0
 */
define( 'FILE_UPLOAD_TYPES_PLUGIN_PATH', plugin_dir_path( FILE_UPLOAD_TYPES_PLUGIN_FILE ) );

/**
 * Return the main instance of Plugin class.
 *
 * @since 1.0.0
 *
 * @return Plugin
 */
function file_upload_types(): Plugin {

	require_once __DIR__ . '/vendor/autoload.php';

	return Plugin::get_instance();
}

file_upload_types();
