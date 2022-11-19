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
 <section class="page-header" style="background-image: url( {{ asset('assets/images/potensi.jpg') }});background-size: cover;background-position: center;">
    <div class="container">
        <h2>Produk Desa</h2>
    </div>
</section>

<section class="py-5">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
        </div>
        <div class="row gx-5">
            <header class="mb-4">
                <!-- Post title-->
                <h1 class="fw-bolder mb-1">{{$produk->nama}}</h1>
                <!-- Post meta content-->
                <div class="text-muted fst-italic mb-2">{{ \Carbon\Carbon::parse($produk->created_at)->isoFormat('D MMMM Y'); }}</div>
            </header>
            <div class="col-12"><img class="img-fluid rounded-3 mb-5" src="{{ asset('storage/assets/produk/thumbnail/'.$produk->gambar) }}" alt="..."></div>
            <!-- Post content-->
            <section class="mb-5">
                {!! $produk->keterangan !!}
            </section>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.2/dist/index.bundle.min.js"></script>
@endsection
