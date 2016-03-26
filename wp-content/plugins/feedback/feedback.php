<?php

/*
Plugin Name: feedback
Plugin URI:
Description: A simple plugin for list of treiners
Author: Meline
Version: 1.0
Author URI: Your URL
*/

define('FB_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('FB_NAME', "feedbackText");
define ("FB_VERSION", "1.0");

function FB_get_slider(){
    $feedbackTextblock= '<div class="conteiner section_line_lr">';

      $FB_query= "post_type=feedback";
      query_posts($FB_query);

        if (have_posts()) : while (have_posts()) : the_post();
            $img= get_the_post_thumbnail( $post->ID, 'large' );
            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "large" );
            $feedbackTextblock .='
                  <div class="block_float_l p100">
                    <div class="card">
                      <div class="p25 image">
                        <img src="'. $thumbnail_src[0] .'" alt="">
                      </div>
          						<div class="offset25 p75 text card_line_lr card_line_tb">
          							<h4>' .get_the_title() .'</h4>
                        <p class="msg">' .get_the_content() .'</p></div></div></div>';

        endwhile; endif; wp_reset_query();
        $feedbackTextblock.= '</div>';

        return $feedbackTextblock;

}


/**add the shortcode for the slider- for use in editor**/

function FB_insert_slider($atts, $content=null){

$feedbackTextblock= FB_get_slider();

return $feedbackTextblock;

}

add_shortcode('FB_slider', 'FB_insert_slider');

/**add template tag- for use in themes**/

function FB_slider(){

    print FB_get_slider();
}

?>


<?php
define('FI_NAME', "Отзывы");
define('FI_SINGLE', "Отзывы");
define('FI_TYPE', "feedback");


function FB_register() {
    $args = array(
        'label' => __(FI_NAME),
        'singular_label' => __(FI_SINGLE),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'editor', 'thumbnail')
       );

    register_post_type(FI_TYPE , $args );
}

add_action('init', 'FB_register');
?>
