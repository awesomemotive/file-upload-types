<?php

namespace FileUploadTypes;

defined( 'ABSPATH' ) || exit;

/**
 * Main Plugin Class.
 *
 * @since 1.0.0
 */
final class Plugin {

	/**
	 * Instance of this class.
	 *
	 * @since 1.0.0
	 *
	 * @var null|Plugin
	 */
	protected static $instance = null;

	/**
	 * Main Plugin Instance.
	 *
	 * @since 1.0.0
	 *
	 * @return Plugin Main Instance.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Initialize.
	 *
	 * @since 1.1.0
	 */
	public function init() {

		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
		add_action( 'init', array( $this, 'register_admin_area' ) );
		add_filter( 'plugin_action_links_' . plugin_basename( FILE_UPLOAD_TYPES_PLUGIN_FILE ), array( $this, 'plugin_action_links' ) );
		add_filter( 'upload_mimes', array( $this, 'allowed_types' ) );
		add_filter( 'wp_check_filetype_and_ext', array( $this, 'real_file_type' ), 10, 5 );
	}

	/**
	 * Load translation files.
	 *
	 * @since 1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain( 'file-upload-types', false, plugin_basename( dirname( FILE_UPLOAD_TYPES_PLUGIN_FILE ) ) . '/languages' );
	}

	/**
	 * Register admin area.
	 *
	 * @since 1.1.0
	 */
	public function register_admin_area() {

		$settings = new Settings();
		$settings->init();
	}

	/**
	 * Add plugin settings page link.
	 *
	 * @since 1.0.0
	 *
	 * @param array $actions Plugin Action links.
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
	 * Format mime types stored in the database in the 'ext => mime' format.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function enabled_types() {

		$stored_types     = get_option( 'file_upload_types', array() );
		$enabled_types    = isset( $stored_types['enabled'] ) ? (array) $stored_types['enabled'] : array();
		$custom_types_raw = isset( $stored_types['custom'] ) ? (array) $stored_types['custom'] : array();
		$available_types  = fut_get_available_file_types();
		$return_types     = array();

		foreach ( $available_types as $type ) {
			if ( in_array( $type['ext'], $enabled_types, true ) ) {

				$ext = trim( $type['ext'], '.' );
				$ext = str_replace( ',', '|', $ext );

				$return_types[ $ext ] = $type['mime'];
			}
		}

		foreach ( $custom_types_raw as $type ) {
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
	 * @link https://developer.wordpress.org/reference/functions/wp_get_mime_types/
	 *
	 * @since 1.0.0
	 *
	 * @param array $mime_types List of all allowed in WordPress mime types.
	 *
	 * @return array
	 */
	public function allowed_types( $mime_types ) {

		// Only add primary mime type to the allowed list. Aliases will be dynamically added when required.
		$enabled_types = array_map(
			static function( $enabled_types ) {
				return sanitize_mime_type( strstr( $enabled_types, ',', true ) );
			},
			$this->enabled_types()
		);

		return array_replace( $mime_types, $enabled_types );
	}

	/**
	 * Filters the "real" file type of the given file.
	 *
	 * @since 1.0.0
	 *
	 * @param array       $file_data File data array containing 'ext', 'type', and 'proper_filename' keys.
	 * @param string      $file      Full path to the file.
	 * @param string      $filename  The name of the file (may differ from $file due to $file being in a tmp directory).
	 * @param array       $mimes     Key is the file extension with value as the mime type.
	 * @param string|bool $real_mime The actual mime type or false if the type cannot be determined.
	 *
	 * @return  array
	 */
	public function real_file_type( $file_data, $file, $filename, $mimes, $real_mime ) {

		$extension     = pathinfo( $filename, PATHINFO_EXTENSION );
		$enabled_types = $this->enabled_types();

		// We don't need to do anything if the mime type for this extension doesnot contain a comma.
		if ( strpos( $enabled_types[ $extension ], ',' ) !== false ) {

			return $file_data;

		} elseif ( empty( $file_data['ext'] ) && empty( $file_data['type'] ) ) {

				$mimes = explode( ',', $enabled_types[ $extension ] );
				$mimes = array_map( 'trim', $mimes );
				$mimes = array_map( 'sanitize_mime_type', $mimes );

				// Primary mime will not need this extra behaviour.
				unset( $mimes[0] );

			foreach ( $mimes as $mime ) {

				// Remove filter to avoid infinite redirection.
				remove_filter( 'wp_check_filetype_and_ext', array( $this, 'real_file_type' ), 999, 5 );

				$mime_filter = static function( $mime_types ) use ( $mime, $extension ) {

					$mime_types[ $extension ] = $mime;

					return $mime_types;
				};

					// Add alias mime to the allowed mime types.
					add_filter( 'upload_mimes', $mime_filter, 999 );

					// Validate the new mime/extension pair.
					$file_data = wp_check_filetype_and_ext( $file, $filename, array( $extension => $mime ) );

					// Remove filter to add another mime type.
					remove_filter( 'upload_mimes', $mime_filter, 999 );

					// Continue the process.
					add_filter( 'wp_check_filetype_and_ext', array( $this, 'real_file_type' ), 999, 5 );

				if ( ! empty( $file_data['ext'] ) || ! empty( $file_data['type'] ) ) {
					return $file_data;
				}
			}
		}

		return $file_data;
	}
}
