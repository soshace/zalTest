jQuery(function($){
	/*
	 * действие при нажатии на кнопку загрузки изображения
	 * вы также можете привязать это действие к клику по самому изображению
	 */
	$('.upload_image_button').click(function(){
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		wp.media.editor.send.attachment = function(props, attachment) {
			$(button).parent().prev().attr('src', attachment.url);
			$(button).prev().val(attachment.id);
			wp.media.editor.send.attachment = send_attachment_bkp;
		}
		wp.media.editor.open(button);
		return false;
	});
	/*
	 * удаляем значение произвольного поля
	 * если быть точным, то мы просто удаляем value у input type='hidden'
	 */
   $('.remove_image_button').click(function(){
		var r = confirm('Уверены?');
		if (r == true) {
			var src = $(this).parent().prev().attr('data-src');
			$(this).parent().prev().attr('src', src);
			$(this).prev().prev().val('');
		}
		return false;
	});

			$(document).on('click', '.mybutton', function(){
				document.getElementById('postbox-container-2').innerHTML += '<div id="my_meta_box" class="postbox ">\
<button type="button" class="handlediv button-link" aria-expanded="true"><span class="screen-reader-text">Показать/скрыть панель: My MetaBox</span><span class="toggle-indicator" aria-hidden="true"></span></button><h2 class="hndle ui-sortable-handle"><span>My Meta Box</span></h2>\
<div class="inside">\
<input type="hidden" name="custom_meta_box_nonce" value="e41b0c55f9"><table class="form-table"><tbody><tr>\
                <th><label for="myfileinp">Фото</label></th>\
                <td><div>\
            <img data-src="" src="" width="115px" height="90px">\
            <div>\
              <input type="hidden" name="" class="" value="">\
              <button type="submit" class="upload_image_button button">Загрузить</button>\
              <button type="submit" class="remove_image_button button">×</button>\
            </div>\
          </div></td></tr><tr>\
                <th><label for="mytextarea">Описание фото</label></th>\
                <td><textarea name="mytextarea" class="mytextarea" cols="60" rows="4"></textarea>\
        <br><span class="description">Добавьте описание</span></td></tr><tr>\
                <th><label for="mybutton">Добавить еще фото</label></th>\
                <td><a href="javascript:;" class="mybutton acf-button" data-editor="content">+ Добавить фото</a></td></tr></tbody></table></div>\
</div>';


		 });
});
