@extends('FE.app')

@section('css')
<style>
    .container .title {
        color: #1a1a1a;
        text-align: center;
        margin-bottom: 10px;
    }

    .content {
        position: relative;
        /* width: 90%;
  max-width: 400px;
  margin: auto;
  overflow: hidden; */
    }

    .content .content-overlay {
        background: rgba(0, 0, 0, 0.7);
        position: absolute;
        height: 99%;
        width: 100%;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        opacity: 0;
        -webkit-transition: all 0.4s ease-in-out 0s;
        -moz-transition: all 0.4s ease-in-out 0s;
        transition: all 0.4s ease-in-out 0s;
    }

    .content:hover .content-overlay {
        opacity: 1;
    }

    .content-image {
        width: 100%;
    }

    .content-details {
        position: absolute;
        text-align: center;
        padding-left: 1em;
        padding-right: 1em;
        width: 100%;
        top: 50%;
        left: 50%;
        opacity: 0;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        -webkit-transition: all 0.3s ease-in-out 0s;
        -moz-transition: all 0.3s ease-in-out 0s;
        transition: all 0.3s ease-in-out 0s;
    }

    .content:hover .content-details {
        top: 50%;
        left: 50%;
        opacity: 1;
    }

    .content-details h3 {
        color: #fff;
        font-weight: 500;
        letter-spacing: 0.15em;
        margin-bottom: 0.5em;
        text-transform: uppercase;
    }

    .content-details p {
        color: #fff;
        font-size: 0.8em;
    }

    .fadeIn-bottom {
        top: 80%;
    }

    .fadeIn-top {
        top: 20%;
    }

    .fadeIn-left {
        left: 20%;
    }

    .fadeIn-right {
        left: 80%;
    }

</style>
@endsection

@section('content')
<!-- Page Content-->
<section class="page-header"
    style="background-image: url( {{ asset('assets/images/potensi.jpg') }});background-size: cover;background-position: center;">
    <div class="container">
        <h2>Potensi Desa</h2>
    </div>
</section>
<section class="py-5">
    <div class="container px-5 my-5">
        @if ($potensi->count() < 1)
            <h3 class="text-center">Maaf, saat ini belum ada berita yang tersedia</h3>
        @else
            <div class="row gx-5">
                <h2 class="fw-bolder fs-5 mb-4">Daftar Potensi Desa</h2>
                @foreach ($potensi as $item)
                <div class="col-lg-6 mb-4">
                    <div class="content">
                        <a href="{{ route('potensi.detail',$item->slug) }}">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ asset('storage/assets/potensi/thumbnail/'. $item->thumbnail) }}">
                            <div class="content-details fadeIn-bottom">
                                <h3 class="content-title">{{$item->nama}}</h3>
                                <p class="content-text">{!! Str::limit($item->keterangan, 100) !!}</p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {!! $potensi->links() !!}
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
