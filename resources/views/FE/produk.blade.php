@extends('FE.app')

@section('css')
    <style>
        .card-body a:hover {
            color: #f4623a;
        }

        .whatshap{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#25d366;
            color:#FFF;
            border-radius:50px;
            text-align:center;
        font-size:30px;
            box-shadow: 2px 2px 3px #999;
        z-index:100;
        }

        .icon-whatsapp{
            margin-top:16px;
        }
    </style>
@endsection

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="whatshap" target="_blank">
<i class="fa fa-whatsapp icon-whatsapp"></i>
</a>

<!-- Page Content-->
<section class="page-header"
    style="background-image: url( {{ asset('assets/images/produk.jpg') }});background-size: cover;background-position: center;">
    <div class="container">
        <h2>Produk Desa</h2>
    </div>
</section>

<!-- Blog preview section-->
<section class="py-5">
    <div class="container px-5 my-5">
        @if ($produks->count() < 1)
            <h3 class="text-center">Maaf, saat ini belum ada produk yang tersedia</h3>
        @else
        <h2 class="fw-bolder fs-5 mb-4">Daftar Produk</h2>
        {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Klik,</strong> tombol whatsapp untuk lanjut konfirm
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> --}}
        <div class="row gx-5">
            @foreach ($produks as $item)
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">
                    <img class="card-img-top" src="{{ asset('storage/assets/produk/thumbnail/'.$item->gambar) }}" alt="..." />
                    <div class="card-body p-4 text-center">
                        <a class="text-decoration-none link-dark stretched-link" href="{{ route('produk.detail', $item->slug) }}"><div class="h5 card-title mb-3">{{$item->nama}}</div></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {!! $produks->links() !!}
        </div>
        @endif
    </div>
</section>

@endsection
