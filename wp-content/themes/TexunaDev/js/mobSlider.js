var jssorCompleet = {

	run: function() {
        $('.sliderContainer').each(function() {
			// var boxeljsor = $(this).find('.slidesB:eq(1)');
			var boxeljsor = $(this).find('.slidesB:eq(1)');
			var Slideslict = boxeljsor.children('div');
			var SlidesCount =Slideslict.length;
			if(SlidesCount <= 2){
				boxeljsor.css('cursor','auto');
				$(this).find('.jssorb05').addClass("noDisp");
				$(this).find('.jssora12l').addClass("noDisp");
				$(this).find('.jssora12r').addClass("noDisp");

			}
		});
    }
}
