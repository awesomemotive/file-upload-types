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

	$list   = fopen( dirname( __FILE__ ) . '/file-types-list.txt', "wb" ) or die( "Unable to open file!" );

	fwrite( $list, serialize( $types ) );
	fclose( $list );

	$types  = fut_format_raw_custom_types( $types );

	return $types;
}

/**
 * Performs recursive array_diff alike functionality.
 *
 * @param  array $array1
 * @param  array $array2
 *
 * @see  https://www.php.net/manual/en/function.array-diff.php#91756
 *
 * @since  1.0.0
 *
 * @return array
 */
function fut_array_recursive_diff( $array1, $array2 ) {
	$return = array();

	foreach ( $array1 as $key => $value ) {
		if ( array_key_exists( $key, $array2 ) ) {
			if ( is_array( $value ) ) {
				$recursive_diff = fut_array_recursive_diff( $value, $array2[ $key ] );

				if ( count( $recursive_diff ) ) {
					$return[ $key ] = $recursive_diff;
				}
			} else {
				if ( $value != $array2[ $key ] ) {
					$return[ $key ] = $value;
				}
			}
		} else {
			$return[ $key ] = $value;
		}
	}

	return $return;
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
