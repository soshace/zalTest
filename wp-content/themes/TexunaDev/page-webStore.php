<?php
/**
 * Template Name: webStore
 */
 ?>



<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/owl-carousel/owl.theme.css">
<script src="<?php bloginfo('template_url'); ?>/js/owl-carousel/owl.carousel.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#owl-demo").owlCarousel();
    });
</script>


</head>
 <body <?php body_class(); ?> >

 <?php get_sidebar(); ?>

<?php $posts = get_posts ("category='4'&orderby=date&numberposts=3"); ?>
<?php if ($posts) : ?>




<?php while (have_posts()): the_post();?>
 <section>
 	<div class="section_marging aboutCompany greyConteiner afterHead parallBG"
    style="background: url('/wp-content/<?php echo (get_post_meta($post->ID, 'imageBg', true)); ?>'); background-repeat: no-repeat; background-size: cover; background-position: 50% 50%;">
 		<div class="conteiner p75 ">
 			<div class="block block655">
 				<div class="card_padding">
 					<div class="line center">
 						<?php
 						if ( has_post_thumbnail() ) {
 							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'  );
 						 	$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(), $icon );
                            $image_attributes = intval( $image_attributes[2]) + 80;
 						}
 						?>
                        <div class="parallax webAppl"
							style="background: url('<?php echo $image_url[0] ?>'); background-repeat: no-repeat; background-size:  auto; height: <?php echo $image_attributes . 'px' ?>; background-position: 50% 0;"></div>
						<h1><?php the_title(); ?></h1>

 					</div>
 					<div class="linePadd84 center">
 						<?php the_content(); ?>
 					</div>

                    <div class="linePaddTopBott center">
                        <a href="#" class="orangeBigLink linkToOpenPopUp">
                            Заявка на разработку
                        </a>
                    </div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <?php endwhile; ?>
 <?php endif; ?>

 <section>
         <div class="section_marging  whyweItemBox">
             <div class="conteiner p75">
                 <div class="card_padding">
                     <div class="line center">
                         <h1>Уникальное программное обеспечение</h1>
                     </div>
                 </div>
             </div>
         </div>
         <div class="section_marging aboutCompany mopad blockItemsHeigh">
             <div class="marAuto p75 inlineCont">
                 <div class="block blockinLine p25">
                     <div class="card_padding teemItem greyConteiner">
                         <div class="line8">
                             <div class="whyweImg whyweImg11"></div>
                         </div>
                         <div class="linePadd84 ">
                             <p>гибкие методики разработки </p>
                             <p class="orangeLink">(agile-методология)</p>
                         </div>
                     </div>
                 </div>

                  <div class="block blockinLine p25">
                     <div class="card_padding teemItem greyConteiner">
                         <div class="line8">
                             <div class="whyweImg whyweImg13"></div>
                         </div>
                         <div class="linePadd84 ">
                             <p>Современный интерфейс (HTML5/CSS3)
                             </p>
                         </div>
                     </div>
                 </div>

                 <div class="block blockinLine p25">
                     <div class="card_padding teemItem greyConteiner">
                         <div class="line8">
                             <div class="whyweImg whyweImg12"></div>
                         </div>
                         <div class="linePadd84 ">
                             <p>Высокая производительность и отказоустойчивость (кластерные и облачные решения)
                             </p>
                         </div>
                     </div>
                 </div>

                 <div class="block blockinLine p25">
                     <div class="card_padding teemItem greyConteiner">
                         <div class="line8">
                             <div class="whyweImg whyweImg14"></div>
                         </div>
                         <div class="linePadd84 ">
                             <p>передовые технологии сбора и обработки данных (MS SQL Server, MongoDB, Apache Hadoop)
                             </p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>


     <section>
         <div class="section_marging  whyweItemBox">
             <div class="conteiner p75">
                 <div class="card_padding">
                     <div class="line center">
                         <h1>Хранилища данных</h1>
                     </div>
                 </div>
             </div>
         </div>
         <div class="section_marging aboutCompany mopad blockItemsHeigh">
             <div class="marAuto p75 inlineCont">
                 <div class="block blockinLine p25">
                     <div class="card_padding teemItem greyConteiner">
                         <div class="line8">
                             <div class="whyweImg whyweImg15"></div>
                         </div>
                         <div class="linePadd84 ">
                             <p>Автоматический сбор данных и взаимодействие с интегрированными системами</p>
                         </div>
                     </div>
                 </div>

                 <div class="block blockinLine p25">
                     <div class="card_padding teemItem greyConteiner">
                         <div class="line8">
                             <div class="whyweImg whyweImg16"></div>
                         </div>
                         <div class="linePadd84 ">
                             <p>
                                 Валидация, проверка и безопасное хранение данных
                             </p>
                         </div>
                     </div>
                 </div>

                 <div class="block blockinLine p25">
                     <div class="card_padding teemItem greyConteiner">
                         <div class="line8">
                             <div class="whyweImg whyweImg17"></div>
                         </div>
                         <div class="linePadd84 ">
                             <p>
                                 Управление обработкой данных, аналитика и формирование отчетов
                             </p>
                         </div>
                     </div>
                 </div>

                 <div class="block blockinLine p25">
                     <div class="card_padding teemItem greyConteiner">
                         <div class="line8">
                             <div class="whyweImg whyweImg18"></div>
                         </div>
                         <div class="linePadd84 ">
                             <p>
                                 Управление правами доступа к данным и аналитике.
                             </p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <section>
         <div class="section_marging aboutCompany mopad blockItemsHeigh">
             <div class="conteiner p75">
 				<div class="card_padding">
 					<div class="line center">
 						<h1>Системы управления правами доступа</h1>
 					</div>
 				</div>
 			</div>
             <div class="marAuto p75 inlineCont">
                 <div class="block blockinLine p25">
                     <div class="card_padding teemItem greyConteiner">
                         <div class="line8">
                             <div class="whyweImg whyweImg18"></div>
                         </div>
                         <div class="linePadd84 ">
                             <p>Единый пароль при доступе к независимым системам
                         </div>
                     </div>
                 </div>

                 <div class="block blockinLine p25">
                     <div class="card_padding teemItem greyConteiner">
                         <div class="line8">
                             <div class="whyweImg whyweImg19"></div>
                         </div>
                         <div class="linePadd84 ">
                             <p>
                                 Гибкое управление уров-
                                 нями доступа
                                 пользователей
                             </p>
                         </div>
                     </div>
                 </div>

                 <div class="block blockinLine p25">
                     <div class="card_padding teemItem greyConteiner">
                         <div class="line8">
                             <div class="whyweImg whyweImg20"></div>
                         </div>
                         <div class="linePadd84 ">
                             <p>
                                 Решения, не влияющие на работу интегрированных приложений, повышающие безопасность данных
                             </p>
                         </div>
                     </div>
                 </div>

                 <div class="block blockinLine p25">
                     <div class="card_padding teemItem greyConteiner">
                         <div class="line8">
                             <div class="whyweImg whyweImg21"></div>
                         </div>
                         <div class="linePadd84 ">
                             <p>
                                 Простое и быстрое
                                 внедрение системы.
                             </p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <section>
         <div class="section_marging  whyweItemBox">
             <div class="conteiner p75 ">
                 <div class="card_padding">
                     <div class="line center">
                         <h1>Проекты</h1>
                     </div>
                 </div>
             </div>
         </div>
         <div class="darkgreyConteiner section_marging  whyweItemBox ">
             <?php echo do_shortcode("[WOI_slider]"); ?>
         </div>
     </section>

     <section>
        <div class="section_marging  whyweItemBox">
            <div class="darkgreyConteiner">
                <div class="conteiner p75">
                    <div class="card_padding">
                        <div class="line center">
                            <h1>Заявка на разработку приложения</h1>
                            <a href="#" class="orangeBigLink linkToOpenPopUp">
                                Заполнить
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





 <?php get_footer(); ?>

 <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/sliderOWlDev.js"></script>

 <div class="overlay">
     <div class="popUpWindow popUpWindowForm p50" id="webPopUp">
         <div class="section_marging mopad marAuto ">

             <div class="container popUpMane">
                 <div class="card">
                     <div class="line8 posrel">
                         <p>
                             Заявка на разработку веб-приложения
                         </p>
                         <button class="closePopUp"><i class="mdi mdi-close"></i></button>
                     </div>
                 </div>


             </div>

             <div class="conteiner greyConteiner containerForm">
                 <?php echo do_shortcode( '[contact-form-7 id="102" title="webDevAplic"]' ); ?>
             </div>

         </div>
     </div>
     </div>
