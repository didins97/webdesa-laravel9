<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Desa Mallasoro Jeneponto</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/Logo_jeneponto.png') }}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->

        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />


        <link href="{{ asset('assets') }}/css/styles.css" rel="stylesheet" />
        <link href="{{ asset('assets') }}/css/custom.css" rel="stylesheet" />
        <link href="{{ asset('assets') }}/css/animate.css" rel="stylesheet" />
        @yield('css')
    </head>
    <body class="d-flex flex-column h-100" id="page-top">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
                <div class="container px-4 px-lg-5">
                    <a class="navbar-brand" href="/"><img src="{{ asset('assets/images/Logo_jeneponto.png') }}" alt="logo" style="height: 100%">Desa Mallasoro</a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ms-auto my-2 my-lg-0">
                            <li class="nav-item"><a class="nav-link {{Request::segment(1) == '' ? 'active' : ''}}" href="{{ route('beranda.index') }}">Beranda</a></li>
                            <li class="nav-item"><a class="nav-link {{Request::segment(1) == 'berita' ? 'active' : ''}}" href="{{ route('berita.index') }}">Berita</a></li>
                            <li class="nav-item"><a class="nav-link {{Request::segment(1) == 'potensi' ? 'active' : ''}}" href="{{ route('potensi.index') }}">Potensi</a></li>
                            <li class="nav-item"><a class="nav-link {{Request::segment(1) == 'produk' ? 'active' : ''}}" href="{{ route('produk.list') }}">Produk</a></li>
                            <li class="nav-item"><a class="nav-link {{Request::segment(1) == 'tentang' ? 'active' : ''}}" href="{{ route('tentang.index') }}">Tentang</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
        </main>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; KKNT UNIVERSITAS ISLAM MAKASSAR 2022</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('assets') }}/js/scripts.js"></script>
        @stack('scripts')
    </body>
</html>


