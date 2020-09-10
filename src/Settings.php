<?php

namespace FileUploadTypes;

defined( 'ABSPATH' ) || exit;

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

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		add_action( 'in_admin_header', array( $this, 'display_admin_header' ), 100 );
		add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
		add_action( 'admin_init', array( $this, 'save_settings' ) );
		add_action( 'file_upload_types_settings_after_nav_bar', array( $this, 'display_multiple_mimes_support_notice' ) );
		add_action( 'admin_init', array( $this, 'enable_multiple_mimes_support' ) );
		add_filter( 'admin_footer_text', array( $this, 'get_admin_footer' ), 1, 2 );
		add_action( 'admin_print_scripts', array( $this, 'remove_notices' ) );
	}

	/**
	 * Checks if current screen is File Upload Types or not.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public function is_admin_screen() {

		$screen    = get_current_screen();
		$screen_id = $screen ? $screen->id : '';

		return 'settings_page_file-upload-types' === $screen_id;
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
			array(),
			FILE_UPLOAD_TYPES_VERSION
		);
		wp_enqueue_script(
			'file-upload-types',
			plugins_url( 'assets/js/script' . $suffix . '.js', FILE_UPLOAD_TYPES_PLUGIN_FILE ),
			array( 'jquery' ),
			FILE_UPLOAD_TYPES_VERSION,
			true
		);

		$strings = array(
			'default_section' => esc_html__( 'Default section can not be deleted.', 'file-upload-types' ),
		);

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
			<img src="<?php echo esc_url( plugins_url( 'assets/images/logo.png', FILE_UPLOAD_TYPES_PLUGIN_FILE ) ); ?> " alt="<?php esc_html_e( 'File Upload Types', 'file-upload-types' ); ?>" class="file-upload-types-header-logo" />
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
			array( $this, 'display' )
		);
	}

	/**
	 * Add contents to the settings page.
	 *
	 * @since 1.0.0
	 */
	public function display() {

		// Return if not file upload types screen.
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
							<a href="https://wpforms.com/docs/how-to-allow-additional-file-upload-types/" target="_blank" rel="noopener noreferrer"
								class="file-upload-types-btn file-upload-types-btn-md file-upload-types-btn-blue">
								<?php esc_html_e( 'View Documentation', 'file-upload-types' ); ?>
							</a>
						</p>
					</div>
				</div>

				<?php do_action( 'file_upload_types_settings_after_nav_bar' ); ?>

				<form method="post" action="">
					<div class="file-upload-types-content">
						<div class="file-upload-types-table">
							<?php $this->display_types_table(); ?>
						</div>

						<div class="file-upload-types-products">
							<?php $this->display_am_products(); ?>
						</div>
					</div>

					<?php wp_nonce_field( 'file_upload_types_settings_save', 'file_upload_types_nonce_field' ); ?>

					<p class="file-upload-types-submit">
						<button type="submit" value="submit" name="file-upload-types-submit"
							class="file-upload-types-btn file-upload-types-btn-md file-upload-types-btn-orange">
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
	 */
	public function display_types_table() {

		?>

		<div class="before-table">
			<div class="file-upload-types-heading">
				<h3><?php esc_html_e( 'Add File Upload Types', 'file-upload-types' ); ?></h3>
				<p>
					<?php
					printf(
						wp_kses( /* translators: %1$s - URL to WordPress Codex page, %2$s - anchor link. */
							__( 'Below is the list of files types that can be enabled, not including the <a href="%1$s" rel="noopener" target="_blank">files WordPress allows by default</a>. <br>Don\'t see what you need? No problem, <a href="%2$s" id="add-custom-file-types" rel="noopener noreferrer">add your custom file types</a>.', 'file-upload-types' ),
							array(
								'a' => array(
									'href'   => array(),
									'target' => array(),
									'rel'    => array(),
									'id'     => array(),
								),
							)
						),
						'https://codex.wordpress.org/Uploading_Files#About_Uploading_Files_on_Dashboard',
						'#'
					);
					?>
				</p>
			</div>

			<div class="search-box">
				<input type="search" id="file-upload-types-search" placeholder="<?php esc_attr_e( 'Search File Types', 'file-upload-types' ); ?>" />
			</div>
		</div>

		<div class="table-container">
			<table>
				<tr class="heading">
					<td width="35%"><?php esc_html_e( 'Description', 'file-upload-types' ); ?></td>
					<td width="40%"><?php esc_html_e( 'MIME Type', 'file-upload-types' ); ?></td>
					<td width="15%"><?php esc_html_e( 'Extension', 'file-upload-types' ); ?></td>
					<td width="10%">&nbsp;</td>
				</tr>
			</table>
		</div>
		<div style="overflow-y:scroll; overflow-x:hidden; height:500px;" class="table-container">
			<table class="file-upload-types-table-main">
				<?php
				$stored_types    = get_option( 'file_upload_types', array() );
				$enabled_types   = isset( $stored_types['enabled'] ) ? (array) $stored_types['enabled'] : array();
				$custom_types    = isset( $stored_types['custom'] ) ? (array) $stored_types['custom'] : array();
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
					foreach ( $types as $key => $type ) {
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
						echo '<td width="35%">' . esc_html( $type['desc'] ) . '</td>';
						echo '<td width="40%">' . wp_kses( $type['mime'], array( 'br' => array() ) ) . '</td>';
						echo '<td width="15%">' . esc_html( $type['ext'] ) . '</td>';
						echo '<td width="10%" style="text-align:right;"><input type="checkbox" value="' . esc_attr( $type['ext'] ) . '" name="e_types[]" checked> </td>';
						echo '</tr>';
					}

				endif;
				?>
				<tr class="section">
					<td colspan="4"><?php esc_html_e( 'AVAILABLE', 'file-upload-types' ); ?></td>
				</tr>
				<?php
				$available_types = fut_get_available_file_types();
				$stored_types    = get_option( 'file_upload_types', array() );
				$enabled_types   = isset( $stored_types['enabled'] ) ? $stored_types['enabled'] : array();
				$wp_ext_mimes    = get_allowed_mime_types();

				foreach ( $available_types as $key => $type ) {
					if ( in_array( $type['ext'], $enabled_types, true ) ) {
						continue;
					}

					// Ignore default WordPress already enabled extensions.
					foreach ( $wp_ext_mimes as $extension => $mime ) {

						$extensions = explode( '|', $extension );
						foreach ( $extensions as $extension ) {

							if ( ltrim( $type['ext'], '.' ) === $extension ) {
								continue 3;
							}
						}
					}

					if ( is_array( $type['mime'] ) ) {
						$type['mime'] = implode( '</br>', $type['mime'] );
					}

					echo '<tr>';
					echo '<td width="35%">' . esc_html( $type['desc'] ) . '</td>';
					echo '<td width="40%">' . wp_kses( $type['mime'], array( 'br' => array() ) ) . '</td>';
					echo '<td width="15%">' . esc_html( $type['ext'] ) . '</td>';
					echo '<td width="10%" style="text-align:right;"><input type="checkbox" value="' . esc_attr( $type['ext'] ) . '" name="a_types[]"> </td>';
					echo '</tr>';
				}
				?>
			</table>
		</div>

		<div class="table-container">
			<table>
				<tr class="section" style="overflow-y:hidden">
					<td colspan="4" id="custom-file-types"><?php esc_html_e( 'ADD CUSTOM FILE TYPES', 'file-upload-types' ); ?>
						<div class="file-upload-types-info" style="font-size: 14px;">
							<img src="<?php echo esc_url( plugins_url( 'assets/images/question-circle-solid.svg', FILE_UPLOAD_TYPES_PLUGIN_FILE ) ); ?>">
							<span class="tooltiptext"><?php echo esc_html__( 'Enter the description, MIME type and extension of the file. Multiple MIME types for a single extension can be separated by a comma.', 'file-upload-types' ); ?> </span>
						</div>
					</td>
				</tr>

				<tr class="repetitive-fields">
					<td width="35%"><input type="text" name="c_types[desc][]" class="description" placeholder="<?php esc_attr_e( 'File Description', 'file-upload-types' ); ?>"></td>
					<td width="40%"><input type="text" name="c_types[mime][]" class="mime" placeholder="<?php esc_attr_e( 'MIME Type', 'file-upload-types' ); ?>"></td>
					<td width="15%"><input type="text" name="c_types[ext][]" class="extension"
							placeholder="<?php esc_attr_e( 'Extension', 'file-upload-types' ); ?>"></td>
					<td width="10%" class="icons">
						<img class="file-upload-types-plus" src="<?php echo esc_url( plugins_url( 'assets/images/plus-circle-solid.svg', FILE_UPLOAD_TYPES_PLUGIN_FILE ) ); ?>">
						<img class="file-upload-types-minus" src="<?php echo esc_url( plugins_url( 'assets/images/trash-solid.svg', FILE_UPLOAD_TYPES_PLUGIN_FILE ) ); ?>">
					</td>
				</tr>
			</table>
		</div>
		<?php
	}

	/**
	 * Displays recommended products section.
	 *
	 * @since 1.0.0
	 */
	public function display_am_products() {

		?>

		<h3><?php esc_html_e( 'You might like our other products', 'file-upload-types' ); ?></h3>

		<p>
			<?php
			printf(
				wp_kses( /* translators: %s - wpforms.com link. */
					__( 'File Upload Types is built by the team behind the most popular WordPress form plugin, <a href="%s" target="_blank" rel="noopener noreferrer">WPForms</a>. Check out some of our other plugins.', 'file-upload-types' ),
					array(
						'a' => array(
							'href'   => array(),
							'target' => array(),
							'rel'    => array(),
						),
					)
				),
				'https://wpforms.com'
			);
			?>
		</p>

		<div class="file-upload-types-recommended-plugins">
			<div class="plugins-container">
				<?php foreach ( $this->get_am_plugins() as $key => $plugin ) : ?>
					<div class="plugin-container">
						<div class="plugin-item">
							<div class="details file-upload-types-clear">
								<img src="<?php echo \esc_url( $plugin['icon'] ); ?>" alt="">
								<h5 class="plugin-name">
									<?php echo $plugin['name']; ?>
								</h5>
								<p class="plugin-desc">
									<?php echo $plugin['desc']; ?>
								</p>
								<p>
									<?php
									printf(
										wp_kses( /* translators: %1$s - Plugin URL; %2$s - Plugin Name; %3$s - Image source. */
											__( '<strong><a href="%1$s" class="external-link" target="_blank" rel="noopener noreferrer">Get %2$s</a></strong>', 'file-upload-types' ),
											array(
												'strong' => true,
												'img'    => array(
													'src' => true,
												),
												'a'      => array(
													'alt'  => true,
													'href' => true,
													'class' => true,
													'target' => true,
												),
											)
										),
										esc_url( $plugin['url'] ),
										$plugin['name'],
										esc_url( plugins_url( 'assets/images/external-link-solid.svg', FILE_UPLOAD_TYPES_PLUGIN_FILE ) )
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
	public function save_settings() {

		if ( ! isset( $_POST['file-upload-types-submit'] ) ) {
			return;
		}

		if (
			! isset( $_POST['file_upload_types_nonce_field'] ) ||
			! wp_verify_nonce( $_POST['file_upload_types_nonce_field'], 'file_upload_types_settings_save' )
		) {
			return;
		}

		// All new installs since 1.2.0 will have multiple mime types support enabled by default.
		if ( ! get_option( 'file_upload_types' ) ) {
			update_option( 'file_upload_types_multiple_mimes', 'enabled' );
		}

		$enabled_types    = isset( $_POST['e_types'] ) ? array_map( 'sanitize_text_field', $_POST['e_types'] ) : array();
		$available_types  = isset( $_POST['a_types'] ) ? array_map( 'sanitize_text_field', $_POST['a_types'] ) : array();
		$custom_types_raw = isset( $_POST['c_types'] ) ? $_POST['c_types'] : array();
		$custom_types     = fut_format_raw_custom_types( $custom_types_raw );
		$custom_types     = fut_format_multiple_file_types( $custom_types );

		foreach ( $custom_types as $key => $type ) {

			// Remove if mime type or extension is empty.
			if ( empty( $type['ext'] ) || empty( $type['mime'] ) ) {
				unset( $custom_types[ $key ] );
			}
		}

		$types               = get_option( 'file_upload_types', array() );
		$stored_custom_types = isset( $types['custom'] ) ? (array) $types['custom'] : array();

		foreach ( $stored_custom_types as $key => $value ) {

			if ( ! in_array( $value['ext'], $enabled_types, true ) ) {
				unset( $stored_custom_types[ $key ] );
			}

			// Remove duplicate type of the same extension.
			if ( in_array( $value['ext'], array_column( $custom_types, 'ext' ), true ) ) {
				unset( $stored_custom_types[ $key ] );
			}
		}

		$enabled_types = array_merge( $enabled_types, $available_types );

		$file_upload_types = array(
			'enabled' => $enabled_types,
			'custom'  => array_merge( $custom_types, $stored_custom_types ),
		);

		update_option( 'file_upload_types', $file_upload_types );

		add_action(
			'file_upload_types_settings_after_nav_bar',
			static function () {
				?>
				<div class="notice notice-success file-upload-types-notice is-dismissible">
					<p><strong><?php echo esc_html__( 'Your settings have been saved.', 'file-upload-types' ); ?></strong></p>
				</div>
				<?php
			}
		);
	}

	/**
	 * Display notice about multiple mime types support for old installs.
	 *
	 * @since 1.2.0
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
						array(
							'br'     => true,
							'strong' => true,
							'a'      => array(
								'href'   => true,
								'target' => true,
								'rel'    => true,
							),
						)
					),
					esc_url( wp_nonce_url( admin_url( 'options-general.php?page=file-upload-types&multiple_mimes=enabled' ), 'enable-multiple-mime-types-support' ) ),
					'https://wpforms.com/docs/how-to-allow-additional-file-upload-types/#multiple-mime-types'
				)
				?>
			</strong></p>
			</div>
		<?php
	}

	/**
	 * Enable mutliple mime types support for old installs.
	 *
	 * @since 1.2.0
	 */
	public function enable_multiple_mimes_support() {

		if ( ! isset( $_GET['multiple_mimes'] ) || ( isset( $_GET['multiple_mimes'] ) && 'enabled' !== $_GET['multiple_mimes'] ) ) {
			return;
		}

		check_admin_referer( 'enable-multiple-mime-types-support' );

		update_option( 'file_upload_types_multiple_mimes', 'enabled' );

		add_action(
			'file_upload_types_settings_after_nav_bar',
			static function () {
				?>
				<div class="notice notice-success file-upload-types-notice is-dismissible">
					<p><strong><?php echo esc_html__( 'Support for multiple MIME types has been enabled.', 'file-upload-types' ); ?></strong></p>
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
	private function get_am_plugins() {

		return array(
			'wpf' => array(
				'icon' => plugins_url( 'assets/images/wpforms.svg', FILE_UPLOAD_TYPES_PLUGIN_FILE ),
				'name' => \esc_html__( 'WPForms', 'file-upload-types' ),
				'desc' => \esc_html__( 'The most beginner friendly WordPress contact form plugin.', 'file-upload-types' ),
				'url'  => 'https://wpforms.com',
			),
			'mi'  => array(
				'icon' => plugins_url( 'assets/images/monsterinsights.svg', FILE_UPLOAD_TYPES_PLUGIN_FILE ),
				'name' => \esc_html__( 'MonsterInsights', 'file-upload-types' ),
				'desc' => \esc_html__( 'Effortlessly connect your WP site with Google Analytics.', 'file-upload-types' ),
				'url'  => 'https://www.monsterinsights.com',
			),
			'om'  => array(
				'icon' => plugins_url( 'assets/images/optinmonster.svg', FILE_UPLOAD_TYPES_PLUGIN_FILE ),
				'name' => \esc_html__( 'OptinMonster', 'file-upload-types' ),
				'desc' => \esc_html__( 'Turn your traffic into leads, conversions and sales.', 'file-upload-types' ),
				'url'  => 'https://optinmonster.com',
			),
			'sp'  => array(
				'icon' => plugins_url( 'assets/images/seedprod.svg', FILE_UPLOAD_TYPES_PLUGIN_FILE ),
				'name' => \esc_html__( 'SeedProd', 'file-upload-types' ),
				'desc' => \esc_html__( 'Create beautiful coming soon pages, skyrocket your email list.', 'file-upload-types' ),
				'url'  => 'https://seedprod.com',
			),
		);
	}

	/**
	 * Display a text to ask users to review the plugin on WP.org.
	 *
	 * @since 1.0.0
	 *
	 * @param string $text Rating Text.
	 *
	 * @return string
	 */
	public function get_admin_footer( $text ) {

		if ( ! $this->is_admin_screen() ) {
			return $text;
		}

		$url = 'https://wordpress.org/support/plugin/file-upload-types/reviews/?filter=5#new-post';

		return sprintf(
			wp_kses( /* translators: %1$s - WP.org link; %2$s - same WP.org link. */
				__( 'Please rate <strong>File Upload Types</strong> <a href="%1$s" target="_blank" rel="noopener noreferrer">&#9733;&#9733;&#9733;&#9733;&#9733;</a> on <a href="%2$s" target="_blank" rel="noopener noreferrer">WordPress.org</a> to help us spread the word. Thank you from the File Upload Types team!', 'file-upload-types' ),
				array(
					'strong' => true,
					'a'      => array(
						'href'   => true,
						'target' => true,
						'rel'    => true,
					),
				)
			),
			$url,
			$url
		);
	}

	/**
	 * Removes the admin notices on file upload types settings page.
	 *
	 * @since 1.0.0
	 */
	public function remove_notices() {

		global $wp_filter;

		if ( ! isset( $_REQUEST['page'] ) || self::SLUG !== $_REQUEST['page'] ) {
			return;
		}

		foreach ( array( 'user_admin_notices', 'admin_notices', 'all_admin_notices' ) as $wp_notice ) {
			if ( ! empty( $wp_filter[ $wp_notice ]->callbacks ) && is_array( $wp_filter[ $wp_notice ]->callbacks ) ) {
				foreach ( $wp_filter[ $wp_notice ]->callbacks as $priority => $hooks ) {
					foreach ( $hooks as $name => $arr ) {
						unset( $wp_filter[ $wp_notice ]->callbacks[ $priority ][ $name ] );
					}
				}
			}
		}
	}
}
