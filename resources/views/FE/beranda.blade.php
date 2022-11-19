@extends('FE.app')

@section('css')
<link href="{{ asset('assets') }}/css/animate.css" rel="stylesheet" />

<style>
    .page-section {
        padding: 8rem 0;
    }

    .modal-dialog {
        max-width: 800px;
        margin: 30px auto;
    }

    .modal-body {
        position: relative;
        padding: 0px;
    }

    .btn-close {
        position: absolute;
        right: -30px;
        top: 0;
    }

</style>
@endsection

@section('content')
<!-- Header-->
<!-- Masthead-->
<header class="masthead">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="text-white font-weight-bold">Desa Mallasoro</h1>
                <hr class="divider" />
                <p class="text-white-75 mb-4">Website Desa Mallasoro Kecamatan Bangkala Kabupaten Jeneponto</p>
            </div>
        </div>
    </div>
</header>
<!-- About section one-->
<section class="py-5" id="scroll-target">
    <div class="container px-5 my-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6"><img
                    class="img-fluid rounded mb-5 mb-lg-0 shadow-lg p-3 mb-5 bg-body rounded wow fadeInUp"
                    src="{{ asset('assets/images/kades.png') }}" alt="..." /></div>
            <div class="col-lg-6 wow slideInRight">
                <h2 class="fw-bolder">Andi Rudi SE KR Gatta</h2>
                <p>Kepala Desa</p>
                <hr class="card-hr">
                <p class="lead fw-normal text-muted mb-0">Assalamu Alaikum,Selamat Datang di Website Desa Mallasoro,
                    Jeneponto.Semoga informasi yang ada di website ini dapat memberikan pencerahan & juga sebagai
                    tanggungjawab kepada masyarakat Desa Mallasoro. </p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container px-5 my-5">
        <h2 class="fw-bolder">Profil Desa Mallasoro</h2>
        <hr class="card-hr mb-3">
        <div class="ratio ratio-16x9">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/sf68NIxw6UM?start=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
    </div>
</section>

@if ($berita_terbaru->count() > 0)
<section class="py-5 bg-light">
    <div class="container px-5">
        <h2 class="fw-bolder">Berita Terbaru</h2>
        <hr class="card-hr mb-3">
        <div class="row gx-5">
            @foreach ($berita_terbaru as $item)
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">
                    <img class="card-img-top" src="{{ asset('storage/assets/artikel/thumbnail/' . $item->gambar_artikel) }}" alt="..." />
                    <div class="card-body p-4">
                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                            {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y'); }}</div>
                        <a class="text-decoration-none link-dark stretched-link"
                            href="{{ route('berita.detail', $item->slug_artikel) }}">
                            <div class="h5 card-title mb-3">{{$item->judul_artikel}}</div>
                        </a>
                        <p class="card-text mb-0">{!! Str::limit($item->isi_artikel, 100) !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-end mb-5 mb-xl-0">
            <a class="text-decoration-none next-text" href="{{ route('berita.index') }}">
                Lihat Semua
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endif

<section class="contact-section bg-black">
    <div class="container px-4 px-lg-5">
        <div class="title-white">
            <h3>Hubungi Kami</h3>
            <hr>
        </div>
        <div class="row gx-4 gx-lg-5 wow fadeInUpBig">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-geo-alt-fill mb-2" style="color: #f4623a"></i>
                        <h4 class="text-uppercase m-0">Address</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="small text-black-50">{{$profile->alamat}}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-envelope mb-2" style="color: #f4623a"></i>
                        <h4 class="text-uppercase m-0">Email</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="small text-black-50"><a href="#!" style="color: #f4623a">{{$profile->email}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-phone mb-2" style="color: #f4623a"></i>
                        <h4 class="text-uppercase m-0">Phone</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="small text-black-50">+62{{$profile->contact_center}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="social d-flex justify-content-center">
            <a class="mx-2" href="https://www.instagram.com/{{$profile->instagram}}"><i class="bi bi-instagram"></i></a>
            <a class="mx-2" href="https://www.facebook.com/{{$profile->facebook}}"><i class="bi bi-facebook"></i></i></a>
            <a class="mx-2" href="https://www.youtube.com/{{$profile->youtube}}"><i class="bi bi-youtube"></i></a>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">


            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></span>
                </button>
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always"
                        allow="autoplay"></iframe>
                </div>


            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets') }}/js/wow.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script>
    new WOW().init();

    $(document).ready(function () {

        // Gets the video src from the data-src on each button

        var $videoSrc;
        $('.video-btn').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);



        // when the modal is opened autoplay it
        $('#myModal').on('shown.bs.modal', function (e) {

            // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })



        // stop playing the youtube video when I close the modal
        $('#myModal').on('hide.bs.modal', function (e) {
            // a poor man's stop video
            $("#video").attr('src', $videoSrc);
        })






        // document ready
    });

</script>
@endpush
