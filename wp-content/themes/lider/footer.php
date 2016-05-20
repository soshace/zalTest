<section class="footer section_tb">
  <div class="section_line_lr">
    <p class="copy">&copy; 2015 – All rights reserved</p>
    <ul class="social">
      <li>
        <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array(
            'post_type' => 'phones',
            'paged' => $paged
          );
          query_posts($args);
          if (have_posts()) :
            while (have_posts()) : the_post();
            $vklider = get_field( "vklider" );
            ?>
              <a href="<?php echo $vklider ?>" class="vk"></a>
            <?php
            endwhile;
          endif;
          wp_reset_query();
          ?>
      </li>
    </ul>
  </div>
</section>
<script type="text/javascript">
	$(document).ready(function() {
		$("#MenuButton").click(function(ev){
			$("#MobileMenu").slideToggle(300);
      $('body').toggleClass('noscrollBody');
      $('#MobileMenu').toggleClass('menuScr');
		});

    if(!($('li').is('.current-menu-item'))){
      var windLocat = window.location.pathname;
      if (windLocat != '/'){
        var newsTrue = windLocat.indexOf('/news/');
        var photoTrue = windLocat.indexOf('/photo/');
        if (photoTrue != '-1') {
          $('.menu-item-30').addClass('current-menu-item');
        } else
          if ((newsTrue == '-1') & (window.location.hash != '#news')) {
            $('.menu-item-36').addClass('current-menu-item');
          }
      }

    }

    $('.header .current-menu-item > a').click(function(e){
      e.preventDefault();
      return false;
    });

    $('.backHistory').click(function(e){
      if(history.length > 1) {
        e.preventDefault();
        history.back();
      }
    });

    var oldLinkprev = $('.newsLinks li.prev a').attr('href');
    var oldLinknext = $('.newsLinks li.next a').attr('href');
    var newLinkprev = oldLinkprev + '#news';
    var newLinknext = oldLinknext + '#news';
    $('.newsLinks li.prev a').attr('href', newLinkprev);
    $('.newsLinks li.next a').attr('href', newLinknext);

  });
</script>
