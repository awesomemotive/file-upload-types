<?php

namespace FileUploadTypes\Restrict;

use FileUploadTypes\Plugin;

class Native {

	public function init() {
		add_action( 'fileuploadtypes_settings_display_types_table_after_enabled_types', [ $this, 'table_rows_with_native_types' ] );
	}

	public function table_rows_with_native_types() {
		?>
		<tr class="section">
			<td colspan="4"><?php esc_html_e( 'NATIVE', 'file-upload-types' ); ?></td>
		</tr>
		<?php
	}

	public function register_native_file_upload_types() {

		$already_run    = get_option( 'fut_migrations_done', [] );

		if ( isset( $already_run[ __FUNCTION__ ] ) ) {
			return false;
		}

		$stored_types = get_option( 'file_upload_types', [] );
		$native_types = $this->get_types();

		foreach ( $native_types as $extensions => $mime_type ) {
			$extensions = explode( '|', $extensions );
			foreach ( $extensions as $extension ) {
				$stored_types['native'][] = sprintf( '.%s', $extension );
			}
		}

		return update_option( 'file_upload_types', $stored_types );

	}

	public function get_types() {

		remove_filter( 'upload_mimes', [ Plugin::get_instance(), 'allowed_types' ] );

		$types = get_allowed_mime_types();

		add_filter( 'upload_mimes', [ Plugin::get_instance(), 'allowed_types' ] );

		return $types;
	}
}