@extends('BE.app')

@section('content')
<div class="container-fluid mb-4">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengaturan</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pengaturan.update', $set->id) }}" method="POST">
                @csrf @method('PATCH')
                <h5>Media Sosial</h5>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Instagram</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">instagram.com/</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Username" required="" name="instagram"
                                value="{{$set->instagram}}" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Youtube</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">youtube.com/channel/</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Channel" required="" name="youtube"
                                value="{{$set->youtube}}" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Facebook</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">facebook.com/</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Username" required="" name="facebook"
                                value="{{$set->facebook}}" autocomplete="off">
                        </div>
                    </div>
                </div>

                <hr>

                <h5>Kontak</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cs">Contact Center</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">+62</span>
                                </div>
                                <input type="text" class="form-control" id="cs" name="contact_center"
                                    value="{{$set->contact_center}}" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="merchandise">Produk</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">+62</span>
                                </div>
                                <input type="text" class="form-control" id="merchandise" name="produk"
                                    value="{{$set->produk}}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$set->email}}"
                                autocomplete="off">
                        </div>
                    </div>
                </div>

                <hr>

                <h5>Alamat</h5>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="alamat" rows="3" required=""
                            name="alamat">{{$set->alamat}}</textarea>
                    </div>
                </div>

                <button class="btn btn-primary mt-4 float-right">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
