var dropdownOn = {

	run: function() {
        var btnDropdBox = $('.btnDropdBox');
        var btnDropdown = $('.btnDropdBox .btnDropdown');
        btnDropdown.click(function( event ) {
            event.preventDefault();
            if (btnDropdBox.hasClass('btnDropdBoxOpen')){
                $(this).closest('.btnDropdBox').removeClass('btnDropdBoxOpen');
            }
            else{
                btnDropdown.removeClass('btnDropdBoxOpen');
                $(this).closest('.btnDropdBox').addClass('btnDropdBoxOpen');
                $('.btnDropdBoxOpen .dropdown-menu li').click(function( event ) {
                    // event.preventDefault();
                    $('.btnDropdBoxOpen .dropdown-menu li').removeClass('selected');
                    $(this).addClass('selected');
                    var chosenText = $(this).text();
                    var BoxThis = $(this).closest('.btnDropdBox');
					$(this).closest('.btnDropdBox').find('span').remove();
                    // BoxThis.children('.btnDropdown span').delete();
                    BoxThis.children('.btnDropdown').append('<span>'+chosenText+'</span>');
                    $(this).closest('.btnDropdBox').removeClass('btnDropdBoxOpen');
                });

            }

        });






	}
}
