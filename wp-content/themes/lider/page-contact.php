<?php get_header(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/contact.css"/>
    <body <?php body_class(); ?> >
    	<div class="wrapper">
    		<?php get_sidebar(); ?>
        <section class="contact section_tb">
          <div class="section_line_lr">
            <h1>Контактная информация</h1>
            <?php while ( have_posts() ) : the_post();?>
                <?php the_content(); ?>
            <?php endwhile; ?>
          </div>
        </section>
        <section class="map">
          <div class="section_line">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3341.9241502818522!2d30.120620729334362!3d59.78454334842302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46963c5a50dbffc7%3A0x5f2bf1a6afb45194!2z0JzQvtC70L7QtNC10LbQvdCw0Y8g0YPQuy4sIDUwLCDQotC-0YDQuNC60LgsINCzLiDQodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQsywgMTk4MzI2!5e0!3m2!1sru!2sru!4v1458240628742" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
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
