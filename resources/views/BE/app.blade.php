<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin &mdash; Desa Mallasoro</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/Logo_jeneponto.png') }}" />

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/css/components.css">

    <!-- Custom style CSS -->
    @yield('css')

</head>

<body>

    @include('sweetalert::alert')

    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-backdrop"></div>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/backend') }}/img/avatar/avatar-1.png"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">{{Auth::user()->name}}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html"><img src="{{ asset('assets/images/Logo_jeneponto.png') }}" alt="logo" style="height: 50%; padding-right: 3px">Desa Mallasoro</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">St</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="nav-item {{Request::segment(2) == 'dashboard' ? 'active' : ''}}">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        </li>
                        @if (Auth::user()->role != 'operator')
                        <li class="{{Request::segment(2) == 'user' ? 'active' : ''}}"><a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-users"></i>
                            <span>User</span></a></li>
                        @endif
                        <li class="nav-item dropdown {{Request::segment(2) == 'artikel' ? 'active' : ''}}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="fas fa-folder-open"></i><span>Berita</span></a>
                            <ul class="dropdown-menu" style="display: none;">
                                <li class="{{Request::segment(2) == 'artikel'  && Request::segment(3) == 'create' ? 'active' : ''}}"><a class="nav-link" href="{{ route('artikel.create') }}">Buat Baru</a></li>
                                <li class="{{Request::segment(2) == 'artikel'&& Request::segment(3) == ''  ? 'active' : '' }}"><a class="nav-link" href="{{ route('artikel.index') }}">Daftar Berita</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown {{Request::segment(2) == 'potensi_desa' ? 'active' : ''}}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="fas fa-folder-open"></i><span>Potensi</span></a>
                            <ul class="dropdown-menu" style="display: none;">
                                <li class="{{Request::segment(2) == 'potensi_desa'  && Request::segment(3) == 'create' ? 'active' : ''}}"><a class="nav-link" href="{{ route('potensi_desa.create') }}">Buat Baru</a></li>
                                <li class="{{Request::segment(2) == 'potensi_desa'  && Request::segment(3) == '' ? 'active' : ''}}"><a class="nav-link" href="{{ route('potensi_desa.index') }}">Daftar Potensi</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown {{Request::segment(2) == 'produk' ? 'active' : ''}}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="fas fa-folder-open"></i><span>Produk</span></a>
                            <ul class="dropdown-menu" style="display: none;">
                                <li class="{{Request::segment(2) == 'produk'  && Request::segment(3) == 'create' ? 'active' : ''}}"><a class="nav-link" href="{{ route('produk.create') }}">Buat Baru</a></li>
                                <li class="{{Request::segment(2) == 'produk'  && Request::segment(3) == '' ? 'active' : ''}}"><a class="nav-link" href="{{ route('produk.index') }}">Daftar Produk</a></li>
                            </ul>
                        </li>
                        <li class="{{Request::segment(2) == 'pengumuman' ? 'active' : ''}}"><a class="nav-link" href="{{ route('pengumuman.index') }}"><i class="fas fa-users"></i>
                            <span>Pembritahuan</span></a></li>
                        @if (Auth::user()->role != 'operator')
                        <li class="{{Request::segment(2) == 'profile' ? 'active' : ''}}"><a class="nav-link" href="{{ route('profile.index') }}"><i class="fas fa-address-card"></i>
                            <span>Profil</span></a>
                        </li>
                        <li class=""><a class="nav-link" href="{{ route('pengaturan.index') }}"><i class="fas fa-user-cog"></i>
                            <span>Pengaturan</span></a>
                        </li>
                        @endif
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">

                <section class="section">
                    <div class="section-header">
                        <h1>@yield('header')</h1>
                    </div>

                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>

                @yield('modal')

            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad
                        Nauval Azhar</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('assets/backend') }}/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/backend') }}/js/scripts.js"></script>
    <script src="{{ asset('assets/backend') }}/js/custom.js"></script>

    <!-- Page Specific JS File -->
    @stack('scripts')
</body>

</html>
