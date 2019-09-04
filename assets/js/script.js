'use strict';

jQuery( document ).ready( function( $ ) {
	$( document ).on( 'click', '#file-upload-types .table-container .dashicons-plus', function( e ) {
		e.preventDefault();

		var closest = $( this ).closest( 'tr' );
		var clone 	= closest.clone();
		clone.find( 'input' ).attr( 'value', '' );

		closest.after( clone );
	});

	$( document ).on( 'click', '#file-upload-types .table-container .dashicons-minus', function( e ) {
		e.preventDefault();

		if( $( this ).closest( 'table' ).find('tr.repetitive-fields' ).length > 1 ) {
			$( this ).closest( 'tr' ).remove();
		}
	});

	$( document ).on( 'keyup', '#file-upload-types-search', function( e ) {

	    var value = $(this).val().toLowerCase();

		$( 'table tr td' ).filter( function() {
			$(this).toggle( $( this ).text().toLowerCase().indexOf( value ) > -1 );
		});
	});
});
