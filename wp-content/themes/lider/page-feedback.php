<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php get_header(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/feedback.css"/>
    <body <?php body_class(); ?> >
    	<div class="wrapper">
    		<?php get_sidebar(); ?>
        <section class="feedback section_tb">
          <div class="conteiner">
            <h1>Отзывы</h1>
          </div>
          <?php echo do_shortcode("[FB_slider]"); ?>
        </section>
      </div>
      <?php get_footer(); ?>
</body>
</html>
