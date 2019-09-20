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
		$tds 	 = $column->find('td');
		$types['desc'][] = isset( $tds[0]->plaintext ) ? $tds[0]->plaintext : '';
		$types['mime'][] = isset( $tds[1]->plaintext ) ? $tds[1]->plaintext : '';
		$types['ext'][]  = isset( $tds[2]->plaintext ) ? $tds[2]->plaintext : '';
	}

	$html->clear();
	unset( $html );

	return apply_filters( 'file_upload_types_available_file_types', array(
		array(
			'desc' => '3D Crossword Plugin',
			'mime' => 'application/vnd.hzn-3d-crossword',
			'ext' => 'x3d',
		),

		array(
			'desc' => '3GPP MSEQ File',
			'mime' => 'video/3gpp',
			'ext' => 'mseq',
		),
	));
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
