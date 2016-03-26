<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title(' | ', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css" />


	<?php
		wp_head();
	?>

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fonts/MaterialDesign-Webfont-master/materialdesignicons.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/60em.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css">
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/html5shiv.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/Parallax.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/menuOpen.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/popUpOpen.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/indexLogo.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/sliderMeline.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/uploadFiles.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/parallaxLogo.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/parallBG.js"></script>

</head>

<body <?php body_class(); ?> >

<header>
		<div class="menuOrange">
			<div class="headerSection">
				<div class="block">
					<div class="line_paddingBig">
						<div class="content_float_left contentCentPhone">
							<!-- <a href="tel:+74957834849" class="phoneTo">
								<div class="imgMenuIco phoneMenuIco"></div>
								<span>+7 (495) 783-48-49</span>
							</a> -->
						</div>
					</div>
				</div>
			</div>
			<div class="section_marging aboutCompany mopad blockItemsHeigh">
	            <div class="marAuto p75 inlineCont">
	                <div class="block blockinLine p33">
						<a href="/" class="menuLink">
							<div class="card_padding">
		                        <div class="line8">
		                            <div class="imgMenuIco"></div>
		                        </div>
								<div class="linePadd16 ">
		                            <p>Главная</p>
		                        </div>
		                    </div>
						</a>
	                </div>

	                <div class="block blockinLine p33">
						<a href="/web-prilozheniya/" class="menuLink">
							<div class="card_padding ">
		                        <div class="line8">
		                            <div class="imgMenuIco imgMenuIco2"></div>
		                        </div>
								<div class="linePadd16 ">
		                            <p>Веб-приложения</p>
		                        </div>
		                    </div>
						</a>
	                </div>


	                <div class="block blockinLine p33">
						<a href="/mobilnyie-prilozheniya/" class="menuLink">
							<div class="card_padding">
		                        <div class="line8">
		                            <div class="imgMenuIco imgMenuIco3"></div>
		                        </div>
								<div class="linePadd16 ">
		                            <p>Мобильные приложения</p>
		                        </div>
		                    </div>
						</a>
	                </div>
	            </div>


	        </div>
		</div>
		<div class="headerSection section_marging">
			<div class="block_float_left p75">
				<div class="line_paddingBig">
					<div class="content_float_left mdDispl">
						<a href="tel:+74957834849" class="phoneTo phTHead">+7 (495) 783-48-49</a>
					</div>
					<div class="content_float_left emailHead">
						<a href="#" class="mailTo dottedBor PopUpConnect">
							<i class="icoPhone"></i>
							<span class="mailToText mdDispl">Связаться с нами</span>
						</a>
					</div>
				</div>
			</div>
			<div class="block_float_left p25">
				<div class="line_paddingBig">
					<div class="content_float_right">
						<button class="menu">
							<i class="menuIcon"></i>
							<i class="menuIcon"></i>
							<i class="menuIcon"></i>
						</button>
					</div>
				</div>
			</div>

			<div class="logo logoDisplTop">
                <a href="/">
					<img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="" class="logoHeader mdDispl" />
                    <img src="<?php bloginfo('template_url'); ?>/img/logoMin.png" alt="" class="logoHeader xsDispl" />
                </a>
            </div>
		</div>
	</header>
<section>
		<div class="section_marging topHomeBlock afterHead ">
			<div class="posrel indexFirstPage parallBG">
				<div class="parallaxLogo logoHome">
					<!-- <img src="<?php bloginfo('template_url'); ?>/img/bigLogo.png" alt="tehuna logo" /> -->
				</div>
				<div class="arrowBlockTop">
					<i class="mdi mdi-chevron-down arrowBot"></i>
				</div>
			</div>
		</div>
</section>
<?php get_sidebar('aboutCompany'); ?>


<section class="partsPages">
<?php
$temp = $wp_query; $wp_query= null;
$wp_query = new WP_Query(); $wp_query->query('showposts=5' . '&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

	<div class="partsPageItem">
		<div class="section_marging greyConteiner aboutCompany">
			<div class="conteiner p75 ">
				<div class="block block655">
					<div class="card_padding">

						<div class="line center">
							<?php
							if ( has_post_thumbnail() ) {
								$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'  );
							 	$image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id(), $size, $icon ) ;
							 	$image_attributes = intval( $image_attributes[2]) + 80;
							}
							?>
							<div class="parallax webAppl"
								style="background: url('<?php echo $image_url[0] ?>'); background-repeat: no-repeat; background-size: auto; height: <?php echo $image_attributes . 'px' ?>; background-position: 50% 0;"></div>
							<h1><?php the_title(); ?></h1>

						</div>
						<div class="linePadd84 center">
							<p><?php echo (get_post_meta($post->ID, 'description', true)); ?></p>
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
	</div>
	<?php endwhile; ?>
</section>

<?php get_sidebar('EveryProjectIt'); ?>


<section>
	<div class="section_marging greyConteiner partners">
		<div class="conteiner SliderMel">
			<div class="marAuto p75">
				<div class="block">
					<div class="card">
						<div class="linePaddTopBott center borderBottom">
							<h1>Клиенты и партнеры</h1>
							<p>
								Наши клиенты - государственные департаменты образования и здравоохранения, ведущие европейские университеты, банки и коммерческие организации.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="sliderNav">
				<button class="sliderBtn prevSlide">
					<span class="mdi mdi-chevron-left"></span>
				</button>
				<button class="sliderBtn nextSlide">
					<span class="mdi mdi-chevron-right"></span>
				</button>
			</div>
			<?php echo do_shortcode("[mel_slider]"); ?>

		</div>
	</div>
</section>

<section>
	<div class="section_marging darkgreyConteiner partners">
		<div class="conteiner">
			<div class="marAuto p75">
				<div class="block">
					<div class="card">
						<div class="linePaddTopBott center borderBottom">
							<p>
								 Для нас соответствовать самым высоким стандартам и практикам – значит предоставлять клиентам профессиональный и качественный сервис.
							</p>
						</div>
					</div>
				</div>
			</div>
			<?php echo do_shortcode("[sert_slider]"); ?>

		</div>
	</div>
</section>


<section>
	<div class="section_marging aboutCompany marBot0 teemSection">
		<div class="conteiner p75">
			<div class="card_padding">
				<div class="line center">
					<h1>Наша команда</h1>
				</div>
			</div>
		</div>
		<?php echo do_shortcode("[TM_slider]"); ?>


	</div>
</section>



<?php get_footer(); ?>

<script>
    $(document).ready(function() {
		Parallax.run();
        indexLogo.run();
        sliderMeline.run();
		parallBG.run();
		parallaxLogo.run();
    });
</script>
