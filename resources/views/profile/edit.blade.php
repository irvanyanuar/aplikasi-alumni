@extends('template.master')

@section('header')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Profil</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('profile.index')}}">Profil</a></li>
            <li class="breadcrumb-item active">Edit Data</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="col-12">
    <div class="card card-primary col-md-9">
        <div class="card-header">
            <h4>Edit Data</h4>
        </div>
        <div class="card-body">
            <form action="{{route('profile.update', $profile->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama <span class="text-danger">*</span></label>
                    <input type="text" value="{{$profile->name}}" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="text" value="{{$profile->email}}" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="photo">Foto</label>
                    <div class="form-group">
                        <!-- <label for="customFile">Custom File</label> -->
                        <div class="custom-file">
                            <input type="file" accept=".jpg,.jpeg,.png" class="custom-file-input" id="customFile" name="photo">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <div>(Foto minimal 500&times;500 piksel berekstensi .jpg, .jpeg, atau .png )</div>
                            <span class="text-primary">*</span>) Apabila foto tidak diganti kosongkan saja
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="student_number">Nomor Induk<span class="text-danger">*</span></label>
                    <input type="number" value="{{$profile->student_number}}" class="form-control" name="student_number" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="txtPassword" minlength="8" class="form-control" name="password">
                    <span class="text-primary">*</span>) Apabila password tidak diganti kosongkan saja
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="txtConfirmPassword" minlength="8" class="form-control" name="password_confirmation">
                    <span class="text-primary">*</span>) Apabila password tidak diganti kosongkan saja
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="entry_year">Tahun Masuk<span class="text-danger">*</span></label>
                            <input type="number" value="{{$profile->entry_year}}" min="2000" max="9999" class="form-control" name="entry_year" required placeholder="YYYY">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="graduation_year">Tahun Lulus<span class="text-danger">*</span></label>
                            <input type="number" value="{{$profile->graduation_year}}" min="2000" max="9999" class="form-control" name="graduation_year" required placeholder="YYYY">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="birth_place_id">Tempat Lahir</label>
                            <select name="birth_place_id" id="pilihKabupatenKota" class="form-control select2" style="width: 100%;">
                                <option value="">Pilih Kabupaten/Kota</option>
                                @foreach($regencies as $data)
                                <option value="{{$data->id}}" @if ($data->id == $profile->birth_place_id)
                                    selected
                                    @endif
                                    >{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="birth_date">Tanggal Lahir</label>
                            <input type="date" value="{{$profile->birth_date}}" class="form-control" name="birth_date">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone_number">Nomor Telepon</label>
                    <input type="number" value="{{$profile->phone_number}}" class="form-control" name="phone_number">
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text" value="{{$profile->address}}" class="form-control" name="address">
                </div>
                <button type="submit" id="btnSubmit" class="btn btn-success">Simpan</button>
                <a href="/profile" class="btn btn-warning">Batal</a>

            </form>
            <strong class="float-right"><span class="text-danger">*</span>) Harus diisi.</strong>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Select2 -->
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#pilihKabupatenKota').select2();
    });
</script>
<script type="text/javascript">
    bsCustomFileInput.init();
    $(function() {
        $("#btnSubmit").click(function() {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>
@endsection