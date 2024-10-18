<?php

namespace FileUploadTypes;

/**
 * Sanitize SVG files from malicious tags (PHP and JavaScript).
 *
 * @since {VERSION}
 */
class Svg {

	public function hooks() {

		add_filter( 'wp_handle_sideload_prefilter', [ $this, 'handle_upload' ] );
		add_filter( 'wp_handle_upload_prefilter', [ $this, 'handle_upload' ] );
		add_action( 'wpforms_pro_forms_fields_file_upload_chunk_finalize_saved', [ $this, 'sanitize' ] );
		add_action( 'wpforms_ajax_submit_before_processing', [ $this, 'before_wpforms_processing' ] );
	}

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
	 * Sanitize SVG files from malicious tags (PHP and JavaScript).
	 *
	 * @since {VERSION}
	 *
	 * @param array $file File data.
	 *
	 * @return array
	 */
	public function handle_upload( $file ) {

		if ( ! isset( $file['tmp_name'] ) ) {
			return $file;
		}

		$wp_filetype = wp_check_filetype_and_ext(
			$file['tmp_name'],
			$file['name'] ?? ''
		);
		$type        = ! empty( $wp_filetype['type'] ) ? $wp_filetype['type'] : '';

		if ( $type !== 'image/svg+xml' ) {
			return $file;
		}

		if ( ! $this->sanitize( $file['tmp_name'] ) ) {
			$file['error'] = esc_html__( 'The SVG file could not be sanitized.', 'file-upload-types' );
		}

		return $file;
	}

	public function sanitize( $file ): bool {

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

	private function is_gzipped( string $string ): bool {

		return 0 === strpos( $string, "\x1f\x8b" );
	}

	private function remove_php_tags( string $string ): string {

		return preg_replace( '/<\?(php\b|=| ).*?\?>/sm', '', $string );
	}

	private function remove_js_tags( string $string ): string {

		return preg_replace( '/<script[^>]*>.*?<\/script>/sm', '', $string );
	}
}
