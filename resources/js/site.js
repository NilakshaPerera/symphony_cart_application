$(document).ready(function(){


    $('.btn-add').click(function(){
        var btnId = $(this).attr("id");
        var data = new FormData();
        data.append('id', $(this).attr("data-index"));
        data.append('qty', $("#"+ $(this).attr("data-id")).val());

        $.ajax({
            url: base + "/cart/add",
            type: 'post',
            data: data,
            processData: false,
            contentType: false,
            beforeSend: function (xhr) {
                $("#"+ btnId).attr('disabled', true);
                $("#"+ btnId).html('Adding');
            },
            success: function (respond) {
                console.log(respond);
                if (respond.success) {
                    getCartAttributes()
                } else {

                }
                $("#"+ btnId).attr('disabled', false);
                $("#"+ btnId).html('Add');
            },
            complete: function () {
               
            }
        });

    });

    getCartAttributes();
    function getCartAttributes(){
        $.ajax({
            url: base + "/cart/get",
            type: 'post',
            data: "",
            processData: false,
            contentType: false,
            beforeSend: function (xhr) {
               
            },
            success: function (respond) {
                console.log(respond);
                if (respond.success) {

                    $('#cart-net-amount').html( "Net Amount : $" + respond.data.net);
                    if(respond.data.net > 0){
                        $("#btn-go-to-checkout").removeClass('disabled');
                    }else{
                        $("#btn-go-to-checkout").addClass('disabled');
                    }
                  
                } else {

                }
            },
            complete: function () {
               
            }
        });
    }


    $('.btn-remove').click(function(){
        var btnId = $(this).attr("id");
        var data = new FormData();
        data.append('id', $(this).attr("data-index"));

        $.ajax({
            url: base + "/cart/remove",
            type: 'post',
            data: data,
            processData: false,
            contentType: false,
            beforeSend: function (xhr) {
                $("#"+ btnId).attr('disabled', true);
            },
            success: function (respond) {
                if (respond.success) {
                    location.reload();
                } else {

                }
                $("#"+ btnId).attr('disabled', false);
            },
            complete: function () {
               
            }
        });
        
    });

   
    (function ($) {
        $.extend({
            uploadPreview: function (options) {
                var settings = $.extend({
                    input_field: ".image-input",
                    preview_box: ".image-preview",
                    label_field: ".image-label",
                    label_default: "Choose File",
                    label_selected: "Change File",
                    no_label: false,
                    success_callback: null,
                }, options);

                if ($(settings.preview_box).attr('data-img')) {
                    if ($(settings.preview_box).attr('data-required') === 'true') {
                        $(settings.label_field).html('');
                    } else {
                        $(settings.label_field).html(settings.label_selected);
                    }
                    if (isExternal($(settings.preview_box).attr('data-img'))) {
                        $(settings.preview_box).css("background-image", 'url(' + $(settings
                            .preview_box).attr('data-img') + ')');
                    } else {
                        $(settings.preview_box).css("background-image", 'url(' + base + $(settings
                            .preview_box).attr('data-img') + ')');
                    }

                    $(settings.preview_box).css("background-size", 'cover');
                    $(settings.preview_box).css("background-position", 'center center');
                }

                if (window.File && window.FileList && window.FileReader) {
                    if (typeof ($(settings.input_field)) !== 'undefined' && $(settings.input_field) !==
                        null) {
                        $(settings.input_field).change(function () {
                            var files = this.files;

                            if (files.length > 0) {
                                var file = files[0];
                                var reader = new FileReader();

                                reader.addEventListener("load", function (event) {
                                    var loadedFile = event.target;

                                    if (file.type.match('image')) {
                                        $(settings.preview_box).css("background-image",
                                            "url(" + loadedFile.result + ")");
                                        $(settings.preview_box).css("background-size",
                                            "cover");
                                        $(settings.preview_box).css(
                                            "background-position", "center center");
                                    } else if (file.type.match('audio')) {
                                        $(settings.preview_box).html(
                                            "<audio controls><source src='" +
                                            loadedFile.result + "' type='" + file
                                            .type +
                                            "' />Your browser does not support the audio element.</audio>"
                                        );
                                    } else {
                                        alert("This file type is not supported.");
                                    }
                                });

                                if (settings.no_label == false) {
                                    $(settings.label_field).html(settings.label_selected);
                                }

                                reader.readAsDataURL(file);

                                if (settings.success_callback) {
                                    settings.success_callback();
                                }
                            } else {


                                if (settings.no_label == false) {
                                    $(settings.label_field).html(settings.label_default);
                                }

                                if ($(settings.preview_box).attr('data-img')) {
                                    if ($(settings.preview_box).attr('data-required') ===
                                        'true') {
                                        $(settings.label_field).html('');
                                    } else {
                                        $(settings.label_field).html(settings.label_selected);
                                    }

                                    if (isExternal($(settings.preview_box).attr('data-img'))) {
                                        $(settings.preview_box).css("background-image",
                                            'url(' + $(settings.preview_box).attr(
                                                'data-img') + ')');
                                    } else {
                                        $(settings.preview_box).css("background-image",
                                            'url(' + base + $(settings.preview_box).attr(
                                                'data-img') + ')');
                                    }

                                } else {
                                    $(settings.preview_box).css("background-image", "none");
                                }

                                $(settings.preview_box + " audio").remove();
                            }
                        });
                    }
                } else {
                    alert("You need a browser with file reader support, to use this form properly.");
                    return false;
                }
            }
        });
    })(jQuery);

    $.uploadPreview({
        input_field: "#image-upload-group",
        preview_box: "#image-preview-group",
        label_field: "#image-label-group",
        label_default: '<i class="fa fa-plus" aria-hidden="true"></i>',
        label_selected: '<a href="javascript:void(0)" class="remove-img"><i class="fa fa-times" aria-hidden="true"></i></a>',
    });
    $.uploadPreview({
        input_field: "#image-upload-logo",
        preview_box: "#image-preview-logo",
        label_field: "#image-label-logo",
        label_default: '<i class="fa fa-plus" aria-hidden="true"></i>',
        label_selected: '<a href="javascript:void(0)" class="remove-img"><i class="fa fa-times" aria-hidden="true"></i></a>',
    });

    (function () {
        $('.image-preview').on('click', '.remove-img', function (e) {
            var preview_box = $(this).parent('label').parent('div');
            var label_field = $(this).parent('label');
            var input_field = $(this).parent('label').parent('div').children('input');
            var file_input_field = $(this).parent('label').parent('div').children('input[type="file"]');

            if (preview_box.attr('data-required') === 'true') {
                file_input_field.val('');
                label_field.html('');
                preview_box.css("background-image", 'url(' + preview_box.attr('data-img') + ')');
                preview_box.css("background-size", 'cover');
                preview_box.css("background-position", 'center center');
            } else {
                input_field.val('');
                label_field.html('<i class="fa fa-plus" aria-hidden="true"></i>');
                preview_box.css("background-image", 'none');
            }

        });
    })();

    function isExternal(url) {
        if (url.toLowerCase().indexOf("https://") >= 0 || url.toLowerCase().indexOf("http://") >= 0) {
            return true;
        } else {
            return false;
        }
    }

});

var num = 80; //number of pixels before modifying styles

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > num) {
        $('.main-navbar').addClass('fixed');
        $('.main-navbar').addClass('slide-down');
        $('body').addClass('padding-top-100');
        // body { padding-top: 60px; }
    } else {
        $('.main-navbar').removeClass('fixed');
        $('.main-navbar').removeClass('slide-down');
        $('body').removeClass('padding-top-100');
    }
});