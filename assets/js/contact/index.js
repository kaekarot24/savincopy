$(document).ready(function() {

    //validate individual form
    $("#template-contactform").validate({
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
            template_contactform_name: {
                required: true
            },
            template_contactform_email: {
                required: true,
                email: true
            },
            template_contactform_phone: {
                required: true,
                number: true
            },
            template_contactform_subject: {
                required: true
            },
            template_contactform_message: {
                required: true
            }
        },
        messages: {
            template_contactform_name: {
                required: "This field is required"
            },
            template_contactform_email: {
                required: "This field is required",
                email: "Please provide a valid email address"
            },
            template_contactform_phone: {
                required: "This field is required",
                number: "Only numbers allowed only"
            },
            template_contactform_subject: {
                required: "This field is required"
            },
            template_contactform_message: {
                required: "This field is required"
            }
        },
        submitHandler: function() {
            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                async: true,
                data: $("#template-contactform").serialize(),
                beforeSend: function() {
                    $(".customize-contact").attr('disabled', true);
                    $(".spinner-border").show();
                },
                success: function(result) {
                    var res = JSON.parse(result);
                    if (res.status == 'success') {
                        $("div.successmsg").find('div.sb-msg').html('<i class="icon-thumbs-up"></i><strong>Well done!</strong> ' + res.msg + '');
                        $("div.successmsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("div.successmsg").hide('slow');
                        }, 3000);
                        $("#template-contactform")[0].reset();
                    }
                    if (res.status == 'error') {
                        $("div.errormsg").find('div.sb-msg').html('<i class="icon-remove"></i><strong>Oh snap!</strong> ' + res.msg + '');
                        $("div.errormsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("div.errormsg").hide('slow');
                        }, 3000);
                    }
                    if (res.status == 'warning') {
                        $("div.alertmsg").find('div.sb-msg').html('<i class="icon-warning-sign"></i><strong>Oh snap!</strong> Better check yourself, you&apos;re not looking too good.');
                        $("div.alertmsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("div.alertmsg").hide('slow');
                        }, 3000);
                    }
                    $(".spinner-border").hide();
                    $(".customize-contact").attr('disabled', false);
                    grecaptcha.reset(); // Reset reCaptcha
                }
            });

            return false;
        }
    });
});