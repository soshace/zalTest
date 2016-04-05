<?php get_header(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/contact.css"/>
    <body <?php body_class(); ?> >
    	<div class="wrapper">
    		<?php get_sidebar(); ?>
            <?php while ( have_posts() ) : the_post();?>
                <?php the_content(); ?>
            <?php endwhile; ?>
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
