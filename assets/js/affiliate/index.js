$(document).ready(function() {

    //validate individual form
    $("#affiliate-individual-form").validate({
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
            affiliate_individual_name: {
                required: true
            },
            affiliate_individual_email: {
                required: true,
                email: true
            },
            affiliate_individual_phone: {
                required: true,
                number: true
            },
            affiliate_individual_medialink: {
                required: true
            }
        },
        messages: {
            affiliate_individual_name: {
                required: "This field is required"
            },
            affiliate_individual_email: {
                required: "This field is required",
                email: "Please provide a valid email address"
            },
            affiliate_individual_phone: {
                required: "This field is required",
                number: "Only numbers allowed only"
            },
            affiliate_individual_medialink: {
                required: "This field is required"
            }
        },
        submitHandler: function() {
            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                async: true,
                data: $("#affiliate-individual-form").serialize(),
                beforeSend: function() {
                    $(".customize-individual").attr('disabled', true);
                    $(".spinner-border").show();
                },
                success: function(result) {
                    var res = JSON.parse(result);
                    if (res.status == 'success') {
                        $("div.successmsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("div.successmsg").hide('slow');
                        }, 3000);
                    }
                    if (res.status == 'error') {
                        $("div.errormsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("div.errormsg").hide('slow');
                        }, 3000);
                    }
                    if (res.status == 'warning') {
                        $("div.alertmsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("div.alertmsg").hide('slow');
                        }, 3000);
                    }
                    $(".customize-individual").attr('disabled', false);
                    $(".spinner-border").hide();
                    $("#affiliate-individual-form")[0].reset();
                }
            });

            return false;
        }
    });

    //validate company form
    $("#affiliate-company-form").validate({
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
            affiliate_company_name: {
                required: true
            },
            affiliate_company_email: {
                required: true,
                email: true
            },
            affiliate_company_phone: {
                required: true,
                number: true
            },
            affiliate_company_designation: {
                required: true
            },
            affiliate_company_compname: {
                required: true
            },
            affiliate_company_website: {
                required: true,
                url: true
            }

        },
        messages: {
            affiliate_company_name: {
                required: "This field is required"
            },
            affiliate_company_email: {
                required: "This field is required",
                email: "Please provide a valid email address"
            },
            affiliate_company_phone: {
                required: "This field is required",
                number: "Only numbers allowed only"
            },
            affiliate_company_designation: {
                required: "This field is required"
            },
            affiliate_company_compname: {
                required: "This field is required"
            },
            affiliate_company_website: {
                required: "This filed is required",
                url: "Please provide a valid url address"
            }
        },
        submitHandler: function() {
            $.ajax({
                url: ajaxUrl_2,
                type: 'POST',
                async: true,
                data: $("#affiliate-company-form").serialize(),
                beforeSend: function() {
                    $(".customize-company").attr('disabled', true);
                    $(".spinner-border").show();
                },
                success: function(result) {
                    var res = JSON.parse(result);
                    if (res.status == 'success') {
                        $("div.successmsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("div.successmsg").hide('slow');
                        }, 3000);
                    }
                    if (res.status == 'error') {
                        $("div.errormsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("div.errormsg").hide('slow');
                        }, 3000);
                    }
                    if (res.status == 'warning') {
                        $("div.alertmsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("div.alertmsg").hide('slow');
                        }, 3000);
                    }
                    $(".customize-company").attr('disabled', false);
                    $(".spinner-border").hide();
                    $("#affiliate-company-form")[0].reset();
                }
            });

            return false;
        }
    });

    //validate news form
    $("#affiliate-news-form").validate({
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
            affiliate_news_name: {
                required: true
            },
            affiliate_news_email: {
                required: true,
                email: true
            },
            affiliate_news_phone: {
                required: true,
                number: true
            },
            affiliate_news_medialink: {
                required: true
            },
            affiliate_news_website: {
                required: true,
                url: true
            }

        },
        messages: {
            affiliate_news_name: {
                required: "This field is required"
            },
            affiliate_news_email: {
                required: "This field is required",
                email: "Please provide a valid email address"
            },
            affiliate_news_phone: {
                required: "This field is required",
                number: "Only numbers allowed only"
            },
            affiliate_news_medialink: {
                required: "This field is required"
            },
            affiliate_news_website: {
                required: "This filed is required",
                url: "Please provide a valid url address"
            }
        },
        submitHandler: function() {
            $.ajax({
                url: ajaxUrl_3,
                type: 'POST',
                async: true,
                data: $("#affiliate-news-form").serialize(),
                beforeSend: function() {
                    $(".customize-news").attr('disabled', true);
                    $(".spinner-border").show();
                },
                success: function(result) {
                    var res = JSON.parse(result);
                    if (res.status == 'success') {
                        $("div.successmsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("div.successmsg").hide('slow');
                        }, 3000);
                    }
                    if (res.status == 'error') {
                        $("div.errormsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("div.errormsg").hide('slow');
                        }, 3000);
                    }
                    if (res.status == 'warning') {
                        $("div.alertmsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("div.alertmsg").hide('slow');
                        }, 3000);
                    }
                    $(".customize-news").attr('disabled', false);
                    $(".spinner-border").hide();
                    $("#affiliate-news-form")[0].reset();
                }
            });

            return false;
        }
    });

});