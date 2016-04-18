<?php

/*
Plugin Name: photoMelLider
Plugin URI:
Description: A simple plugin for text about a company
Author: Meline
Version: 1.0
Author URI: Your URL
*/

define('PH_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('PH_NAME', "photoAlbText");
define ("PH_VERSION", "1.0");

function photobox() {
    add_meta_box(
        'photobox', // Идентификатор(id)
        'Добавить фото', // Заголовок области с мета-полями(title)
        'show_my_metabox', // Вызов(callback)
        'photo', // Где будет отображаться наше поле, в нашем случае в Записях
        'normal',
        'high');
}
add_action('add_meta_boxes', 'photobox'); // Запускаем функцию

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
    ),
);

  function true_include_myuploadscript() {
  	if ( ! did_action( 'wp_enqueue_media' ) ) {
  		wp_enqueue_media();
  	}
   	wp_enqueue_script( 'myuploadscript', '/wp-content/plugins/photo/uploadImg.js', array('jquery'), null, false );
  }

  add_action( 'admin_enqueue_scripts', 'true_include_myuploadscript' );

// Вызов метаполей
function show_my_metabox() {
global $meta_fields; // Обозначим наш массив с полями глобальным
global $post;  // Глобальный $post для получения id создаваемого/редактируемого поста
// Выводим скрытый input, для верификации. Безопасность прежде всего!

echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

    // Начинаем выводить таблицу с полями через цикл
    echo '<table class="form-table photoTable" id="photoTable">';
    foreach ($meta_fields as $field) {
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
        <br /><span class="description">'.$field['desc'].'</span></td></tr></table>';
break;
case 'button':
    echo '<a href="javascript:;" class="'.$field['id'].' acf-button" data-editor="content" >+ Добавить фото</a>
    <script>
    jQuery(function($){
    var fieldsKey, d;
    $(document).on("click", ".mybutton", function(){
      d = new Date();
      fieldsKey = d.getUTCFullYear() + "-" +
        ("00" + (d.getUTCMonth()+1)).slice(-2) + "-" +
        ("00" + d.getUTCDate()).slice(-2) + " " +
        ("00" + d.getUTCHours()).slice(-2) + ":" +
        ("00" + d.getUTCMinutes()).slice(-2) + ":" +
        ("00" + d.getUTCSeconds()).slice(-2);
      var postIDk = '. $post->ID .';
      var metakeyFile = $(".myfileinp").val();
      var metakeyFileSrc = $(".imgUploadSrc").attr("src");
      var metakeyText = $("#mytextarea").val();


      $.ajax({
        url: ajaxurl,
        data:
          {
            "action": "load_custom_field_data",
            "postIDk": postIDk,
            "metakeyFile": metakeyFile,
            "metakeyFileSrc": metakeyFileSrc,
            "metakeyText": metakeyText,
            "fieldsKey": fieldsKey
          },
        type: "post",
          success: function(data){

            location.reload();
          }
        });
        });

        var attachmItem, attachmDesc;

        $(document).on("click", ".changePhoto", function(){
          attachmItem = $(this).closest(".attachmItem");
          var attachmImg = attachmItem.find("img");
          attachmImg = attachmImg.attr("src");
          attachmDesc = attachmItem.find("p.descAttach");
          attachmDesc = attachmDesc.text();
          attachmItem = attachmItem.attr("id");

          $("#mytextarea").attr("value", attachmDesc );
          $(".imgUploadSrc").attr("src", attachmImg );
          $(".mybutton").addClass("saveChangBtn");
          $(".saveChangBtn").removeClass("mybutton");
          $(".saveChangBtn").text("Сохранить изменения");
          $(".upload_image_button").css("display", "none");
          $(".remove_image_button").css("display", "none");
        });

        $(document).on("click", ".saveChangBtn", function(){
          var postIDk = '. $post->ID .';
          var metakeyFile = $(".myfileinp").val();
          var metakeyFileSrc = $(".imgUploadSrc").attr("src");
          var metakeyText = $("#mytextarea").val();
          d = new Date();
          fieldsKey = d.getUTCFullYear() + "-" +
            ("00" + (d.getUTCMonth()+1)).slice(-2) + "-" +
            ("00" + d.getUTCDate()).slice(-2) + " " +
            ("00" + d.getUTCHours()).slice(-2) + ":" +
            ("00" + d.getUTCMinutes()).slice(-2) + ":" +
            ("00" + d.getUTCSeconds()).slice(-2);
          $.ajax({
            url: ajaxurl,
            data:
              {
                "action": "updateFieldsPhoto",
                "postIDk": postIDk,
                "postIDOld": attachmItem,
                "metakeyFile": metakeyFile,
                "metakeyFileSrc": metakeyFileSrc,
                "metakeyText": metakeyText,
                "metakeyTextOld": attachmDesc,
                "fieldsKey": fieldsKey
              },
            type: "post",
              success: function(data){
                location.reload();
              }
            });
        });




    })
    </script>';
    echo '<div class="attachmDiv">';
    global $wpdb;
    $attachments = get_attached_media( 'image', $post->ID ); if ( $attachments ) {
            foreach ( $attachments as $attachment ) {
                $attachmentID = $attachment->ID;
                // $attachmentDate = $attachment->post_date;
                $sel = $wpdb->get_row("SELECT post_content FROM wp_posts WHERE post_title = $attachment->ID AND post_parent = $post->ID ");
                $thumbimg = wp_get_attachment_link( $attachment->ID, 'thumbnail', true );
                echo '<div class="attachmItem" id="'. $attachment->ID .'"><div class="l40">' . $thumbimg . '</div>';
                if ($sel->post_content == ''){
                  echo '<div class="l60"><p class="descAttach">У данного фото нет описания</p>';
                } else{
                  echo '<div class="l60"><p class="descAttach">'. $sel->post_content .'</p>';
                }
                echo '<a href="javascript:;" class="changePhoto acf-button" data-editor="content" >Изменить запись</a>
                <a href="javascript:;" class="delListPhoto button" data-editor="content" >× Удалить</a></div></div>';
            }

        }
    echo '</div>';
break;
        }
    }
    echo '';
}

add_action('wp_ajax_load_custom_field_data','load_custom_field_data');
add_action('wp_ajax_nopriv_load_custom_field_data','load_custom_field_data');

add_action('wp_ajax_updateFieldsPhoto','updateFieldsPhoto');
add_action('wp_ajax_nopriv_updateFieldsPhoto','updateFieldsPhoto');

add_action('wp_ajax_deleteFieldsPhoto','deleteFieldsPhoto');
add_action('wp_ajax_nopriv_deleteFieldsPhoto','deleteFieldsPhoto');

function load_custom_field_data(){
  global $wpdb;
  $metakeyText= $_POST['metakeyText'];

  if($metakeyText != ''){
    $postIDk= $_POST['postIDk'];
    $fieldsKey= $_POST['fieldsKey'];
    $metakeyFile=$_POST['metakeyFile'];
    $metakeyFileSrc=$_POST['metakeyFileSrc'];
    $wpdb->insert( $wpdb->posts, array('post_author' => '1', 'post_date' => $fieldsKey, 'post_content' => $metakeyText, 'post_title' => $metakeyFile, 'post_status' => 'inherit', 'post_parent' => $postIDk, 'post_type' => 'attachmentText'), array('%d', '%s', '%s', '%s', '%d', '%s'));
  }
  die();
};

function updateFieldsPhoto(){
  global $wpdb;
  $metakeyFile=$_POST['metakeyFile'];
  $metakeyFileSrc=$_POST['metakeyFileSrc'];
  $metakeyText= $_POST['metakeyText'];
  $postIDk= $_POST['postIDk'];
  $postIDOld= $_POST['postIDOld'];
  $metakeyTextOld= $_POST['metakeyTextOld'];
  $fieldsKey= $_POST['fieldsKey'];

  echo $metakeyText;

  if ($metakeyTextOld == 'У данного фото нет описания'){
    $wpdb->insert( $wpdb->posts, array('post_author' => '1', 'post_date' => $fieldsKey, 'post_content' => $metakeyText, 'post_title' => $postIDOld, 'post_status' => 'inherit', 'post_parent' => $postIDk, 'post_type' => 'attachmentText'), array('%d', '%s', '%s', '%s', '%d', '%s'));
  }else{
    $wpdb->update($wpdb->posts, array("post_content" => $metakeyText), array("post_content" => $metakeyTextOld), array("%s"), array("%s") );
  }
  die();
};

function deleteFieldsPhoto(){
  global $wpdb;
  $attachmentIDDel=$_POST['attachmentIDDel'];
  echo $attachmentIDDel;
  $wpdb->query("DELETE FROM wp_posts WHERE ID = $attachmentIDDel");
  $wpdb->query("DELETE FROM wp_posts WHERE post_title = $attachmentIDDel");
  die();
};


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

add_action('init', 'PH_register');
?>
