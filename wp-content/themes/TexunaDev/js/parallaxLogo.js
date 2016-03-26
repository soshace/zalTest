var parallaxLogo = {

    run: function() {
            var windowH=parseInt($(window).height());
            $('.parallaxLogo').each(function() {

            var bgobj = $(this);
            var sectionScroll = (parseInt($(this).offset().top) - windowH);
            // positionXY = $(this).css('backgroundPosition').split(" ");

            $(window).scroll(function() {
                if ($(window).scrollTop() > 0) {

                    // positionXY[0]   =   X Pos..
                    // positionXY[1]   =   Y Pos..
                    var yPos = (($(window).scrollTop())*0.2);
                    // var yPos = positionXY[1];

                    var coords = '50%' + yPos + 'px';


                    bgobj.css({
                        backgroundPosition: coords
                    });

                } else {
                    var coords = '50% 0';
                    bgobj.css({
                        backgroundPosition: coords
                    });
                }
            });
        });
    }
}
