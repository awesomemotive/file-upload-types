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
 * File Types WordPress supports by default.
 *
 * @since  1.0.0
 *
 * @return array
 */
function fut_get_allowed_file_types() {
	return apply_filters( 'file_upload_types_allowed_file_types', array(
				array(
					'desc' => 'JPEG image',
					'mime' => 'image/jpeg',
					'ext' => 'jpeg',
				),
				array(
					'desc' => 'Microsoft Word Document',
					'mime' => 'application/msword',
					'ext' => 'doc',
				),
			));
}

/**
 * Additional available file types.
 *
 * @since  1.0.0
 *
 * @return array
 */
function fut_get_available_file_types() {
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
