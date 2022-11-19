@extends('BE.app')

@section('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>
@endsection

@section('header', 'Tambah Potensi Desa')

@section('content')
<form action="{{ route('potensi_desa.store') }}" method="POST" enctype="multipart/form-data">
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
                  <label for="judulArtikelBahasa" class="form-label">Nama</label>
                  <input required value="{{ old('nama') }}" type="text" name="nama" class="form-control" id="judulArtikelBahasa" placeholder="masukkan nama benda">
                  <p style="color: red"><sup>*</sup> wajib</p>
                </div>
                <div class="mb-3">
                    <label for="">Keterangan</label>
                    <textarea id="editor" name="keterangan">{{ old('keterangan') }}</textarea>
                    <p style="color: red"><sup>*</sup> wajib</p>
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
                    <img class="preview mb-3 text-center" src="https://ami-sni.com/wp-content/themes/consultix/images/no-image-found-360x250.png" width="350"/>
                  </div>
                </div>
                <div class="mb-4">
                  <input required name="thumbnail" class="form-control" id="uploadThumbnail" type="file" data-preview=".preview" accept="image/png, image/jpeg">
                  <p style="color: red"><sup>*</sup> wajib</p>

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
          <div class="col-lg-12 mb-3">
            <div class="card shadow mb-4" id="containerSliderFoto">
              <div class="card-header">
                <h4>Galleri</h4>
                <div class="card-header-action">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalPanduan">
                        <i class="fa fa-book"></i> Panduan
                    </button>
                </div>
              </div>
              <div class="card-body row" id="fotoSliderBody">
                <div class="col-md-12 wrapper-foto-slider mb-3">
                  <div class="row">
                    <div class="col-sm-4">
                      <img class="sliderPreview" src="https://ami-sni.com/wp-content/themes/consultix/images/no-image-found-360x250.png" width="100%">
                    </div>
                    <div class="col-sm-7">
                      <div class="row">
                        <div class="col-12 mb-2">
                          <input required class="form-control" name="galleries_foto[]" id="uploadThumbnail" type="file" data-preview=".sliderPreview" accept="image/png, image/jpeg">
                        <p style="color: red"><sup>*</sup> wajib</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <button type="button" class="btn btn-danger btn-hapus-foto" disabled="">
                        <i class="fa fa-trash-alt"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-center">
                <button type="button" class="btn btn-primary" id="tambahFoto">
                  <i class="fa fa-plus"></i> Tambah Foto
                </button>
              </div>
            </div>
          </div>
         </div>
         <div id="fotoSlider" class="col-lg-12 mb-3" style="display: none;">
          <div class="card shadow mb-4">
           <div class="card-header py-3">
             <h2 class="m-0 font-weight-bold text-gray-800 sub-judul">Foto Slider</h2>
           </div>
           <div class="card-body ">
             <div class="row">
               <div class="col-lg-12 text-center">
                 <img class="foto-slider preview mb-3 text-center" src="https://ami-sni.com/wp-content/themes/consultix/images/no-image-found-360x250.png" />
               </div>
             </div>
             <div class="mb-4">
               <input class="form-control" name="slider" id="uploadSlider" type="file" data-preview=".foto-slider" accept="image/png, image/jpeg" >
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

@section('modal')
    <!-- Panduan Modal -->
    <div class="modal fade" id="modalPanduan" tabindex="-1" aria-labelledby="modalPanduanLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalPanduanLabel">Panduan Pengunggahan Gambar Slider</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <ol>
                <li>Resolusi gambar yang di unggah, <b>1280 x 720</b></li>
                <li>Ukuran gambar tidak lebih dari <b>1 Mb</b></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('scripts')
<script>
    var i = 1;
      var x = 1;
      $("#tambahFoto").click(function() {
        i++;
        if (x < 100) {
          x++;
          document.querySelector('#fotoSliderBody').insertAdjacentHTML(
            'beforeend',
            `<div class="col-md-12 wrapper-foto-slider mb-3" data-id="` + i + `">
                <div class="row">
                  <div class="col-sm-4">
                    <img src="https://ami-sni.com/wp-content/themes/consultix/images/no-image-found-360x250.png" width="100%" class="sliderPreview` + i + `" name="preview-slider` + i + `">
                  </div>
                  <div class="col-sm-7">
                    <div class="row">
                      <div class="col-12 mb-2">
                        <input required class="form-control" name="galleries_foto[]" id="uploadThumbnail" type="file" data-preview=".sliderPreview` + i + `" accept="image/png, image/jpeg">
                        <p style="color: red"><sup>*</sup> wajib</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <button class="btn btn-danger btn-hapus-foto" data-id="` + i + `">
                      <i class="fa fa-trash-alt"></i>
                    </button>
                  </div>
                </div>
              </div>`
          )

          sliderPreview();
        } else {
          alert("Sudah melebihi batas")
        }
        console.log(x);


      });

      $('#fotoSliderBody').on('click', '.btn-hapus-foto', function(e) {
        x--;
        console.log(x);
        let id = $(this).data('id');
        // alert(id);
        $('.wrapper-foto-slider[data-id="' + id + '"]').remove();
      });
      </script>
      <script>
        $(function() {
          $("input[data-preview]").change(function() {
            var input = $(this);
            var oFReader = new FileReader();
            oFReader.readAsDataURL(this.files[0]);
            oFReader.onload = function(oFREvent) {
              $(input.data('preview')).attr('src', oFREvent.target.result);
            };
          });
        });

        function sliderPreview() {
          if(x > 1) {
            $('#fotoSliderBody').find('.wrapper-foto-slider').each(function(i, v) {
              let id = $(this).data('id');
              // $('.sliderPreview' + id).attr('src', "{{ asset('assets/admin/img/noimage.jpg') }}");
              $("input[data-preview='.sliderPreview" + id + "']").change(function() {
                var input = $(this);
                var oFReader = new FileReader();
                oFReader.readAsDataURL(this.files[0]);
                oFReader.onload = function(oFREvent) {
                  $(input.data('preview')).attr('src', oFREvent.target.result);
                };
              });
            });
          }
        }

        ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

      </script>
@endpush
