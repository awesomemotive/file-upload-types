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
		add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		add_action( 'in_admin_header', array( $this, 'display_admin_header' ), 100 );
		add_filter( 'admin_footer_text', array( $this, 'get_admin_footer' ), 1, 2 );
	}

	/**
	 * Add File Upload Types submenu under Settings menu.
	 */
	public function add_settings_page() {
		add_options_page( 'Settings', 'File Upload Types', 'manage_options', 'file-upload-types', array( $this, 'settings_content' ) );
	}

	/**
	 * Add contents to the settings page.
	 */
	public function settings_content() {

		// Return if not file upload types screen.
		if ( ! $this->file_upload_types_screen() ) {
			return;
		}
		?>
			<div class="wrap" id="file-upload-types">
				<div class="file-upload-types-page file-upload-types-page-settings ">
					<div class="file-upload-types-page-title">
						<h3>
							<?php echo esc_html__( 'Settings', 'file-upload-types' ); ?>
						</h3>
					</div>
				</div>
			</div>
		<?php
	}

	/**
	 * Enqueue all assets.
	 *
	 * @return void.
	 */
	public function enqueue_assets() {

		if ( $this->file_upload_types_screen() ) {
			wp_enqueue_style( 'file-upload-types', plugins_url( 'assets/css/style.css', FILE_UPLOAD_TYPES_PLUGIN_FILE ), array(), FUT_VERSION, $media = 'all' );
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
					__( 'Please rate <strong>File Upload Types</strong> <a href="%1$s" target="_blank" rel="noopener noreferrer">&#9733;&#9733;&#9733;&#9733;&#9733;</a> on <a href="%2$s" target="_blank" rel="noopener noreferrer">WordPress.org</a> to help us spread the word. Thank you from the File Upload Types team!', 'wp-mail-smtp' ),
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
}

new File_Upload_Types_Settings();
