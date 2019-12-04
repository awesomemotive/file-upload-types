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

	$mime_types_serialized = trim( file_get_contents( dirname( FILE_UPLOAD_TYPES_PLUGIN_FILE ) . '/assets/file-types-list.json' ) );

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
	$mime_types  = isset( $file_data_raw['mime'] ) ? array_map( 'sanitize_mime_type', $file_data_raw['mime'] ) : array();
	$extentions  = isset( $file_data_raw['ext'] ) ? array_map( 'sanitize_text_field', $file_data_raw['ext'] ) : array();

	foreach ( $description as $key => $desc ) {
		$file_data[ $key ]['desc'] = $desc;
	}

	foreach ( $mime_types as $key => $mime_type ) {
		$file_data[ $key ]['mime'] = $mime_type;
	}

	foreach ( $extentions as $key => $extention ) {
		$file_data[ $key ]['ext'] = $extention;
	}

	return $file_data;
}
