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
                        Pendidikan
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

                        <form class="form-horizontal" id="pendidikan_form" method="POST" action="{{ route('pendidikan.store') }}">
                            @csrf

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Sekolah <span class="required">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" minlength="5" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tingkatan</label>
                                <div class="col-sm-10">
                                <select class="form-control" name="tingkatan" id="tingkatan" required>
                                <option value="1">SD</option>
                                <option value="2">SMP</option>
                                <option value="3">SMA</option>
                                <option value="4">D3</option>
                                <option value="5">S1</option>
                                <option value="6">S2</option>
                                <option value="7">S3</option>
                            </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tahun Masuk <span class="required">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="tahun_masuk" name="tahun_masuk" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tahun Selesai <span class="required">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="tahun_keluar" name="tahun_keluar" class="form-control" required>
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
    <link href="{{ asset('backend/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
    <script src="{{ asset('backend/js/bootstrap-datepicker.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#tahun_masuk').datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });

            $('#tahun_keluar').datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
        });
    </script>
@endsection
