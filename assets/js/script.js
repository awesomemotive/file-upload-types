/* global file_upload_types_params, jQuery, Dropzone, ajaxurl */

'use strict';

Dropzone.autoDiscover = false;

/**
 * @param file_upload_types_params.default_section
 * @param file_upload_types_params.nonce
 */
jQuery( function ( $ ) {

	$( document )
		.on( 'click', '#file-upload-types .table-container .file-upload-types-plus', function ( e ) {
			e.preventDefault();

			const closest = $( this ).closest( 'tr' );
			const clone = closest.clone();

			clone.find( 'input' ).val( '' );
			closest.after( clone );

			firstMinus();
			roundCorners();
		} )
		.on( 'click', '#file-upload-types .table-container .file-upload-types-minus', function ( e ) {
			e.preventDefault();

			if ( $( this ).closest( 'table' ).find( 'tr.repetitive-fields' ).length > 1 ) {
				$( this ).closest( 'tr' ).remove();

				firstMinus();
				roundCorners();
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

			$( '.repetitive-fields' ).show();

			$( '.repetitive-fields input' ).first().focus();
		} )
		.on( 'input', '#file-upload-types-search', function () {
			const value = $( this ).val().toLowerCase();

			$( '.file-upload-types-table table tr' ).filter( function () {

				const $this = $( this );

				if ( ! $this.hasClass( 'heading' ) ) {
					if ( value !== '' && $this.hasClass( 'section' ) ) {
						$this.hide();
					}
					// Do nothing of this is a hidden repetitive section with no value yet.
					else if ( $this.hasClass( 'repetitive-fields' ) && $this.css( 'display' ) === 'none' && ! $this.find( 'input' ).toArray().some( input => input.value !== '' ) ) {
						return;
					} else {
						$this.toggle( $this.text().toLowerCase().indexOf( value ) > - 1 );
					}
				}
			} );
		} )
		.on( 'click', '#c_types_file_sample_button a', function ( e ) {
			e.preventDefault();

			$( '.repetitive-fields' ).show();

			firstMinus();
			roundCorners();
		} );

	let uploaded = 0;

	new Dropzone( '#c_types_file_sample_button', {
		url: ajaxurl,
		uploadMultiple: false,
		allowMultiple: false,
		previewTemplate: '<div style="display:none"></div>',
		init: function() {
			this.on( 'sending', function( file, xhr, formData ) {
				formData.append( 'action', 'file_upload_types_check_sample' );
				formData.append( 'nonce', file_upload_types_params.nonce );

				$( '.file-upload-types-dropzone span.icon' ).addClass( 'loading' );
			} );
			this.on( 'success', function( file, response ) {
				if ( uploaded === 0 ) {
					$( '.repetitive-fields' ).show();
				} else if ( uploaded > 0 ) {
					$( '#file-upload-types .table-container .file-upload-types-plus:last' ).trigger( 'click' );
				}

				if ( response.data.extension ) {
					$( '.c_types_file_extension:last' ).val( response.data.extension );
					$( '.c_types_file_description:last' ).val( response.data.extension.toUpperCase() + ' file' );
				}

				if ( response.data.mime_type ) {
					$( '.c_types_file_mime_type:last' ).val( response.data.mime_type );
				}

				$( '.file-upload-types-dropzone span.icon' ).removeClass( 'loading' );

				firstMinus();

				uploaded++;
			} ).on( 'error', function( file, response ) {
				$( '.file-upload-types-dropzone span.icon' ).removeClass( 'loading' );

				if ( response?.data?.message ) {
					alert( response.data.message );
				}
			} );
		},
	} );

	/**
	 * Add class to the first minus icon.
	 *
	 * @since 1.4.0
	 */
	const firstMinus = () => {
		let $minuses = $( '.file-upload-types-minus' );

		if ( $minuses.length === 1 ) {
			$minuses.first().addClass( 'first' );

			return;
		}

		$minuses.removeClass( 'first' );
	}

	const roundCorners = () => {
		$( 'tr.dropzone td' ).removeClass( 'rounded-left-bottom rounded-right-bottom' );

		$( 'tr.repetitive-fields:not(:last) td:first-child' ).removeClass( 'rounded-left-bottom' );
		$( 'tr.repetitive-fields:not(:last) td:last-child' ).removeClass( 'rounded-right-bottom' );

		$( 'tr.repetitive-fields:last td:first-child' ).addClass( 'rounded-left-bottom' );
		$( 'tr.repetitive-fields:last td:last-child' ).addClass( 'rounded-right-bottom' );

	};
} );
