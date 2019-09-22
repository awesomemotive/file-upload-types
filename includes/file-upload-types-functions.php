<?php
/**
 * File Upload Types Functions.
 *
 * General core functions to get file types.
 *
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Additional available file types.
 *
 * @since  1.0.0
 *
 * @return array
 */
function fut_get_available_file_types() {

	if ( file_exists( dirname( __FILE__ ) . '/file-types-list.txt' ) ) {
		$mime_types_serialized = trim( file_get_contents( dirname( __FILE__ ) . '/file-types-list.txt' ) );
		$types = @unserialize( $mime_types_serialized );

	} else {

		require_once dirname( __FILE__ ) . '/library/simple_html_dom.php';

		$html 	  = file_get_html( 'https://www.freeformatter.com/mime-types-list.html' );
		$types 	  = array();
		$columns  = $html->find( '#mime-types-list table tbody tr' );

		foreach( $columns as $column ) {
			$tds 	 		 = $column->find('td');
			$types['desc'][] = isset( $tds[0]->plaintext ) ? $tds[0]->plaintext : '';
			$types['mime'][] = isset( $tds[1]->plaintext ) ? $tds[1]->plaintext : '';
			$types['ext'][]  = isset( $tds[2]->plaintext ) ? $tds[2]->plaintext : '';
		}

		$html->clear();
		unset( $html );

		$types  = fut_format_raw_custom_types( $types );

		usort( $types, function( $str1, $str2 ) {
			return strcasecmp( $str1['desc'], $str2['desc'] );
		});

		$list   = fopen( dirname( __FILE__ ) . '/file-types-list.txt', "wb" ) or die( "Unable to open file!" );

		fwrite( $list, serialize( $types ) );
		fclose( $list );
	}

	return $types;
}

/**
 * Formats raw data of file types.
 *
 * @param  array
 *
 * @since  1.0.0
 *
 * @return array
 */
function fut_format_raw_custom_types( $custom_types_raw ) {

	$custom_types 		 = array();
	$description  		 = isset( $custom_types_raw['desc'] ) ? array_map( 'sanitize_text_field', $custom_types_raw['desc'] ) : array();
	$mime_types   		 = isset( $custom_types_raw['mime'] ) ? array_map( 'sanitize_mime_type', $custom_types_raw['mime'] ) : array();
	$extentions   		 = isset( $custom_types_raw['ext'] ) ? array_map( 'sanitize_text_field', $custom_types_raw['ext'] ) : array();

	foreach( $description as $key =>  $desc ) {
		$custom_types[ $key ]['desc'] = $desc;
	}

	foreach( $mime_types as $key => $mime_type ) {
		$custom_types[ $key ]['mime'] = $mime_type;
	}

	foreach( $extentions as $key => $extention ) {
		$custom_types[ $key ]['ext'] = $extention;
	}

	return $custom_types;
}
