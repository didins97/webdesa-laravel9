@extends('BE.app')

@section('css')
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>
@endsection

@section('header','Profil Desa')

@section('content')
<div class="card">
    <div class="card-body">
        <ul class="nav nav-pills" id="myTab3" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab"
                    aria-controls="home" aria-selected="false">Sejarah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab"
                    aria-controls="profile" aria-selected="false">Visi dan Misi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link show" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab"
                    aria-controls="contact" aria-selected="true">Struktural</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent2">

            <div class="tab-pane fade active show" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                <div class="clearfix mb-3">
                    <button href="#" class="btn btn-icon icon-left btn-primary float-right" data-toggle="modal"
                        data-target="#exampleModal1">
                        <i class="far fa-edit"></i> Edit
                    </button>
                </div>
                {!! $profile->sejarah_desa !!}
            </div>
            <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                <div class="clearfix mb-3">
                    <button href="#" class="btn btn-icon icon-left btn-primary float-right" data-toggle="modal"
                        data-target="#exampleModal2">
                        <i class="far fa-edit"></i> Edit
                    </button>
                </div>
                <h5>Visi</h5>
                {!! $profile->visi !!}
                <h5 class="mt-3">Misi</h5>
                {!! $profile->misi !!}
            </div>
            <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                <div class="clearfix mb-3">
                    <button href="#" class="btn btn-icon icon-left btn-primary float-right" data-toggle="modal"
                        data-target="#exampleModal3">
                        <i class="far fa-edit"></i> Edit
                    </button>
                </div>
                <div class="text-center">
                    <img class="img-fluid"
                        src="{{ asset('storage/assets/struktur/'.$profile->struktural) }}"
                        width="75%" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<!-- Modal -->
<form action="{{ route('profile.update',$profile->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PATCH')
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea id="editor" name="sejarah_desa">{!!$profile->sejarah_desa!!}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Visi</h5>
                    <textarea id="editor1" name="visi">{!!$profile->visi!!}</textarea>
                    <h5>Misi</h5>
                    <textarea id="editor2" name="misi">{!!$profile->misi!!}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Struktural Desa</label>
                        <input type="file" class="form-control" data-preview=".preview" name="struktural">
                        <div class="row">
                            <div class="col-lg-12 text-center mt-2">
                                <img class="img-fluid preview"
                                    src="https://ami-sni.com/wp-content/themes/consultix/images/no-image-found-360x250.png"
                                    width="350px" />
                            </div>
                        </div>
                        @error('gambar_artikel')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script src="{{ asset('assets/backend') }}/js/page/features-post-create.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#editor1'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#editor2'))
        .catch(error => {
            console.error(error);
        });

        $(function () {
        $("input[data-preview]").change(function () {
            var input = $(this);
            var oFReader = new FileReader();
            oFReader.readAsDataURL(this.files[0]);
            oFReader.onload = function (oFREvent) {
                $(input.data('preview')).attr('src', oFREvent.target.result);
            };
        });
    })

</script>
@endpush
