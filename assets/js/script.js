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

		$( this ).closest( 'tr' ).remove();
	});
});
