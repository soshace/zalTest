<?php

/*
Plugin Name: photo
Plugin URI:
Description: A simple plugin for text about a company
Author: Meline
Version: 1.0
Author URI: Your URL
*/

define('PH_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('PH_NAME', "photoAlbText");
define ("PH_VERSION", "1.0");

function PH_get_slider(){
    $photoAlbTextblock= '<section class="section_tb photo">';
    $PH_query= "post_type=photo";
    query_posts($PH_query);
    $col = 0;
    $upload_dir = wp_upload_dir();

    if (have_posts()) :

          while (have_posts()) : the_post();
            $col++;
            $valalbText = get_field( "albText" );
            $img= get_the_post_thumbnail( $post->ID, 'large' );
            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ));
            if ($col == 1){
              $photoAlbTextblock .='<div class="section_line_lr conteiner">';
            }

            $photoAlbTextblock .='
                <div class="block_float_l p50">
                  <div class="card_b">
                  <a href="' . get_the_permalink() . '" class="image_link"><div class="cover"></div><img src="'. $thumbnail_src[0] .'" alt=""></a>
                  <div class="card_line_lr card_line_tb">
                    <h4>' . get_the_title() . '</h4>
                    <p>' . $valalbText . '</p>
                  </div></div></div>';
            if ($col == 2){
              $photoAlbTextblock .='</div>';
              $col = 0;
            }
          endwhile;
        endif;
        $photoAlbTextblock.= '</section>';

        return $photoAlbTextblock;

}




/**add the shortcode for the slider- for use in editor**/

function PH_insert_slider($atts, $content=null){

$photoAlbTextblock= PH_get_slider();

return $photoAlbTextblock;

}

add_shortcode('PH_slider', 'PH_insert_slider');

/**add template tag- for use in themes**/

function PH_slider(){

    print PH_get_slider();
}

?>


<?php
define('PHi_NAME', "Фото");
define('PHi_SINGLE', "Фото");
define('PHi_TYPE', "photo");


function PH_register() {
    $args = array(
        'label' => __(PHi_NAME),
        'singular_label' => __(PHi_SINGLE),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'editor', 'thumbnail')
       );

    register_post_type(PHi_TYPE , $args );
}

// add_action( 'init', 'PH_create_taxonomies', 0 );

// function PH_create_taxonomies() {
//   register_taxonomy('PH_register-cat',array('photo'),array(

//        'hierarchical' => true,
//        'label' => 'Alboms',
//        'singular_name' => 'Alboms',
//        'show_ui' => true,
//        'query_var' => true,
//        'rewrite' => array('slug' => 'cats-cat' )
//    ));
// }

add_action('init', 'PH_register');
?>
