var parallBG = {

    run: function() {
            var windowH=parseInt($(window).height());
            var windowW=parseInt($(window).width());
            $('.parallBG').each(function() {

            var bgApp = $(this);
            var sectionScroll = 0;
            // positionXY = $(this).css('backgroundPosition').split(" ");

            $(window).scroll(function() {
                if ($(window).scrollTop() > 0) {

                    // positionXY[0]   =   X Pos..
                    // positionXY[1]   =   Y Pos..
                    var yPos =(($(window).scrollTop() - sectionScroll)*0.5);
                    // var yPos = positionXY[1];
                    var coords;
                    if (windowW <= 600 & bgApp.hasClass("indexFirstPage")){
                        coords = '75%' + yPos + 'px';

                    } else{
                        coords = '50%' + yPos + 'px';
                    }

                    bgApp.css({
                        backgroundPosition: coords
                    });

                } else {
                    var coords;
                    if (windowW <= 600 & bgApp.hasClass("indexFirstPage")){
                        coords = '75% 0';

                    } else{
                        coords = '50% 0';

                    }

                    bgApp.css({
                        backgroundPosition: coords
                    });
                }
            });
        });
    }
}
