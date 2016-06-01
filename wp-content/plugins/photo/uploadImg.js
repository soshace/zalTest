var ds = ds || {};
( function( $ ) {
	var media;

	ds.media = media = {
		buttonId: ".upload_image_button",
		detailsTemplate: "#photoTable",

		frame: function() {
			if ( this._frame )
				return this._frame;

			this._frame = wp.media( {
				title: "Выберите картинки",
				button: {
					text: "Выбрать"
				},
				multiple: true,
				library: {
					type: "image"
				}
			} );

			this._frame.on( "ready", this.ready );

			this._frame.state( "library" ).on( "select", this.select );

			return this._frame;
		},

		ready: function() {
			$( ".media-modal" ).addClass( "no-sidebar smaller" );

		},

		select: function() {
			var settings = wp.media.view.settings,
				selection = this.get( "selection" );

			$( ".added" ).remove();
			selection.map( media.showAttachmentDetails );
		},

		showAttachmentDetails: function( attachment ) {
			$(".uploadBox").addClass("displayEverything");
			$(".attachmentEmpty").addClass("attachmentEmptyH");

			var details_tmpl = $( media.detailsTemplate ),

				details = details_tmpl.clone();


			details.addClass( "added" );
			details.removeClass("attachmentEmpty");
			details.removeClass("attachmentEmptyH");

			$( "input", details ).each( function() {
				var key = $( this ).attr( "id" ).replace( "attachment-", "" );
				$( this ).val( attachment.get( key ) );
			} );

			details.attr( "id", "attachment-details-" + attachment.get( "id" ) );

			var sizes = attachment.get( "sizes" );
			if (!sizes.thumbnail) {
				$( "img", details ).attr( "src", sizes.full.url );
			} else{
				$( "img", details ).attr( "src", sizes.thumbnail.url );
			}

			// $( "textarea", details ).val( JSON.stringify( attachment, null, 2 ) );

			details_tmpl.after( details );
		},

		init: function() {
			$( media.buttonId ).on( "click", function( e ) {
				e.preventDefault();

				media.frame().open();
			});
		}
	};

	$( media.init );
} )( jQuery );
