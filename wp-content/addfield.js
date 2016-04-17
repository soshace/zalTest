$(document).on('click', '#acf_fields #add_field', function(){

  var fields = $(this).closest('.table_footer').siblings('.fields');


  // clone last tr
  var new_field = fields.children('.field_key-field_clone').clone();


  // update names
  new_field.update_names();


  // show
  new_field.show();


  // append to table
  fields.children('.field_key-field_clone').before(new_field);


  // remove no fields message
  if(fields.children('.no_fields_message').exists())
  {
    fields.children('.no_fields_message').hide();
  }


  // clear name
  new_field.find('tr.field_type select').trigger('change');
  new_field.find('.field_form input[type="text"]').val('');


  // focus after form has dropped down
  // - this prevents a strange rendering bug in Firefox
  setTimeout(function(){
        new_field.find('.field_form input[type="text"]').first().focus();
      }, 500);


  // open up form
  new_field.find('a.acf_edit_field').first().trigger('click');


  // update order numbers
  update_order_numbers();

  return false;


});
