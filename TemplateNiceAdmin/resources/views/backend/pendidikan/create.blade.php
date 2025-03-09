@extends('layouts.app')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_document_alt"></i> Riwayat Hidup</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{ url('dashboard') }}">Home</a></li>
                    <li><i class="icon_document_alt"></i>Riwayat Hidup</li>
                    <li><i class="fa fa-files-o"></i>Pendidikan</li>
                </ol>
            </div>
        </div>

        <!-- Form validations -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        {{ isset($pendidikan) ? 'Mengubah' : 'Menambahkan' }} Pendidikan
                    </header>

                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Warning!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" id="pendidikan_form" method="POST" 
                            action="{{ isset($pendidikan) ? route('pendidikan.update', $pendidikan->id) : route('pendidikan.store') }}">
                            @csrf
                            @if(isset($pendidikan))
                                @method('PUT')
                            @endif

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Sekolah <span class="required">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" minlength="5" 
                                        value="{{ old('nama', isset($pendidikan) ? $pendidikan->nama : '') }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tingkatan</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="tingkatan" id="tingkatan" required>
                                        <option value="1" {{ isset($pendidikan) && $pendidikan->tingkatan == 1 ? 'selected' : '' }}>SD</option>
                                        <option value="2" {{ isset($pendidikan) && $pendidikan->tingkatan == 2 ? 'selected' : '' }}>SMP</option>
                                        <option value="3" {{ isset($pendidikan) && $pendidikan->tingkatan == 3 ? 'selected' : '' }}>SMA</option>
                                        <option value="4" {{ isset($pendidikan) && $pendidikan->tingkatan == 4 ? 'selected' : '' }}>D3</option>
                                        <option value="5" {{ isset($pendidikan) && $pendidikan->tingkatan == 5 ? 'selected' : '' }}>S1</option>
                                        <option value="6" {{ isset($pendidikan) && $pendidikan->tingkatan == 6 ? 'selected' : '' }}>S2</option>
                                        <option value="7" {{ isset($pendidikan) && $pendidikan->tingkatan == 7 ? 'selected' : '' }}>S3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tahun Masuk <span class="required">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="tahun_masuk" name="tahun_masuk" class="form-control"
                                        value="{{ old('tahun_masuk', isset($pendidikan) ? $pendidikan->tahun_masuk : '') }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tahun Selesai <span class="required">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="tahun_keluar" name="tahun_keluar" class="form-control"
                                        value="{{ old('tahun_keluar', isset($pendidikan) ? $pendidikan->tahun_keluar : '') }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('pendidikan.index') }}" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection

@section('content_js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="{{ asset('backend/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
    <script src="{{ asset('backend/js/bootstrap-datepicker.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#tahun_masuk').datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });

            $('#tahun_keluar').datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        });
    </script>
@endsection
