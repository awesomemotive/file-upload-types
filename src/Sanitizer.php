<?php

namespace FileUploadTypes;

/**
 * Sanitize SVG and HTML files from JS and PHP tags.
 *
 * @since {VERSION}
 */
class Sanitizer {

	/**
	 * Hooks.
	 *
	 * @since {VERSION}
	 */
	public function hooks() {

		add_action( 'wpforms_pro_forms_fields_file_upload_chunk_finalize_saved', [ $this, 'sanitize' ], 10, 2 );
		add_action( 'wpforms_ajax_submit_before_processing', [ $this, 'before_wpforms_processing' ] );
		add_filter( 'wp_handle_sideload_prefilter', [ $this, 'handle_upload' ] );
		add_filter( 'wp_handle_upload_prefilter', [ $this, 'handle_upload' ] );
	}

	/**
	 * Sanitize files uploaded via WPForms Pro.
	 *
	 * @since {VERSION}
	 */
	public function before_wpforms_processing() {

		// phpcs:disable WordPress.Security.NonceVerification.Missing
		if ( empty ( $_FILES ) ) {
			return;
		}

		foreach ( $_FILES as $file ) {
			if ( $file['error'] !== UPLOAD_ERR_OK ) {
				continue;
			}

			$this->handle_upload( $file );
		}
		// phpcs:enable WordPress.Security.NonceVerification.Missing
	}

	/**
	 * Sanitize SVG/HTML files from malicious tags (PHP and JavaScript).
	 *
	 * @since {VERSION}
	 *
	 * @param array $file File data.
	 *
	 * @return array
	 */
	public function handle_upload( $file ): array {

		if ( ! isset( $file['tmp_name'] ) ) {
			return $file;
		}

		if ( ! $this->sanitize( $file['tmp_name'], $file['name'] ) ) {
			$file['error'] = esc_html__( 'The SVG file could not be sanitized.', 'file-upload-types' );
		}

		return $file;
	}

	/**
	 * Sanitize data.
	 *
	 * @since {VERSION}
	 *
	 * @param string $file      File path.
	 * @param string $file_name File name.
	 *
	 * @return bool
	 */
	public function sanitize( $file, $file_name ): bool {

		if ( $file_name ) {
			$wp_filetype = wp_check_filetype_and_ext( $file, $file_name );

			if ( ! $this->is_risky( $wp_filetype ) ) {
				return true;
			}
		}

		$dirty = file_get_contents( $file ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

		// Maybe ungzip.
		$is_zipped = $this->is_gzipped( $dirty );

		if ( $is_zipped ) {
			$dirty = gzdecode( $dirty );

			if ( $dirty === false ) {
				return false;
			}
		}

		$clean = $this->remove_php_tags( $dirty );
		$clean = $this->remove_js_tags( $clean );

		if ( $clean === null ) { // Error while removing tags.
			return false;
		}

		// Maybe gzip.
		if ( $is_zipped ) {
			$clean = gzencode( $clean );
		}

		file_put_contents( $file, $clean );

		return true;
	}

	/**
	 * Check if the file is a risky file type.
	 *
	 * @since {VERSION}
	 *
	 * @param array $file File data
	 */
	private function is_risky( $file ): bool {

		/**
		 * Filter to allow adding risky file extensions.
		 *
		 * @since {VERSION}
		 *
		 * @param array $risky_extensions Risky file extensions.
		 * @param array $file             File data.
		 */
		$risky_extensions = apply_filters(
			'file_upload_types_sanitizer_is_risky_extensions',
			[ 'svg', 'html', 'htm', 'xhtml', 'phtml' ],
			$file
		);

		return in_array(
			$file['ext'] ?? '',
			$risky_extensions,
			true
		);
	}

	/**
	 * Check if the file is gzipped.
	 *
	 * @since {VERSION}
	 *
	 * @param string $string File data.
	 *
	 * @return bool
	 */
	private function is_gzipped( string $string ): bool {

		return 0 === strpos( $string, "\x1f\x8b" );
	}

	/**
	 * Remove PHP tags.
	 *
	 * @since {VERSION}
	 *
	 * @param string $string File data.
	 *
	 * @return string
	 */
	private function remove_php_tags( string $string ): string {

		return preg_replace( '/<\?(php\b|=| ).*?\?>/sm', '', $string );
	}

	/**
	 * Remove JS tags.
	 *
	 * @since {VERSION}
	 *
	 * @param string $string File data.
	 *
	 * @return string
	 */
	private function remove_js_tags( string $string ): string {

		return preg_replace( '/<script[^>]*>.*?<\/script>/sm', '', $string );
	}
}
