<?php

namespace FileUploadTypes;

use FileUploadTypes\Plugin;

/**
 * Logic related to filtering wp_get_mime_types results, mostlyon front end.
 *
 * @since {VERSION}
 */
class Allowed {

	/**
	 * Enabled types.
	 *
	 * @since {VERSION}
	 *
	 * @var array
	 */
	private static $enabled_types;

	/**
	 * Plugin object reference.
	 *
	 * @since {VERSION}
	 *
	 * @var Plugin
	 */
	private $plugin;

	/**
	 * Class contructor.
	 *
	 * @since {VERSION}
	 *
	 * @param Plugin $plugin Plugin object reference.
	 */
	public function __construct( Plugin $plugin ) {

		$this->plugin = $plugin;
	}

	/**
	 * Register hooks.
	 *
	 * @since {VERSION}
	 *
	 * @return void
	 */
	public function hooks() {

		add_filter( 'upload_mimes', [ $this, 'allowed_types' ] );
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

		foreach ( $mime_types as $extensions => $mime ) {
			$extensions_array = explode( '|', $extensions );
			$mime_types       = count( $extensions_array ) === 1
				? $this->remove_single_extension( $extensions, $mime_types )
				: $this->process_multiple_extensions( $extensions_array, $mime_types );
		}

		return $mime_types;
	}

	/**
	 * Maybe remove single extension.
	 *
	 * @since {VERSION}
	 *
	 * @param string $extension  File extension.
	 * @param array  $mime_types WordPress allowed types.
	 *
	 * @return array
	 */
	private function remove_single_extension( $extension, $mime_types ) {

		if ( ! array_key_exists( $extension, $this->get_enabled_types() ) ) {
			unset( $mime_types[ $extension ] );
		}

		return $mime_types;
	}

	/**
	 * Process each extension from pipeline separated extensions.
	 *
	 * If extension is not allowed, remove it from mime types.
	 *
	 * @since {VERSION}
	 *
	 * @param array $extensions Allowed extensions, exploded on | sign.
	 * @param array $mime_types WordPress allowed mime types.
	 *
	 * @return array Filtered WordPress allowed mime types.
	 */
	private function process_multiple_extensions( $extensions, $mime_types ) {

		$concatenated_extensions = implode( '|', $extensions );
		$mime                    = $mime_types[ $concatenated_extensions ];

		foreach ( $extensions as $index => $extension ) {
			if ( ! array_key_exists( $extension, $this->get_enabled_types() ) ) {
				unset( $extensions[ $index ] );
			}
		}
		if ( ! empty( $extensions ) ) {
			$mime_types[ implode( '|', $extensions ) ] = $mime;
		}
		unset( $mime_types[ $concatenated_extensions ] );

		return $mime_types;
	}

	/**
	 * Get statically stored FUT enabled types.
	 *
	 * @since {VERSION}
	 *
	 * @return array|string[]
	 */
	private function get_enabled_types() {

		if ( ! self::$enabled_types ) {

			// Only add first mime type to the allowed list. Aliases will be dynamically added when required.
			self::$enabled_types = array_map(
				static function( $enabled_types ) {

					return sanitize_mime_type( ! is_array( $enabled_types ) ? $enabled_types : $enabled_types[0] );
				},
				$this->plugin->enabled_types()
			);
		}

		return self::$enabled_types;
	}
}