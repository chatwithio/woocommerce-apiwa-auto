;( function( $ ) {
	'use strict';

	var wooawa_template_preview = {
		init: function() {
			wooawa_template_preview.change_language();

			$( '[name="wooawa_language"]' ).on( 'change', this.change_language );
		},
		change_language: function() {
			var selected_language = $( '[name="wooawa_language"]' ).val();
			var templates         = wooawa_admin_params.i18n.templates[ selected_language ] || {};

			if ( ! templates ) {
				return;
			}

			// Loop the object.
			for ( var key in templates ) {
				if ( templates.hasOwnProperty( key ) ) {
					var template_text = templates[ key ];

					$( '[data-wooawa-template="' + key + '"]' ).html( '<p>' + template_text + '</p>' );
				}
			}
		}
	};

	wooawa_template_preview.init();

	/**
	 * File upload handler.
	 *
	 * @since 1.0.0
	 */
	$( document ).on( 'click', '.wooawa-upload-file [type=button]', function( event ) {
		event.preventDefault();

		var btn = $( this );

		// Create the media frame.
		var file_frame = wp.media.frames.file_frame = wp.media( {
			title: btn.data('uploader_title'),
			button: {
				text: btn.data('uploader_button_text'),
			},
			multiple: false,
			library: {
				type: 'image'
			}
		} );

		file_frame.on( 'select', function() {
			var attachment = file_frame.state().get( 'selection' ).first().toJSON();

			btn.closest( '.wooawa-upload-file' ).find( '[type=text]' ).val( attachment.url ).change();
		} );

		// Finally, open the modal
		file_frame.open();
	} );

} )( jQuery );
