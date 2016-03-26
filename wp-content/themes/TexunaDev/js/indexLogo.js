var indexLogo = {

    run: function() {
        var logoHomeTop = $('.logoHome').offset().top;
        // $('.parallax').each(function() {
            $('.logoDisplTop').each(function() {

            $(window).scroll(function() {
                if ($(window).scrollTop() > logoHomeTop) {
                    $('.logoDisplTop').addClass("topDisp");
                } else {
                    $('.logoDisplTop').removeClass("topDisp");
                }
            });
        });
    }
}
