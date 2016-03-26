<?php get_header(); ?>
<body <?php body_class(); ?> >
<?php get_sidebar(); ?>





<?php
$temp = $wp_query; $wp_query= null;
$wp_query = new WP_Query(); $wp_query->query('showposts=5' . '&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<section>
	<div class="section_marging greyConteiner aboutCompany">
		<div class="conteiner p75 ">
			<div class="block block655">
				<div class="card_padding">
					<?php the_posts_pagination( array(
					    'mid_size' => 1,
					    'prev_text' => __( 'Back', 'textdomain' ),
					    'next_text' => __( 'Onward', 'textdomain' ),
					) ); ?>
					<div class="line center">
						<?php
						if ( has_post_thumbnail() ) {
							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'  );
						 	$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(), $size, $icon );
						}
						?>
						<div class="parallax webAppl"
							style="background: url('<?php echo $image_url[0] ?>'); background-repeat: no-repeat; background-size: contain; height: <?php echo $image_attributes[2] . 'px' ?>; background-position: 50% 0;"></div>
						<h1><?php the_title(); ?></h1>

					</div>
					<div class="linePadd84 center">
						<?php the_excerpt(); ?>
					</div>

					<div class="linePaddTopBott center">
						<a href="<?php the_permalink(); ?>" class="orangeLink"><span>В раздел</span>
							<i class="mdi mdi-chevron-right"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; ?>

<?php get_sidebar('EveryProjectIt'); ?>





<?php get_footer(); ?>
