<?php get_header(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/photo.css"/>
    <body <?php body_class(); ?> >
    	<div class="wrapper">
    		<?php get_sidebar(); ?>
        <?php echo do_shortcode("[PH_slider]"); ?>
      </div>
      <?php get_footer(); ?>
    <script type="text/javascript">
  		$(document).ready(function() {
  			$("#MenuButton").click(function(ev){
  				$("#MobileMenu").slideToggle(300);
  			});
  		});
  	</script>
  </body>
  </html>
