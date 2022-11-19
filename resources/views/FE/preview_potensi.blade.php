@extends('FE.app')

@section('content')
 <!-- Page Content-->
 <section class="page-header" style="background-image: url( {{ asset('assets/images/potensi.jpg') }});background-size: cover;background-position: center;">
    <div class="container">
        <h2>Potensi Desa</h2>
    </div>
</section>

<section class="py-5">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
        </div>
        <div class="row gx-5">
            <header class="mb-4">
                <!-- Post title-->
                <h1 class="fw-bolder mb-1">{{$potensi->nama}}</h1>
                <!-- Post meta content-->
                <div class="text-muted fst-italic mb-2">{{ \Carbon\Carbon::parse($potensi->created_at)->isoFormat('D MMMM Y'); }}</div>
                <!-- Post categories-->
                <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
            </header>
            <div class="col-12"><img class="img-fluid rounded-3 mb-5" src="{{ asset('storage/assets/potensi/thumbnail/'.$potensi->thumbnail) }}" alt="..."></div>
            <!-- Post content-->
            <section class="mb-5">
                {!! $potensi->keterangan !!}
            </section>
        </div>
        <div class="row">
            <h3 class="fw-bolder mb-3">Foto Lainya</h1>
            @for( $i = 0; $i < count(unserialize($potensi->galeri)); $i++ )
            <a href="{{ asset('storage/assets/potensi/galleri/'.unserialize($potensi->galeri)[$i]) }}" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                <img src="{{ asset('storage/assets/potensi/galleri/'.unserialize($potensi->galeri)[$i]) }}" class="img-fluid">
            </a>
            @endfor

        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.2/dist/index.bundle.min.js"></script>
@endsection
