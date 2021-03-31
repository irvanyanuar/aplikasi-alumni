@extends('template.master')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Admin</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('user.admin.index')}}">Admin</a></li>
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
            <form action="{{route('user.admin.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Admin <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="photo">Foto</label>
                    <div class="form-group">
                        <!-- <label for="customFile">Custom File</label> -->
                        <div class="custom-file">
                            <input type="file" accept=".jpg,.jpeg,.png" class="custom-file-input" id="customFile" name="photo">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <span>(Foto minimal 500&times;500 piksel berekstensi .jpg, .jpeg, atau .png )</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <input type="password" id="txtPassword" minlength="8" class="form-control" name="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password <span class="text-danger">*</span></label>
                    <input type="password" id="txtConfirmPassword" minlength="8" class="form-control" name="password_confirmation" required>
                </div>
                <div class="form-group">
                    <button type="submit" id="btnSubmit" class="btn btn-success">Simpan</button>
                    <a href="/user/admin" class="btn btn-warning">Batal</a>
                </div>
            </form>
            <strong class="float-right"><span class="text-danger">*</span>) Harus diisi.</strong>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- bs-custom-file-input -->
<script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<script type="text/javascript">
    $(function() {
        bsCustomFileInput.init();

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