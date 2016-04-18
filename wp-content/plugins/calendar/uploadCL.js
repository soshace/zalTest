jQuery(function($){

	$(document).on("click", ".removeCL", function(){
		if($('#calendarbox input').val() != ''){
			var idDelLine = $(this).attr('validc');

			$.ajax({
				url: ajaxurl,
				data:
					{
						"action": "deleteCLline",
						"idDelLine": idDelLine,
					},
				type: "post",
				success: function(data){
					location.reload();
				}
				});
		}
	});
});
