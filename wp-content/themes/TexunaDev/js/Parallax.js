var Parallax = {

    run: function() {
            var windowH=parseInt($(window).height());
            $('.parallax').each(function() {

            var bgobj = $(this);
            var sectionScroll = (parseInt($(this).offset().top) - windowH-160);
            // positionXY = $(this).css('backgroundPosition').split(" ");

            $(window).scroll(function() {
                if ($(window).scrollTop() > sectionScroll) {

                    // positionXY[0]   =   X Pos..
                    // positionXY[1]   =   Y Pos..
                    var yPos = 130 - (($(window).scrollTop() - sectionScroll)*0.06);
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
