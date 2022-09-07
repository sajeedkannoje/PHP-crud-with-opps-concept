$('#signup-form').validate({
    errorClass: "text-danger",
    errorElement: "span",
    rules:{
        first_name:{
            required:true,
        },
        last_name:{
            required:true,
        },
        email:{
            required:true,
            email: true
        },
        phone:{
            required:true,
        },
        password:{
            required:true,
        },
        c_password: {
         equalTo: "#password"
        }
    }
})