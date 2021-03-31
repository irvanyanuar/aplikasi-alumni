@extends('template.master')

@section('header')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Pengalaman Kerja</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('profile.index')}}">Profil</a></li>
            <li class="breadcrumb-item active">Pengalaman Kerja</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="col-12">
    <div class="card card-info">
        <div class="card-header">
            <h4>Tambah Data</h4>
        </div>
        <div class="card-body">
            <form action="{{route('profile.job.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start_date">Tanggal Mulai <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="start_date" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_date">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="end_date">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="detail">Keterangan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="detail" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="/profile" class="btn btn-warning">Batal</a>

                </div>
            </form>
            <strong class="float-right"><span class="text-danger">*</span>) Harus diisi.</strong>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Select2 -->
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#pilihCollege').select2();
    });
</script>
@endsection