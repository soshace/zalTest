
jQuery(function($){
	$('.upload_image_button').click(function(){
		var uploadBox = $(this).closest(".uploadBox");
		uploadBox.addClass("displayEverything");
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		wp.media.editor.send.attachment = function(props, attachment) {
			$(button).parent().prev().attr('src', attachment.url);
			$(button).prev().val(attachment.id);
			console.log(attachment.url);

			wp.media.editor.send.attachment = send_attachment_bkp;

		}

		wp.media.editor.open(button);
		return false;
	});
   $('.remove_image_button').click(function(){
		var r = confirm('Уверены?');
		if (r == true) {
			var src = $(this).parent().prev().attr('data-src');

			var attachmentIDDel = $('.myfileinp').val();
			$.ajax({
				url: ajaxurl,
				data:
					{
						"action": "deleteFieldsPhoto",
						"attachmentIDDel": attachmentIDDel,
					},
				type: "post",
					success: function(data){
						$('.imgUploadSrc').attr('src', '');
						$('.myfileinp').val('');
					}
				});
		}
		return false;

			});

			$(document).on("click", ".delListPhoto", function(){
				var r = confirm('Уверены?');
				if (r == true) {
					var attachmItemDel = $(this).closest(".attachmItem");
					attachmItemDel = attachmItemDel.attr("id");
					$.ajax({
						url: ajaxurl,
						data:
							{
								"action": "deleteFieldsPhoto",
								"attachmentIDDel": attachmItemDel,
							},
						type: "post",
							success: function(data){
								location.reload();
							}
						});
					}
			});
		 });
