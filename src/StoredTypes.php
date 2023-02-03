<?php

namespace FileUploadTypes;

/**
 * StoredTypes class.
 *
 * @since {VERSION}
 */
class StoredTypes {

	/**
	 * Types stored in wp_options.
	 *
	 * @since {VERSION}
	 *
	 * @var void|array
	 */
	private $stored_types;

	/**
	 * Getter magic method.
	 *
	 * @since {VERSION}
	 *
	 * @param string $name Key for stored types, can be 'native', 'enabled', 'custom'.
	 *
	 * @return array
	 */
	public function __get( $name ) {

		if ( ! in_array( $name, [ 'native', 'enabled', 'custom' ], true ) ) {
			return [];
		}

		$stored_types = $this->get_stored_types();

		return isset( $stored_types[ $name ] ) ? (array) $stored_types[ $name ] : [];
	}

	/**
	 * Isset magic method.
	 *
	 * @since {VERSION}
	 *
	 * @param string $name Checked attribute.
	 *
	 * @return bool
	 */
	public function __isset( $name ) {

		$stored_types = $this->get_stored_types();

		return isset( $stored_types[ $name ] );
	}

	/**
	 * Get stored types from wp_option.
	 *
	 * @since {VERSION}
	 *
	 * @return array Stored types.
	 */
	private function get_stored_types() {

		if ( ! $this->stored_types ) {
			$this->stored_types = get_option( 'file_upload_types', [] );
		}

		return $this->stored_types;
	}

}
