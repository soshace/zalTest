<?php
if (!current_user_can('administrator')):
  show_admin_bar(false);
endif;
show_admin_bar(false);

if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

register_nav_menus(array(
	'header'    => 'Верхнее меню'
));

function page_excerpt() {
    add_post_type_support('news', array('excerpt'));
    add_post_type_support( 'page', array('excerpt'));
}
add_action('init', 'page_excerpt');

define('CLI_NAME', "Календарь");
define('CLI_SINGLE', "Календарь");
define('CLI_TYPE', "calendar");


function CL_register() {
    $args = array(
        'label' => __(CLI_NAME),
        'singular_label' => __(CLI_SINGLE),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'editor', 'thumbnail')
       );

    register_post_type(CLI_TYPE , $args );
}

add_action('init', 'CL_register');

$post = $wp_query->post;

 if (in_category('photo/*/')) {
     include(TEMPLATEPATH.'/single-photo.php');
 }

 if (in_category('news/*/')) {
     include(TEMPLATEPATH.'/single-news.php');
 }

function wpbeginner_numeric_posts_nav() {

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

    echo '<section class="pagination section_tb">
			<div class="section_line_lr conteiner">
				<ul>' . "\n";

    if ( get_previous_posts_link() )
        printf( '<li class="prev">%s</li>' . "\n", get_previous_posts_link('') );

    if ( get_next_posts_link() )
        printf( '<li class="next">%s</li>' . "\n", get_next_posts_link('') );
    echo '</ul></div></section>' . "\n";
}


if ( function_exists( 'add_theme_support' ) ){
    add_theme_support( 'post-thumbnails' );

}
