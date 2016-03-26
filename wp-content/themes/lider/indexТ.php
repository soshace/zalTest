<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/home.css">
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/owl.carousel-min.js"></script>

<body <?php body_class(); ?> >
	<div class="wrapper">
		<?php get_sidebar(); ?>
		<section class="head_slider">
			<div class="section_line">
				<div class="parralax_layer1"></div>
				<div class=" p66 block_float_l">
					<img class="parralax_layer2" src="<?php bloginfo('template_url'); ?>/img/1.png" alt="The Last of us">
				</div>
				<div class="block_float_l p33">
					<div class="conteiner">
						<h1>Центр культуры тела "Лидер"</h1>
						<hr>
						<h4 class="title_phone">+7 (921) 318-25-20, </br> 7-27-47</h4>
					</div>
				</div>
			</div>
		</section>
		<section class="section_tb about">
        <div class="conteiner section_line_lr">
					<?php echo do_shortcode("[AU_slider]"); ?>
        </div>
		</section>

		<?php echo do_shortcode("[NEWS_slider]"); ?>


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
