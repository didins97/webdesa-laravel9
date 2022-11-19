@extends('BE.app')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
@endsection

@section('header', 'Berita Desa')

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table" id="example">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Artikel</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artikels as $artikel)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$artikel->judul_artikel}}</td>
                    <td>{{$artikel->user->name}}</td>
                    <td>
                        @if ($artikel->status != true)
                            <a href="javascript:void(0)" class="btn btn-warning btn-sm status" data-id="{{$artikel->id}}">NonAktif</a>
                        @else
                            <a href="javascript:void(0)" class="btn btn-success btn-sm status" data-id="{{$artikel->id}}">Aktif</a>
                        @endif
                    </td>
                    <td>
                        <a class="dropdown" type="button" id="dropdownMenu1" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i>
                        </a>
                        <!--Menu-->
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="">Preview</a></li>
                          <li><a class="dropdown-item" href="{{ route('artikel.edit', $artikel->id) }}">Edit</a></li>
                          <li><a class="dropdown-item delete" href="javascript:void(0)" data-id="{{ $artikel->id }}">Hapus</a></li>
                        </ul>
                      </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
                        url: `/admin/artikel/${id} `,
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

        $('.status').click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                type: "PATCH",
                url: `/admin/artikel/${id}/status`,
                data: { _token: '{{csrf_token()}}' },
                success: function (response) {
                    swal("Status diupdate!", {
                        icon: "success",
                    });
                    location.reload();
                }
            });
        });
    });

    $(document).ready(function () {
        $('#example').DataTable();
    });

</script>
@endpush
