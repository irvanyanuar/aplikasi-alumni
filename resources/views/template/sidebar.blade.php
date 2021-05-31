<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('assets/img/logo-taruna.png')}}" alt="AdminLTE Logo" class="brand-image " style="opacity: .8">
        <span class="brand-text font-weight-light">Aplikasi Alumni</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if(Auth::check())
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/img/foto-profil/'.Auth::user()->photo)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}<br>({{Auth::user()->level}})</a>
            </div>
        </div>
        @endif

        <hr>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('alumni')}}" class="nav-link">
                        <i class="fas fa-user-graduate nav-icon"></i>
                        <p>Data Alumni</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Statistik Alumni
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{route('statistik.pertahun')}}" class="nav-link">
                                <i class="nav-icon fas fa-graduation-cap text-warning"></i>
                                <p>Statistik Per Tahun</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('statistik.perguruan.tinggi')}}" class="nav-link">
                                <i class="nav-icon fas fa-university text-primary"></i>
                                <p>
                                    Statistik Perguruan Tinggi
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                @if(Auth::check())
                <li class="nav-header">Manajemen Master Data</li>
                @else
                <hr>
                @endif
                @if(Auth::check())
                @if(Auth::user()->level == 'admin')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{route('user.alumni.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-address-card text-success"></i>
                                <p>
                                    Data User Alumni
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.admin.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-users-cog text-warning"></i>
                                <p>Data Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @endif

                <li class="nav-item">
                    <a href="{{route('college.index')}}" class="nav-link">
                        <i class="fas fa-university nav-icon"></i>
                        <p>Data Sekolah & Kampus</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('regency.index')}}" class="nav-link">
                        <i class="fas fa-city nav-icon"></i>
                        <p>Data Kabupaten/Kota</p>
                    </a>
                </li>

                @if(Auth::check())
                @if(Auth::user()->level == 'alumni')
                <li class="nav-header">Profil</li>
                <li class="nav-item">
                    <a href="{{route('profile.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profil User
                            <!-- <i class="right fas fa-angle-left"></i> -->
                        </p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button onclick="return confirm('Yakin akan logout?')" class="nav-link btn btn-flat"><i class="fas fa-sign-out-alt nav-icon"></i> Logout</button>
                    </form>
                </li>
                @endif

                @if(!Auth::check())
                <hr>
                <li class="nav-item">
                    <form action="/login" method="GET">
                        <button type="submit" class="nav-link btn btn-flat"><i class="fas fa-sign-in-alt nav-icon"></i> Login</button>
                    </form>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>