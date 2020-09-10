<?php

defined( 'ABSPATH' ) || exit;

/**
 * Additional available file types.
 *
 * @since 1.0.0
 *
 * @return array
 */
function fut_get_available_file_types() {

	// Serve v2 for new installs, and for old installs having multiple mime types support enabled.
	$file = ! get_option( 'file_upload_types' ) || 'enabled' === get_option( 'file_upload_types_multiple_mimes' ) ? 'file-types-list-v2' : 'file-types-list';

	$mime_types_serialized = trim( file_get_contents( dirname( FILE_UPLOAD_TYPES_PLUGIN_FILE ) . '/assets/' . $file . '.json' ) );

	return json_decode( $mime_types_serialized, true );
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
function fut_format_raw_custom_types( $file_data_raw ) {

	$file_data   = array();
	$description = isset( $file_data_raw['desc'] ) ? array_map( 'sanitize_text_field', $file_data_raw['desc'] ) : array();
	$mime_types  = isset( $file_data_raw['mime'] ) ? array_map( 'sanitize_text_field', $file_data_raw['mime'] ) : array();
	$extentions  = isset( $file_data_raw['ext'] ) ? array_map( 'sanitize_text_field', $file_data_raw['ext'] ) : array();

	foreach ( $description as $key => $desc ) {
		$file_data[ $key ]['desc'] = $desc;
	}

	foreach ( $mime_types as $key => $mime_type ) {
		$file_data[ $key ]['mime'] = strpos( $mime_type, ',' ) === false ? $mime_type : array_filter( array_map( 'trim', explode( ',', $mime_type ) ) );
	}

	foreach ( $extentions as $key => $extention ) {
		$file_data[ $key ]['ext'] = '.' . strtolower( ltrim( $extention, '.' ) );
	}

	return $file_data;
}

/**
 * Format the file types when the multiple mime types for a single extension is entered via + icon interface.
 *
 * Same extension with multiple mime types are merged and mime types are placed in an array.
 *
 * @param array $custom_types Custom file types, may contain duplicate extensions.
 *
 * @since 1.2.0
 *
 * @return array
 */
function fut_format_multiple_file_types( $custom_types ) {

	$result   = array();
	$ext_mime = array();
	$ext_desc = array();

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
		$result[] = array(
			'desc' => $ext_desc[ $ext ],
			'mime' => $mime,
			'ext'  => $ext,
		);
	}

	return $result;
}

/**
 * Notice about the deprecated filter, if it's in use.
 *
 * @since 1.2.0 Deprecate the filter that is no longer needed.
 */
add_action(
	'init',
	static function() {

		apply_filters_deprecated( 'file_upload_types_strict_check', array( true ), '1.2.0', null, 'Please add multiple MIME types for the extension whereever possible!' );
	}
);