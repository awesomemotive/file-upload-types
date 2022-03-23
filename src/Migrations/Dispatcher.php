<?php

namespace FileUploadTypes\Migrations;

use FileUploadTypes\Restrict\Native;

class Dispatcher {

	public function init() {

		add_action( 'init', [ $this, 'run_migrations' ] );
	}

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

	private function get_migrations_list() {
		return [
			'add_native_file_upload_types' => [ ( new Native() ), 'register_native_file_upload_types' ],
		];
	}
}