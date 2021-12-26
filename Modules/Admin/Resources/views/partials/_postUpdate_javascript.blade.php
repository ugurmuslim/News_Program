<script>
    tinymce.init({
        selector: '#textarea',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak image code',
        toolbar_mode: 'floating',
        height: "500",

        /* without images_upload_url set, Upload tab won't show up*/
        images_upload_url: 'postAcceptor.php',

        /* we override default upload handler to simulate successful upload*/
        images_upload_handler: function (blobInfo, success, failure) {
            setTimeout(function () {
                /* no matter what you upload, we will turn it into TinyMCE logo :)*/
                success('http://moxiecode.cachefly.net/tinymce/v9/images/logo.png');
            }, 2000);
        },
    });

    tinymce.init({
        selector: '#textareaHidden',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak image code',
        toolbar_mode: 'floating',
        height: "500",

        /* without images_upload_url set, Upload tab won't show up*/
        images_upload_url: 'postAcceptor.php',

        /* we override default upload handler to simulate successful upload*/
        images_upload_handler: function (blobInfo, success, failure) {
            setTimeout(function () {
                /* no matter what you upload, we will turn it into TinyMCE logo :)*/
                success('http://moxiecode.cachefly.net/tinymce/v9/images/logo.png');
            }, 2000);
        },
    });

    tinymce.init({
        selector: '#textarea2',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak image code',
        toolbar_mode: 'floating',
        height: "500",
        readonly: true,

        /* without images_upload_url set, Upload tab won't show up*/
        images_upload_url: 'postAcceptor.php',

        /* we override default upload handler to simulate successful upload*/
        images_upload_handler: function (blobInfo, success, failure) {
            setTimeout(function () {
                /* no matter what you upload, we will turn it into TinyMCE logo :)*/
                success('http://moxiecode.cachefly.net/tinymce/v9/images/logo.png');
            }, 2000);
        },
    });

    $(".placementDrawing").on("click", function () {
        $('.placementDrawing').each(function () {
            $(this).removeClass("activated");
            $(this).css("background-color", "");
        })
        $(this).addClass("activated");
        $("#PlacementSection").attr("value", $(this).attr("value"));
        $(this).css("background-color", "red");

    });


    $("#headerDrawing").on("click", function () {
        if($(this).hasClass("activeHeader")) {
            $(this).removeClass("activeHeader");
            $(this).css("background-color", "");
            $("#HeaderSection").attr("value", 0);
        } else {
            $(this).addClass("activeHeader");
            $(this).css("background-color", "green");
            $("#HeaderSection").attr("value", 1);
        }
    });

    $("#persistentDrawing").on("click", function () {
        console.log(1)
        if($(this).hasClass("activePersistent")) {
            $(this).removeClass("activePersistent");
            $(this).css("background-color", "");
            $("#PersistentSection").attr("value", 0);
        } else {
            $(this).addClass("activePersistent");
            $(this).css("background-color", "orange");
            $("#PersistentSection").attr("value", 1);
        }
    });


    $("#previewButton").on("click", function () {
        var articleTitle = $("#articleTitle").val()
        var articleSummary = $("#articleSummary").val()
        var textarea = tinymce.activeEditor.getContent();
        var fd = new FormData();
        var files = $('#croppedImage').val();
        console.log(files)
        if (files === '') {
            console.log(1);
            files = $('#savedImage').attr('src');
        }
        console.log(files)
        fd.append('file', files);
        fd.append('title', articleTitle);
        fd.append('summary', articleSummary);
        fd.append('body', textarea);
        fd.append('_token', $('#token').val());
        console.log(fd.get('file'))
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "{{url('/')}}/admin/article/preview",
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                var w = window.open();
                $(w.document.body).html(response.html);
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
    });
    var $modal = $('#modal');
    var image = document.getElementById('image');
    var cropper;
    var dimensions;

    $("body").on("change", ".image", function (e) {
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    $('#category').on('change', function () {
        let categoryVal = $("#category").val();
        if(categoryVal == {{\App\Parafesor\Constants\ArticleTypes::GUNDEM}}) {
            $("#SecondSlider").css("display", "")
        } else {
            $("#SecondSlider").css("display", "none")
        }
        console.log("Category:" +   categoryVal);
        if(categoryVal == {{\App\Parafesor\Constants\ArticleTypes::SirketHaberleri}} || categoryVal == {{\App\Parafesor\Constants\ArticleTypes::Hisse}} ) {
            $("#companySelect").css("display", "")
        } else {
            $("#companySelect").css("display", "none")
        }

        getDimensions(categoryVal)
    })

    let categoryVal = $("#category").val();

    function getDimensions(categoryVal) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            async: false,
            url: "{{url('/')}}/article/dimensions/" + categoryVal,
            contentType: false,
            processData: false,
            success: function (response) {
                dimensions = response;
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            }
        })
    }


    $modal.on('shown.bs.modal', function () {
        let ratio = dimensions.Normal.width / dimensions.Normal.height;
        var selectedPlacement = $(".activated").attr("value");
        if (selectedPlacement === "MainSlider") {
            ratio = dimensions.MainSlider.width / dimensions.MainSlider.height;
        }

        if (selectedPlacement === "SecondSlider") {
            ratio = dimensions.SecondSlider.width / dimensions.SecondSlider.height;
        }

        if (selectedPlacement === "Logo") {
            console.log(dimensions.Logo.width / dimensions.Logo.height);
            ratio = dimensions.Logo.width / dimensions.Logo.height;
        }

        cropper = new Cropper(image, {
            aspectRatio: ratio,
            viewMode: 1,
            preview: '.preview',

        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    $("#crop").click(function () {
        var width = dimensions.Normal.width;
        var height = dimensions.Normal.height

        var selectedPlacement = $(".activated").attr("value");
        if (selectedPlacement === "MainSlider") {
            width = dimensions.MainSlider.width;
            height = dimensions.MainSlider.height;
        }

        if (selectedPlacement === "SecondSlider") {
            width = dimensions.SecondSlider.width;
            height = dimensions.SecondSlider.height;
        }

        if (selectedPlacement === "Normal") {
            width = dimensions.Normal.width;
            height = dimensions.Normal.height;
        }

        canvas = cropper.getCroppedCanvas({
            width: width,
            height: height,
        });

        canvas.toBlob(function (blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                var base64data = reader.result;
                $modal.modal('hide');
                $("#croppedImage").val(base64data);
                /*  $.ajax({
                      type: "POST",
                      dataType: "json",
                      url: "image-cropper/upload",
                      data: {'_token': $('meta[name="_token"]').attr('content'), 'image': base64data},
                      success: function (data) {
                          $modal.modal('hide');
                          alert("success upload image");
                      }
                  });*/
            }
        });
    })
    getDimensions(categoryVal)
</script>
