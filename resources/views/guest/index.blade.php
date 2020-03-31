@extends('layout.adminbase')

@section('content')
<div>
    <h2 class="display-4">Guests</h2>
    <div class="row">
        <div class="col-md-12">
            <a type="button" class="btn btn-info" href="{{ route('guest.create') }}" style="margin-bottom: 20px;">Add guest</a>
            <form action="" method="GET" class="form-inline d-flex justify-content-center md-form form-sm active-cyan active-cyan-2 mt-2">
                @csrf
                <i class="fas fa-search" aria-hidden="true"></i>
                <input id="search" class="form-control form-control-sm ml-3 w-75" placeholder="Search" aria-label="Search" type="text" name="search">
            </form>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Roomnumber</th>
                        <th>name</th>
                        <th>surname</th>
                        <th>email</th>
                        <th>phonenumber</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($guestList as $guest)
                    <tr>
                        <td>{{ $guest->roomnumber }}</td>
                        <td>{{ $guest->name }}</td>
                        <td>{{ $guest->surname }}</td>
                        <td>{{ $guest->email }}</td>
                        <td>{{ $guest->phonenumber }}</td>

                        <td><a href="{{ route('guest.edit', [$guest->id]) }}" class="hover"><i class="fas fa-edit"></i></a></td>
                        <td class="deleteGuest"><a href="{{ route('guest.delete', [$guest->id]) }}" class="hover"><i class="fas fa-trash-alt"></i></a></td>


                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $guestList->links() }}
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="categoryDeleteConfirm">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Media</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete this video?</p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary categoryDeleteBtn">Confirm Delete</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
@endsection
