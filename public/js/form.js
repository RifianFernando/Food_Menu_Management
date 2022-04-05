$("#Form").validate({
    rules:{
    password:{
        minlength: 8
    },
    password_confirmation:{
        equalTo: password
    },
      email:{
        email: true
      },
    },
    messages:{
      email:{
        email: "Must enter a valid email"
      },
      password_confirmation: {
        equalTo: "Passwords are not the same"
    },
    },
    submitHandler: function(form) {
      form.submit();
    }
});
