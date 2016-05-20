<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php get_header(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/text.css"/>
    <body <?php body_class(); ?> >
    	<div class="wrapper">
    		<?php get_sidebar(); ?>
    		<section class="section_t">
    			<div class="conteiner section_line_lr">
            <a href="/#news" class="back_link backHistory">Назад к новостям</a>
            <div class="card_b">
              <div class="card_line_lr">
                <?php
            		// Start the loop.
            		while ( have_posts() ) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    <?php if ( has_post_thumbnail() ) {
                      $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'  );
                      $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(), $size, $icon ); ?>

                      <img src='<?php echo $image_url[0] ?>' alt="">
                    <?php
                    }
                    ?>



                    <?php the_content(); ?>
                <?php endwhile; ?>
                </div>
              </div>
    			</div>
    		</section>
    		<section class="section_b"></section>
      </div>
      <?php get_footer(); ?>
</body>
</html>
