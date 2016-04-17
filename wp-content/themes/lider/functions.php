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

define('Phn_NAME', "Телефоны");
define('Phn_SINGLE', "Телефоны");
define('Phn_TYPE', "phones");

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

function edit_admin_menus() {
    global $menu;
    $menu[5][0] = 'Статьи';
}
add_action( 'admin_menu', 'edit_admin_menus' );
add_filter('custom_menu_order', '__return_true'); // Применить custom_menu_order

function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;

    return array(
        'index.php', // Консоль
        'themes.php', // Внешний вид
        'upload.php', // Медиафайлы
        'edit.php?post_type=page', // Страницы
        'edit.php?post_type=phones', // Телефоны
        'edit.php?post_type=aboutus', // aboutUs
        'edit.php?post_type=news', // Новости
        'edit.php?post_type=calendar', // календарь
        'edit.php?post_type=photo', // фото
        'edit.php', // Статьи
        'edit.php?post_type=treinersour', // тренеры
        'edit.php?post_type=price', // прайс
        'edit.php?post_type=feedback', // отзывы
    );
}


add_filter('menu_order', 'custom_menu_order');
