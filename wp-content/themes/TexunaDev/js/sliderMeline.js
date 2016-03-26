var sliderMeline = {

	run: function() {
        $( ".SliderMel" ).each(function( index ) {
            var sliderBlock = $(this).find('.sliderBlockDisp'),
				sliderContain = $(this).find('.sliderContain'),
				countSlides = sliderContain.find('.smallItem').length,
				elW = sliderContain.find('.smallItem').outerWidth(true),
				minLeft = sliderBlock.width() - (countSlides  * elW);

			sliderContain.css('width',elW*countSlides);

            var prevSlide = $(this).find('.prevSlide'),
				nextSlide = $(this).find('.nextSlide');

			var onNextClick = function(ev){
                var leftOld = parseInt(sliderContain.css('left')),
					leftNew = leftOld - elW;
					console.log(leftNew);
					console.log(minLeft);


                if(minLeft >= leftOld) leftNew = 0;

                sliderContain.animate({ left: leftNew }, 500);

			}

            nextSlide.on('click', onNextClick);


			var onPrevClick = function(ev){
                var leftOld = parseInt(sliderContain.css('left')),
					leftNew = leftOld + elW;

                if(leftNew >= elW) leftNew = minLeft;

                sliderContain.animate({ left: leftNew }, 500);
			}

			prevSlide.on('click', onPrevClick);

			// setInterval(onNextClick, 3000);
        });
	}
}
