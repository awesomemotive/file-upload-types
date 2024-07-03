/* global file_upload_types_params, jQuery, Dropzone */

'use strict';

Dropzone.autoDiscover = false;

jQuery( function ( $ ) {

	$( document )
		.on( 'click', '#file-upload-types .table-container .file-upload-types-plus', function ( e ) {
			e.preventDefault();

			var closest = $( this ).closest( 'tr' );
			var clone = closest.clone();

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
			// Do not allow to submit the form on Enter.
			var keyCode = e.keyCode || e.which;
			if (keyCode === 13) {
				e.preventDefault();
				return false;
			}
		} )
		.on( 'click', '#add-custom-file-types', function( e ) {
			e.preventDefault();

			$( '.repetitive-fields input' ).first().focus();
		} )
		.on( 'input', '#file-upload-types-search', function ( e ) {
			var value = $( this ).val().toLowerCase();

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
		} )
		.on( 'click', '#c_types_file_sample_button a', function ( e ) {
			e.preventDefault();

			$( '.repetitive-fields' ).show();
		} );

	let uploaded = 0;

	let SampleFileDropzone = new Dropzone( '#c_types_file_sample_button', {
		url: ajaxurl,
		uploadMultiple: false,
		allowMultiple: false,
		previewTemplate: '<div style="display:none"></div>',
		init: function() {
			this.on( 'sending', function( file, xhr, formData ) {
				formData.append( 'action', 'file_upload_types_check_sample' );
				formData.append( 'nonce', file_upload_types_params.nonce );
			} );
			this.on( 'success', function( file, response ) {

				if ( uploaded === 0 ) {
					$( '.repetitive-fields' ).show();
				} else if ( uploaded > 0 ) {
					$( '#file-upload-types .table-container .file-upload-types-plus' ).trigger( 'click' );
				}

				if ( response.data.extension ) {
					$( '.c_types_file_extension:last' ).val( response.data.extension );
					$( '.c_types_file_description:last' ).val( response.data.extension.toUpperCase() + ' file' );
				}
				if ( response.data.mime_type ) {
					$( '.c_types_file_mime_type:last' ).val( response.data.mime_type );
				}

				uploaded++;
			} );
		},
	} );
} );
