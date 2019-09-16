<?php

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Main File_Upload_Types Class.
 *
 * @since  1.0.0
 *
 * @class   File_Upload_Types
 */
final class File_Upload_Types {

	/**
	 * File Upload Types version.
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * Instance of this class.
	 *
	 * @var object File_Upload_Types
	 */
	protected static $_instance = null;

	/**
	 * Main File_Upload_Types Instance.
	 *
	 * @return File_Upload_Types Main Instance.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * File_Upload_Types Constructor.
	 */
	public function __construct() {

		// Load plugin text domain.
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
		add_filter( 'plugin_action_links_'. plugin_basename( FILE_UPLOAD_TYPES_PLUGIN_FILE ), array( $this, 'plugin_action_links' ) );
		add_filter( 'upload_mimes', array( $this, 'allowed_types' ) );
		add_filter( 'wp_check_filetype_and_ext', array( $this, 'real_file_types' ), 10, 5 );

		$this->define_constants();
		$this->includes();
	}

	/**
	 * Load Localisation files.
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'file-upload-types', false, plugin_basename( dirname( FILE_UPLOAD_TYPES_PLUGIN_FILE ) ) . '/languages' );
	}

	/**
	 * Add plugin settings page link.
	 *
	 * @param  array $actions Plugin Action links.
	 *
	 * @return array
	 */
	public function plugin_action_links( $actions ) {
		$new_actions = array(
			'settings' => '<a href="' . admin_url( 'options-general.php?page=file-upload-types' ) . '" aria-label="' . esc_attr__( 'File Upload Types Settings', 'file-upload-types' ) . '">' . esc_html__( 'Settings', 'file-upload-types' ) . '</a>',
		);

		return array_merge( $new_actions, $actions );
	}

	/**
	 * Define Constants.
	 */
	private function define_constants() {
		$this->define( 'FUT_ABSPATH', dirname( FILE_UPLOAD_TYPES_PLUGIN_FILE ) . '/' );
		$this->define( 'FUT_VERSION', $this->version );
	}

	/**
	 * Define constant if not already set.
	 *
	 * @param string      $name
	 * @param string|bool $value
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	/**
	 * Includes.
	 */
	private function includes() {
		if ( is_admin() ) {
			include_once dirname( __FILE__ ) . '/class-file-upload-types-settings.php';
			include_once dirname( __FILE__ ) . '/file-upload-types-functions.php';
		}
	}

	/**
	 * File types allowed to upload.
	 *
	 * @param  $mime_types array  List of all mime allowed mime types.
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_get_mime_types/
	 *
	 * @return array
	 *
	 * @since  1.0.0
	 */
	public function allowed_types( $mime_types ) {
		$enabled_types 		= get_option( 'file_upload_types', array() );
		$add_mime_types	   	= array();

		foreach( $enabled_types as $type ) {

			if ( empty( $type['ext'] ) || empty( $type['mime'] ) ) {
				continue;
			}

			$add_mime_types[ $type['ext'] ] = $type['mime'];
		}

		return array_merge( $mime_types, $add_mime_types );
	}

	/**
	 * Filters the “real” file type of the given file.
	 *
	 * @param array 	$wp_check_filetype_and_ext 	File data array containing 'ext', 'type', and 'proper_filename' keys.
	 * @param string 	$file 						Full path to the file.
	 * @param string 	$filename 					The name of the file (may differ from $file due to $file being in a tmp directory).
	 * @param array 	$mimes 						Key is the file extension with value as the mime type.
	 * @param string|bool $real_mime 				The actual mime type or false if the type cannot be determined.
	 *
	 * @return array.
	 *
	 * @since  1.0.0
	 */
	public function real_file_types ( $wp_check_filetype_and_ext, $file, $filename, $mimes, $real_mime ) {

	}
}
