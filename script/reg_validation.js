$(function () {
  var $registerForm = $("#form");

  if ($registerForm.length) {
    $registerForm.validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        repeatpassword: {
          required: true,
          equalTo: "#password",
        },
        lastname: {
          required: true,
        },
      },
      messages: {
        email: {
          email: "Please enter a valid e-email",
        },
        repeatpassword: {
          equalTo: "Passwords fields must be equal",
        },
        lastname: {
          required: "These fields are required.",
        },
      },
    });
  }
});
/*

  
  */
