var popUpOpen = {

    run: function() {
        var windowW = parseInt($(window).width());
        var windowH = parseInt($(window).height());
        var popUpWindowW = $('.popUpWindow').width();
        var popUpWindowH = $('.popUpWindow').height();
        var popUpForm = $('.popUpWindowForm');
        var popUp = $('.popUpWindow');
        var popUpConnect = $('.popUpConnect');
        var overlay = $('.overlay');

        var linkToOpenPopUp = $('.linkToOpenPopUp');
        var linkToOpenPopUpConnect = $('.PopUpConnect');

        var formInvalidCheck = function(instance, linkToOpen) {
            var form = $(instance).find('form');
            var $form = $(form);
            if ($form.hasClass('failed')){
                var textError ="Ошибка при отправке сообщения. Пожалуйста, попробуйте позже или обратитесь к администратору сайта."

            }

            var checkRequired = function(){
                var correctInput = true;

                switch ($(this).attr('type')) {
                    case 'email':
                            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                            correctInput = regex.test($(this).val());
                        break;
                    case 'tel':
                            var regex = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/;
                            correctInput = regex.test($(this).val());
                        break;
                    default:
                        if($(this).val() == ''){
                            correctInput = false;
                        }
                }
                if (correctInput){
                    $(this).addClass("wpcf7-current-valid");
                } else{
                    $(this).addClass("wpcf7-not-valid");
                }
            }
            if ($form.hasClass('invalid')){
                // $form.find('input.wpcf7-validates-as-required').addClass("wpcf7-not-valid");
                var textError ="Ошибки заполнения. Пожалуйста, проверьте все поля и отправьте снова."

                $(this).closest('.btnDropdBox').removeClass('btnDropdBoxOpen');
                $form.find('input').each(function(){
                    var $this = $(this);

                    if ($this.hasClass('wpcf7-validates-as-required')){
                        var correctInput = true;

                        switch ($(this).attr('type')) {
                            case 'email':
                                    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                    correctInput = regex.test($(this).val());
                                break;
                            case 'tel':
                                    var regex = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/;
                                    correctInput = regex.test($(this).val());
                                break;
                            default:
                                if($(this).val() == ''){
                                    correctInput = false;
                                }
                        }
                        if (correctInput){
                            $(this).addClass("wpcf7-current-valid");
                        } else{
                            $(this).addClass("wpcf7-not-valid");
                        }
                        $this.on('keyup', checkRequired);
                        $this.on('blur', checkRequired);
                    }
                })
            }

            $form.find('input').each(function(){
                var $this = $(this);

                if ($this.hasClass('wpcf7-validates-as-required')){
                    $this.on('keyup', checkRequired);
                    $this.on('blur', checkRequired);
                }
            })

            if($form.hasClass('invalid') || $form.hasClass('failed') ){
                var BoxThis = $form.find('.wpcf7Output');
                $form.find('.wpcf7Output span').remove();
                BoxThis.append('<span>'+textError+'</span>');
                linkToOpen.trigger('click');
            }
        };

        linkToOpenPopUp.click(function(event) {
            event.preventDefault();
            var windowS = parseInt($(window).scrollTop());

            $('body, html').addClass('noscroll');
            popUpForm.addClass("popUpdispl");
            $('.popUpWindowForm').closest('.overlay').addClass('overlayDisp');

        });
        formInvalidCheck(popUpForm, linkToOpenPopUp);

        linkToOpenPopUpConnect.click(function(event) {
            event.preventDefault();
            var windowS = parseInt($(window).scrollTop());

            $('body, html').addClass('noscroll');
            popUpConnect.addClass("popUpdispl");
            $('.popUpConnect').closest('.overlay').addClass('overlayDisp');
        });
        formInvalidCheck(popUpConnect, linkToOpenPopUpConnect);

        $('.closePopUp').click(function() {
            overlay.removeClass('overlayDisp');
            popUp.removeClass("popUpdispl");
            $('body, html').removeClass('noscroll');
        });

        $('.overlay').click(function(ev) {
            if ($(ev.target).hasClass('overlayDisp')) {
                overlay.removeClass('overlayDisp');
                popUp.removeClass("popUpdispl");
                $('body, html').removeClass('noscroll');
            }
        });


    }
}
