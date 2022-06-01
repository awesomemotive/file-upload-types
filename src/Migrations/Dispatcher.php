<?php

namespace FileUploadTypes\Migrations;

use FileUploadTypes\Restrict\Native\Admin;

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

		$already_run    = get_option( 'fut_migrations_done', [] );
		$all_migrations = $this->get_migrations_list();

		foreach ( $all_migrations as $name => $callback ) {
			if ( ! isset( $already_run[ $name ] ) && $callback() ) {
					$already_run[ $name ] = 1;
			}
		}

		update_option( 'fut_migrations_done', $already_run );
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
			'add_native_file_upload_types' => [ ( new Admin() ), 'register_native_file_upload_types' ], // @todo replace new Native
		];
	}
}
