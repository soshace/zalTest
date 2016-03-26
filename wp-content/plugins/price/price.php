<?php

/*
Plugin Name: price
Plugin URI:
Description: A simple plugin for list of treiners
Author: Meline
Version: 1.0
Author URI: Your URL
*/

define('PR_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('PR_NAME', "priceDivText");
define ("PR_VERSION", "1.0");

function PR_get_slider(){
    $priceDivTextblock= '<div class="section_line_lr conteiner">';

      $PR_query= "post_type=price";
      query_posts($PR_query);

        if (have_posts()) : while (have_posts()) : the_post();
            $valAnotation = get_field( "anotation" );
            $valrazTr = get_field( "razTr" );
            $valrazTr = get_field( "tr10" );
            $priceDivTextblock .='
                  <div class="block_float_l p50">
                    <div class="card_tb">
                      <div class="card_line_tb card_line_lr">
                        <h4>' .get_the_title() .'</h4> <p>' . get_the_content() .'</p>';

              if ($valAnotation){
                $priceDivTextblock.= '<p class="annotation">' . $valAnotation .'</p>';
              };
							$priceDivTextblock.= '</div> <div class="card_line_tb card_line_lr">
                                      <ul>
                                        <li>Разовая тренировка: <span>' . $valrazTr .'</span></li>
                                        <li>10 тренировок: <span>' . $valrazTr .'</span></li>
                                      </ul>
                                    </div>';
              $priceDivTextblock.= '</div></div>';

        endwhile; endif; wp_reset_query();
        $priceDivTextblock.= '</div>';

        return $priceDivTextblock;

}


/**add the shortcode for the slider- for use in editor**/

function PR_insert_slider($atts, $content=null){

$priceDivTextblock= PR_get_slider();

return $priceDivTextblock;

}

add_shortcode('PR_slider', 'PR_insert_slider');

/**add template tag- for use in themes**/

function PR_slider(){

    print PR_get_slider();
}

?>


<?php
define('PI_NAME', "Прайс");
define('PI_SINGLE', "Прайс");
define('PI_TYPE', "price");


function PR_register() {
    $args = array(
        'label' => __(PI_NAME),
        'singular_label' => __(PI_SINGLE),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'editor', 'thumbnail')
       );

    register_post_type(PI_TYPE , $args );
}

add_action('init', 'PR_register');
?>
