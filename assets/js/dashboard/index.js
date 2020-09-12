$(document).ready(function() {

    //validate profile form
    $("#profile-form").validate({
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
            profile_form_name: {
                required: true
            },
            profile_form_email: {
                required: true,
                email: true
            },
            profile_form_phone: {
                required: true,
                number: true
            }
        },
        messages: {
            profile_form_name: {
                required: "This field is required"
            },
            profile_form_email: {
                required: "This field is required",
                email: "Please provide a valid email address"
            },
            profile_form_phone: {
                required: "This field is required",
                number: "Only numbers allowed only"
            }
        },
        submitHandler: function() {
            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                async: true,
                data: $("#profile-form").serialize(),
                beforeSend: function() {
                    $(".customize-profile").attr('disabled', true);
                    $("#profile-form .spinner-border").show();
                },
                success: function(result) {
                    var res = JSON.parse(result);
                    if (res.status == 'success') {
                        $("#profile-form div.successmsg").find('div.sb-msg').html('<i class="icon-thumbs-up"></i><strong>Well done!</strong> ' + res.msg + '.');
                        $("#profile-form div.successmsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("#profile-form div.successmsg").hide('slow');
                        }, 3000);
                    }
                    if (res.status == 'error') {
                        $("#profile-form div.errormsg").find('div.sb-msg').html('<i class="icon-remove"></i><strong>Oh snap!</strong> ' + res.msg + '.');
                        $("#profile-form div.errormsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("#profile-form div.errormsg").hide('slow');
                        }, 3000);
                    }
                    if (res.status == 'warning') {
                        $("#profile-form div.alertmsg").find('div.sb-msg').html('<i class="icon-warning-sign"></i><strong>Oh snap!</strong> Better check yourself, you&apos;re not looking too good.');
                        $("#profile-form div.alertmsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("#profile-form div.alertmsg").hide('slow');
                        }, 3000);
                    }
                    $("#profile-form .spinner-border").hide();
                    $(".customize-profile").attr('disabled', false);

                }
            });

            return false;
        }
    });

    var images = function(input, imgPreview) {
        var fileTypesAllowed = ['jpg', 'jpeg', 'png', 'JPEG', 'JPG', 'PNG'];
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.myindex = i;
                reader.fileName = input.files[i].name;
                var extension = input.files[i].name.split('.').pop();
                if (fileTypesAllowed.indexOf(extension) > -1) {
                    reader.onload = function(event) {
                        $("" + imgPreview + "").append('<div class="col-6 col-md-3 py-3 imgthumb"><img class="img-fluid img-thumbnail" width="200" height="200" src="' + event.target.result + '" /></div>');
                    }
                    reader.readAsDataURL(input.files[i]);
                } else {
                    $('#contentimages').val('');
                    var output = '<div class="alert alert-danger nobottommargin">';
                    output += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                    output += '<i class="icon-remove-sign"></i><strong>Oh snap!</strong> Image are allowed these extension [jpg, jpeg, png] only. Please try again</div>';
                    $('#previews').html(output);

                    return false;
                }

            }
        }
    };

    $('#upload-form-content .dropzone').change(function() {
        var limit = 5;
        var files = $(this)[0].files;

        var output = '<div class="alert alert-danger nobottommargin">';
        output += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        output += '<i class="icon-remove-sign"></i><strong>Oh snap!</strong> Maximun 5 images are allowed to upload. Please try again.</div>';

        $('#previews').html('');

        if (files.length > limit) {
            $('#contentimages').val('');
            $('#previews').html(output);

        } else {
            images(this, '#previews');
        }
    });

    //validate content form
    var validator = $("#upload-form-content").submit(function() {
        // update underlying textarea before submit validation
        tinyMCE.triggerSave();
    }).validate({
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
        ignore: "",
        rules: {
            "content_images[]": {
                required: true
            },
            content_message: {
                required: true
            }
        },
        messages: {
            "content_images[]": {
                required: "This field is required"
            },
            content_message: {
                required: "This field is required"
            }
        },
        errorPlacement: function(label, element) {
            // position error label after generated textarea
            if (element.is("textarea")) {
                label.insertAfter(element.next());
            } else {
                label.insertAfter(element)
            }
        },
        submitHandler: function(form) {
            var data = new FormData($('#upload-form-content')[0]);
            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = ((evt.loaded / evt.total) * 100);
                            $(".progress-bar").width(percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                type: 'POST',
                url: ajaxUrl_2,
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $(".customize-content").attr('disabled', true);
                    $("#upload-form-content .spinner-border").show();
                },
                error: function() {
                    $("#upload-form-content div.errormsg").find('div.sb-msg').html('<i class="icon-remove"></i><strong>Oh snap!</strong> File Upload failed. Plese try again.');
                    $("#upload-form-content div.errormsg").show('slow');
                },
                success: function(resp) {
                    var res = JSON.parse(resp);
                    if (res.status == 'success') {
                        $("#upload-form-content div.successmsg").find('div.sb-msg').html('<i class="icon-thumbs-up"></i><strong>Well done!</strong> ' + res.msg + '.');
                        $("#upload-form-content div.successmsg").show('slow');
                        $("#upload-form-content")[0].reset();
                        setTimeout(function() {
                            //code
                            $("#upload-form-content div.successmsg").hide('slow');
                            $("#previews").html('');
                        }, 3000);
                    }
                    if (res.status == 'error') {
                        $("#upload-form-content div.errormsg").find('div.sb-msg').html('<i class="icon-remove"></i><strong>Oh snap!</strong> ' + res.msg + '.');
                        $("#upload-form-content div.errormsg").show('slow');
                        if (res.type == 'limit') {
                            $("#upload-form-content")[0].reset();
                            $("#previews").html('');
                        } else {
                            setTimeout(function() {
                                //code
                                $("#upload-form-content div.errormsg").hide('slow');
                            }, 3000);
                        }
                    }
                    if (res.status == 'warning') {
                        $("#upload-form-content div.alertmsg").find('div.sb-msg').html('<i class="icon-warning-sign"></i><strong>Oh snap!</strong> Better check yourself, you&apos;re not looking too good.');
                        $("#upload-form-content div.alertmsg").show('slow');
                        setTimeout(function() {
                            //code
                            $("#upload-form-content div.alertmsg").hide('slow');
                        }, 3000);
                    }
                    $("#upload-form-content .spinner-border").hide();
                    $(".customize-content").attr('disabled', false);
                }
            });
            return false;
        }
    });

    validator.focusInvalid = function() {
        // put focus on tinymce on submit validation
        if (this.settings.focusInvalid) {
            try {
                var toFocus = $(this.findLastActive() || this.errorList.length && this.errorList[0].element || []);
                if (toFocus.is("textarea")) {
                    tinyMCE.get(toFocus.attr("id")).focus();
                } else {
                    toFocus.filter(":visible").focus();
                }
            } catch (e) {
                // ignore IE throwing errors when focusing hidden elements
            }
        }
    }

    //get activities
    $(".tab_activities").on('click', function() {

        $.ajax({
            url: ajaxUrl_3,
            type: 'GET',
            async: true,
            beforeSend: function() {
                $("#user_activities").html('<tr><td colspan="4" class="text-center"><img src="assets/images/ajax-preloader.gif" width="26" /></td></tr>');
            },
            success: function(result) {
                var res = JSON.parse(result);
                var output = '';
                if (res.status == 'success') {
                    var resdata = res.data;
                    $.each(resdata, function(i, val) {
                        output += '<tr><td><code>' + resdata[i].time + '</code></td>';
                        output += '<td>Your content is uploaded successfully.</td>';
                        output += '<td><span class="button button-mini button-circle ' + resdata[i].status_class + '">' + resdata[i].task_status + '</span></td>';
                        output += '<td><button class="button button-mini button-rounded button-blue preview-content" data-toggle="modal" data-id="' + resdata[i].id + '" data-target=".bs-example-modal-lg"><i class="icon-line-eye"></i> Preview</button></td></tr>';
                    });

                    $("#user_activities").html(output);
                }
                if (res.status == 'error') {
                    output += '<tr><td class="font-weight-bold text-center" colspan="4">' + res.msg + '</td></tr>';
                    $("#user_activities").html(output);
                }
            }
        });

    });

    //preview content
    $(document).on('click', '.preview-content', function() {
        var postid = $(this).attr('data-id');
        $.ajax({
            url: ajaxUrl_4,
            type: 'POST',
            async: true,
            data: { userid: postid },
            beforeSend: function() {
                $(".bs-example-modal-lg").find('div.user-content').html('<p class="text-center"><img src="assets/images/ajax-preloader.gif" width="26" /></p>');
            },
            success: function(result) {
                var res = JSON.parse(result);
                var output = '<div class="row">';
                if (res.status == 'success') {
                    var resdata = res.data;
                    $.each(resdata[0].images, function(i, val) {
                        output += '<div class="col-6 col-lg-3 py-3"><a href="#">';
                        output += '<img alt="100%x180" src="' + val + '" class="img-thumbnail" style="height: 180px; width: 100%; display: block;"></a>';
                        output += '</div>';
                    });
                    output += '</div><div class="py-3">';

                    $.each(resdata, function(i, val) {
                        output += resdata[i].content;
                    });
                    output += '</div>';

                    $(".bs-example-modal-lg").find('div.user-content').html(output);
                }
            }
        });
    });

});