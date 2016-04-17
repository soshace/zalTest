<?php get_header(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/photo.css"/>
    <body <?php body_class(); ?> >
    	<div class="wrapper">
    		<?php get_sidebar(); ?>
        <section class="section_tb photo">
          <div class="section_line_lr conteiner">
            <?php
    				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    				$args = array(
              'post_type' => 'photo',
    					'paged' => $paged,
    					'posts_per_page' => 4,
    					'has_archive' => true
    				);
            $col = 0;
    				query_posts($args);
    				if (have_posts()) :

    					while (have_posts()) : the_post();
                $col++;
                $valalbText = get_field( "albText" );
                $img= get_the_post_thumbnail( $post->ID, 'large' );
                $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ));
                if ($col == 1){ ?>
                  <div class="section_line_lr conteiner">
                <?php
                }
              ?>


    						<div class="block_float_l p50">
    							<div class="card_b">
                    <?php
    								if ( has_post_thumbnail() ) {
    									$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'  );
    									$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(), $size, $icon );
    									?>
      								<a href="<?php echo get_the_permalink() ?>" class="image_link"><div class="cover"></div><img src="<?php echo $thumbnail_src[0] ?>"></a>
    								<?php
    								}
    								?>
                    <div class="card_line_lr card_line_tb">
                      <h4><?php echo get_the_title() ?></h4>
                      <p><?php echo get_the_content() ?></p>
                    </div></div></div>
                    <?php if ($col == 2){ ?>
                      </div>
                      <?php
                      $col = 0;
                    }
                    ?>
    			<?php endwhile; endif; wpbeginner_numeric_posts_nav(); ?>
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
