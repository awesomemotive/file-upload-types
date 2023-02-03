<?php

namespace FileUploadTypes\Restrict\Native;

use FileUploadTypes\Allowed;
use FileUploadTypes\StoredTypes;

/**
 * Native file types.
 *
 * @since {VERSION}
 */
class Admin {

	/**
	 * Unflitered WP types.
	 *
	 * @since {VERSION}
	 *
	 * @var string[]
	 */
	private static $unfiltered_types;

	/**
	 * Allowed object.
	 *
	 * @since {VERSION}
	 *
	 * @var Allowed
	 */
	private $allowed;

	/**
	 * The constructor.
	 *
	 * @since {VERSION}
	 *
	 * @param Allowed $allowed Allowed object.
	 */
	public function __construct( Allowed $allowed ) {

		$this->allowed = $allowed;
	}

	/**
	 * Register hooks.
	 *
	 * @since {VERSION}
	 *
	 * @return void
	 */
	public function hooks() {

		add_action( 'file_upload_types_settings_display_types_table_after_enabled_types', [ $this, 'table_rows_with_native_types' ] );
		add_filter( 'file_upload_types_migrations_dispatcher_add_native_file_upload_types_callback', [ $this, 'dispatcher_get_migrations_list' ] );
		add_filter( 'file_upload_types_settings_transform_native_type', [ $this, 'get_upload_type' ] );
	}

	// phpcs:disable Generic.Metrics.CyclomaticComplexity.TooHigh
	/**
	 * Display table rows with native types which are not enabled.
	 *
	 * @since {VERSION}
	 *
	 * @return void
	 */
	public function table_rows_with_native_types() {

		$stored_types = new StoredTypes();

		if ( ! empty( $stored_types->native ) ) :

		?>
		<tr class="section">
			<td colspan="4"><?php esc_html_e( 'NATIVE', 'file-upload-types' ); ?></td>
		</tr>
		<?php
			foreach ( $stored_types->native as $type ) {

				if (
					in_array( $type, $stored_types->enabled, true )
				) {
					continue;
				}

				echo '<tr>';
				echo '<td width="35%">' . wp_kses( fut_get_native_file_description(), [] ) . '</td>';
				echo '<td width="40%">' . wp_kses( $this->get_mime_for_type( $type ), [ 'br' => [] ] ) . '</td>';
				echo '<td width="15%">' . esc_html( $type ) . '</td>';
				echo '<td width="10%" style="text-align:right;"><input type="checkbox" value="' . esc_attr( $type ) . '" name="e_types[]"> </td>';
				echo '</tr>';
			}
		endif;
	}
	// phpcs:enable Generic.Metrics.CyclomaticComplexity.TooHigh

	/**
	 * Get mime type for extension.
	 *
	 * @since {VERSION}
	 *
	 * @param string $ext Extension.
	 *
	 * @return string
	 */
	private function get_mime_for_type( $ext ) {

		$wp_native_types = $this->get_types();

		foreach ( $wp_native_types as $extensions => $mime ) {
			$extensions = explode( '|', $extensions );

			if ( in_array( ltrim( $ext, '.' ), $extensions, true ) ) {
				return $mime;
			}
		}

		return '';
	}

	/**
	 * Get upload type in array format.
	 *
	 * Fields are 'ext', 'mime' and 'desc'.
	 *
	 * @since {VERSION}
	 *
	 * @param string $ext Extension.
	 *
	 * @return array
	 */
	public function get_upload_type( $ext ) {

		return [
			'ext'  => $ext,
			'mime' => $this->get_mime_for_type( $ext ),
			'desc' => fut_get_native_file_description(),
		];
	}

	/**
	 * Return callback function to run migration.
	 *
	 * @since {VERSION}
	 *
	 * @param mixed $callback Callback.
	 *
	 * @return array
	 */
	public function dispatcher_get_migrations_list( $callback ) {

		return [ $this, 'register_native_file_upload_types' ];
	}

	/**
	 * Migration logic applied when registering native WP file types into `file_upload_types` option.
	 *
	 * @since {VERSION}
	 *
	 * @return bool
	 */
	public function register_native_file_upload_types() {

		$already_run = get_option( 'file_upload_types_migrations_done', [] );

		if ( isset( $already_run[ __FUNCTION__ ] ) ) {
			return false;
		}

		$stored_types = get_option( 'file_upload_types', [] );
		$native_types = $this->get_types();

		foreach ( $native_types as $extensions => $mime_type ) {
			$extensions = explode( '|', $extensions );

			foreach ( $extensions as $extension ) {
				$stored_types['native'][]  = sprintf( '.%s', $extension );
				$stored_types['enabled'][] = sprintf( '.%s', $extension );
			}
		}

		$stored_types['native']  = array_unique( $stored_types['native'] );
		$stored_types['enabled'] = array_unique( $stored_types['enabled'] );

		return update_option( 'file_upload_types', $stored_types );

	}

	// phpcs:disable WPForms.PHP.HooksMethod.InvalidPlaceForAddingHooks
	/**
	 * Get WordPress allowed mime types.
	 *
	 * Bypasses FUT plugin own filters.
	 *
	 * @since {VERSION}
	 *
	 * @return string[]
	 */
	public function get_types() {

		if ( ! self::$unfiltered_types ) {

			remove_filter( 'upload_mimes', [ $this->allowed, 'allowed_types' ] );

			self::$unfiltered_types = get_allowed_mime_types();

			add_filter( 'upload_mimes', [ $this->allowed, 'allowed_types' ] );
		}

		return self::$unfiltered_types;
	}
	// phpcs:enable WPForms.PHP.HooksMethod.InvalidPlaceForAddingHooks
}
