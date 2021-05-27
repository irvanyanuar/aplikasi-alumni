@extends('template.master')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Profil</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('alumni')}}">Data Alumni</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
@if(Session::has('pesan'))
<div class="alert alert-success col-12">
    <a href="#" class="close text-decoration-none" data-dismiss="alert" aria-label="close"> &times;</a>
    {{Session::get('pesan')}}
</div>
@endif

<div class="col">
    <div class="row">
        <div class="col-md-6">
            <!-- Profile Image -->
            <div class="card card-success card-outline">
                <div class="card-header">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('assets/img/foto-profil/'.$profile->photo)}}" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{$profile->name}}</h3>

                    <p class="text-muted text-center">{{$profile->student_number}}</p>
                </div>
                <div class="card-body box-profile">


                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Tahun Masuk</b> <a class="float-right">{{$profile->entry_year}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tahun Lulus</b> <a class="float-right">{{$profile->graduation_year}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tempat Lahir</b> <a class="float-right">{{$profile->birth_place->name}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tanggal Lahir</b> <a class="float-right">{{$profile->birth_date}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Nomor Telepon</b> <a class="float-right">{{$profile->phone_number}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{$profile->email}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Alamat</b> <a class="float-right">{{$profile->address}}</a>
                        </li>
                    </ul>

                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-6">
            <div class="card card-danger card-outline">
                <div class="card-header">
                    <h4 class="mb-3">Riwayat Pendidikan</h4>
                    @if(Auth::check())
                    @if(Auth::user()->id == $profile->id)
                    <div>
                        <a href="{{ route('profile.education.create') }}" class="btn btn-success mb-3 btn-xs">
                            <i class="fa fa-plus fa-sm"></i></a>
                    </div>
                    @endif
                    @endif
                </div>
                <div class="card-body">
                    @include('profile.education_history.table')
                </div>
            </div>

            <div class="card card-info card-outline">
                <div class="card-header">
                    <h4 class="mb-3">Pengalaman Kerja</h4>
                    @if(Auth::check())
                    @if(Auth::user()->id == $profile->id)
                    <div>
                        <a href="{{ route('profile.job.create') }}" class="btn btn-success mb-3 btn-xs">
                            <i class="fa fa-plus fa-sm"></i></a>
                    </div>
                    @endif
                    @endif
                </div>
                <div class="card-body">
                    @include('profile.job.table')
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h4 class="mb-3">Penghargaan/Prestasi</h4>
                    @if(Auth::check())
                    @if(Auth::user()->id == $profile->id)
                    <div>
                        <a href="{{ route('profile.achievement.create') }}" class="btn btn-success mb-3 btn-xs">
                            <i class="fa fa-plus fa-sm"></i></a>
                    </div>
                    @endif
                    @endif
                </div>
                <div class="card-body">
                    @include('profile.achievement.table')
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h4 class="mb-3">Riwayat Organisasi</h4>
                    @if(Auth::check())
                    @if(Auth::user()->id == $profile->id)
                    <div>
                        <a href="{{ route('profile.organization.create') }}" class="btn btn-success mb-3 btn-xs">
                            <i class="fa fa-plus fa-sm"></i></a>
                    </div>
                    @endif
                    @endif
                </div>
                <div class="card-body">
                    @include('profile.organization.table')
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-danger card-outline">
                <div class="card-header">
                    <h4 class="mb-3">Kemampuan/Skills</h4>
                    @if(Auth::check())
                    @if(Auth::user()->id == $profile->id)
                    <div>
                        <a href="{{ route('profile.skill.create') }}" class="btn btn-success mb-3 btn-xs">
                            <i class="fa fa-plus fa-sm"></i></a>
                    </div>
                    @endif
                    @endif
                </div>
                <div class="card-body">
                    @include('profile.skill.table')
                </div>
            </div>
        </div>
    </div>
</div>


@endsection