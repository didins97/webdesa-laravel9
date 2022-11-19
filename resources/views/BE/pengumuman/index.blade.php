@extends('BE.app')

@section('header', 'Pengumuman Desa')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Daftar Pengumuman</h4>
        @if ($pengumuman->count() < 1) <div class="card-header-action">
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                data-target="#exampleModal">
                Tambah Penumuman
            </button>
    </div>
    @endif
</div>
<div class="card-body">
    <table class="table" id="example">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Penulis</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengumuman as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$item->nama}}</td>
                <td>{{$item->user->name}}</td>
                <td>
                    <a class="dropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="fas fa-ellipsis-h"></i>
                    </a>
                    <!--Menu-->
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">Preview</a></li>
                        <li><a class="dropdown-item edit" href="javascript:void(0)" data-id="{{$item->id}}">Edit</a>
                        </li>
                        <li><a class="dropdown-item delete" href="javascript:void(0)"
                                data-id="{{ $item->id }}">Hapus</a></li>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection

@section('modal')
<!-- Modal Add -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleFormControlInput1">
                        <little><sup>*</sup> wajib</little>
                        @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Gambar</label>
                        <input required name="gambar" class="form-control" id="uploadThumbnail" type="file"
                            accept="image/png, image/jpeg">
                        <little><sup>*</sup> wajib</little>
                        @error('gambar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="editor" cols="30" rows="10"></textarea>
                        <little><sup>*</sup> wajib</little>
                        @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pengumuman.update') }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PATCH')
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama">
                        <little><sup>*</sup> wajib</little>
                        @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Gambar</label>
                        <input name="gambar" class="form-control" id="uploadThumbnail" type="file"
                            accept="image/png, image/jpeg">
                        <little><sup>*</sup> wajib</little>
                        @error('gambar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="editor">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
                        <little><sup>*</sup> wajib</little>
                        @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $('.delete').click(function () {
            var id = $(this).data('id');
            swal("Apakah anda yakin untuk menghapusnya?", {
                buttons: ["Tidak!", "Ya!"],
                dangerMode: true,
                // check apakah button ya di klik
                closeOnClickOutside: false,
            }).then((value) => {
                if (value) {
                    // console.log('delete');
                    $.ajax({
                        url: `/admin/pengumuman/${id} `,
                        type: 'DELETE',
                        data: {
                            _token: '{{csrf_token()}}'
                        },
                        success: function (response) {
                            swal("Berhasil dihapus!", {
                                icon: "success",
                            });
                            location.reload();
                        }
                    });
                }
            })
        });

        $('.edit').click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: `/admin/pengumuman/${id}/edit`,
                type: "GET",
                success: function (data) {
                    $('#id').val(data.id);
                    $('#nama').val(data.nama);
                    $('#keterangan').html(data.keterangan);
                    $('#modal-edit').modal('show');
                }
            });
        });

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
