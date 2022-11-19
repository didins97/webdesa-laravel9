@extends('FE.app')

@section('css')
<link href="{{ asset('assets') }}/css/animate.css" rel="stylesheet" />
@endsection

@section('content')
<!-- Page Content-->
<section class="page-header"
    style="background-image: url( {{ asset('assets/images/berita.jpg') }});background-size: cover;background-position: center;">
    <div class="container">
        <h2>Tentang</h2>
    </div>
</section>
<section class="py-5 bg-light" id="scroll-target">
    <div class="container px-5 my-5 text-center">
        <h2 class="fw-bolder">Sejarah</h2>
        <hr class="card-hr">
        <section class="mb-5">
            {!! $profile->sejarah_desa !!}
        </section>
    </div>
</section>
<section class="py-3 bg-light" id="scroll-target">
    <div class="container px-5 my-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6 wow slideInLeft">
                <h2 class="fw-bolder">Visi Kami</h2>
                <hr class="card-hr">
                <section class="mb-5">
                    {!! $profile->visi !!}
                </section>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded mb-5 mb-lg-0 shadow-lg"
                    src="{{ asset('assets/images/visi.jpeg') }}"
                    alt="..." />
            </div>
        </div>
    </div>
</section>
<section class="py-3 bg-light" id="scroll-target">
    <div class="container px-5 my-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6 animate__slideInRight">
                <img class="img-fluid rounded mb-5 mb-lg-0 shadow-lg"
                    src="{{ asset('assets/images/misi.jpeg') }}"
                    alt="..." />
            </div>
            <div class="col-lg-6 wow slideInRight">
                <h2 class="fw-bolder">Misi Kami</h2>
                <hr class="card-hr">
                <section class="mb-5">
                    {!! $profile->misi !!}
                </section>
            </div>
        </div>
    </div>
</section>
<section class="py-3 bg-light wow fadeInDown" id="scroll-target">
    <div class="container px-5 my-5 text-center">
        <h2 class="mb-3">Struktur Pemerintahan Desa</h2>
        <img class="img-fluid rounded mb-5 mb-lg-0 shadow-lg"
            src="{{ asset('storage/assets/struktur/'.$profile->struktural) }}"
            alt="..." />
    </div>
</section>
@endsection
@push('scripts')
<script src="{{ asset('assets') }}/js/wow.min.js"></script>

<script>
    new WOW().init();
</script>
@endpush
