<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/home.css">
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/owl.carousel-min.js"></script>

<body class="home blog paged" >
	<div class="wrapper">
		<?php get_sidebar(); ?>
		<section class="head_slider">
			<div class="section_line">
				<div class="parralax_layer1"></div>
				<div class=" p66 block_float_l">
					<img class="parralax_layer2" src="<?php bloginfo('template_url'); ?>/img/1.png" alt="The Last of us">
				</div>
				<div class="block_float_l p33">
					<div class="conteiner title_phone">
						<h1>Центр культуры тела "Лидер"</h1>
						<hr>
							<?php
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								$args = array(
									'post_type' => 'phones',
									'paged' => $paged,
									'has_archive' => true
								);
								query_posts($args);


								if (have_posts()) :

									while (have_posts()) : the_post();
										the_content();
									endwhile;
					      endif;
							?>
					</div>
				</div>
			</div>
		</section>
		<section class="section_tb about">
        <div class="conteiner section_line_lr">
					<?php echo do_shortcode("[AU_slider]"); ?>
        </div>
		</section>

		<section class="section_tb news newsLinks" id="news">
  			<div class="section_line_lr conteiner">
  				<h1>Новости</h1>
  			</div>
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array(
						'post_type' => 'news',
						'paged' => $paged,
						'posts_per_page' => 4,
						'has_archive' => true
					);
					query_posts($args);
					$col = 0;


					if (have_posts()) :

						while (have_posts()) : the_post();
							$col++;
							if ($col == 1){
				?>
				<div class="conteiner section_line_lr">
				<?php
				}?>
				<div class="block_float_l p50">
					<a href='<?php the_permalink() ?>' class="card_b_Link">
						<div class="card_b newsCard">
							<?php if ( has_post_thumbnail()) {
							   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');
							   echo '<div class="card_line"> <img src="' . $large_image_url[0] . '" alt=""></div>';
							 } ?>
							<div class="card_line_lr card_line_tb">
								<h4><?php the_title() ?></h4>
								<p class="date"><?php the_date() ?></p>
								<?php the_excerpt() ?>
								<a class="read_more" href='<?php the_permalink() ?>'>Далее</a>
							</div>
						</div>
					</a>
				</div>
				<?php if ($col == 2){
					$col = 0;
				?>
				</div>
				<?php
					} endwhile;
	      endif;
				wpbeginner_numeric_posts_nav();
				?>


	</div>
	<?php get_footer(); ?>
	<script type="text/javascript">
	  $(document).ready(function() {
	    $("#HeadSlider").owlCarousel({
	        navigation : false,
	        slideSpeed : 300,
	        paginationSpeed : 400,
	        items : 1,
	        itemsDesktop : false,
	        itemsDesktopSmall : false,
	        itemsTablet: false,
	        itemsMobile : false
	    });


	      $(window).scroll(function() {
	              var yPos = +($(window).scrollTop() / 5);
	              var coords2 = (yPos/2) + 'px';
	              var coords1 = '50% '+ yPos + 'px';
	              $('.parralax_layer1').css({ backgroundPosition: coords1 });
	              $('.parralax_layer2').css({"top": coords2});
	          });

	    $("#MenuButton").click(function(ev){
	      $("#MobileMenu").slideToggle(300);
	    });

	  });
	</script>
</body>
</html>
