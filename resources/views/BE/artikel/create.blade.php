@extends('BE.app')

@section('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>
@endsection

@section('header', 'Tambah Berita Desa')

@section('content')

<form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Begin Page Content -->
    <div class="container-fluid" id="contentWrapper">
        <!-- Page Heading -->
        <div class="row">
          <div class="col-lg-12 mb-3">
            <div class="card shadow mb-4">
              @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                  {{ $errors->first() }}
                </div>
              @endif
              <div class="card-body">
                <div class="mb-3">
                  <label for="judulArtikelBahasa" class="form-label">Judul Berita</label>
                  <input required value="{{ old('judul_artikel') }}" type="text" name="judul_artikel" class="form-control" id="judulArtikelBahasa" placeholder="masukkan nama benda">
                  <little><sup>*</sup> wajib</little>
                </div>
                <div class="mb-3">
                    <label for="">Keterangan</label>
                    <textarea id="editor" name="isi_artikel">{{ old('isi_artikel') }}</textarea>
                  <little><sup>*</sup> wajib</little>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 mb-3">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h4>Thumbnail</h4>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-lg-12 text-center">
                    <img class="preview mb-3 text-center" src="https://ami-sni.com/wp-content/themes/consultix/images/no-image-found-360x250.png" width="350px"/>
                  </div>
                </div>
                <div class="mb-4">
                  <input required name="gambar_artikel" class="form-control" id="uploadThumbnail" type="file" data-preview=".preview" accept="image/png, image/jpeg">
                  <little><sup>*</sup> wajib</little>

                </div>
                <div class="mb-3">
                  <h5>Panduan unggah gambar</h5>
                  <ol>
                    <li>Resolusi gambar yang di unggah, <b>1280 x 720</b></li>
                    <li>Ukuran gambar tidak lebih dari <b>1 Mb</b></li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
       </div>
      <div class="col-lg-12 mb-5 text-center">
        <button name="status" value="draft" class="btn btn-lg btn-secondary mr-3">
          Save as Draft
        </button>
        <button name="status" value="publish" class="btn btn-lg btn-success">
          Publish
        </button>
      </div>
        </div>
      </div>
      <!-- /.container-fluid -->
</form>
@endsection

@push('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
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
