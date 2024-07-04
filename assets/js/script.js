/* global file_upload_types_params, jQuery */

'use strict';

/**
 * @param file_upload_types_params.default_section
 */

jQuery( function ( $ ) {
	$( document )
		.on( 'click', '#file-upload-types .table-container .file-upload-types-plus', function ( e ) {
			e.preventDefault();

			const closest = $( this ).closest( 'tr' );
			const clone = closest.clone();

			clone.find( 'input' ).val( '' );

			closest.after( clone );
		} )
		.on( 'click', '#file-upload-types .table-container .file-upload-types-minus', function ( e ) {
			e.preventDefault();

			if ( $( this ).closest( 'table' ).find( 'tr.repetitive-fields' ).length > 1 ) {
				$( this ).closest( 'tr' ).remove();
			}
			else {
				alert( file_upload_types_params.default_section );
			}
		} )
		.on( 'keyup keypress', '#file-upload-types form', function( e ) {
			// Do not allow submitting the form on Enter.
			const keyCode = e.keyCode || e.which;

			if (keyCode === 13) {
				e.preventDefault();
				return false;
			}
		} )
		.on( 'click', '#add-custom-file-types', function( e ) {
			e.preventDefault();

			$( '.repetitive-fields input' ).first().focus();
		} )
		.on( 'input', '#file-upload-types-search', function () {
			const value = $( this ).val().toLowerCase();

			$( '.file-upload-types-table table tr' ).filter( function () {
				if ( ! $( this ).hasClass( 'heading' ) ) {
					if ( value !== '' && $( this ).hasClass( 'section' ) ) {
						$( this ).hide();
					}
					else {
						$( this ).toggle( $( this ).text().toLowerCase().indexOf( value ) > - 1 );
					}
				}
			} );
		} );
} );
