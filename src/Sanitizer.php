<?php

namespace FileUploadTypes;

/**
 * Sanitize SVG and HTML files from JS and PHP tags.
 *
 * @since 1.5.0
 */
class Sanitizer {

	/**
	 * Hooks.
	 *
	 * @since 1.5.0
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
	 * @since 1.5.0
	 */
	public function before_wpforms_processing() {

		// phpcs:disable WordPress.Security.NonceVerification.Missing
		if ( empty( $_FILES ) ) {
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
	 * @since 1.5.0
	 *
	 * @param array|mixed $file File data.
	 *
	 * @return array
	 */
	public function handle_upload( $file ): array {

		$file = (array) $file;

		if ( ! isset( $file['tmp_name'] ) ) {
			return $file;
		}

		if ( ! $this->sanitize( (string) $file['tmp_name'], (string) ( $file['name'] ?? '' ) ) ) {
			$file['error'] = esc_html__( 'The SVG file could not be sanitized.', 'file-upload-types' );
		}

		return $file;
	}

	/**
	 * Sanitize data.
	 *
	 * @since 1.5.0
	 *
	 * @param string $file      File path.
	 * @param string $file_name File name.
	 *
	 * @return bool
	 */
	public function sanitize( string $file, string $file_name ): bool {

		if ( $file_name ) {
			$wp_filetype = wp_check_filetype_and_ext( $file, $file_name );

			if ( ! $this->is_risky( $wp_filetype ) ) {
				return true;
			}
		}

		$ext  = $wp_filetype['ext'] ?? '';
		$type = $ext === 'svg' ? 'svg' : 'html';

		$content = file_get_contents( $file ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

		$content = $this->sanitize_content( $content, $type );

		if ( ! $content ) {
			return false;
		}

		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_file_put_contents
		file_put_contents( $file, $content );

		return true;
	}

	/**
	 * Sanitize content.
	 *
	 * @since 1.5.0
	 *
	 * @param string $content File content.
	 * @param string $type    File type, 'svg' or 'html'.
	 *
	 * @return string|false
	 * @noinspection CallableParameterUseCaseInTypeContextInspection
	 */
	private function sanitize_content( string $content, string $type ) {

		$is_zipped = $this->is_gzipped( $content );

		// Maybe unzip.
		if ( $is_zipped ) {
			// phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
			$content = @gzdecode( $content );

			if ( $content === false ) {
				return false;
			}
		}

		$content = $this->remove_js_tags( $content );

		if ( $type === 'svg' ) {
			$allowed_tags     = $this->reformat_allowed_tags( SanitizerSvg::ALLOWED );
			$type_declaration = SanitizerSvg::get_type_declaration( $content );
		} else {
			$allowed_tags     = $this->reformat_allowed_tags( SanitizerHtml::ALLOWED );
			$type_declaration = SanitizerHtml::get_type_declaration( $content );

		}

		$content = wp_kses( $content, $allowed_tags );
		$content = $type_declaration . $content;

		if ( ! $content ) { // Error while removing tags.
			return false;
		}

		// Maybe gzip.
		if ( $is_zipped ) {
			// phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
			$content = @gzencode( $content );
		}

		return $content;
	}

	/**
	 * Check if the file is a risky file type.
	 *
	 * @since 1.5.0
	 *
	 * @param array $file File data.
	 */
	private function is_risky( array $file ): bool {

		/**
		 * Filter to allow adding risky file extensions.
		 *
		 * @since 1.5.0
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
	 * @since 1.5.0
	 *
	 * @param string $file File data.
	 *
	 * @return bool
	 */
	private function is_gzipped( string $file ): bool {

		return 0 === strpos( $file, "\x1f\x8b" );
	}

	/**
	 * Remove JS tags.
	 *
	 * @since 1.5.0
	 *
	 * @param string $content File content.
	 *
	 * @return string
	 */
	private function remove_js_tags( string $content ): string {

		return (string) preg_replace( '/<script[^>]*>.*?<\/script>/sm', '', $content );
	}

	/**
	 * Get allowed tags for HTML.
	 *
	 * @since 1.5.0
	 *
	 * @param array $allowed Preloaded allowed tags.
	 *
	 * @return array
	 */
	private function reformat_allowed_tags( array $allowed ): array {

		foreach ( $allowed as $element => $attributes ) {
			$attributes          = array_map( 'strtolower', $attributes );
			$attributes[]        = 'id';
			$attributes[]        = 'class';
			$allowed[ $element ] = array_fill_keys( $attributes, [] );
		}

		return $allowed;
	}
}
