<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php get_header(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/calendar.css"/>
    <body <?php body_class(); ?> >
    	<div class="wrapper">
    		<?php get_sidebar(); ?>
        <section class="calendar section_tb">
            <div class="section_line_lr">
                <a href="/calendar_print" target="blank" class="print">Версия для печати</a>
            </div>
            <?php
            function CL_get_slider(){

                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                  $args = array(
                    'post_type' => 'calendar'
                  );
                  query_posts($args);
                  $col = 0;


                  if (have_posts()) :


                    while (have_posts()) : the_post();
                      $val10 = get_field( "t10" );
                      $val10C = get_field( "10:00color" );
                      $val11 = get_field( "11:00" );
                      $val11C = get_field( "11:00color" );
                      $val12 = get_field( "12:00" );
                      $val12C = get_field( "12:00color" );
                      $val15 = get_field( "15:00" );
                      $val15C = get_field( "15:00color" );
                      $val16 = get_field( "16:00" );
                      $val16C = get_field( "16:00color" );
                      $val17 = get_field( "17:00" );
                      $val17C = get_field( "17:00color" );
                      $val17_1 = get_field( "17:00(1)" );
                      $val17C_1 = get_field( "17:00(1)color" );
                      $val18 = get_field( "18:00" );
                      $val18C = get_field( "18:00color" );
                      $val18_1 = get_field( "18:00(1)" );
                      $val18C_1 = get_field( "18:00(1)color" );
                      $val19 = get_field( "19:00" );
                      $val19C = get_field( "19:00color" );
                      $val19_1 = get_field( "19:00(1)" );
                      $val19C_1 = get_field( "19:00(1)color" );
                      $val19_2 = get_field( "19:00(2)" );
                      $val19_2C = get_field( "19:00(2)color" );
                      $val20 = get_field( "20:00" );
                      $val20C = get_field( "20:00color" );
                      $val20_1 = get_field( "20:00(1)" );
                      $val20C_1 = get_field( "20:00(1)color" );
                      $val20_2 = get_field( "20:00(2)" );
                      $val20_2C = get_field( "20:00(2)color" );
                      $val21 = get_field( "21:00" );
                      $val21C = get_field( "21:00color" );
                      $col++;

                      if ($col == 1){
                        $calendblock .='<div class="section_line_lr">';
                      }

                      $calendblock .='<div class="block_float_l p33"><div class="card_t">
                          <div class="card_line_lr card_line_tb">
                              <h4>' .get_the_title() .'</h4></div><ul class="card_line_lr">';
                      if ($val10){
                        $calendblock .='<li class="card_line_tb time_line">
                          <span style="background: ' . $val10C .'" class="marker"></span>
                          <span class="time">10:00</span>
                          <p class="description">' . $val10 .'</p></li>';
                      };
                      if ($val11){
                        $calendblock .='<li class="card_line_tb time_line">
                          <span style="background: ' . $val11C .'" class="marker"></span>
                          <span class="time">11:00</span>
                          <p class="description">' . $val11 .'</p></li>';
                      };
                      if ($val12){
                        $calendblock .='<li class="card_line_tb time_line">
                          <span style="background: ' . $val12C .'" class="marker"></span>
                          <span class="time">12:00</span>
                          <p class="description">' . $val12 .'</p></li>';
                      };
                      if ($val15){
                        $calendblock .='<li class="card_line_tb time_line">
                          <span style="background: ' . $val15C .'" class="marker"></span>
                          <span class="time">15:00</span>
                          <p class="description">' . $val15 .'</p></li>';
                      };
                      if ($val16){
                        $calendblock .='<li class="card_line_tb time_line">
                          <span style="background: ' . $val16C .'" class="marker"></span>
                          <span class="time">15:00</span>
                          <p class="description">' . $val16 .'</p></li>';
                      };
                      if ($val17){
                        $calendblock .='<li class="card_line_tb time_line">
                          <span style="background: ' . $val17C .'" class="marker"></span>
                          <span class="time">15:00</span>
                          <p class="description">' . $val17 .'</p></li>';
                      };
                      if ($val17_1){
                        $calendblock .='<li class="card_line_tb time_line">
                          <span style="background: ' . $val17C_1 .'" class="marker"></span>
                          <span class="time">15:00</span>
                          <p class="description">' . $val17_1 .'</p></li>';
                      };
                      if ($val18){
                        $calendblock .='<li class="card_line_tb time_line">
                          <span style="background: ' . $val18C .'" class="marker"></span>
                          <span class="time">15:00</span>
                          <p class="description">' . $val18 .'</p></li>';
                      };
                      if ($val18_1){
                        $calendblock .='<li class="card_line_tb time_line">
                          <span style="background: ' . $val18C_1 .'" class="marker"></span>
                          <span class="time">15:00</span>
                          <p class="description">' . $val18_1 .'</p></li>';
                      };
                      if ($val19){
                        $calendblock .='<li class="card_line_tb time_line">
                          <span style="background: ' . $val19C .'" class="marker"></span>
                          <span class="time">15:00</span>
                          <p class="description">' . $val19 .'</p></li>';
                      };
                      if ($val19_1){
                        $calendblock .='<li class="card_line_tb time_line">
                          <span style="background: ' . $val19C_1 .'" class="marker"></span>
                          <span class="time">15:00</span>
                          <p class="description">' . $val19_1 .'</p></li>';
                      };
                      if ($val19_2){
                        $calendblock .='<li class="card_line_tb time_line">
                          <span style="background: ' . $val19C_2 .'" class="marker"></span>
                          <span class="time">15:00</span>
                          <p class="description">' . $val19_2 .'</p></li>';
                      };
                      if ($val20){
                        $calendblock .='<li class="card_line_tb time_line">
                          <span style="background: ' . $val20C .'" class="marker"></span>
                          <span class="time">15:00</span>
                          <p class="description">' . $val20 .'</p></li>';
                      };
                      if ($val20_1){
                        $calendblock .='<li class="card_line_tb time_line">
                          <span style="background: ' . $val20C_1 .'" class="marker"></span>
                          <span class="time">15:00</span>
                          <p class="description">' . $val20_1 .'</p></li>';
                      };
                      if ($val20_2){
                        $calendblock .='<li class="card_line_tb time_line">
                          <span style="background: ' . $val20C_2 .'" class="marker"></span>
                          <span class="time">15:00</span>
                          <p class="description">' . $val20_2 .'</p></li>';
                      };
                      if ($val21){
                        $calendblock .='<li class="card_line_tb time_line">
                          <span style="background: ' . $val21C .'" class="marker"></span>
                          <span class="time">15:00</span>
                          <p class="description">' . $val21 .'</p></li>';
                      };

                      $calendblock .='</ul></div></div>';

                      if ($col == 3){
                        $calendblock .='</div>';
                        $col=0;
                      };

                    endwhile;
                  endif;



                    wpbeginner_numeric_posts_nav();

                    wp_reset_query();
                    wp_reset_postdata();

                    return $calendblock;

            }

            function CL_insert_slider($atts, $content=null){

              $calendblock= CL_get_slider();

              return $calendblock;

              }

              add_shortcode('CL_slider', 'CL_insert_slider');

              /**add template tag- for use in themes**/

              function CL_slider(){

                  print CL_get_slider();
              }

            ?>
            <?php echo do_shortcode("[CL_slider]"); ?>
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
