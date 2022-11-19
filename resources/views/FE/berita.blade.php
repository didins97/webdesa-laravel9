@extends('FE.app')

@section('content')
 <!-- Page Content-->
 <section class="page-header" style="background-image: url( {{ asset('assets/images/berita.jpg') }});background-size: cover;background-position: center;">
    <div class="container">
        <h2>Berita</h2>
    </div>
</section>
<!-- Blog preview section-->
<section class="py-5">
    <div class="container px-5 my-5">
        @if ($berita->count() < 1)
            <h3 class="text-center">Maaf, saat ini belum ada berita yang tersedia</h3>
        @else
        <h2 class="fw-bolder fs-5 mb-4">Daftar Berita</h2>
        <div class="row gx-5">
            @foreach ($berita as $item)
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">
                    <img class="card-img-top" src="{{ asset('storage/assets/artikel/thumbnail/' . $item->gambar_artikel) }}" alt="..." />
                    <div class="card-body p-4">
                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y'); }}</div>
                        <a class="text-decoration-none link-dark stretched-link" href="{{ route('berita.detail', $item->slug_artikel) }}"><div class="h5 card-title mb-3">{{$item->judul_artikel}}</div></a>
                        <p class="card-text mb-0">{!! Str::limit($item->isi_artikel, 100) !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {!! $berita->links() !!}
        </div>
        @endif
    </div>
</section>
@endsection
