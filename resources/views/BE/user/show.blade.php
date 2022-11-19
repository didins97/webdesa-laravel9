@extends('BE.app')

@section('header', 'DETAIL USER')

@section('content')
<div class="container">
    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PATCH')
        <div class="row">
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top preview" src="{{asset('storage/'.$user->photo_path)}}"
                        alt="Card image cap">
                    <div class="card-body">
                        <input type="file" class="form-control" name="photo_path" data-preview=".preview">
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf @method('PATCH')
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="name"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Email address</label>
                                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Mobile Number</label>
                                        <input type="text" class="form-control" name="mobile_number"
                                            value="{{ $user->mobile_number }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Address</label>
                                <textarea class="form-control" name="address"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Update Password</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    List Transaksi
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('update.password', $user->id) }}" method="POST">
            @csrf @method('PATCH')
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleFormControlInput1">New Password</label>
                <input type="password" class="form-control" name="address">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection

@push('scripts')

<script>
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
