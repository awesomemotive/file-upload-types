<?php

defined( 'ABSPATH' ) || exit;

/**
 * File Upload Types Settings.
 *
 * @class File_Upload_Types_Settings
 *
 * @since  1.0.0
 */
class File_Upload_Types_Settings {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		add_action( 'in_admin_header', array( $this, 'display_admin_header' ), 100 );
		add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
		add_action( 'admin_init', array( $this, 'save_settings' ) );
		add_filter( 'admin_footer_text', array( $this, 'get_admin_footer' ), 1, 2 );
		add_action( 'admin_print_scripts', array( $this, 'remove_notices' ) );
	}

	/**
	 * Checks if current screen is File Upload Types or not.
	 *
	 * @since  1.0.0
	 *
	 * @return bool
	 */
	public function file_upload_types_screen() {
		$screen 	= get_current_screen();
		$screen_id	= $screen ? $screen->id : '';

		return 'settings_page_file-upload-types' === $screen_id ? true : false;
	}

	/**
	 * Enqueue all assets.
	 *
	 * @since  1.0.0
	 */
	public function enqueue_assets() {

		if ( $this->file_upload_types_screen() ) {

			$suffix    = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
			wp_enqueue_style( 'file-upload-types-css', plugins_url( 'assets/css/style.css', FILE_UPLOAD_TYPES_PLUGIN_FILE ), array(), FUT_VERSION, $media = 'all' );
			wp_enqueue_script( 'file-upload-types-js', plugins_url( 'assets/js/script'. $suffix .'.js', FILE_UPLOAD_TYPES_PLUGIN_FILE ), array(), FUT_VERSION );
		}
	}

	/**
	 * Outputs the plugin admin header.
	 *
	 * @since 1.0.0
	 */
	public function display_admin_header() {

		if ( $this->file_upload_types_screen() ) {

			$image_url = plugins_url( 'assets/images/logo.svg', FILE_UPLOAD_TYPES_PLUGIN_FILE );
			?>
			<div id="file-upload-types-header">
				<img class="file-upload-types-header-logo" src="<?php echo esc_url( $image_url ); ?> " alt="File Upload Types"/>
			</div>

			<?php
		}
	}

	/**
	 * Add File Upload Types submenu under Settings menu.
	 *
	 * @since  1.0.0
	 */
	public function add_settings_page() {
		add_options_page( 'Settings', 'File Upload Types', 'manage_options', 'file-upload-types', array( $this, 'settings_content' ) );
	}

	/**
	 * Add contents to the settings page.
	 *
	 * @since  1.0.0
	 */
	public function settings_content() {

		// Return if not file upload types screen.
		if ( ! $this->file_upload_types_screen() ) {
			return;
		}
		?>
			<div class="wrap" id="file-upload-types">
				<div class="file-upload-types-page file-upload-types-page-settings ">
					<div class="file-upload-types-nav">
						<div class="file-upload-types-nav-title">
						<h1>
							<?php esc_html_e( 'Settings', 'file-upload-types' ); ?>
						</h1>
						</div>
						<div class="fie-upload-types-docs">
						<p>
							<?php esc_html_e( 'Need some help?', 'file-upload-types' ); ?>
							<button class="file-upload-types-btn file-upload-types-btn-md file-upload-types-btn-orange"><?php esc_html_e( 'View Documentation', 'file-upload-types' ); ?></button>
						</p>
						</div>
					</div>

					<form method="post">
						<div class="file-upload-types-content">
							<div class="file-upload-types-table">
								<?php $this->table(); ?>
							</div>

							<div class="file-upload-types-products">
								<?php $this->products(); ?>
							</div>
						</div>

						<?php wp_nonce_field( 'file_upload_types_settings_save', 'file_upload_types_nonce_field' ); ?>

						<p class="file-upload-types-submit">
							<button type="submit" value="submit" name="file-upload-types-submit" class="file-upload-types-btn file-upload-types-btn-md file-upload-types-btn-orange">
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
	 * @since  1.0.0
	 */
	public function table() {
		?>
			<div class="before-table">
				<div>
					<h3> <?php esc_html_e( 'Add File Upload Types', 'file-upload-types' );?> </h3>
					<p> <?php echo sprintf(
							wp_kses(
								/* translators: %1$s - file upload types WordPress docs, %2$s - # link;  */
								__( 'Below is list of the files types that can be enabled, not including the <a href="%1$s" rel="noopener" target="_blank"> files WordPress allows by default</a>. Dont see what you need? No problem, <a href="%2$s" rel="noopener noreferrer">add your custom file types</a>.', 'file-upload-types' ),
								array(
									'a' => array(
										'href'   => array(),
										'target' => array(),
										'rel'    => array(),
									),
								),
							),
							'https://codex.wordpress.org/Uploading_Files#About_Uploading_Files_on_Dashboard',
							'#custom-file-types',
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
					<tr>
						<th><?php esc_html_e( 'Description', 'file-upload-types' ); ?></th>
						<th><?php esc_html_e( 'MIME Type', 'file-upload-types' ); ?></th>
						<th><?php esc_html_e( 'Extension', 'file-upload-types' ); ?></th>
					</tr>
					<tr>
						<th colspan="3" class="heading"><?php esc_html_e( 'ENABLED FILE TYPES', 'file-upload-types' ); ?></th>
					</tr>
					<?php
						$types = array();

						foreach( $types as $type ) {
							echo '<tr>';
							echo '<td>'. $type['desc'] . '</td>';
							echo '<td>'. $type['mime'] . '</td>';
							echo '<td>'. '.' . $type['ext'] . '</td>';
							echo '</tr>';
						}
					?>
					<tr>
						<th colspan="3" class="heading"><?php esc_html_e( 'AVAILABLE FILE TYPES', 'file-upload-types' ); ?></th>
					</tr>
					<?php
						$types   		   = fut_get_available_file_types();
						$file_upload_types = get_option( 'file_upload_types', array() );
						$available_types   = isset( $file_upload_types['available_types'] ) ? $file_upload_types['available_types'] : array();

						foreach( $types as $type ) {
							echo '<tr>';
							echo '<td>'. $type['desc'] . '</td>';
							echo '<td>'. $type['mime'] . '</td>';
							echo '<td>'. '.' . $type['ext'] . '</td>';
							echo '<td> <input type="checkbox" name="available_types['. esc_attr( $type['ext'] ).']" '. checked( isset( $available_types[ $type['ext'] ] ), 1, false ) .' > </td>';
							echo '</tr>';
						}
					?>
					<tr>
						<th colspan="3" class="heading" id="custom-file-types"><?php esc_html_e( 'ADD CUSTOM FILE TYPES', 'file-upload-types' ); ?></th>
					</tr>
						<?php
							$file_types   = get_option( 'file_upload_types', array() );
							$custom_types = isset( $file_types['custom_types'] ) ? $file_types['custom_types'] : array();
							$icons 		  = '<span class="dashicons dashicons-plus"></span>
												<span class="dashicons dashicons-minus"></span>';

							if ( ! empty( $custom_types ) ) {

								foreach( $custom_types as $custom_type ) :
										if ( empty( $custom_type['desc'] ) && empty( $custom_type['mime'] ) && empty( $custom_type['ext'] ) ) {
											continue;
										}
									?>
									<tr class="repetitive-fields">
										<td><input type="text" name="custom_types[desc][]" value="<?php esc_attr_e( $custom_type['desc'] ); ?>" placeholder="<?php esc_attr_e( 'File Description', 'file-upload-types' );?>" ></td>
										<td><input type="text" name="custom_types[mime][]" value="<?php esc_attr_e( $custom_type['mime'] ); ?>" placeholder="<?php esc_attr_e( 'MIME Type', 'file-upload-types' );?>" ></td>
										<td><input type="text" name="custom_types[ext][]" value="<?php esc_attr_e( $custom_type['ext'] ); ?>" placeholder="<?php esc_attr_e( 'Extension', 'file-upload-types' );?>" ></td>
										<td><?php echo $icons;?></td>
									</tr>

								<?php endforeach;
							}
						?>

						<tr class="repetitive-fields">
							<td><input type="text" name="custom_types[desc][]" placeholder="<?php esc_attr_e( 'File Description', 'file-upload-types' );?>" ></td>
							<td><input type="text" name="custom_types[mime][]" placeholder="<?php esc_attr_e( 'MIME Type', 'file-upload-types' );?>" ></td>
							<td><input type="text" name="custom_types[ext][]" placeholder="<?php esc_attr_e( 'Extension', 'file-upload-types' );?>" ></td>
							<td><?php echo $icons;?></td>
						</tr>
				</table>
			</div>
		<?php
	}

	/**
	 * Displays recommended products section.
	 *
	 * @since  1.0.0
	 */
	public function products() {
		?>
		<h3> <?php esc_html_e( 'You might like our other products', 'file-upload-types' );?> </h3>
		<p> <?php echo sprintf(
					wp_kses(
						/* translators: %1$s - wpforms.com link;  */
						__( 'File Upload Types is built by the team behind most popular WordPress form plugin, <a href="%1$s" target="_blank" rel="noopener noreferrer">WPForms</a>. Checkout some of our other plugins.', 'file-upload-types' ),
						array(
							'a' => array(
								'href'   => array(),
								'target' => array(),
								'rel'    => array(),
							),
						),
					),

					'https://wpforms.com',
				);
			?>
		</p>

		<div class="file-upload-types-recommended-plugins">
			<div class="plugins-container">
				<?php
				foreach ( $this->get_am_plugins() as $key => $plugin ) :
					?>
					<div class="plugin-container">
						<div class="plugin-item">
							<div class="details file-upload-types-clear">
								<img src="<?php echo \esc_url( $plugin['icon'] ); ?>">
								<h5 class="plugin-name">
									<?php echo $plugin['name']; ?>
								</h5>
								<p class="plugin-desc">
									<?php echo $plugin['desc']; ?>
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
	 * @since  1.0.0
	 */
	public function save_settings() {

		if ( isset( $_POST['file-upload-types-submit'] ) ) {

			if (
			    ! isset( $_POST['file_upload_types_nonce_field'] )
			    || ! wp_verify_nonce( $_POST['file_upload_types_nonce_field'], 'file_upload_types_settings_save' )
			) {

			   print 'Sorry, your nonce did not verify.';
			   exit;

			} else {
				$file_upload_types 	= array();
				$available_types 	= isset( $_POST['available_types'] ) ? $_POST['available_types'] : array();
				$custom_types 		= isset( $_POST['custom_types'] ) ? $_POST['custom_types'] : array();
				$description  		= isset( $custom_types['desc'] ) ? array_map( 'sanitize_text_field', $custom_types['desc'] ) : array();
				$mime_types   		= isset( $custom_types['mime'] ) ? array_map( 'sanitize_mime_type', $custom_types['mime'] ) : array();
				$extentions   		= isset( $custom_types['ext'] ) ? array_map( 'sanitize_file_name', $custom_types['ext'] ) : array();

				$file_upload_types['available_types'] = $available_types;

				foreach( $description as $key =>  $desc ) {
					$file_upload_types['custom_types'][ $key ]['desc'] = $desc;
				}

				foreach( $mime_types as $key => $mime_type ) {
					$file_upload_types['custom_types'][ $key ]['mime'] = $mime_type;
				}

				foreach( $extentions as $key => $extention ) {
					$file_upload_types['custom_types'][ $key ]['ext'] = $extention;
				}

				update_option( 'file_upload_types', $file_upload_types );
			}
		}
	}

	/**
	 * List of AM plugins that we propose to install.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	private function get_am_plugins() {

		$data = array(
			'wpf'      => array(
				'icon' => plugins_url( 'assets/images/plugin-wpf.png', FILE_UPLOAD_TYPES_PLUGIN_FILE ),
				'name' => \esc_html__( 'WPForms', 'file-upload-types' ),
				'desc' => \esc_html__( 'The most beginner friendly WordPress contact form plugin.', 'file-upload-types' ),
				'url'  => 'https://wpforms.com',
			),
			'smtp'      => array(
				'icon' => plugins_url( 'assets/images/plugin-smtp.png', FILE_UPLOAD_TYPES_PLUGIN_FILE ),
				'name' => \esc_html__( 'WP Mail SMTP', 'file-upload-types' ),
				'desc' => \esc_html__( 'Fixes your email deliverability by reconfiguring WordPress to use a proper SMTP provider when sending emails..', 'file-upload-types' ),
				'url'  => 'https://wpmailsmtp.com',
			),
			'mi'      => array(
				'icon' => plugins_url( 'assets/images/plugin-mi.png', FILE_UPLOAD_TYPES_PLUGIN_FILE ),
				'name' => \esc_html__( 'MonsterInsights', 'file-upload-types' ),
				'desc' => \esc_html__( 'Effortlessly connect your WP site with Google Analytics.', 'file-upload-types' ),
				'url'  => 'https://www.monsterinsights.com'
			),
			'om'      => array(
				'icon' => plugins_url( 'assets/images/plugin-om.png', FILE_UPLOAD_TYPES_PLUGIN_FILE ),
				'name' => \esc_html__( 'OptinMonster', 'file-upload-types' ),
				'desc' => \esc_html__( 'Turn your traffic into leads, conversions and sales.', 'file-upload-types' ),
				'url'  => 'https://optinmonster.com',
			),
		);

		return $data;
	}

	/**
	 * Display a text to ask users to review the plugin on WP.org.
	 *
	 * @since 1.0.0
	 *
	 * @param string $text
	 *
	 * @return string
	 */
	public function get_admin_footer( $text ) {

		if ( $this->file_upload_types_screen() ) {
			$url = 'https://wordpress.org/support/plugin/file-upload-types/reviews/?filter=5#new-post';

			$text = sprintf(
				wp_kses(
					/* translators: %1$s - WP.org link; %2$s - same WP.org link. */
					__( 'Please rate <strong>File Upload Types</strong> <a href="%1$s" target="_blank" rel="noopener noreferrer">&#9733;&#9733;&#9733;&#9733;&#9733;</a> on <a href="%2$s" target="_blank" rel="noopener noreferrer">WordPress.org</a> to help us spread the word. Thank you from the File Upload Types team!', 'file-upload-types' ),
					array(
						'strong' => array(),
						'a'      => array(
							'href'   => array(),
							'target' => array(),
							'rel'    => array(),
						),
					)
				),
				$url,
				$url
			);
		}

		return $text;
	}

	/**
	 * Removes the admin notices on file upload types settings page.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	public function remove_notices() {

		global $wp_filter;

		if ( ! isset( $_REQUEST['page'] ) || 'file-upload-types' !== $_REQUEST['page'] ) {
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

new File_Upload_Types_Settings();
