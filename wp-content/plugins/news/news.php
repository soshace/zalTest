<?php

/*
Plugin Name: NEWS
Plugin URI:
Description: NEWS
Author: Meline
Version: 1.0
Author URI: Your URL
*/

define('NEWS_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('NEWS_NAME', "newsText");
define ("NEWS_VERSION", "1.0");


function NEWS_insert_slider($atts, $content=null){

$newsTextblock= NEWS_get_slider();

return $newsTextblock;

}

add_shortcode('NEWS_slider', 'NEWS_insert_slider');

/**add template tag- for use in themes**/

function NEWS_slider(){

    print NEWS_get_slider();
}

define('NI_NAME', "Новости");
define('NI_SINGLE', "Новости");
define('NI_TYPE', "news");


function NEWS_register() {
    $args = array(
        'label' => __(NI_NAME),
        'singular_label' => __(NI_SINGLE),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'editor', 'thumbnail')
       );

    register_post_type(NI_TYPE , $args );
}

add_action('init', 'NEWS_register');
?>
