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
		add_filter( 'wp_check_filetype_and_ext', array( $this, 'real_file_type' ), 10, 3 );

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
		include_once dirname( __FILE__ ) . '/file-upload-types-functions.php';

		if ( is_admin() ) {
			include_once dirname( __FILE__ ) . '/class-file-upload-types-settings.php';
		}

	}

	/**
	 * Format mime types stored in the database in the 'ext => mime' format.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function enabled_types() {
		$stored_types		= get_option( 'file_upload_types', array() );
		$enabled_types		= isset( $stored_types['enabled'] ) ? $stored_types['enabled'] : array();
		$custom_types_raw   = isset( $stored_types['custom'] ) ? $stored_types['custom'] : array();
		$available_types 	= fut_get_available_file_types();
		$return_types		= array();

		foreach( $available_types as $type ) {
			if ( in_array( $type['ext'], $enabled_types, true ) ) {

				$ext = trim( $type['ext'], '.' );
				$ext = str_replace( ',', '|', $ext );

				$return_types[ $ext ] = $type['mime'];
			}
		}

		foreach( $custom_types_raw as $type ) {
			if ( empty( $type['ext'] ) || empty( $type['mime'] ) ) {
				continue;
			}

			$ext = trim( $type['ext'], '.' );
			$ext = str_replace( ',', '|', $ext );

			$return_types[ $ext ] = $type['mime'];
		}

		return $return_types;
	}

	/**
	 * File types allowed to upload.
	 *
	 * @param  $mime_types array  List of all mime allowed mime types.
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_get_mime_types/
	 *
	 * @since  1.0.0
	 *
	 * @return array
	 */
	public function allowed_types( $mime_types ) {

		$enabled_types = $this->enabled_types();
		return array_merge( $mime_types, $enabled_types );
	}

	/**
	 * Filters the “real” file type of the given file.
	 *
	 * @param array 	$file_data 	File data array containing 'ext', 'type', and 'proper_filename' keys.
	 * @param string 	$file 		Full path to the file.
	 * @param string 	$filename 	The name of the file (may differ from $file due to $file being in a tmp directory).
	 *
	 * @since  1.0.0
	 *
	 * @return  array
	 */
	public function real_file_type( $file_data, $file, $filename ) {
		$real_file_type = array(
			'ext' => '',
			'type' => '',
			'proper_filename' => ''
		);

		foreach ( $file_data as $key => $value ) {
			if ( ! empty( $value ) ) {
				$real_file_type[ $key ] = $value;
			}
		}

		if ( true === apply_filters( 'file_upload_types_strict_check', true ) ) {
			return $real_file_type;
		}

		$parts 		 = explode( '.', $filename );
		$extension   = array_pop( $parts );
		$extension	 = strtolower( $extension );

		$enabled_types = $this->enabled_types();

		if ( isset( $enabled_types[ $extension ] ) ) {
			$real_file_type['ext']  = $extension;
			$real_file_type['type'] = $enabled_types[ $extension ];
			$real_file_type['proper_filename'] = $filename;
		}

		return $real_file_type;
	}
}
