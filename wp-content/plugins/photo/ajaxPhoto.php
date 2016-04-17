<?php
case 'button':
    echo '<a href="javascript:;" class="'.$field['id'].' acf-button" data-editor="content" >+ Добавить фото</a>
    <script>
    jQuery(function($){
    $(document).on("click", ".mybutton", function(){
      var old_fieldPhoto = $("#photoTable");
      var d = new Date();
      var fieldsKey = d.getUTCFullYear() + '-' +
        ("00" + (date.getUTCMonth()+1)).slice(-2) + "-" +
        ("00" + date.getUTCDate()).slice(-2) + " " +
        ("00" + date.getUTCHours()).slice(-2) + ":" +
        ("00" + date.getUTCMinutes()).slice(-2) + ":" +
        ("00" + date.getUTCSeconds()).slice(-2);
      var new_fieldPhoto = old_fieldPhoto.clone().attr("id", "photoTable"+fieldsKey );
      new_fieldPhoto.appendTo("#photobox .inside");
      var arrayInputFields = new_fieldPhoto.find("input");
      var arrFieldName = [];

      $.each( arrayInputFields, function( key, value ) {
        var oldnameInp = $(this).attr("name");
        // console.log(oldnameInp);
        $(this).attr("name", oldnameInp+fieldsKey );
        $(this).attr("id", oldnameInp+fieldsKey );
        $(this).attr("value", "" );
        arrFieldName.push(oldnameInp+fieldsKey);
      });


      var postIDk = '. $post->ID .';

      $.ajax({
        url: ajaxurl,
        data:
          {
            "action": "load_custom_field_data",
            "postIDk": postIDk,
            "metakeyFile": arrFieldName[0],
            "metakeyText": arrFieldName[1],
            "fieldsKey": fieldsKey
          },
        type: "post",
          success: function(data){
            // alert(fieldsKey);
          }
        });
        });
    })
    </script>';
break;
        }
    }
    echo '';
}
