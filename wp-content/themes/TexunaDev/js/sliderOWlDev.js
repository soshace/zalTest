$(document).ready(function() {
    var sliderels = $('.owl-item .item .itemDescSlid');
    var owlBtnsDiv = $(".owl-btns div");
    var windowW=parseInt($(window).width());

    $.each( sliderels, function( i,el ) {
        var el = $(el);
        var imgBig = $('.owl-item .item > img')
        if(parseInt(el.height()) >= (parseInt($('.owl-item').height() )-100)){
            $('.owl-item').css('height', (parseInt(el.height())+200));
            $('#owl-demo').css('height', (parseInt(el.height())+200));
            imgBig.css('width', 'auto');
            imgBig.css('height', (parseInt(el.height())+200));
            imgBig.css('max-width', 'inherit');
            el.css('top',0);
            el.css('padding', '20px');
        }
        else{

            var slideDescH = -((parseInt(el.height())+100) /2);
            el.css('margin-top',slideDescH);
            owlBtnsDiv.css('margin-top',slideDescH);
        }

   });

   var insertPrev = "<i class='mdi mdi-chevron-left'></i>";
   var insertNext = "<i class='mdi mdi-chevron-right'></i>";
   $('.owl-prev').append(insertPrev);
   $('.owl-next').append(insertNext);



});
