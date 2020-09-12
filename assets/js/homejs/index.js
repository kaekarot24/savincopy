$(document).ready(function() {

    var maxLength = 500;
    $('#message').keyup(function() {
        var textlen = maxLength - $(this).val().length;
        $('#rchars').text(textlen);
    });

    //validate form
    $("#sales-enquiry-form").validate({
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
            full_name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                number: true
            },
            subject: {
                required: true
            },
            message: {
                required: true,
                minlength: 10,
                maxlength: 500
            }
        },
        messages: {
            full_name: {
                required: "This field is required"
            },
            email: {
                required: "This field is required",
                email: "Please provide a valid email address"
            },
            mobile: {
                required: "This field is required",
                number: "Only numbers allowed only"
            },
            subject: {
                required: "This field is required"
            },
            message: {
                required: "This field is required"
            }
        },
        submitHandler: function() {
            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                async: true,
                data: $("#sales-enquiry-form").serialize(),
                beforeSend: function() {
                    $(".customize-enquiry").attr('disabled', true);
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
                        $("#sales-enquiry-form")[0].reset();
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
                    $(".customize-enquiry").attr('disabled', false);
                    grecaptcha.reset(); // Reset reCaptcha
                }
            });

            return false;
        }
    });

});