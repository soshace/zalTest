<?php
/**
 * Template Name: mobStore
 */
 ?>

 <?php get_header(); ?>
 <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/owl-carousel/owl.carousel.css">
 <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/owl-carousel/owl.theme.css">
 <script src="<?php bloginfo('template_url'); ?>/js/owl-carousel/owl.carousel.js"></script>


 <script type="text/javascript">
     $(document).ready(function() {
          var currslide, dataImg, insImgDiv, insertIm;

         var oll = $("#owl-demo");

         $("#owl-demo").owlCarousel({
           afterAction : function(){
               currslide = $('.owl-item.active .item');
               dataImg = currslide.attr('data-image');
               insImgDiv = $('.ImgSlider');
               insertIm = '<img src='+dataImg+' >';
               $('.ImgSlider img').remove();
               $('.ImgSlider').append(insertIm).hide().fadeIn(400);
           }
         });
     });
 </script>
</head>

 <body <?php body_class(); ?> >

 <?php get_sidebar(); ?>

<?php $posts = get_posts ("category='5'&orderby=date&numberposts=3"); ?>
<?php if ($posts) : ?>




<?php while (have_posts()): the_post();?>
 <section>
 	<div class="section_marging aboutCompany greyConteiner afterHead parallBG"
    style="background: url('/wp-content/<?php echo (get_post_meta($post->ID, 'imageBg', true)); ?>'); background-repeat: no-repeat; background-size: cover; background-position: 50% 0;">
 		<div class="conteiner p75 ">
 			<div class="block block655">
 				<div class="card_padding">
 					<div class="line center">

 						<?php
 						if ( has_post_thumbnail() ) {
 							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'  );
 						 	$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(), $size, $icon );
                            $image_attributes = intval( $image_attributes[2]) + 80;
 						}
 						?>


                        <div class="parallax webAppl"
							style="background: url('<?php echo $image_url[0] ?>'); background-repeat: no-repeat; background-size: auto; height: <?php echo $image_attributes . 'px' ?>; background-position: 50% 0;"></div>

                        <div class="mobileIcons">
							<img src="<?php bloginfo('template_url'); ?>/img/appleIco.png" alt="" />
							<img src="<?php bloginfo('template_url'); ?>/img/android.png" alt="" />
						</div>
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
                     <h1>Мы создаем на платформах iOS и Android</h1>
                 </div>
             </div>
         </div>
     </div>
        <div class="section_marging aboutCompany mopad blockItemsHeigh">
            <div class="marAuto p75 inlineCont">
                <div class="block blockinLine p25">
                    <div class="card_padding teemItem greyConteiner teemItemMax">
                        <div class="line8">
                            <div class="whyweImg whyweImg11"></div>
                        </div>
                        <div class="linePadd84 ">
                            <p>Бизнес-приложения для компаний, интегрированные с системами автоматизации и управления.</p>
                        </div>
                    </div>
                </div>

                <div class="block blockinLine p25">
                    <div class="card_padding teemItem greyConteiner teemItemMax">
                        <div class="line8">
                            <div class="whyweImg whyweImg12"></div>
                        </div>
                        <div class="linePadd84 ">
                            <p>Навигационные (геолокационные и информационные) приложения с большим количеством информации об окружающих вас объектах
                            </p>
                        </div>
                    </div>
                </div>

                <div class="block blockinLine p25">
                    <div class="card_padding teemItem greyConteiner teemItemMax">
                        <div class="line8">
                            <div class="whyweImg whyweImg13"></div>
                        </div>
                        <div class="linePadd84 ">
                            <p>Программы для общения в социальных сетях
                            </p>
                        </div>
                    </div>
                </div>

                <div class="block blockinLine p25">
                    <div class="card_padding teemItem greyConteiner teemItemMax">
                        <div class="line8">
                            <div class="whyweImg whyweImg14"></div>
                        </div>
                        <div class="linePadd84 ">
                            <p>Приложения, обеспечивающие мобильный доступ к услугам и продукции компаний
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
                        <h1>Наши проекты</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="darkgreyConteiner section_marging  whyweItemBox ">



            <div class="sliderBlockMob">
                <?php echo do_shortcode("[MOI_slider]"); ?>

            </div>

        </div>
    </section>


    <section>
		<div class="section_marging  whyweItemBox">
			<div class="darkgreyConteiner">
				<div class="conteiner p50">
					<div class="card_padding">
						<div class="line center">
							<h1>Как мы работаем</h1>
						</div>
					</div>
				</div>
			</div>

            <div class="listLinksIco">
                <div class="greyConteiner">
    				<div class="conteiner p50">
    					<div class="card">
    						<div class="line">
    							<div class="content padLR imgContent">
    								<div class="whyweImg whyweImg1"></div>
    							</div>
    							<div class="content padLR">
    								<p>
    									Обсуждение проекта и составление технического задания
    								</p>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>

    			<div class="darkgreyConteiner">
    				<div class="conteiner p50">
    					<div class="card">
    						<div class="line">
    							<div class="content padLR imgContent">
    								<div class="whyweImg whyweImg31"></div>
    							</div>
    							<div class="content padLR">
    								<p>
    									Дизайн и проектирование интерфейса пользователя,
    								</p>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>

    			<div class="greyConteiner">
    				<div class="conteiner p50">
    					<div class="card">
    						<div class="line">
    							<div class="content padLR imgContent">
    								<div class="whyweImg whyweImg32"></div>
    							</div>
    							<div class="content padLR">
    								<p>
    									Разработка серверной и клиентской частей приложения
    								</p>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>

    			<div class="darkgreyConteiner">
    				<div class="conteiner p50">
    					<div class="card">
    						<div class="line">
    							<div class="content padLR imgContent">
    								<div class="whyweImg whyweImg3"></div>
    							</div>
    							<div class="content padLR">
    								<p>
    									Тестирование и внедрение
    								</p>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>


    			<div class="greyConteiner">
    				<div class="conteiner p50">
    					<div class="card">
    						<div class="line">
    							<div class="content padLR imgContent">
    								<div class="whyweImg whyweImg7"></div>
    							</div>
    							<div class="content padLR">
    								<p>
    									Техническая поддержка и обновления
    								</p>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
            </div>
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

 <script type="text/javascript">
     $(document).ready(function() {
         var sliderels = $('.owl-item .item .itemDescSlid');
         var owlBtnsDiv = $(".owl-btns div");

         $.each( sliderels, function( el,val ) {
             var val = $(val);
             var slideDescH = -(parseInt(val.height()) /2);
             val.css('margin-top',slideDescH);
             owlBtnsDiv.css('margin-top',slideDescH);
        });

        var insertPrev = "<i class='mdi mdi-chevron-left'></i>";
        var insertNext = "<i class='mdi mdi-chevron-right'></i>";

        $('.owl-prev').append(insertPrev);
        $('.owl-next').append(insertNext);

     });
 </script>
 <div class="overlay">
 <div class="popUpWindow popUpWindowForm p50" id="webPopUp" role="document">
     <div class="section_marging mopad marAuto ">

         <div class="container popUpMane">
             <div class="card">
                 <div class="line8 posrel">
                     <p>
                         Заявка на разработку мобильного приложения
                     </p>
                     <button class="closePopUp"><i class="mdi mdi-close"></i></button>
                 </div>
             </div>


         </div>

         <div class="conteiner greyConteiner containerForm">
             <?php echo do_shortcode( '[contact-form-7 id="101" title="mobDevAplic"]' ); ?>
         </div>

     </div>
 </div>
 </div>
