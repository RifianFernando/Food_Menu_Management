$("#Form").validate({
    rules:{
    password:{
        minlength: 8
    },
    password_confirmation:{
        equalTo: "#password"
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
        equalTo: "Password tidak sama"
    },
    },
    submitHandler: function(form) {
      form.submit();
    }
});
