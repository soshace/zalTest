<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/album.css"/>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fancybox/jquery.fancybox.css"/>
<script src="<?php bloginfo('template_url'); ?>/fancybox/jquery.fancybox.pack.js"></script>
<body <?php body_class(); ?> >
  <div class="wrapper">
    <?php get_sidebar(); ?>
    <section class="album section_tb">

    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();?>
    <div class="section_line_lr conteiner">
      <a href="/album" class="back_link">Назад к альбомам</a>
            <h1><?php the_title(); ?></h1>
            <?php
            $args = array(
              'post_type' => 'attachment',
              'post_parent' => $post->ID,
              'numberposts' => ''
             );

              $attachments = get_posts( $args ); ?>
                <?php if ( $attachments ) {
                   foreach ( $attachments as $attachment ) {?>
                     <?php $image_attributes = wp_get_attachment_image_src( $attachment->ID );
                        $image = wp_get_attachment_image_src( $attachment->ID, 'large' );
                        $sel = $wpdb->get_row("SELECT post_content FROM wp_posts WHERE post_title = $attachment->ID AND post_parent = $post->ID ");?>
                     <div class="block_float_l p33">
               					<div class="card">
               						<img class="img_mobile" src="<?php echo $image_attributes[0]; ?>" alt="">
               						<a href="<?php echo $image[0]; ?>" rel="group" class="gallery" title="<?php echo $sel->post_content ?>">
               							<div class="cover"></div>
               							<img src="<?php echo $image_attributes[0]; ?>" alt="">
               						</a>
               					</div>
               				</div>
                     <?php  } ?>

                     <?php
                }
            ?>

          </div>
      </div>
    </div>
    <?php  endwhile;  ?>
    </section>
  </div>
  <?php get_footer(); ?>
  <script type="text/javascript">
		$(document).ready(function() {
			$(".gallery").fancybox();
			$("#MenuButton").click(function(ev){
				$("#MobileMenu").slideToggle(300);
			});
		});
	</script>
</body>
</html>
