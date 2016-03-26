<?php
if (!current_user_can('administrator')):
  show_admin_bar(false);
endif;
show_admin_bar(false);

if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}





function TexunaDev_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'aboutCompany', 'TexunaDev' ),
        'id'            => 'aboutCompanys',
		'description'   => __( 'Main sidebar that appears on the left.', 'TexunaDev' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

    register_sidebar( array(
        'name'          => __( 'EveryProjectIt', 'TexunaDev' ),
        'id'            => 'EveryProjectIt',
        'description'   => __( 'Main sidebar that appears on the left.', 'TexunaDev' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
}
add_action( 'widgets_init', 'TexunaDev_widgets_init' );



if ( function_exists( 'add_theme_support' ) ){
    add_theme_support( 'post-thumbnails' );

}
