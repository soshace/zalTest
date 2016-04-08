<?php

/*
Plugin Name: photo2
Plugin URI:
Description: A simple plugin for text about a company
Author: Meline
Version: 1.0
Author URI: Your URL
*/

/** Install Folder */
define('WGL_FOLDER', '/' . dirname( plugin_basename(__FILE__)));

/** Path for front-end links */
define('WGL_URL', WP_PLUGIN_URL . WGL_FOLDER);

// Post type
define('WGL_POSTYPE', 'wgl');

add_action( 'init', 'wgl_create_post_type' );
add_action( 'admin_head', 'wgl_posttype_icon' );
add_action( 'save_post', 'wgl_save_postdata', 1, 2 );

// ===================
// ** Setup the style and script
// ===================
add_action( 'init', 'wp_add_gallery_style' );
add_action( 'init', 'wp_add_gallery_script' );


function wp_add_gallery_style(){
	wp_register_style('wpgallery.css', WGL_URL . '/wpgallery.css');
	wp_enqueue_style('wpgallery.css');
	wp_register_style('jquery.lightbox-0.5.css', WGL_URL . '/js/jquery.lightbox-0.5.css');
	wp_enqueue_style('jquery.lightbox-0.5.css');
}

function wp_add_gallery_script(){
	wp_register_script( 'jquery', WGL_URL . '/js/jquery-1.4.4.min.js');
    wp_enqueue_script( 'jquery' );
    wp_register_script( 'jquerylightbox', WGL_URL . '/js/jquery.lightbox-0.5.js');
    wp_enqueue_script( 'jquerylightbox' );
}

// =======================
// ** Create the post type
// =======================
function wgl_create_post_type() {
	// Define the labels
	$labels = array(
		'name' => _x('WPGalleryList', 'post type general name'),
		'add_new' => _x('Add New View', 'new view')
	);

	// Register the post type
	register_post_type(WGL_POSTYPE, array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'query_var' => true,
		'menu_icon' => WGL_URL .'/images/gallery_ico.png',
		'register_meta_box_cb' => 'wgl_add_url_box',
		'supports' => array(
				'title',
				'editor')
	));
}

// ===========================
// ** Create the icon in admin
// ===========================
function wgl_posttype_icon() {
	global $post_type;
	$qry_postype = ( isset($_GET['post_type']) ) ? $_GET['post_type'] : '' ;

	if (($qry_postype == WGL_POSTYPE) || ($post_type == WGL_POSTYPE)) {
	    $icon_url = WGL_URL . '/images/gallery_ico.png';
    ?>
	    <style type="text/css" media="all">
	    /*<![CDATA[*/
	    .icon32 { background: url(<?php echo $icon_url; ?>) no-repeat 1px !important;}
	    /*]]>*/
		</style>
	<?php
	}
}

// ===================================
// ** Create box arrays for image urls
// ===================================
$wgl_box_images = array (
	'Url for small image' => array (
		array( 'wgl_small_img_url', 'Location of the small image:', 'text')
	),
	'Url for large image' => array (
		array( 'wgl_large_img_url', 'Location of the large image:', 'text')
	)
);

// ===================================
// ** Add boxes for image's urls
// ===================================
function wgl_add_url_box() {
	global $wgl_box_images, $post;
	if ( function_exists( 'add_meta_box' ) ) {
		$val = explode(";", get_post_meta($post->ID, 'wgl_img_url', true));
		foreach ( array_keys( $wgl_box_images ) as $key=>$wgl_box_image ) {
			add_meta_box( $wgl_box_image, __( $wgl_box_image), 'wgl_post_url_box', WGL_POSTYPE, 'normal', 'high', $val[$key] );
		}
	}
}

function wgl_post_url_box ( $obj, $box) {
	global $wgl_box_images, $post;
	// Generate box contents
	foreach ( $wgl_box_images[$box['id']] as $wgl_box ) {
		echo '<br /><label for="'.$wgl_box["0"].'">'.$wgl_box["1"].'</label><br />'
		. '<input style="width: 95%;" type="text" name="'.$wgl_box["0"].'" value="'.$box['args'].'"/>';
	}
}

// ===============================
// ** Save data when post is saved
// ===============================
function wgl_save_postdata($post_id, $post) {
	global $wgl_box_images;

	if ( 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post->ID ))
			return $post->ID;
	} else {
		if ( ! current_user_can( 'edit_post', $post->ID ))
			return $post->ID;
	}

	foreach ( $wgl_box_images as $wgl_box_image ) {
		foreach ( $wgl_box_image as $wgl_fields ) {
			$wgl_data[$wgl_fields[0]] =  $_POST[$wgl_fields[0]];
		}
	}

	if ( 'revision' == $post->post_type  ) {
		// don't store custom data twice
		return;
	}

	if ( get_post_meta($post->ID, $key, FALSE) ) {
		// Field has a value.
		update_post_meta($post->ID, 'wgl_img_url', $wgl_data['wgl_small_img_url'].';'.$wgl_data['wgl_large_img_url']);
	} else {
		// Field does not have a value.
		add_post_meta($post->ID, 'wgl_img_url', $wgl_data['wgl_small_img_url'].';'.$wgl_data['wgl_large_img_url']);
	}

	if (!$wgl_data['wgl_small_img_url'] && !$wgl_data['wgl_large_img_url']) {
		delete_post_meta($post->ID, 'wgl_img_url');
	}
}
