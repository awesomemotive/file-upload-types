<?php

namespace FileUploadTypes\Migrations;

/**
 * Various logic dispatcher class.
 *
 * @since {VERSION}
 */
class Dispatcher {

	/**
	 * Register hooks.
	 *
	 * @since {VERSION}
	 *
	 * @return void
	 */
	public function hooks() {

		add_action( 'init', [ $this, 'run_migrations' ] );
	}

	/**
	 * Run all migration logics.
	 *
	 * @since {VERSION}
	 *
	 * @return void
	 */
	public function run_migrations() {

		$already_run    = get_option( 'file_upload_types_migrations_done', [] );
		$all_migrations = $this->get_migrations_list();
		$option_changed = false;

		foreach ( $all_migrations as $name => $callback ) {
			if ( ! isset( $already_run[ $name ] ) && is_callable( $callback ) && $callback() ) {
					$already_run[ $name ] = 1;
					$option_changed       = true;
			}
		}

		if ( $option_changed ) {
			update_option( 'file_upload_types_migrations_done', $already_run );
		}
	}

	/**
	 * Get available migrations.
	 *
	 * @since {VERSION}
	 *
	 * @return array[]
	 */
	private function get_migrations_list() {

		return [
			/**
			 * Get callback method for add_native_file_upload_types migration.
			 *
			 * @since {VERSION}
			 *
			 * @param callable $callback Callback.
			 */
			'add_native_file_upload_types' => apply_filters( 'fileuploadtypes_migrations_dispatcher_add_native_file_upload_types_callback', null ),
		];
	}
}
