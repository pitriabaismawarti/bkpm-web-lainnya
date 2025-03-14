<!DOCTYPE html>
<html>
<head>
    <title>Dropzone Image Upload in Laravel</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Dropzone CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Dropzone JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

    <style>
        .dropzone {
            border: 2px dashed #0087F7;
            background: #F0F8FF;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Dropzone Image Upload in Laravel</h1>
                
                <!-- Form Upload -->
                <form action="{{ route('dropzone.store') }}" method="post" class="dropzone" id="image-upload">
                    @csrf
                    <div>
                        <h3 class="text-center">Upload Multiple Images</h3>
                    </div>
                </form>

                <!-- Tombol Upload -->
                <button type="button" id="upload-btn" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone("#image-upload", {
            paramName: "file",
            maxFilesize: 10, // Maksimal ukuran file 10MB
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            createImageThumbnails: true,
            autoProcessQueue: false, // File tidak langsung diupload
            parallelUploads: 10, // Bisa upload banyak file sekaligus

            init: function () {
                var dz = this;

                // AKSI KETIKA BUTTON UPLOAD DI KLIK
                $("#upload-btn").click(function (e) {
                    e.preventDefault();
                    dz.processQueue();
                });

                dz.on("sending", function (file, xhr, formData) {
                    var data = $('#image-upload').serializeArray();
                    $.each(data, function (key, el) {
                        formData.append(el.name, el.value);
                    });
                });

                dz.on("success", function (file, response) {
                    console.log("Upload sukses:", response);
                });

                dz.on("error", function (file, response) {
                    console.log("Upload gagal:", response);
                });
            }
        });
    </script>
</body>
</html>
