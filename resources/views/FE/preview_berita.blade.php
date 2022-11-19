@extends('FE.app')

@section('content')

<section class="page-header"
    style="background-image: url( {{ asset('assets/images/berita.jpg') }});background-size: cover;background-position: center;">
    <div class="container">
        <h2>Berita</h2>
    </div>
</section>
<!-- Page Content-->
<section class="py-5">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-9">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{$berita->judul_artikel}}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">{{ \Carbon\Carbon::parse($berita->created_at)->isoFormat('D MMMM Y'); }}</div>
                        <!-- Post categories-->
                        <!-- Facebook -->
                        <a style="color: #3b5998;" href="#!" role="button"
                        ><i class="fab fa-facebook-f fa-lg"></i
                        ></a>

                        <!-- Twitter -->
                        <a style="color: #55acee;" href="#!" role="button"
                        ><i class="fab fa-twitter fa-lg"></i
                        ></a>

                        <!-- Google -->
                        <a style="color: #dd4b39;" href="#!" role="button"
                        ><i class="fab fa-google fa-lg"></i
                        ></a>

                        <!-- Instagram -->
                        <a style="color: #ac2bac;" href="#!" role="button"
                        ><i class="fab fa-instagram fa-lg"></i
                        ></a>
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded"
                            src="{{ asset('storage/assets/artikel/thumbnail/' . $berita->gambar_artikel) }}" alt="..." /></figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        {!! $berita->isi_artikel !!}
                    </section>
                </article>
            </div>
            <div class="col-lg-3">
                <h2 class="fw-bolder fs-5 mb-4">Berita Terbaru</h2>
                @foreach ($berita_terbaru as $item)
                    <!-- News item-->
                <div class="mb-4">
                    <div class="small text-muted">{{ \Carbon\Carbon::parse($berita->created_at)->isoFormat('D MMMM Y'); }}</div>
                    <a class="link-dark" href="#!">
                        <h5>{!! Str::limit($item->isi_artikel, 100) !!}</h5>
                    </a>
                </div>
                @endforeach
                <div class="text-end mb-5 mb-xl-0">
                    <a class="text-decoration-none next-text" href="#!">
                        Lihat lainya
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
