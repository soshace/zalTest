<section class="footer section_tb">
  <div class="section_line_lr">
    <p class="copy">&copy; 2015 – All rights reserved</p>
    <ul class="social">
      <li>
        <a href="#" class="vk"></a>
      </li>
    </ul>
  </div>
</section>
<script type="text/javascript">
  $( document ).ready(function() {

    if(!($('li').is('.current-menu-item'))){
      var windLocat = window.location.pathname;
      if (windLocat != '/'){
        var newsTrue = windLocat.indexOf('/news/');
        var photoTrue = windLocat.indexOf('/photo/');
        if (photoTrue != '-1') {
          $('.menu-item-30').addClass('current-menu-item');
        } else{
          if (newsTrue == '-1') {
            $('.menu-item-36').addClass('current-menu-item');
          }
        }
      }

    }

    $('.header .current-menu-item > a').click(function(e){
      e.preventDefault();
      return false;
    });

    var oldLinkprev = $('li.prev a').attr('href');
    var oldLinknext = $('li.next a').attr('href');
    var newLinkprev = oldLinkprev + '#news';
    var newLinknext = oldLinknext + '#news';
    $('li.prev a').attr('href', newLinkprev);
    $('li.next a').attr('href', newLinknext);

  });
</script>
