@extends('BE.app')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
@endsection

@section('header', 'Pengguna')

@section('content')
<!-- Button trigger modal -->
<div class="card">
    <div class="card-header">
      <h4>Daftar Pengguna</h4>
      <div class="card-header-action">
        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
            Tambah Pengguna
        </button>
      </div>
    </div>
    <div class="card-body">
        <table class="table" id="example">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <th>
                        <figure class="avatar mr-2">
                            @if ($user->photo_path != null)
                                <img src="{{ asset('storage/'.$user->photo_path) }}" alt="">
                            @else
                                <img src="{{ asset('assets/backend') }}/img/avatar/avatar-5.png" alt="...">
                            @endif
                        </figure>
                        {{$user->name}}
                    </th>
                    <td>{{$user->username}}</td>
                    <td>
                        @if ($user->role == 'admin')
                        <span class="badge badge-primary">Admin</span>
                        @else
                        <span class="badge badge-warning">Operator</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary">View</a>
                        <a href="#" class="btn btn-danger delete" data-id="{{ $user->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
@endsection

@section('modal')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                    <div class="form-group">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlInput1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleFormControlInput1">
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleFormControlInput1">
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Role</label>
                    <select class="form-control" name="role" id="exampleFormControlSelect1">
                        <option value="operator">Operator</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('role')
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
    $('.delete').click(function (e) {
        let id = $(this).data('id');
        console.log(id);
        $.ajax({
            type: "DELETE",
            url: `/admin/user/${id}`,
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

    });

    $(document).ready(function () {
        $('#example').DataTable();
    });

</script>

@endpush
