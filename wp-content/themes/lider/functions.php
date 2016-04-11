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

function Phn_register() {
    $args = array(
        'label' => __(Phn_NAME),
        'singular_label' => __(Phn_SINGLE),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'editor', 'thumbnail')
       );

    register_post_type(Phn_TYPE , $args );
}

add_action('init', 'Phn_register');

define('CLI_NAME', "Расписание");
define('CLI_SINGLE', "Расписание");
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

function my_meta_box() {
    add_meta_box(
        'my_meta_box', // Идентификатор(id)
        'My Meta Box', // Заголовок области с мета-полями(title)
        'show_my_metabox', // Вызов(callback)
        'photo', // Где будет отображаться наше поле, в нашем случае в Записях
        'normal',
        'high');
}
add_action('add_meta_boxes', 'my_meta_box'); // Запускаем функцию

$meta_fields = array(
    array(
        'label' => 'Фото',
        'desc'  => 'Загрузите фото',
        'id'    => 'myfileinp', // даем идентификатор.
        'type'  => 'text'  // Указываем тип поля.
    ),
    array(
        'label' => 'Описание фото',
        'desc'  => 'Добавьте описание',
        'id'    => 'mytextarea',  // даем идентификатор.
        'type'  => 'textarea'  // Указываем тип поля.
    ),
    array(
        'label' => 'Добавить еще фото',
        'id'    => 'mybutton',  // даем идентификатор.
        'type'  => 'button'  // Указываем тип поля.
    )
);

function true_include_myuploadscript() {
	// у вас в админке уже должен быть подключен jQuery, если нет - раскомментируйте следующую строку:
	// wp_enqueue_script('jquery');
	// дальше у нас идут скрипты и стили загрузчика изображений WordPress
	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
	// само собой - меняем admin.js на название своего файла
 	wp_enqueue_script( 'myuploadscript', get_stylesheet_directory_uri() . '/uploadImg.js', array('jquery'), null, false );
}

add_action( 'admin_enqueue_scripts', 'true_include_myuploadscript' );

// Вызов метаполей
function show_my_metabox() {
global $meta_fields; // Обозначим наш массив с полями глобальным
global $post;  // Глобальный $post для получения id создаваемого/редактируемого поста
// Выводим скрытый input, для верификации. Безопасность прежде всего!
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

    // Начинаем выводить таблицу с полями через цикл
    echo '<table class="form-table">';
    foreach ($meta_fields as $field) {
        // Получаем значение если оно есть для этого поля
        $meta = get_post_meta($post->ID, $field['id'], true);
        // Начинаем выводить таблицу
        echo '<tr>
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td>';
                switch($field['type']) {
                    case 'text':
    // echo '<input type="file" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
    //     <br /><span class="description">'.$field['desc'].'</span>';
        echo  '<div>
            <img data-src="' . $default . '" src="' . $src . '" width="115px" height="90px" />
            <div>
              <input type="hidden" name="' . $name . '" class="' . $name . '" value="' . $value . '" />
              <button type="submit" class="upload_image_button button">Загрузить</button>
              <button type="submit" class="remove_image_button button">&times;</button>
            </div>
          </div>';
break;
case 'textarea':
    echo '<textarea name="'.$field['id'].'" class="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>
        <br /><span class="description">'.$field['desc'].'</span>';
break;
case 'button':
    echo '<a href="javascript:;" class="'.$field['id'].' acf-button" data-editor="content" >+ Добавить фото</a>';
break;
        }
        echo '</td></tr>';
    }
    echo '</table>';
}

// if(isset($_POST['mybutton']))
// {
//     echo "hey";
// }


// Пишем функцию для сохранения
function save_my_meta_fields($post_id) {
    global $meta_fields;  // Массив с нашими полями

    // проверяем наш проверочный код
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
        return $post_id;
    // Проверяем авто-сохранение
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // Проверяем права доступа
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
    }

    // Если все отлично, прогоняем массив через foreach
    foreach ($meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true); // Получаем старые данные (если они есть), для сверки
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {  // Если данные новые
            update_post_meta($post_id, $field['id'], $new); // Обновляем данные
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old); // Если данных нету, удаляем мету.
        }
    } // end foreach
}
add_action('save_post', 'save_my_meta_fields'); // Запускаем функцию сохранения
