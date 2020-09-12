jQuery(document).ready(function () {
    
    //change order
    $('#sortable').sortable({
        placeholder: "ui-state-highlight",
        forcePlaceholderSize: true,
        scrollSpeed: 40,
        cursor: "move",
        tolerance: "pointer",
        revert: true,
        distance: 5,
        opacity: 0.9,
        update: function (event, ui) {
            var page_id_array = new Array();
            $('#sortable div.sort-order').each(function () {
                var order = $(this).attr("id");
                page_id_array.push(order);
            });
            
            $.ajax({
                type: "POST",
                async: true,
                url: ajaxUrl_9,
                data: { action: 'updateSortedRows', sortOrder: page_id_array },
                beforeSend: function () {
                },
                success: function (response) {
                   var resdata = JSON.parse(response);
                   if(resdata.status == 'success'){
                       $(".loader").hide();
                       $("#sortable").sortable("enable"); 
                      // $(".sorting_filter_inputbox .form-check-input:checked").click();
                   } else if (resdata.status == 'error') {
                       $("#sortable").sortable("enable");
                       Swal.fire({
                           icon: 'info',
                           html: resdata.msg,
                           focusConfirm: false,
                           confirmButtonText: 'Ok',
                       })
                       $(".loader").hide();
                   } else if (resdata.status == 'badrequest') {
                       Swal.fire({
                           icon: 'info',
                           html: 'Bad Request',
                           focusConfirm: false,
                           confirmButtonText: 'Ok',
                       })
                       $(".loader").hide();
                   }
                }
            });
        }
    });

    $("#sortable").disableSelection();

    $('[data-toggle="popover"]').popover({
        trigger: 'hover',
        container: 'body',
        html: true
    });

    var images = function (input, imgPreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.myindex = i;
                reader.fileName = input.files[i].name;
                reader.onload = function (event) {
                    $("" + imgPreview + "").append('<div class="col-6 col-md-3 py-3 imgthumb"><img class="img-fluid img-thumbnail" src="' + event.target.result + '" /></div>');
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('.dropzone').change(function () {
        var limit = 20;
        var files = $(this)[0].files;
        if (files.length > limit) {
            $('#hotel_images').val('');
            Swal.fire('You can select max ' + limit + ' images.')
        } else {
            $(".drag_and_drop_box").hide();
            $(".modal-header").show();
            $(".preview_boxcontent_parent").addClass('showpreview');
            $(".progress").show();
            $(".modal-footer").css('display', 'flex');

            images(this, '#previews');
        }
    });


    //close modal and empty previe and input
    $("#imagepreview .close").click(function () {
        $("#previews").html('');
        $("#hotel_images").val('');
        $("#imagepreview .modal-header").hide();
        $(".preview_boxcontent_parent").removeClass('showpreview');
        $(".progress").hide();
        $(".completed-images").hide();
        $(".upload-images").show();
        $("#imagepreview .modal-footer").css('display', 'none');
        $(".drag_and_drop_box").show();
    });

    //uploading start js
    $(".upload-images").on('click', function () {
        $("#manage-hotelimages-form").submit();
    });

    $(".add-photos").on('click', function () {
        $("#imagepreview").modal();
    });

    $(document).on('click', '.image-library :checkbox', function () {
        var len = $(".image-library input[type='checkbox']:checked").length;
        if (len > 0) {
            $(".apply-category").attr('disabled', false);
            $(".apply-room").attr('disabled', false);
        } else {
            $(".apply-category").attr('disabled', true);
            $(".apply-room").attr('disabled', true);
        }
    });

    //remove span when category exist
    $("#image_category").change(function () {
        if ($(this).val() != '') {
            $(this).next('span.error').remove();
        } else {
            if ($(this).next('span.error').length <= 0) {
                $(this).after('<span class="error">Please select category first</span>');
            }
        }
    });

    //remove span when room exist
    $("#room_type").change(function () {
        if ($(this).val() != '') {
            $(this).next('span.error').remove();
        } else {
            if ($(this).next('span.error').length <= 0) {
                $(this).after('<span class="error">Please select room first</span>');
            }
        }
    });

    //apply for categoyy
    $(".apply-category").click(function () {
        var chk = [];
        var catid = $("#image_category").val();

        if (catid != '' && catid != '0') {
            $("#image_category").next('span.error').remove();
         if ($('.image-library :checkbox:checked').length !== 0){  
            $('.image-library :checkbox:checked').each(function (i) {
                chk[i] = $(this).val();
            });

            $.ajax({
                type: "POST",
                url: ajaxUrl_3,
                data: { imgArray: chk, catid: catid },
                beforeSend: function () {
                    $(".apply-category").attr('disabled', true);
                    $('.spn-cat').addClass('spinner-border').show();
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.status == 'success') {
                        $(".apply-category").attr('disabled', true);
                        $("#image_category").val('');
                        $('.spn-cat').removeClass('spinner-border').hide();
                        $('.image-library :checkbox:checked').each(function (i) {
                            $(this).parent('div.image-checkbox').find('a.edit_icon').attr('data-cid', catid);
                            $(this).prop('checked', false);
                        });

                        //sweet alert
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Your images has been assigned successful',
                            showConfirmButton: false,
                            timer: 2500
                        })
                    }
                }
            });
          } else{
              $("#image_category").after('<span class="error">Please select atleast one image</span>');
          }
        } else {
            if ($("#image_category").next('span.error').length <= 0) {
                $("#image_category").after('<span class="error">Please select category first</span>');
            }
        }
    });

    //apply for room
    $(".apply-room").click(function () {
        var chkroom = [];
        var roomid = $("#room_type").val();

        if (roomid != '' && roomid != '0') {
            $("#room_type").next('span.error').remove();
          if ($('.image-library :checkbox:checked').length !== 0) {   
            $('.image-library :checkbox:checked').each(function (i) {
                chkroom[i] = $(this).val();
            });

            $.ajax({
                type: "POST",
                url: ajaxUrl_4,
                data: { imgArray: chkroom, roomid: roomid },
                beforeSend: function () {
                    $(".apply-room").attr('disabled', true);
                    $('.spn-room').addClass('spinner-border').show();
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.status == 'success') {
                        $(".apply-room").attr('disabled', true);
                        $("#room_type").val('');
                        $('.spn-room').removeClass('spinner-border').hide();
                        $('.image-library :checkbox:checked').each(function (i) {
                            $(this).prop('checked', false);
                        });

                        //sweet alert
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Your images has been assigned successful',
                            showConfirmButton: false,
                            timer: 2500
                        })
                    }
                }
            });
          } else {
              $("#room_type").after('<span class="error">Please select atleast one image</span>');
          }
        } else {
            if ($("#room_type").next('span.error').length <= 0) {
                $("#room_type").after('<span class="error">Please select room first</span>');
            }
        }
    });

    //check radio filter
    $(".sorting_filter_inputbox .form-check-input").click(function () {
        var type = $(this).val();
        $.ajax({
            type: "POST",
            url: ajaxUrl_6,
            data: { type: type },
            beforeSend: function () {
                $(".image-library").addClass('loading_time_box');
                $(".image-library").html('<div class="request_loader loader text-center"><div class="request_loader_inner" ><img class="img-fluid" src="'+baseurl+'/assets/images/ajax-preloader.gif" /></div></div>');
                if(type=='category'){
                    $("#filterby-category").attr('disabled', false);
                    $("#filterby-room").val('all');
                    $("#filterby-room").attr('disabled', true);
                    $("#sortable").sortable("disable");
                }
                else if (type == 'room') {
                    $("#filterby-category").attr('disabled', true);
                    $("#filterby-category").val('all');
                    $("#filterby-room").attr('disabled', false);
                    $("#sortable").sortable("disable");
                } else{
                    $("#filterby-room").val('all');
                    $("#filterby-category").val('all');
                    $("#filterby-category").attr('disabled', true);
                    $("#filterby-room").attr('disabled', true);
                    $("#sortable").sortable("option", "disabled", false);
                }
            },
            success: function (response) {
                var source = JSON.parse(response);
                if (source.status == 'success') {
                    $(".image-library").removeClass('loading_time_box'); 
                    $(".image-library").html('');                  
                    var output = '';
                    var resdata = source.data;

                    if (source.data.length === 0) {
                        output += '<div class="d-flex justify-content-center align-items-center w-100 p-5">';
                        output += '<h5 class="small m-0">No Images Available</h5></div >';
                    }

                    //call loop to get and print data
                    $.each(resdata, function (i, e) {
                        var pmyicon = '';
                        var condid = '';
                        var ids = resdata[i].id;
                        var thumburl = resdata[i].filepath;

                        if(type=='all'){
                            condid += 'id="'+ids+'"';
                        }

                        if(resdata[i].primary_image === 1){
                            pmyicon += '<div class="grid_primary_icon"><a class="edit_icon" href = "javascript:void(0);">';
                            pmyicon += '<i class="las la-star"></i></a></div>';
                        }

                        output += '<div ' + condid + ' class="col-12 col-sm-6 col-md-4 col-lg-3 py-3 sort-order imgcaption-' + ids + '">';
                        output += '<div class="custom-control custom-checkbox image-checkbox d-flex h-100">';
                        output += '<input type="checkbox" value="' + ids + '" class="custom-control-input" id="ck1' + ids + '">';
                        output += '<label class="custom-control-label d-flex" for="ck1' + ids + '">';
                        output += '<img src="' + thumburl + '" alt="#" class="img-fluid"></label>';
                        output += '<div class="grid_edit_icon_parent">';
                        output += '<a class="edit_icon" href="javascript:void(0);" data-id="' + ids + '" data-toggle="modal" data-target="#img_upload_single"><i class="las la-edit"></i></a></div>' + pmyicon + '</div></div>';

                    });
                    $(output).prependTo(".image-library");
                }
            }
        });
    });

    //filter by category
    $("#filterby-category").change(function () {
        var postdata;
        var fltcategory = $(this).val();
        if(fltcategory=='all'){
           postdata = {type:'category'};
        } else{
            postdata = { categoryid: fltcategory, type: 'category' };
        }
        $.ajax({
            type: "POST",
            url: ajaxUrl_6,
            data: postdata,
            beforeSend: function () {
                $(".image-library").addClass('loading_time_box');
                $(".image-library").html('<div class="request_loader loader text-center"><div class="request_loader_inner" ><img class="img-fluid" src="' + baseurl + '/assets/images/ajax-preloader.gif" /></div></div>');
            },
            success: function (response) {
                var source = JSON.parse(response);
                if (source.status == 'success') {
                    $(".image-library").removeClass('loading_time_box');
                    $(".image-library").html('');
                    var output = '';
                    var resdata = source.data;

                    if (source.data.length === 0) {
                        output += '<div class="d-flex justify-content-center align-items-center w-100 p-5">';
                        output += '<h5 class="small m-0"> No Images Available</h5></div >';
                    }

                    //call loop to get and print data
                    $.each(resdata, function (i, e) {
                        var pmyicon = '';
                        var ids = resdata[i].id;
                        var thumburl = resdata[i].filepath;
                        if(resdata[i].primary_image === 1){
                            pmyicon += '<div class="grid_primary_icon"><a class="edit_icon" href = "javascript:void(0);">';
                            pmyicon += '<i class="las la-star"></i></a></div >';
                        }

                        output += '<div class="col-12 col-sm-6 col-md-4 col-lg-3 py-3 imgcaption-' + ids + '">';
                        output += '<div class="custom-control custom-checkbox image-checkbox d-flex h-100">';
                        //output += '<input type="checkbox" value="' + ids + '" class="custom-control-input" id="ck1' + ids + '">';
                        output += '<label class="custom-control-label d-flex" for="ck1' + ids + '">';
                        output += '<img src="' + thumburl + '" alt="#" class="img-fluid"></label>';
                        output += '<div class="grid_edit_icon_parent">';
                        output += '<a class="edit_icon" href="javascript:void(0);" data-id="' + ids + '" data-toggle="modal" data-target="#img_upload_single"><i class="las la-edit"></i></a></div>' + pmyicon + '</div></div>';

                    });
                    $(output).prependTo(".image-library");
                }
            }
        });

    });

    //filter by room
    $("#filterby-room").change(function () {
        var postdata;
        var fltroom = $(this).val();
        if (fltroom == 'all') {
            postdata = { type: 'room' };
        } else {
            postdata = { roomid: fltroom, type: 'room' };
        }
        $.ajax({
            type: "POST",
            url: ajaxUrl_6,
            data: postdata,
            beforeSend: function () {
                $(".image-library").addClass('loading_time_box');
                $(".image-library").html('<div class="request_loader loader text-center"><div class="request_loader_inner" ><img class="img-fluid" src="' + baseurl + '/assets/images/ajax-preloader.gif" /></div></div>');
            },
            success: function (response) {
                var source = JSON.parse(response);
                if (source.status == 'success') {
                    $(".image-library").removeClass('loading_time_box');
                    $(".image-library").html('');
                    var output = '';
                    var resdata = source.data;

                    if (source.data.length === 0) {
                        output += '<div class="d-flex justify-content-center align-items-center w-100 p-5">';
                        output += '<h5 class="small m-0"> No Images Available</h5></div >';
                    }

                    //call loop to get and print data
                    $.each(resdata, function (i, e) {
                        var pmyicon = '';
                        var ids = resdata[i].id;
                        var thumburl = resdata[i].filepath;
                        if (resdata[i].primary_image === 1) {
                            pmyicon += '<div class="grid_primary_icon"><a class="edit_icon" href = "javascript:void(0);">';
                            pmyicon += '<i class="las la-star"></i></a></div >';
                        }

                        output += '<div class="col-12 col-sm-6 col-md-4 col-lg-3 py-3 imgcaption-' + ids + '">';
                        output += '<div class="custom-control custom-checkbox image-checkbox d-flex h-100">';
                        //output += '<input type="checkbox" value="' + ids + '" class="custom-control-input" id="ck1' + ids + '">';
                        output += '<label class="custom-control-label d-flex" for="ck1' + ids + '">';
                        output += '<img src="' + thumburl + '" alt="#" class="img-fluid"></label>';
                        output += '<div class="grid_edit_icon_parent">';
                        output += '<a class="edit_icon" href="javascript:void(0);" data-id="' + ids + '" data-toggle="modal" data-target="#img_upload_single"><i class="las la-edit"></i></a></div>' + pmyicon + '</div></div>';

                    });
                    
                    $(output).prependTo(".image-library");
                } 
            }
        });
    });

    //show single image
    $(document).on('click', '.edit_icon', function () {
        $("#update-photo-info")[0].reset();
        var loadpreview = baseurl+"/assets/images/img_gallery_spinner.gif";
        var ids = $(this).attr('data-id');

        $.ajax({
            type: "POST",
            url: ajaxUrl_7,
            data: { id: ids },
            beforeSend: function () {
                $("#make_primary").attr('checked', false);
                $(".update-single-photo").attr('disabled', true);
                $(".image_single_image_modal img").addClass('img_preview_loader');
                $(".image_single_image_modal img").attr('src', loadpreview);
            },
            success: function (response) {
                var res = JSON.parse(response);
                var info = res.data[0];
                var imgurl = info.pp_img_url;
                if (res.status == 'success') {
                    $("#photo_image_id").val(info.id);
                    $(".image_single_image_modal img").removeClass('img_preview_loader');
                    $(".image_single_image_modal img").attr('src', imgurl);
                    if ($.trim(info.pp_img_title) != '') {
                        $("#update-photo-info #image_title").val(info.pp_img_title);
                    }
                    if ($.trim(info.pp_img_desc) != '') {
                        $("#update-photo-info #image_description").val(info.pp_img_desc);
                    }
                    if (info.category_id !== '' && info.category_id !== 0) {
                        $("#update-category").val(info.category_id);
                    }
                    if (info.pp_img_primary === 1) {
                        $("#make_primary").attr('checked', true);
                    }
                    $("#update-photo-info .delete_photo").attr('data-id', info.id);
                    $(".update-single-photo").attr('disabled', false);
                }
            }
        });
    });

    //delete photo
    $("#update-photo-info .delete_photo").click(function () {
        Swal.fire({
            title: '<h2 class="small mb-0">Are you sure?</h2>',
            text: "You want to delete this and also dependencies!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                var loadpreview = baseurl + "/assets/images/img_gallery_spinner.gif";
                var ids = $(this).attr('data-id');
                if (ids != '') {
                    $.ajax({
                        type: "POST",
                        url: ajaxUrl_8,
                        data: { id: ids },
                        beforeSend: function () {
                            $(".update-single-photo").attr('disabled', true);
                            $(".image_single_image_modal img").addClass('img_preview_loader');
                            $(".image_single_image_modal img").attr('src', loadpreview);
                        },
                        success: function (response) {
                            var output = '';
                            var data = JSON.parse(response);
                            if (data.status == 'success') {
                                $(".image_single_image_modal img").removeClass('img_preview_loader');
                                $(".image-library .imgcaption-" + ids).remove();
                                $(".image_single_image_modal .close").click();
                                if ($(".image-library div.sort-order").length === 0) {
                                    output += '<div class="d-flex justify-content-center align-items-center w-100 p-5">';
                                    output += '<h5 class="small m-0"> No Images Available</h5></div >';
                                    $(".image-library").html(output);
                                }

                                //show alert
                                Swal.fire(
                                    '<h2 class="small mb-0">Deleted! </h2>',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }
                        }
                    });
                }
            }
        });
    });

    //update single image details
    $(document).on('click', '.update-single-photo', function () {
        //code here
        $("#update-photo-info").submit();
    });

    //validate single image info form
    $("#update-photo-info").validate({
        errorElement: 'span',
        errorClass: 'error',
        errorPlacement: function errorPlacement(error, element) {
            if (element.attr("type") == 'checkbox' || element.attr("type") == 'radio') {
                element.before(error);
            } else {
                element.after(error);
            }
        },
        rules: {
            image_title: {
                required: true
            },
            "update-category": {
                required: true
            }
        },
        messages: {
            image_title: {
                required: "This field is required"
            },
            "update-category": {
                required: "This field is required"
            }
        },
        submitHandler: function () {           
            $.ajax({
                type: "POST",
                url: ajaxUrl_5,
                data: $("#update-photo-info").serialize(),
                beforeSend: function () {
                    $(".update-single-photo").attr('disabled', true);
                    $(".update-single-photo").find('span').addClass('spinner-border');
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    var output = '';
                    if (data.status == 'success') {
                        $(".update-single-photo").attr('disabled', false);
                        $(".update-single-photo").find('span').removeClass('spinner-border');
                        if($("#update-photo-info input[type='checkbox']:checked").length === 1) {
                            var ids = $("#photo_image_id").val();
                            output += '<div class="grid_primary_icon"><a class="edit_icon" href = "javascript:void(0);">';
                            output += '<i class="las la-star"></i></a></div >';
                            if ($(".image-library .imgcaption-" + ids).find('.grid_primary_icon').length === 0){
                                $(".image-library .imgcaption-" + ids).find('.grid_edit_icon_parent').after(output);
                            }
                            
                        } else{
                            var ids = $("#photo_image_id").val();
                            $(".image-library .imgcaption-" + ids).find('.grid_primary_icon').remove();
                        }
                        
                        $("#img_upload_single .close").click();
                        //show alert
                        Swal.fire(
                            '<h2 class="small mb-0">Done</h2>',
                            'Your save changes successfully done',
                            'success'
                        )
                    }
                }
            });
        }

    });

    //upload images
    $("#manage-hotelimages-form").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        $(".progress-bar").width(percentComplete + '%');
                    }
                }, false);
                return xhr;
            },
            type: 'POST',
            url: ajaxUrl_2,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $(".progress-bar").width('0%');
                $('.upload-icon').addClass('spinner-border');
                $(".upload-images").attr('disabled', true);
            },
            error: function () {
                $('#uploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
            },
            success: function (resp) {
                var source = JSON.parse(resp);
                if (source.status == 'success') {
                    $('#manage-hotelimages-form')[0].reset();
                    $('.upload-icon').removeClass('spinner-border');
                    $(".upload-images").attr('disabled', false);
                    $(".upload-images").hide();
                    $(".completed-images").show();
                    $(".progress-bar").width('0%');
                    if ($(".image-library div.py-3").length === 0) {
                        $(".image-library").html('');
                    }

                    $(".close").click();

                    var output = '';
                    var resdata = source.data;

                    //call loop to get and print data
                    $.each(resdata, function (i, e) {
                        var ids = resdata[i].id;
                        var thumburl = resdata[i].thumburl;

                        output += '<div class="col-12 col-sm-6 col-md-4 col-lg-3 my-3 sort-order imgcaption-' + ids + '">';
                        output += '<div class="custom-control custom-checkbox image-checkbox d-flex h-100">';
                        output += '<input type="checkbox" value="' + ids + '" class="custom-control-input" id="ck1' + ids + '">';
                        output += '<label class="custom-control-label d-flex" for="ck1' + ids + '">';
                        output += '<img src="' + thumburl + '" alt="#" class="img-fluid"></label>';
                        output += '<div class="grid_edit_icon_parent">';
                        output += '<a class="edit_icon" href="javascript:void(0);" data-id="' + ids + '" data-toggle="modal" data-target="#img_upload_single"><i class="las la-edit"></i></a></div></div></div>';

                    });

                    $('.image-library').addClass('border');
                    $(output).prependTo(".image-library");

                } else if (data.status == 'error') {
                    $('#uploadStatus').html('<p style="color:#EA4335;">Please select a valid file to upload.</p>');
                }
            }
        });
    });

});


//reload table ajax
function table_reload() {
    $(".loader").hide();
    $(".image-library").removeClass('border');
    $(".image-library").empty();
    location.reload(true);
}
