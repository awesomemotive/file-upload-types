<?php

/**
 * Additional available file types.
 *
 * @since 1.0.0
 *
 * @return array
 */
function fut_get_available_file_types(): array {

	// Serve v2 for new installations, and for old installations having multiple mime types support enabled.
	$file =
		(
			! get_option( 'file_upload_types' ) ||
			'enabled' === get_option( 'file_upload_types_multiple_mimes' )
		)
			? 'file-types-list-v2'
			: 'file-types-list';

	// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
	$mime_types_serialized = trim( file_get_contents( dirname( FILE_UPLOAD_TYPES_PLUGIN_FILE ) . '/assets/' . $file . '.json' ) );

	return json_decode( $mime_types_serialized, true ) ?? [];
}

/**
 * Formats raw data of file types.
 *
 * @since 1.0.0
 *
 * @param array $file_data_raw Raw data of the file types.
 *
 * @return array
 */
function fut_format_raw_custom_types( array $file_data_raw ): array {

	$description = isset( $file_data_raw['desc'] ) ? array_map( 'sanitize_text_field', $file_data_raw['desc'] ) : [];
	$mime_types  = isset( $file_data_raw['mime'] ) ? array_map( 'sanitize_text_field', $file_data_raw['mime'] ) : [];
	$extensions  = isset( $file_data_raw['ext'] ) ? array_map( 'sanitize_text_field', $file_data_raw['ext'] ) : [];

	$file_data = _fut_update_file_data_description( $description );
	$file_data = _fut_update_file_data_mime( $file_data, $mime_types );

	return _fut_update_file_data_extensions( $file_data, $extensions );
}

/**
 * Format the file types when the multiple mime types for a single extension are entered via + icon interface.
 *
 * Same extensions with multiple mime types are merged, and mime types are placed in an array.
 *
 * @since 1.2.0
 *
 * @param array $custom_types Custom file types, may contain duplicate extensions.
 *
 * @return array
 */
function fut_format_multiple_file_types( array $custom_types ): array {

	$result   = [];
	$ext_mime = [];
	$ext_desc = [];

	foreach ( $custom_types as $types ) {
		if ( ! isset( $ext_mime[ $types['ext'] ] ) ) {
			$ext_mime[ $types['ext'] ] = $types['mime'];
		} else {
			$ext_mime[ $types['ext'] ] = array_merge( (array) $ext_mime[ $types['ext'] ], (array) $types['mime'] );
		}

		// The last description will be used when several mimes for a single extensions are added using + in plugin admin area.
		$ext_desc[ $types['ext'] ] = $types['desc'];
	}

	foreach ( $ext_mime as $ext => $mime ) {
		$result[] = [
			'desc' => $ext_desc[ $ext ],
			'mime' => $mime,
			'ext'  => $ext,
		];
	}

	return $result;
}

if ( function_exists( 'add_action' ) ) {
	/**
	 * Notice about the deprecated filter, if it's in use.
	 *
	 * @since 1.2.0
	 */
	add_action(
		'init',
		static function () {

			/**
			 * Filter value for the notice about the deprecated filter.
			 *
			 * @since      1.2.0
			 *
			 * @param array  $deprecated  Boolean value about deprecate status.
			 * @param string $version     Version number.
			 * @param mixed  $replacement Replacement.
			 * @param string $message     Message.
			 *
			 * @deprecated 1.2.0
			 */
			apply_filters_deprecated( 'file_upload_types_strict_check', [ true ], '1.2.0', null, 'Please add multiple MIME types for the extension wherever possible!' );
		}
	);
}

if ( ! function_exists( '_fut_update_file_data_description' ) ) {
	/**
	 * Update file data description.
	 *
	 * Use internally only.
	 *
	 * @since 1.3.0
	 *
	 * @see   fut_format_raw_custom_types
	 *
	 * @param array $descriptions Descriptions.
	 *
	 * @return array
	 */
	function _fut_update_file_data_description( array $descriptions ): array {

		$file_data = [];

		foreach ( $descriptions as $key => $desc ) {
			$file_data[ $key ]['desc'] = $desc;
		}

		return $file_data;
	}
}

if ( ! function_exists( '_fut_update_file_data_mime' ) ) {
	/**
	 * Update file data mime types.
	 *
	 * Use internally only.
	 *
	 * @since 1.3.0
	 *
	 * @see   fut_format_raw_custom_types
	 *
	 * @param array $file_data File data.
	 * @param array $mime Mime types.
	 *
	 * @return array
	 */
	function _fut_update_file_data_mime( array $file_data, array $mime ): array {

		foreach ( $mime as $key => $mime_type ) {
			$file_data[ $key ]['mime'] = strpos( $mime_type, ',' ) === false ? $mime_type : array_filter( array_map( 'trim', explode( ',', $mime_type ) ) );
		}

		return $file_data;
	}
}

if ( ! function_exists( '_fut_update_file_data_extensions' ) ) {
	/**
	 * Update file data extensions.
	 *
	 * Use internally only.
	 *
	 * @since 1.3.0
	 *
	 * @see   fut_format_raw_custom_types
	 *
	 * @param array $file_data  File data.
	 * @param array $extensions Extensions.
	 *
	 * @return array
	 */
	function _fut_update_file_data_extensions( array $file_data, array $extensions ): array {

		foreach ( $extensions as $key => $extension ) {
			$file_data[ $key ]['ext'] = '.' . strtolower( ltrim( $extension, '.' ) );
		}

		return $file_data;
	}
}
