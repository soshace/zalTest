<?php

/*
Plugin Name: aboutUs
Plugin URI:
Description: A simple plugin for text about a company
Author: Meline
Version: 1.0
Author URI: Your URL
*/

define('AU_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('AU_NAME', "aboutUsText");
define ("AU_VERSION", "1.0");

function AU_get_slider(){
    $aboutUsTextblock= '';

      $AU_query= "post_type=aboutUs";
      query_posts($AU_query);

        if (have_posts()) : while (have_posts()) : the_post();
            $aboutUsTextblock .='
                <h1>' .get_the_title() .'</h1>
                <div class="aboutUsT"><p>' . get_the_content() .'</p></div>
                <a class="link_button" href="/about">О центре</a>';

        endwhile; endif; wp_reset_query();
        $aboutUsTextblock.= '';

        return $aboutUsTextblock;

}


/**add the shortcode for the slider- for use in editor**/

function AU_insert_slider($atts, $content=null){

$aboutUsTextblock= AU_get_slider();

return $aboutUsTextblock;

}

add_shortcode('AU_slider', 'AU_insert_slider');

/**add template tag- for use in themes**/

function AU_slider(){

    print AU_get_slider();
}

define('MI_NAME', "О центре");
define('MI_SINGLE', "О центре");
define('MI_TYPE', "aboutUs");


function AU_register() {
    $args = array(
        'label' => __(MI_NAME),
        'singular_label' => __(MI_SINGLE),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'editor', 'thumbnail')
       );

    register_post_type(MI_TYPE , $args );
}

add_action('init', 'AU_register');
?>
