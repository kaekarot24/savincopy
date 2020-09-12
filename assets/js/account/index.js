$(document).ready(function() {

    //validate register form
    $("#register-form").validate({
        // Specify validation rules
        //focusCleanup: false,
        errorElement: 'span',
        errorClass: 'text-danger',
        errorPlacement: function errorPlacement(error, element) {
            if (element.attr("type") == 'checkbox' || element.attr("type") == 'radio') {
                element.before(error);
            } else {
                element.after(error);
            }
        },
        rules: {
            register_form_name: {
                required: true
            },
            register_form_email: {
                required: true,
                email: true
            },
            register_form_username: {
                required: true
            },
            register_form_phone: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 16
            },
            register_form_password: {
                required: true,
                minlength: 8,
                maxlength: 15
            },
            register_form_repassword: {
                required: true,
                equalTo: "#register_form_password"
            }
        },
        messages: {
            register_form_name: {
                required: "This field is required"
            },
            register_form_email: {
                required: "This field is required",
                email: "Please provide a valid email address"
            },
            register_form_username: {
                required: "This field is required"
            },
            register_form_phone: {
                required: "This field is required",
            },
            register_form_password: {
                required: "This field is required"
            },
            register_form_repassword: {
                required: "This filed is required",
                EqualTo: "Please Check Repassword not match with Password"
            }
        },
        submitHandler: function() {
            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                async: true,
                data: $("#register-form").serialize(),
                beforeSend: function() {
                    $(".customize-register").attr('disabled', true);
                    $("#register-form .spinner-border").show();
                },
                success: function(result) {
                    var res = JSON.parse(result);
                    if (res.status == 'success') {
                        $("#register-form div.successmsg").find('div.sb-msg').html('<i class="icon-thumbs-up"></i><strong>Well done!</strong> ' + res.msg + '');
                        $("#register-form div.successmsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("#register-form div.successmsg").hide('slow');
                        }, 3000);
                        $("#register-form")[0].reset();
                    }
                    if (res.status == 'error') {
                        $("#register-form div.errormsg").find('div.sb-msg').html('<i class="icon-remove"></i><strong>Oh snap!</strong> ' + res.msg + '');
                        $("#register-form div.errormsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("#register-form div.errormsg").hide('slow');
                        }, 3000);
                    }
                    if (res.status == 'warning') {
                        $("#register-form div.alertmsg").find('div.sb-msg').html('<i class="icon-warning-sign"></i><strong>Oh snap!</strong> Better check yourself, you&apos;re not looking too good.');
                        $("#register-form div.alertmsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("#register-form div.alertmsg").hide('slow');
                        }, 3000);
                    }
                    if (res.status == 'validation') {
                        $("#register-form div.errormsg").find('div.sb-msg').html('<i class="icon-remove"></i><strong>Required!</strong> ' + res.msg + '');
                        $("#register-form div.errormsg").show('slow');
                    }
                    $("#register-form .spinner-border").hide();
                    $(".customize-register").attr('disabled', false);

                }
            });

            return false;
        }
    });

    //validate login form
    $("#login-form").validate({
        // Specify validation rules
        //focusCleanup: false,
        errorElement: 'span',
        errorClass: 'text-danger',
        errorPlacement: function errorPlacement(error, element) {
            if (element.attr("type") == 'checkbox' || element.attr("type") == 'radio') {
                element.before(error);
            } else {
                element.after(error);
            }
        },
        rules: {
            login_form_username: {
                required: true
            },
            login_form_password: {
                required: true
            }
        },
        messages: {
            login_form_username: {
                required: "This field is required"
            },
            login_form_password: {
                required: "This field is required"
            }
        },
        submitHandler: function() {
            $.ajax({
                url: ajaxUrl_2,
                type: 'POST',
                async: true,
                data: $("#login-form").serialize(),
                beforeSend: function() {
                    $(".customize-login").attr('disabled', true);
                    $("#login-form .spinner-border").show();
                },
                success: function(result) {
                    var res = JSON.parse(result);
                    if (res.status == 'success') {
                        $("#login-form")[0].reset();

                        //redirect to dashboard
                        window.location.href = res.redirect_url;
                    }
                    if (res.status == 'error') {
                        $("#login-form div.errormsg").find('div.sb-msg').html('<i class="icon-remove"></i><strong>Oh snap!</strong> ' + res.msg + '');
                        $("#login-form div.errormsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("#login-form div.errormsg").hide('slow');
                        }, 3000);
                    }
                    if (res.status == 'warning') {
                        $("#login-form div.alertmsg").find('div.sb-msg').html('<i class="icon-warning-sign"></i><strong>Oh snap!</strong> Better check yourself, you&apos;re not looking too good.');
                        $("#login-form div.alertmsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("#login-form div.alertmsg").hide('slow');
                        }, 3000);
                    }
                    $("#login-form .spinner-border").hide();
                    $(".customize-login").attr('disabled', false);
                    grecaptcha.reset(); // Reset reCaptcha

                }
            });

            return false;
        }
    });
});