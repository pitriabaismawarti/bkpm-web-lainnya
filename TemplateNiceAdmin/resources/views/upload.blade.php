<!DOCTYPE html>
<html>
<head>
    <title>Upload File Dengan Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto my-5">
            <h2>Upload File Dengan Laravel</h2>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close text-decoration-none" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close text-decoration-none" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('upload_resize') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>File Gambar</label>
                    <input type="file" name="file" class="form-control">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control"></textarea>
                </div>

                <input type="submit" class="btn btn-primary" value="Upload & Resize">
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".alert-dismissible .close").click(function(){
            $(this).parent().fadeOut();
        });
    });
</script>

</body>
</html>
