$(document).ready(function () {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    $('#signup-form').validate({
        errorClass: "text-danger",
        errorElement: "span",
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
            },
            password: {
                required: true,
            },
            c_password: {
                equalTo: "#password"
            }
        },
        submitHandler: function (form) {
            let data = new FormData(document.getElementById('signup-form'));
            $.ajax({
                type: "post",
                url: "/../ajax/registration_submit.php",
                data: data,
                dataType: "json",
                processData: false,
                contentType: false,
                beforeSend: () => {
                    $('#submit-sign-in').prop('disabled', true)
                    $('#leader').show()
                },
                success: function (response) {
                    if (response.status == 'false') {
                        let validate = $('#signup-form').validate()
                        let filedObj = {};
                        filedObj[response.field] = response.message;
                        toastr["error"](response.message)
                        validate.showErrors(filedObj);
                    } else if (response.status == 'true') {
                        window.location.href = "/";
                    }
                },
                complete: function () {
                    $('#leader').hide()
                    $('#submit-sign-in').prop('disabled', false)
                }
            });
        }
    })
    // 
    $('#login-form').validate({
        errorClass: "text-danger",
        errorElement: "span",
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
            },
        },
        submitHandler: function (form) {
            let data = new FormData(document.getElementById('login-form'));
            $.ajax({
                type: "post",
                url: "/../ajax/login_submit.php",
                data: data,
                dataType: "json",
                processData: false,
                contentType: false,
                beforeSend: () => {
                    $('#login-submit-button').prop('disabled', true)
                    $('#leader').show()
                },
                success: function (response) {
                    console.log(response)
                    if (response.status == 'false') {
                        console.log(response)
                        let validate = $('#login-form').validate()
                        toastr["error"](response.message)
                        let filedObj = {};
                        filedObj[response.field] = response.message;
                        validate.showErrors(filedObj);
                    } else if (response.status == 'true') {
                        window.location.href = "/";
                    }
                },
                complete: function () {
                    $('#leader').hide()
                    $('#login-submit-button').prop('disabled', false)
                }
            });
        }
    })
});
