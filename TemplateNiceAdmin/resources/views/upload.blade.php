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
            <h2 class="text-center my-5">Upload File Dengan Laravel</h2>

            {{-- Menampilkan error jika ada --}}
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            {{-- Form Upload --}}
            <form action="{{ route('upload.proses') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>File Gambar</label>
                    <input type="file" name="file" class="form-control">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control"></textarea>
                </div>

                <input type="submit" value="Upload" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
</body>
</html>
