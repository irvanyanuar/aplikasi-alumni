@extends('template.master')

@section('header')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Sekolah/Perguruan Tinggi</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Sekolah/Perguruan Tinggi</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
@if(Session::has('pesan'))
<div class="alert alert-success">
    <a href="#" class="close text-decoration-none" data-dismiss="alert" aria-label="close">&times;</a>
    {{Session::get('pesan')}}
</div>
@endif
<div class="col-12">
    <!-- /.card -->
    <div class="card card-info card-outline">
        <div class="card-header">
            <h4><i class="nav-icon fa fa-university fa-xs"></i> Data Sekolah/Perguruan Tinggi
                <div class="float-right">
                    <a href="{{ route('college.create') }}" class="btn btn-primary mb-3 btn-sm">
                        <i class="fa fa-plus fa-xs"></i> Tambah Data</a>
                </div>
            </h4>

        </div>
        <!-- /.card-header -->
        <div class="card-body">

            @include('college.table')

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <div class="float-right">* Tambah data sekolah/perguruan tinggi jika tidak ada di dalam daftar</div>
        </div>
    </div>
    <!-- /.card -->
</div>
@endsection

@section('script')
<!-- DataTables  & Plugins -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- Page specific script -->
<script>
    $(function() {
        $("#collegeTable").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#collegeTable_wrapper .col-md-6:eq(0)');
    });
</script>

@endsection