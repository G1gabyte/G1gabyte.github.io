function validateLoginForm(){
  validate = true;
  var form_fields = $('#user_login input')
  $.each(form_fields, function() {
    if($(this).val() == "" ) {
      $('#'+ this.id + '_error').text("Please enter "+ this.id.split('_')[1]);
      validate = false;
    } else {
      $('#'+ this.id + '_error').text("");
    }
  })
  var admin_email = $('#user_email').val()
  var regex_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
  if(regex_email.test(admin_email)){
    $('#user_email_error').text('')
  } else {
    $('#user_email_error').text('Please enter valid email')
    validate = false;
  }
  return validate;
};


function doublepassCheck() {
  var pass1 = $('#user_password').val();
  var pass2 = $('#user_password2').val();

  if (pass1 != pass2) {
    $('#password_error').text('Passwords must match.');
    document.getElementById('register-button').disabled = true;
  } else {
    $('#password_error').text('');
    document.getElementById('register-button').disabled = false;
  }
}

// function validateRegisterForm(){
//   validate = true;
//   var form_fields = $('#user_login input')
//   $.each(form_fields, function() {
//     if($(this).val() == "" ) {
//       $('#'+ this.id + '_error').text("Please enter "+ this.id.split('_')[1]);
//       validate = false;
//     } else {
//       $('#'+ this.id + '_error').text("");
//     }
//   })
//   var admin_email = $('#user_email').val()
//   var regex_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
//   if(regex_email.test(admin_email)){
//     $('#user_email_error').text('')
//   } else {
//     $('#user_email_error').text('Please enter valid email')
//     validate = false;
//   }
//   return validate;
// };