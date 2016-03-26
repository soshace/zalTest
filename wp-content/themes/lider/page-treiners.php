<?php get_header(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/treiners.css"/>
    <body <?php body_class(); ?> >
    	<div class="wrapper">
    		<?php get_sidebar(); ?>
        <section class="treiners section_tb">
          <div class="conteiner">
            <h1>Наши тренеры</h1>
          </div>
          <?php echo do_shortcode("[TR_slider]"); ?>
        </section>
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
