<?php

/*
Plugin Name: calendarMelLider
Plugin URI:
Description: A simple plugin for calendar
Author: Meline
Version: 2.0
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
        'id'    => 'CLtrener',
        'type'  => 'selectTr'
    ),
    array(
        'label' => 'Добавить',
        'id'    => 'CLbuttonAdd',  // даем идентификатор.
        'type'  => 'button'  // Указываем тип поля.
    ),
);

function true_include_CLuploadscript() {
  if ( ! did_action( 'wp_enqueue_media' ) ) {
    wp_enqueue_media();
  }
  wp_enqueue_script( 'myuploadscriptCL', '/wp-content/plugins/calendar/uploadCL.js', array('jquery'), null, false );
}

add_action( 'admin_enqueue_scripts', 'true_include_CLuploadscript' );

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
              <input type="hidden" name="' . $field['id'] . '" class="' . $field['id'] . '"/>
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
              <option value="">Выберите время занятия</option>
                  <option value="6:00">6:00</option>
                  <option value="7:00">7:00</option>
                  <option value="8:00">8:00</option>
                  <option value="9:00">9:00</option>
                  <option value="10:00">10:00</option>
                  <option value="11:00">11:00</option>
                  <option value="12:00">12:00</option>
                  <option value="13:00">13:00</option>
                  <option value="14:00">14:00</option>
                  <option value="14:00">14:00</option>
                  <option value="15:00">15:00</option>
                  <option value="16:00">16:00</option>
                  <option value="17:00">17:00</option>
                  <option value="18:00">18:00</option>
                  <option value="19:00">19:00</option>
                  <option value="20:00">20:00</option>
                  <option value="21:00">21:00</option>
                  <option value="22:00">22:00</option>
                  <option value="23:00">23:00</option>
              </select>
            </td></tr>';
break;
case 'selectTr':
    echo '<tr>
            <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
            <td><select name="'.$field['id'].'" id="'.$field['id'].'"> '. $field['label'] .'
              <option value="">Выберите тренера</option>';
                  global $wpdb;
                  $selTR = $wpdb->get_results("SELECT post_title, ID FROM wp_posts WHERE post_type = 'treinersour'");
                  for ($itr = 0; $itr < count($selTR); $itr++) {
                      echo '<option value="'. $selTR[$itr]->ID .'">'. $selTR[$itr]->post_title .'</option>';
                  }

    echo '</select></td></tr></table>';


break;
case 'button':
    echo '<a href="javascript:;" class="'.$field['id'].' acf-button" data-editor="content" >+ Добавить</a>
    <script>
    jQuery(function($){
    $(document).on("click", ".CLbuttonAdd", function(){
      if($("#calendarbox input").val() != ""){
        var time = $("#calendarbox #CLtime").val();
        var desc = $("#calendarbox #CLdesc").val();
        var trenerID = $("#calendarbox #CLtrener").val();
        var itemday = '. $post->ID .';

        $.ajax({
          url: ajaxurl,
          data:
            {
              "action": "addCLinsert",
              "timeCL": time,
              "descCL": desc,
              "trenerIDCL": trenerID,
              "itemday": itemday
            },
          type: "post",
            success: function(data){
              location.reload();
            }
          });
      }
    });
    })
    </script>';
break;
        }
    }
    echo '<div class="calendarDiv">';
          $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '6:00' AND itemday= $post->ID");
          if(count($selLineCL)>0){
            echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">6:00</td></tr>';
            for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
              $idTR = $selLineCL[$iCLline]->item_treiner;
              $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
              $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
              echo '<tr>
              <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
              <td>'. $selLineCL[$iCLline]->item_content .'</td>
              <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
            }
            echo '</table>';
          }
          $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '7:00' AND itemday= $post->ID");
          if(count($selLineCL)>0){
            echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">7:00</td></tr>';
            for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
              $idTR = $selLineCL[$iCLline]->item_treiner;
              $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
              $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
              echo '<tr>
              <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
              <td>'. $selLineCL[$iCLline]->item_content .'</td>
              <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
            }
            echo '</table>';
          }
          $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '8:00' AND itemday= $post->ID");
          if(count($selLineCL)>0){
            echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">8:00</td></tr>';
            for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
              $idTR = $selLineCL[$iCLline]->item_treiner;
              $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
              $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
              echo '<tr>
              <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
              <td>'. $selLineCL[$iCLline]->item_content .'</td>
              <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
            }
            echo '</table>';
          }
          $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '9:00' AND itemday= $post->ID");
          if(count($selLineCL)>0){
            echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">9:00</td></tr>';
            for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
              $idTR = $selLineCL[$iCLline]->item_treiner;
              $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
              $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
              echo '<tr>
              <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
              <td>'. $selLineCL[$iCLline]->item_content .'</td>
              <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
            }
            echo '</table>';
          }
          $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '10:00' AND itemday= $post->ID");
          if(count($selLineCL)>0){
            echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">10:00</td></tr>';
            for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
              $idTR = $selLineCL[$iCLline]->item_treiner;
              $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
              $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
              echo '<tr>
              <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
              <td>'. $selLineCL[$iCLline]->item_content .'</td>
              <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
            }
            echo '</table>';
          }
          $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '11:00' AND itemday= $post->ID");
          if(count($selLineCL)>0){
            echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">11:00</td></tr>';
            for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
              $idTR = $selLineCL[$iCLline]->item_treiner;
              $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
              $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
              echo '<tr>
              <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
              <td>'. $selLineCL[$iCLline]->item_content .'</td>
              <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
            }
            echo '</table>';
          }
          $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '12:00' AND itemday= $post->ID");
          if(count($selLineCL)>0){
            echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">11:00</td></tr>';
            for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
              $idTR = $selLineCL[$iCLline]->item_treiner;
              $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
              $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
              echo '<tr>
              <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
              <td>'. $selLineCL[$iCLline]->item_content .'</td>
              <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
            }
            echo '</table>';
          }
          $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '13:00' AND itemday= $post->ID");
          if(count($selLineCL)>0){
            echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">13:00</td></tr>';
            for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
              $idTR = $selLineCL[$iCLline]->item_treiner;
              $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
              $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
              echo '<tr>
              <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
              <td>'. $selLineCL[$iCLline]->item_content .'</td>
              <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
            }
            echo '</table>';
          }
          $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '14:00' AND itemday= $post->ID");
          if(count($selLineCL)>0){
            echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">14:00</td></tr>';
            for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
              $idTR = $selLineCL[$iCLline]->item_treiner;
              $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
              $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
              echo '<tr>
              <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
              <td>'. $selLineCL[$iCLline]->item_content .'</td>
              <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
            }
            echo '</table>';
          }
          $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '15:00' AND itemday= $post->ID");
          if(count($selLineCL)>0){
            echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">15:00</td></tr>';
            for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
              $idTR = $selLineCL[$iCLline]->item_treiner;
              $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
              $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
              echo '<tr>
              <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
              <td>'. $selLineCL[$iCLline]->item_content .'</td>
              <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
            }
            echo '</table>';
          }
          $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '16:00' AND itemday= $post->ID");
          if(count($selLineCL)>0){
            echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">16:00</td></tr>';
            for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
              $idTR = $selLineCL[$iCLline]->item_treiner;
              $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
              $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
              echo '<tr>
              <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
              <td>'. $selLineCL[$iCLline]->item_content .'</td>
              <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
            }
            echo '</table>';
          }
          $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '17:00' AND itemday= $post->ID");
          if(count($selLineCL)>0){
            echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">17:00</td></tr>';
            for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
              $idTR = $selLineCL[$iCLline]->item_treiner;
              $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
              $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
              echo '<tr>
              <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
              <td>'. $selLineCL[$iCLline]->item_content .'</td>
              <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
            }
            echo '</table>';
          }
          $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '18:00' AND itemday= $post->ID");
          if(count($selLineCL)>0){
            echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">18:00</td></tr>';
            for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
              $idTR = $selLineCL[$iCLline]->item_treiner;
              $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
              $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
              echo '<tr>
              <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
              <td>'. $selLineCL[$iCLline]->item_content .'</td>
              <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
            }
            echo '</table>';
          }
          $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '19:00' AND itemday= $post->ID");
          if(count($selLineCL)>0){
            echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">19:00</td></tr>';
            for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
              $idTR = $selLineCL[$iCLline]->item_treiner;
              $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
              $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
              echo '<tr>
              <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
              <td>'. $selLineCL[$iCLline]->item_content .'</td>
              <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
            }
            echo '</table>';
          }
          $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '20:00' AND itemday= $post->ID");
          if(count($selLineCL)>0){
            echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">20:00</td></tr>';
            for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
              $idTR = $selLineCL[$iCLline]->item_treiner;
              $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
              $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
              echo '<tr>
              <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
              <td>'. $selLineCL[$iCLline]->item_content .'</td>
              <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
            }
            echo '</table>';
          }
          $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '21:00' AND itemday= $post->ID");
          if(count($selLineCL)>0){
            echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">21:00</td></tr>';
            for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
              $idTR = $selLineCL[$iCLline]->item_treiner;
              $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
              $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
              echo '<tr>
              <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
              <td>'. $selLineCL[$iCLline]->item_content .'</td>
              <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
            }
            echo '</table>';
          }
            $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '22:00' AND itemday= $post->ID");
            if(count($selLineCL)>0){
              echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">22:00</td></tr>';
              for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
                $idTR = $selLineCL[$iCLline]->item_treiner;
                $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
                $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
                echo '<tr>
                <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
                <td>'. $selLineCL[$iCLline]->item_content .'</td>
                <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
              }
              echo '</table>';
            }
              $selLineCL = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '23:00' AND itemday= $post->ID");
              if(count($selLineCL)>0){
                echo '<table class="tableCL"><tr><td colspan="3" class="tableTime">23:00</td></tr>';
                for ($iCLline = 0; $iCLline < count($selLineCL); $iCLline++) {
                  $idTR = $selLineCL[$iCLline]->item_treiner;
                  $selLineCLTR = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idTR");
                  $selLineCLcolor = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $idTR AND meta_key = 'color'");
                  echo '<tr>
                  <td class="tdTrein"><span class="marker" style="background:'. $selLineCLcolor->meta_value .'"></span>'. $selLineCLTR->post_title .'</td>
                  <td>'. $selLineCL[$iCLline]->item_content .'</td>
                  <td><button type="button" class="removeCL button" validc="'. $selLineCL[$iCLline]->ID .'">&times;</button></td></tr>';
                }
            echo '</table>';
          }
    echo '</div>';
}

add_action( 'admin_enqueue_scripts', 'safely_add_stylesheet_to_admin' );

function safely_add_stylesheet_to_admin( $page ) {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'prefix-style', $plugin_url .'styleCL.css' );
}

add_action('wp_ajax_addCLinsert','addCLinsert');
add_action('wp_ajax_nopriv_addCLinsert','addCLinsert');

function addCLinsert(){
  global $wpdb;
  $timeCL= $_POST['timeCL'];
  $descCL= $_POST['descCL'];
  $trenerIDCL= $_POST['trenerIDCL'];
  $itemday= $_POST['itemday'];

  $wpdb->query( $wpdb->prepare(
    "INSERT INTO wp_calendar (item_time, item_content, item_treiner, itemday) VALUES ( %s, %s, %d, %d )",
    array(
        $timeCL,
        $descCL,
        $trenerIDCL,
        $itemday
    )
  ));
  die();
};

add_action('wp_ajax_deleteCLline','deleteCLline');
add_action('wp_ajax_nopriv_deleteCLline','deleteCLline');

function deleteCLline(){
  global $wpdb;
  $idDelLine= $_POST['idDelLine'];
  $wpdb->delete( wp_calendar, array( 'ID' => $idDelLine ) );
  die();
};



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
