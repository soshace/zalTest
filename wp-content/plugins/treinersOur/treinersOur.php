<?php

/*
Plugin Name: treinersOur
Plugin URI:
Description: A simple plugin for list of treiners
Author: Meline
Version: 1.0
Author URI: Your URL
*/

define('TR_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('TR_NAME', "treinersOurText");
define ("TR_VERSION", "1.0");

function TR_get_slider(){
    $treinersOurTextblock= '<div class="conteiner section_line_lr">';

      $TR_query= "post_type=treinersOur";
      query_posts($TR_query);

        if (have_posts()) : while (have_posts()) : the_post();
            $img= get_the_post_thumbnail( $post->ID, 'thumbnail' );
            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "thumbnail" );
            $valKredo = get_field( "credo" );
            $valPhone = get_field( "phone" );
            $valSvk = get_field( "svk" );
            $valNapr = get_field( "napravl" );
            $valPubl = get_field( "public" );
            if ($valPubl == 'Да'){
              $treinersOurTextblock .='
                    <div class="block_float_l p100">
                      <div class="card">
                        <div class="p25 image">';
                        if ( $thumbnail_src[0]) {
                           $treinersOurTextblock .='<img src="'. $thumbnail_src[0] .'" alt="">';
                         }
                $treinersOurTextblock .=' </div>
            						<div class="offset25 p75 text card_line_lr card_line_tb">
            							<h4>' .get_the_title() .'</h4>';
                if ($valKredo){
                  $treinersOurTextblock.= '<p class="kredo">' . $valKredo .'</p>';
                };
  							$treinersOurTextblock.= '<p class="phone"> ' . $valPhone .'';

                if ($valSvk){
                  $treinersOurTextblock.= '<a href="' . $valSvk .'" class="vk">Страница Вконтакте</a>';
                };

                $treinersOurTextblock.= '</p><p class="description">' . get_the_content() .'</p>';

                if ($valNapr){
                  $treinersOurTextblock.= '<p class="direction">Направления:  ' . $valNapr .'</p>';
                };
                $treinersOurTextblock.= '</div></div></div>';
            }


        endwhile; endif; wp_reset_query();
        $treinersOurTextblock.= '</div>';

        return $treinersOurTextblock;

}


/**add the shortcode for the slider- for use in editor**/

function TR_insert_slider($atts, $content=null){

$treinersOurTextblock= TR_get_slider();

return $treinersOurTextblock;

}

add_shortcode('TR_slider', 'TR_insert_slider');

/**add template tag- for use in themes**/

function TR_slider(){

    print TR_get_slider();
}

define('TI_NAME', "Тренеры");
define('TI_SINGLE', "Тренеры");
define('TI_TYPE', "treinersOur");


function TR_register() {
    $args = array(
        'label' => __(TI_NAME),
        'singular_label' => __(TI_SINGLE),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'editor', 'thumbnail')
       );

    register_post_type(TI_TYPE , $args );
}

add_action('init', 'TR_register');
?>
