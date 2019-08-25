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
	}

	/**
	 * Enqueue all assets.
	 *
	 * @return void.
	 */
	public function enqueue_assets() {

		// Return if not File Upload Types settings screen.
		if ( true !== $this->file_upload_types_screen() ) {
			return;
		}

		wp_enqueue_style( 'file-upload-types', plugins_url( 'assets/css/style.css', FILE_UPLOAD_TYPES_PLUGIN_FILE ), array(), FUT_VERSION, $media = 'all' );
	}

	/**
	 * Outputs the plugin admin header.
	 *
	 * @since 1.0.0
	 */
	public function display_admin_header() {

		// Return if not File Upload Types settings screen.
		if ( true !== $this->file_upload_types_screen() ) {
			return;
		}

		$image_url = plugins_url( 'assets/images/logo.svg', FILE_UPLOAD_TYPES_PLUGIN_FILE );
		?>
		<div id="file-upload-types-header">
			<img class="file-upload-types-header-logo" src="<?php echo esc_url( $image_url ); ?> " alt="File Upload Types"/>
		</div>

		<?php
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
}

new File_Upload_Types_Settings();
