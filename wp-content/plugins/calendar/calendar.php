<?php

/*
Plugin Name: calendar
Plugin URI:
Description: A simple plugin for calendar
Author: Meline
Version: 1.0
Author URI: Your URL
*/

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

function calendarbox() {
    add_meta_box(
        'calendarbox', // Идентификатор(id)
        'Добавить занятие', // Заголовок области с мета-полями(title)
        'show_calendarbox', // Вызов(callback)
        'calendar', // Где будет отображаться наше поле, в нашем случае в Записях
        'normal',
        'high');
}
add_action('add_meta_boxes', 'calendarbox'); // Запускаем функцию

$meta_fieldsCL = array(
    array(
        'label' => 'Время',
        'id'    => 'CLtime',
        'type'  => 'select'
    ),
    array(
        'label' => 'Описание',
        'id'    => 'CLdesc',  // даем идентификатор.
        'type'  => 'textarea'  // Указываем тип поля.
    ),
    array(
        'label' => 'Тренер',
        'id'    => 'CLtime',
        'type'  => 'selectTr'
    ),
    array(
        'label' => 'Добавить',
        'id'    => 'CLbutton',  // даем идентификатор.
        'type'  => 'button'  // Указываем тип поля.
    ),
);

function show_calendarbox() {
global $meta_fieldsCL; // Обозначим наш массив с полями глобальным
global $post;  // Глобальный $post для получения id создаваемого/редактируемого поста
// Выводим скрытый input, для верификации. Безопасность прежде всего!

echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

    // Начинаем выводить таблицу с полями через цикл
    echo '<table class="form-table photoTable" id="photoTable">';
    foreach ($meta_fieldsCL as $field) {
        // Получаем значение если оно есть для этого поля
        $meta = get_post_meta($post->ID, $field['id'], true);
        // Начинаем выводить таблицу
                switch($field['type']) {
                    case 'text':
        echo  '<tr>
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td><div>
            <img data-src="' . $default . '" src="' . $src . '" width="115px" height="90px" class="imgUploadSrc" />
            <div>
              <input type="hidden" name="' . $field['id'] . '" class="' . $field['id'] . '" value="" />
              <button type="submit" class="upload_image_button button">Загрузить</button>
              <button type="submit" class="remove_image_button button">&times;</button>
            </div>
          </div></td></tr>';
break;
case 'textarea':
    echo '<tr>
            <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
            <td><input name="'.$field['id'].'" id="'.$field['id'].'" value="" style="width: 100%"/>
        <br /><span class="description">'.$field['desc'].'</span></td></tr>';
break;
case 'select':
    echo '<tr>
            <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
            <td><select name="'.$field['id'].'" id="'.$field['id'].'"> '. $field['label'] .'
              <option value="">Select something…</option>
                  <option value="something">Something</option>
                  <option value="else">Else</option>
              </select>
            </td></tr>';
break;
case 'selectTr':
    echo '<tr>
            <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
            <td><select name="'.$field['id'].'" id="'.$field['id'].'"> '. $field['label'] .'
              <option value="">Select something…</option>
                  <option value="something">Something</option>
                  <option value="else">Else</option>
              </select>
            </td></tr></table>';
break;
case 'button':
    echo '<a href="javascript:;" class="'.$field['id'].' acf-button" data-editor="content" >+ Добавить</a>';
break;
        }
    }
    echo '';
}


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
