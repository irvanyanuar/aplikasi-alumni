@extends('template.master')

@section('header')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Perguruan Tinggi</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('college.index')}}">Perguruan Tinggi</a></li>
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="col-12">
    <div class="card card-primary">
        <div class="card-header">
            <h4>Tambah Data</h4>
        </div>
        <div class="card-body">
            <form action="{{route('college.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Perguruan Tinggi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="regency">Kabupaten/Kota <span class="text-danger">*</span></label>
                    <select name="regency_id" id="pilihKabupatenKota" class="form-control select2" style="width: 100%;" required>
                        <option value="">Pilih Kabupaten/Kota</option>
                        @foreach($regencies as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="/college" class="btn btn-warning">Batal</a>
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
        $('#pilihKabupatenKota').select2();
    });
</script>
@endsection