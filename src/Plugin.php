<?php

namespace FileUploadTypes;

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
	 * @var Plugin
	 */
	protected static $instance;

	/**
	 * Get a single instance of the class.
	 *
	 * @since 1.0.0
	 *
	 * @return Plugin
	 */
	public static function get_instance(): Plugin {

		static $instance = null;

		if ( ! $instance instanceof self ) {
			$instance = new self();

			$instance->init();
		}

		return $instance;
	}

	/**
	 * Initialize.
	 *
	 * @since 1.1.0
	 */
	public function init() {

		$this->hooks();

		( new Sanitizer() )->hooks();
	}

	/**
	 * Register hooks.
	 *
	 * @since 1.3.0
	 */
	private function hooks() {

		add_action( 'init', [ $this, 'register_admin_area' ] );
		add_filter( 'plugin_action_links_' . plugin_basename( FILE_UPLOAD_TYPES_PLUGIN_FILE ), [ $this, 'plugin_action_links' ], 10, 4 );
		add_filter( 'upload_mimes', [ $this, 'allowed_types' ] );
		add_filter( 'wp_check_filetype_and_ext', [ $this, 'real_file_type' ], 999, 5 );
	}

	/**
	 * Register admin area.
	 *
	 * @since 1.1.0
	 */
	public function register_admin_area() {

		( new Settings() )->init();
	}

	/**
	 * Add plugin settings page link.
	 *
	 * @since        1.0.0
	 *
	 * @param array|mixed $actions     Plugin Action links.
	 * @param string      $plugin_file Path to the plugin file relative to the plugins' directory.
	 * @param array       $plugin_data An array of plugin data. See `get_plugin_data()`.
	 * @param string      $context     The plugin context.
	 *
	 * @return array
	 * @noinspection PhpMissingParamTypeInspection
	 * @noinspection PhpUnusedParameterInspection
	 * @noinspection HtmlUnknownTarget
	 */
	public function plugin_action_links( $actions, $plugin_file, $plugin_data, $context ): array { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed

		$new_actions = [
			'settings' => sprintf(
				'<a href="%s" aria-label="%s">%s</a>',
				esc_url( admin_url( 'options-general.php?page=file-upload-types' ) ),
				esc_attr__( 'File Upload Types Settings', 'file-upload-types' ),
				esc_html__( 'Settings', 'file-upload-types' )
			),
		];

		return array_merge( $new_actions, (array) $actions );
	}

	/**
	 * Format mime types stored in the database in the 'ext => mime' format.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function enabled_types(): array {

		$stored_types     = get_option( 'file_upload_types', [] );
		$enabled_types    = isset( $stored_types['enabled'] ) ? (array) $stored_types['enabled'] : [];
		$custom_types_raw = isset( $stored_types['custom'] ) ? (array) $stored_types['custom'] : [];
		$available_types  = fut_get_available_file_types();
		$return_types     = $this->add_available_types( $available_types, $enabled_types );

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
	 * Add available types to return types.
	 *
	 * @since 1.3.0
	 *
	 * @param array $available_types Available types.
	 * @param array $enabled_types   Enabled types.
	 *
	 * @return array
	 */
	private function add_available_types( array $available_types, array $enabled_types ): array {

		$return_types = [];

		foreach ( $available_types as $type ) {
			if ( in_array( $type['ext'], $enabled_types, true ) ) {

				$ext = trim( $type['ext'], '.' );
				$ext = str_replace( ',', '|', $ext );

				$return_types[ $ext ] = $type['mime'];
			}
		}

		return $return_types;
	}

	/**
	 * File types allowed uploading.
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_get_mime_types/
	 *
	 * @since 1.0.0
	 *
	 * @param array|mixed $mime_types List of all allowed in WordPress mime types.
	 *
	 * @return array
	 */
	public function allowed_types( $mime_types ): array {

		$mime_types = (array) $mime_types;

		// Only add the first mime type to the allowed list. Aliases will be dynamically added when required.
		$enabled_types = array_map(
			static function ( $enabled_types ) {

				return sanitize_mime_type( ! is_array( $enabled_types ) ? $enabled_types : $enabled_types[0] );
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
	 * @param array|mixed   $file_data File data array containing 'ext', 'type', and 'proper_filename' keys.
	 * @param string        $file      Full path to the file.
	 * @param string        $filename  The name of the file
	 *                                 (may differ from $file due to $file being in a tmp directory).
	 * @param string[]|null $mimes     Key is the file extension with value as the mime type.
	 * @param string|false  $real_mime The actual mime type or false if the type cannot be determined.
	 *
	 * @return array
	 * @noinspection PhpUnusedParameterInspection
	 * @noinspection PhpMissingParamTypeInspection
	 * @noinspection DisconnectedForeachInstructionInspection
	 */
	public function real_file_type( $file_data, $file, $filename, $mimes, $real_mime ): array { // phpcs:ignore WPForms.PHP.HooksMethod.InvalidPlaceForAddingHooks, Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed

		$file_data     = (array) $file_data;
		$extension     = pathinfo( $filename, PATHINFO_EXTENSION );
		$enabled_types = $this->enabled_types();

		// We don't need to do anything if the file uploads normally.
		if ( empty( $file_data['ext'] ) && empty( $file_data['type'] ) ) {

			// We don't need to do anything if there's no multiple mimes for this extension.
			if ( empty( $enabled_types[ $extension ] ) || ! is_array( $enabled_types[ $extension ] ) ) {
				return $file_data;
			}

			$mimes = $enabled_types[ $extension ];

			// First mime will not need this extra behavior.
			unset( $mimes[0] );

			$mimes = array_map( 'sanitize_mime_type', $mimes );

			foreach ( $mimes as $mime ) {
				// Remove filter to avoid infinite redirection.
				remove_filter( 'wp_check_filetype_and_ext', [ $this, 'real_file_type' ], 999 );

				$mime_filter = static function ( $mime_types ) use ( $mime, $extension ) {

					$mime_types[ $extension ] = $mime;

					return $mime_types;
				};

				// Add alias mime to the allowed mime types.
				add_filter( 'upload_mimes', $mime_filter );

				// Validate the new mime/extension pair.
				$file_data = wp_check_filetype_and_ext( $file, $filename, [ $extension => $mime ] );

				// Remove filter to add another mime type.
				remove_filter( 'upload_mimes', $mime_filter );

				// Continue the process.
				add_filter( 'wp_check_filetype_and_ext', [ $this, 'real_file_type' ], 999, 5 );

				if ( ! empty( $file_data['ext'] ) || ! empty( $file_data['type'] ) ) {
					return $file_data;
				}
			}
		}

		return $file_data;
	}
}
