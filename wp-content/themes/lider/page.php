<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/blog.css">
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/owl.carousel-min.js"></script>

<body <?php body_class(); ?> >
	<div class="wrapper">
		<?php get_sidebar(); ?>
		<section class="blog section_t">
			<div class="section_line_lr conteiner">
				<h1>Статьи</h1>
			</div>
			<div class="section_line_lr conteiner">

				<?php
				// $temp = $wp_query; $wp_query= null;
				// $wp_query = new WP_Query(); $wp_query->query('showposts=5' . '&paged='.$paged);
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'paged' => $paged,
					'posts_per_page' => 5,
					'has_archive' => true
				);
				query_posts($args);
				if (have_posts()) :

					while (have_posts()) : the_post(); ?>

						<div class="card_tb">
							<div class="card_line_lr">
								<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
								<p class="date"><?php echo get_the_date() ?></p>
								<?php
								if ( has_post_thumbnail() ) {
									$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'  );
									$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(), $size, $icon );
									?>
									<img src='<?php echo $image_url[0] ?>' alt="">
								<?php
								}
								?>


								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" class="read_more">Читать</a>
							</div>
						</div>
			<?php endwhile; endif; wpbeginner_numeric_posts_nav(); ?>
					</div>
			</section>
			<!-- <section class="pagination section_tb">
				<div class="section_line_lr conteiner">
					<ul>
						<li class="prev"><a href="#"></a></li>
						<li class="next"><a href=""></a></li>
					</ul>
				</div>
			</section> -->


</div>
<?php get_footer(); ?>
</body>
</html>
