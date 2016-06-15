<?php get_header(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/text.css"/>
    <body <?php body_class(); ?> >
    	<div class="wrapper">
    		<?php get_sidebar(); ?>
    		<section class="section_tb info">
    			<div class="conteiner section_line_lr">

                <?php
            		// Start the loop.
            		while ( have_posts() ) : the_post();
                    if ( has_post_thumbnail() ) {
                      $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'  );
                      $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(), $size, $icon );
                    }
                    ?>
                    <h1><?php the_title(); ?></h1>
                    <div class="card_b">
                      <div class="card_line_lr aboutLine">
                      <?php if ($image_url[0]){ ?>
                        <img src='<?php echo $image_url[0] ?>' alt="">
                      <?php } ?>

                      <?php the_content(); ?>
                      </div>
                    </div>
                <?php endwhile; ?>

    			</div>
    		</section>
    		<section class="section_b">
    			<!-- <div class="conteiner section_line_lr">
    				<input placeholder="Input" type="text">
    				<button>Button</button>
    			</div> -->
    		</section>
      </div>
      <?php get_footer(); ?>
      <script type="text/javascript">
        $(document).ready(function() {
          $(".aboutLine a").attr("target","blank");
        });
      </script>
</body>
</html>
