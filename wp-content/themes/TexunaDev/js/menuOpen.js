var menuOpen = {

	run: function() {
        var menuSite = $('.menuOrange');
        $('button.menu').click(function () {
            if($(this).hasClass('menuActive')){
                $('button.menu').removeClass('menuActive');
                $('.menuOrange').removeClass("menuOrangeOpen");
				$('.emailHead').removeClass('emailHeadWhite');
				$('.phTHead').removeClass('phTHeadW');
            }else{
                $(this).addClass('menuActive');
                $('.menuOrange').addClass("menuOrangeOpen");
				$('.emailHead').addClass('emailHeadWhite');
				$('.phTHead').addClass('phTHeadW');
            }
        });
	}
}
