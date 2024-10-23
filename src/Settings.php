<?php

namespace FileUploadTypes;

/**
 * File Upload Types Settings.
 *
 * @since 1.0.0
 */
class Settings {

	/**
	 * Admin page slug.
	 *
	 * @since 1.0.0
	 */
	const SLUG = 'file-upload-types';

	/**
	 * Initialize.
	 *
	 * @since 1.1.0
	 */
	public function init() {

		$this->hooks();
	}

	/**
	 * Register hooks.
	 *
	 * @since 1.3.0
	 */
	private function hooks() {

		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_assets' ] );
		add_action( 'in_admin_header', [ $this, 'display_admin_header' ], 100 );
		add_action( 'admin_menu', [ $this, 'add_settings_page' ] );
		add_action( 'admin_init', [ $this, 'save_settings' ] );
		add_action( 'file_upload_types_settings_after_nav_bar', [ $this, 'display_multiple_mimes_support_notice' ] );
		add_action( 'admin_init', [ $this, 'enable_multiple_mimes_support' ] );
		add_filter( 'admin_footer_text', [ $this, 'get_admin_footer' ], 1 );
		add_action( 'admin_print_scripts', [ $this, 'remove_notices' ] );
		add_action( 'wp_ajax_file_upload_types_check_sample', [ $this, 'check_sample' ] );
	}

	/**
	 * Checks if current screen is File Upload Types or not.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public function is_admin_screen(): bool {

		$screen    = get_current_screen();
		$screen_id = $screen->id ?? '';

		return $screen_id === 'settings_page_file-upload-types';
	}

	/**
	 * Enqueue all assets.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_assets() {

		if ( ! $this->is_admin_screen() ) {
			return;
		}

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_style(
			'file-upload-types-css',
			plugins_url( 'assets/css/style.css', FILE_UPLOAD_TYPES_PLUGIN_FILE ),
			[],
			FILE_UPLOAD_TYPES_VERSION
		);

		wp_enqueue_script(
			'file-upload-types-dropzone',
			plugins_url( 'assets/js/dropzone.min.js', FILE_UPLOAD_TYPES_PLUGIN_FILE ),
			[],
			'5.9.3',
			true
		);

		wp_enqueue_script(
			'file-upload-types',
			plugins_url( 'assets/js/script' . $suffix . '.js', FILE_UPLOAD_TYPES_PLUGIN_FILE ),
			[ 'jquery' ],
			FILE_UPLOAD_TYPES_VERSION,
			true
		);

		// phpcs:ignore WPForms.PHP.ValidateDomain.InvalidDomain
		$strings = [
			'default_section' => esc_html__( 'Default section can not be deleted.', 'file-upload-types' ),
			'nonce'           => wp_create_nonce( 'file_upload_types_nonce' ),
		];

		wp_localize_script( 'file-upload-types', 'file_upload_types_params', $strings );
	}

	/**
	 * Outputs the plugin admin header.
	 *
	 * @since 1.0.0
	 */
	public function display_admin_header() {

		if ( ! $this->is_admin_screen() ) {
			return;
		}

		?>
		<div id="file-upload-types-header">
			<img src="<?php echo esc_url( plugins_url( 'assets/images/logo.png', FILE_UPLOAD_TYPES_PLUGIN_FILE ) ); ?> " alt="<?php esc_attr_e( 'File Upload Types', 'file-upload-types' ); ?>" class="file-upload-types-header-logo">
		</div>

		<?php
	}

	/**
	 * Add File Upload Types submenu under Settings menu.
	 *
	 * @since 1.0.0
	 */
	public function add_settings_page() {

		add_options_page(
			esc_html__( 'File Upload Types', 'file-upload-types' ),
			esc_html__( 'File Upload Types', 'file-upload-types' ),
			'manage_options',
			self::SLUG,
			[ $this, 'display' ]
		);
	}

	/**
	 * Add contents to the settings page.
	 *
	 * @since 1.0.0
	 */
	public function display() {

		if ( ! $this->is_admin_screen() ) {
			return;
		}
		?>

		<div class="wrap" id="file-upload-types">
			<div class="file-upload-types-page file-upload-types-page-settings ">
				<div class="file-upload-types-nav">
					<div class="file-upload-types-nav-title">
						<p>
							<?php esc_html_e( 'Settings', 'file-upload-types' ); ?>
						</p>
					</div>
					<div class="fie-upload-types-docs">
						<p>
							<?php esc_html_e( 'Need some help?', 'file-upload-types' ); ?>
							<a href="https://wpforms.com/docs/how-to-allow-additional-file-upload-types/?utm_source=WordPress&utm_medium=fut-help&utm_campaign=file-upload-types&utm_content=view-documentation"
								target="_blank"
								rel="noopener noreferrer"
								class="button button-secondary">
								<?php esc_html_e( 'View Documentation', 'file-upload-types' ); ?>
							</a>
						</p>
					</div>
				</div>

				<?php
				// phpcs:disable WPForms.PHP.ValidateHooks.InvalidHookName
				/**
				 * Action after nav bar on File Upload Type plugin settings page.
				 *
				 * @since 1.2.0
				 */
				do_action( 'file_upload_types_settings_after_nav_bar' );
				// phpcs:enable WPForms.PHP.ValidateHooks.InvalidHookName
				?>

				<form method="post" action="">
					<div class="file-upload-types-content">
						<div class="file-upload-types-table">
							<?php
							$this->display_types_table();
							$this->display_table_notice();
							?>

						</div>

						<div class="file-upload-types-products">
							<?php $this->display_am_products(); ?>
						</div>
					</div>

					<?php wp_nonce_field( 'file_upload_types_settings_save', 'file_upload_types_nonce_field' ); ?>

					<p class="file-upload-types-submit">
						<button type="submit" value="submit" name="file-upload-types-submit"
							class="button button-primary">
							<?php esc_html_e( 'Save Settings', 'file-upload-types' ); ?>
						</button>
					</p>
				</form>
			</div>
		</div>
		<?php
	}

	/**
	 * Displays table contents.
	 *
	 * @since 1.0.0
	 *
	 * @noinspection HtmlUnknownTarget
	 */
	public function display_types_table() { // phpcs:ignore Generic.Metrics.NestingLevel.MaxExceeded, Generic.Metrics.CyclomaticComplexity.MaxExceeded

		?>
		<div class="before-table">
			<div class="file-upload-types-heading">
				<h3><?php esc_html_e( 'Add File Upload Types', 'file-upload-types' ); ?></h3>
				<p>
					<?php
					printf(
						wp_kses( /* translators: %1$s - URL to WordPress Codex page, %2$s - anchor link. */
							__( 'Below is the list of files types that can be enabled, not including the <a href="%1$s" rel="noopener" target="_blank">files WordPress allows by default</a>. <br>Don\'t see what you need? No problem, <a href="%2$s" id="add-custom-file-types" rel="noopener noreferrer">add your custom file types</a>.', 'file-upload-types' ),
							[
								'a'  => [
									'href'   => [],
									'target' => [],
									'rel'    => [],
									'id'     => [],
								],
								'br' => [],
							]
						),
						'https://codex.wordpress.org/Uploading_Files#About_Uploading_Files_on_Dashboard',
						'#'
					);
					?>
				</p>
			</div>

			<div class="search-box">
				<label for="file-upload-types-search">
					<input type="search" id="file-upload-types-search" placeholder="<?php esc_attr_e( 'Search File Types', 'file-upload-types' ); ?>">
				</label>
			</div>
		</div>

		<div class="table-container">
			<table>
				<tr class="heading">
					<td style="width: 35%;"><?php esc_html_e( 'Description', 'file-upload-types' ); ?></td>
					<td style="width: 40%;"><?php esc_html_e( 'MIME Type', 'file-upload-types' ); ?></td>
					<td style="width: 15%;"><?php esc_html_e( 'Extension', 'file-upload-types' ); ?></td>
					<td style="width: 10%;">&nbsp;</td>
				</tr>
			</table>
		</div>
		<div style="overflow-y:scroll; overflow-x:hidden; height:500px;" class="table-container">
			<table class="file-upload-types-table-main">
				<?php
				$stored_types    = get_option( 'file_upload_types', [] );
				$enabled_types   = isset( $stored_types['enabled'] ) ? (array) $stored_types['enabled'] : [];
				$custom_types    = isset( $stored_types['custom'] ) ? (array) $stored_types['custom'] : [];
				$available_types = fut_get_available_file_types();

				$types      = array_merge( $custom_types, $available_types );
				$temp_types = array_unique( array_column( $types, 'ext' ) );
				$types      = array_intersect_key( $types, $temp_types );

				if ( ! empty( $enabled_types ) || ! empty( $custom_types ) ) :
					?>
					<tr class="section">
						<td colspan="4"><?php esc_html_e( 'ENABLED', 'file-upload-types' ); ?></td>
					</tr>

					<?php
					foreach ( $types as $type ) {

						if (
							! in_array( $type['ext'], $enabled_types, true ) &&
							! in_array( $type['ext'], array_column( $custom_types, 'ext' ), true )
						) {
							continue;
						}

						if ( is_array( $type['mime'] ) ) {
							$type['mime'] = implode( '</br>', $type['mime'] );
						}

						echo '<tr>';
						echo '<td style="width: 35%;">' . esc_html( $type['desc'] ) . '</td>';
						echo '<td style="width: 40%;">' . wp_kses( $type['mime'], [ 'br' => [] ] ) . '</td>';
						echo '<td style="width: 15%;">' . esc_html( $type['ext'] ) . '</td>';
						echo '<td style="width: 10%; text-align: right;"><input type="checkbox" value="' . esc_attr( $type['ext'] ) . '" name="e_types[]" checked> </td>';
						echo '</tr>';
					}

				endif;
				?>
				<tr class="section">
					<td colspan="4"><?php esc_html_e( 'AVAILABLE', 'file-upload-types' ); ?></td>
				</tr>
				<?php
				$available_types = fut_get_available_file_types();
				$stored_types    = get_option( 'file_upload_types', [] );
				$enabled_types   = $stored_types['enabled'] ?? [];
				$wp_ext_mimes    = get_allowed_mime_types();

				foreach ( $available_types as $type ) {

					if ( in_array( $type['ext'], $enabled_types, true ) ) {
						continue;
					}

					// Ignore default WordPress already enabled extensions.
					foreach ( $wp_ext_mimes as $extension => $mime ) {

						$extensions = explode( '|', $extension );

						foreach ( $extensions as $ext ) {

							if ( ltrim( $type['ext'], '.' ) === $ext ) {
								continue 3;
							}
						}
					}

					if ( is_array( $type['mime'] ) ) {
						$type['mime'] = implode( '</br>', $type['mime'] );
					}

					echo '<tr>';
					echo '<td style="width: 35%;">' . esc_html( $type['desc'] ) . '</td>';
					echo '<td style="width: 40%;">' . wp_kses( $type['mime'], [ 'br' => [] ] ) . '</td>';
					echo '<td style="width: 15%;">' . esc_html( $type['ext'] ) . '</td>';
					echo '<td style="width: 10%; text-align: right;"><input type="checkbox" value="' . esc_attr( $type['ext'] ) . '" name="a_types[]"> </td>';
					echo '</tr>';
				}
				?>
			</table>
		</div>

		<div class="table-container">
			<table class="rounded-left-bottom rounded-right-bottom">
				<tr class="section" style="overflow-y:hidden">
					<td colspan="4" id="custom-file-types"><?php esc_html_e( 'ADD CUSTOM FILE TYPES', 'file-upload-types' ); ?>
						<div class="file-upload-types-info" style="font-size: 14px;">
							<img src="<?php echo esc_url( plugins_url( 'assets/images/question-circle-solid.svg', FILE_UPLOAD_TYPES_PLUGIN_FILE ) ); ?>" alt="<?php esc_attr_e( 'Help', 'file-upload-types' ); ?>">
							<span class="tooltiptext"><?php echo esc_html__( 'Upload files and have their MIME type detected automatically. Multiple MIME types for a single extension can be separated by a comma.', 'file-upload-types' ); ?> </span>
						</div>
					</td>
				</tr>

				<tr class="dropzone">
					<td colspan="4" class="rounded-left-bottom rounded-right-bottom">
						<div class="file-upload-types-dropzone" id="c_types_file_sample_button">
							<p><span class="dz-message"><span class="icon"></span><?php echo wp_kses_post( __( 'Drop files here or click to select files. You can also </span><a href="#">add file types manually</a>.', 'file-upload-types' ) ); ?></p>
						</div>
					</td>
				</tr>

				<tr class="repetitive-fields">
					<td style="width: 40%;" class="cell_c_types_file_description rounded-left-bottom">
						<label for="c_types_file_description"></label>
						<input
								type="text" name="c_types[desc][]" class="description c_types_file_description"
								id="c_types_file_description" style="display: inline-block"
								placeholder="<?php esc_attr_e( 'File Description', 'file-upload-types' ); ?>">
					</td>
					<td style="width: 45%;" class="cell_c_types_file_mime_type">
						<label for="c_types_file_mime_type"></label>
						<input
								type="text" name="c_types[mime][]" class="mime c_types_file_mime_type"
								id="c_types_file_mime_type"
								placeholder="<?php esc_attr_e( 'MIME Type', 'file-upload-types' ); ?>">
					</td>
					<td style="width: 35%;" class="cell_c_types_file_extension">
						<label for="c_types_file_extension"></label>
						<input
								type="text" name="c_types[ext][]" class="extension c_types_file_extension"
								id="c_types_file_extension"
								placeholder="<?php esc_attr_e( 'Extension', 'file-upload-types' ); ?>">
					</td>
					<td style="width: 10%;" class="icons rounded-right-bottom">
						<img
								class="file-upload-types-plus"
								src="<?php echo esc_url( plugins_url( 'assets/images/plus-circle-solid.svg', FILE_UPLOAD_TYPES_PLUGIN_FILE ) ); ?>"
								alt="<?php esc_attr_e( 'Add File Type', 'file-upload-types' ); ?>">
						<img
								class="file-upload-types-minus"
								src="<?php echo esc_url( plugins_url( 'assets/images/trash-solid.svg', FILE_UPLOAD_TYPES_PLUGIN_FILE ) ); ?>"
								alt="<?php esc_attr_e( 'Remove File Type', 'file-upload-types' ); ?>">
					</td>
				</tr>
			</table>
		</div>
		<?php
	}

	/**
	 * Display notice about the security risks of allowing various file uploads.
	 *
	 * @since 1.5.0
	 *
	 * @return void
	 */
	private function display_table_notice() {

		$link = 'https://wpforms.com/docs/how-to-allow-additional-file-upload-types/?utm_source=WordPress&utm_medium=fut-help&utm_campaign=file-upload-types&utm_content=view-documentation#secure-upload';

		echo '<p style="color: #6E6E6E">';
		echo esc_html(
			__(
				'While allowing various file uploads can be convenient, it poses security risks.',
				'file-upload-types'
			)
		);
		echo '<br>';
		echo esc_html(
			__(
				'Enhance your site\'s security by restricting uploads to specific, safe file types and limiting upload permissions to trusted users only.',
				'file-upload-types'
			)
		);
		echo '<br>';
		printf(
		/* translators: %1$s - opening anchor tag, %2$s - closing anchor tag. */
			esc_html__( 'Please refer %1$shere%2$s for more information.', 'file-upload-types' ),
			'<a href="' . esc_url( $link ) . '" target="_blank" rel="noopener noreferrer">',
			'</a>'
		);
		echo '</p>';
	}

	/**
	 * Displays recommended products section.
	 *
	 * @since 1.0.0
	 *
	 * @noinspection HtmlUnknownTarget
	 */
	public function display_am_products() {

		?>
		<h3><?php esc_html_e( 'You might like our other products', 'file-upload-types' ); ?></h3>

		<p>
			<?php
				echo wp_kses(
					__( 'File Upload Types is built by the team behind some of the most popular WordPress plugins.', 'file-upload-types' ),
					[]
				);
			?>
		</p>

		<div class="file-upload-types-recommended-plugins">
			<div class="plugins-container">
				<?php foreach ( $this->get_am_plugins() as $plugin ) : ?>
					<div class="plugin-container">
						<div class="plugin-item">
							<div class="details file-upload-types-clear">
								<img src="<?php echo esc_url( $plugin['icon'] ); ?>" alt="">
								<h5 class="plugin-name">
									<?php echo esc_html( $plugin['name'] ); ?>
								</h5>
								<p class="plugin-desc">
									<?php echo esc_html( $plugin['desc'] ); ?>
								</p>
								<p>
									<?php
									printf(
										wp_kses( /* translators: %2$s - Plugin Name. */
											'<a href="%1$s" class="external-link" target="_blank" rel="noopener noreferrer">' . __( 'Get %2$s', 'file-upload-types' ) . '</a>',
											[
												'img' => [
													'src' => [],
												],
												'a'   => [
													'alt'  => [],
													'href' => [],
													'class' => [],
													'target' => [],
												],
											]
										),
										esc_url( $plugin['url'] ),
										esc_html( $plugin['name'] )
									);
									?>
								</p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php
	}

	/**
	 * Save settings to the database.
	 *
	 * @since 1.0.0
	 */
	public function save_settings() { // phpcs:ignore Generic.Metrics.CyclomaticComplexity.MaxExceeded, WPForms.PHP.HooksMethod.InvalidPlaceForAddingHooks, Generic.Metrics.CyclomaticComplexity.TooHigh

		if ( ! isset( $_POST['file-upload-types-submit'] ) ) {
			return;
		}

		if (
			! isset( $_POST['file_upload_types_nonce_field'] ) ||
			! wp_verify_nonce( sanitize_key( $_POST['file_upload_types_nonce_field'] ), 'file_upload_types_settings_save' )
		) {
			return;
		}

		// All new installations since 1.2.0 will have multiple mime types support enabled by default.
		if ( ! get_option( 'file_upload_types' ) ) {
			update_option( 'file_upload_types_multiple_mimes', 'enabled' );
		}

		// phpcs:disable WordPress.Security.ValidatedSanitizedInput.MissingUnslash
		$enabled_types   = isset( $_POST['e_types'] ) ? array_map( 'sanitize_text_field', $_POST['e_types'] ) : [];
		$available_types = isset( $_POST['a_types'] ) ? array_map( 'sanitize_text_field', $_POST['a_types'] ) : [];
		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$custom_types_raw = (array) ( $_POST['c_types'] ?? [] );
		// phpcs:enable WordPress.Security.ValidatedSanitizedInput.MissingUnslash

		$custom_types = fut_format_raw_custom_types( $custom_types_raw );
		$custom_types = fut_format_multiple_file_types( $custom_types );

		foreach ( $custom_types as $key => $type ) {

			// Remove if mime type or extension is empty.
			if ( empty( $type['ext'] ) || empty( $type['mime'] ) ) {
				unset( $custom_types[ $key ] );
			}
		}

		$types               = get_option( 'file_upload_types', [] );
		$stored_custom_types = isset( $types['custom'] ) ? (array) $types['custom'] : [];

		foreach ( $stored_custom_types as $key => $value ) {

			if ( ! in_array( $value['ext'], $enabled_types, true ) ) {
				unset( $stored_custom_types[ $key ] );
			}

			// Remove a duplicate type of the same extension.
			if ( in_array( $value['ext'], array_column( $custom_types, 'ext' ), true ) ) {
				unset( $stored_custom_types[ $key ] );
			}
		}

		$enabled_types = array_merge( $enabled_types, $available_types );

		$file_upload_types = [
			'enabled' => $enabled_types,
			'custom'  => array_merge( $custom_types, $stored_custom_types ),
		];

		update_option( 'file_upload_types', $file_upload_types );

		add_action(
			'file_upload_types_settings_after_nav_bar',
			static function () {
				?>
				<div class="notice notice-success file-upload-types-notice is-dismissible">
					<p><strong><?php esc_html_e( 'Your settings have been saved.', 'file-upload-types' ); ?></strong></p>
				</div>
				<?php
			}
		);
	}

	/**
	 * Display notice about multiple mime types support for old installations.
	 *
	 * @since 1.2.0
	 *
	 * @noinspection HtmlUnknownTarget
	 */
	public function display_multiple_mimes_support_notice() {

		if ( ! get_option( 'file_upload_types' ) || 'enabled' === get_option( 'file_upload_types_multiple_mimes' ) ) {
			return;
		}

		?>
			<div class="notice notice-info file-upload-types-notice">
			<p><strong>
				<?php
				printf(
					wp_kses( /* translators: %1$s - Same page; %2$s - Documentation link for multiple types support. */
						__( 'File Upload Types now supports multiple MIME types for each file extension to improve file upload compatibility! <br/> <strong><a href="%1$s">Enable multiple MIME types support</a> | <a href="%2$s" target="_blank" rel="noopener noreferrer">Learn More</a></strong>', 'file-upload-types' ),
						[
							'br'     => [],
							'strong' => [],
							'a'      => [
								'href'   => [],
								'rel'    => [],
								'target' => [],
							],
						]
					),
					esc_url(
						wp_nonce_url(
							add_query_arg(
								[
									'page'           => self::SLUG,
									'multiple_mimes' => 'enabled',
								],
								admin_url( 'options-general.php' )
							),
							'enable-multiple-mime-types-support'
						)
					),
					'https://wpforms.com/docs/how-to-allow-additional-file-upload-types/#multiple-mime-types'
				)
				?>
			</strong></p>
			</div>
		<?php
	}

	/**
	 * Enable multiple mime types support for old installations.
	 *
	 * @since 1.2.0
	 */
	public function enable_multiple_mimes_support() { // phpcs:ignore WPForms.PHP.HooksMethod.InvalidPlaceForAddingHooks

		if ( ! isset( $_GET['multiple_mimes'] ) || ( $_GET['multiple_mimes'] !== 'enabled' ) ) {
			return;
		}

		check_admin_referer( 'enable-multiple-mime-types-support' );

		update_option( 'file_upload_types_multiple_mimes', 'enabled' );

		add_action(
			'file_upload_types_settings_after_nav_bar',
			static function () {
				?>
				<div class="notice notice-success file-upload-types-notice is-dismissible">
					<p><strong><?php esc_html_e( 'Support for multiple MIME types has been enabled.', 'file-upload-types' ); ?></strong></p>
				</div>
				<?php
			}
		);
	}

	/**
	 * List of AM plugins that we propose to install.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	private function get_am_plugins(): array {

		return [
			'wpf'  => [
				'icon' => plugins_url( 'assets/images/wpforms.svg', FILE_UPLOAD_TYPES_PLUGIN_FILE ),
				'name' => __( 'WPForms', 'file-upload-types' ),
				'desc' => __( 'The most beginner friendly WordPress form plugin.', 'file-upload-types' ),
				'url'  => 'https://wpforms.com?utm_source=WordPress&utm_medium=fut-recommendations&utm_campaign=file-upload-types&utm_content=get-wpforms',
			],
			'smtp' => [
				'icon' => plugins_url( 'assets/images/wp-mail-smtp.svg', FILE_UPLOAD_TYPES_PLUGIN_FILE ),
				'name' => __( 'WP Mail SMTP', 'file-upload-types' ),
				'desc' => __( 'The most popular SMTP and PHP mailer WordPress plugin.', 'file-upload-types' ),
				'url'  => 'https://wpmailsmtp.com?utm_source=WordPress&utm_medium=fut-recommendations&utm_campaign=file-upload-types&utm_content=get-wp-mail-smtp',
			],
			'sl'   => [
				'icon' => plugins_url( 'assets/images/sendlayer.svg', FILE_UPLOAD_TYPES_PLUGIN_FILE ),
				'name' => __( 'SendLayer', 'file-upload-types' ),
				'desc' => __( 'An SMTP email delivery service that’s easy and powerful.', 'file-upload-types' ),
				'url'  => 'https://sendlayer.com?utm_source=WordPress&utm_medium=fut-recommendations&utm_campaign=file-upload-types&utm_content=get-sendlayer',
			],
			'seo'  => [
				'icon' => plugins_url( 'assets/images/allinone.svg', FILE_UPLOAD_TYPES_PLUGIN_FILE ),
				'name' => __( 'All In One SEO', 'file-upload-types' ),
				'desc' => __( 'The best WordPress SEO plugin and toolkit.', 'file-upload-types' ),
				'url'  => 'https://aioseo.com?utm_source=WordPress&utm_medium=fut-recommendations&utm_campaign=file-upload-types&utm_content=get-aioseo',
			],
		];
	}

	/**
	 * Display a text to ask users to review the plugin on WP.org.
	 *
	 * @since 1.0.0
	 *
	 * @param string|mixed $text Rating Text.
	 *
	 * @return string
	 * @noinspection HtmlUnknownTarget
	 */
	public function get_admin_footer( $text ): string {

		if ( ! $this->is_admin_screen() ) {
			return (string) $text;
		}

		return sprintf(
			wp_kses( /* translators: %1$s - WP.org link. */
				__( 'Please rate <strong>File Upload Types</strong> <a href="%1$s" target="_blank" rel="noopener noreferrer">&#9733;&#9733;&#9733;&#9733;&#9733;</a> on <a href="%1$s" target="_blank" rel="noopener noreferrer">WordPress.org</a> to help us spread the word.', 'file-upload-types' ),
				[
					'strong' => [],
					'a'      => [
						'href'   => [],
						'target' => [],
						'rel'    => [],
					],
				]
			),
			'https://wordpress.org/support/plugin/file-upload-types/reviews/?filter=5#new-post'
		);
	}

	/**
	 * Removes the admin notices on file upload types settings page.
	 *
	 * @since 1.0.0
	 */
	public function remove_notices() { // phpcs:ignore Generic.Metrics.NestingLevel.MaxExceeded, Generic.Metrics.CyclomaticComplexity.TooHigh

		global $wp_filter;

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( ! isset( $_REQUEST['page'] ) || $_REQUEST['page'] !== self::SLUG ) {
			return;
		}

		foreach ( [ 'user_admin_notices', 'admin_notices', 'all_admin_notices' ] as $wp_notice ) {
			if ( ! empty( $wp_filter[ $wp_notice ]->callbacks ) && is_array( $wp_filter[ $wp_notice ]->callbacks ) ) {
				foreach ( $wp_filter[ $wp_notice ]->callbacks as $priority => $hooks ) {
					foreach ( $hooks as $name => $arr ) {
						unset( $wp_filter[ $wp_notice ]->callbacks[ $priority ][ $name ] );
					}
				}
			}
		}
	}

	/**
	 * Check the sample file.
	 *
	 * @since 1.4.0
	 */
	public function check_sample() {

		check_ajax_referer( 'file_upload_types_nonce', 'nonce' );

		if ( ! isset( $_FILES['file'] ) ) {
			wp_send_json_error(
				[
					'message' => __( 'No file provided.', 'file-upload-types' ),
				],
				400
			);
		}

		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$sample             = $_FILES['file'];
		$sample['name']     = sanitize_file_name( $sample['name'] );
		$sample['tmp_name'] = sanitize_text_field( $sample['tmp_name'] );
		$sample['type']     = sanitize_text_field( $sample['type'] );

		$file_info = finfo_open( FILEINFO_MIME_TYPE );
		$mime_type = finfo_file( $file_info, $sample['tmp_name'] );
		$extension = pathinfo( $sample['name'], PATHINFO_EXTENSION );

		if ( isset( $sample['type'] ) && $mime_type !== $sample['type'] ) {
			$mime_types_arr[] = $sample['type'];
		}

		$mime_types_arr[] = (string) $mime_type;

		if ( ! $mime_type || ! $extension ) {
			wp_send_json_error(
				[
					'message' => __( 'Unable to detect the file MIME type.', 'file-upload-types' ),
				],
				400
			);
		}

		finfo_close( $file_info );

		wp_send_json_success(
			[
				'mime_type' => implode( ', ', array_filter( $mime_types_arr ) ),
				'extension' => $extension,
			]
		);
	}
}
