@extends('layout.adminbase')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Guests</li>
           
            </ol>
        </nav>
        <div class="card">
            <div class="card-header clearfix">
            <h2 class="float-left">Guests</h2>
            
            </div>
            <div class="card-body">
            {{ $guestList->links() }}
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Roomnumber</th>
                        <th>name</th>
                        <th>surname</th>
                        <th>email</th>
                        <th>phonenumber</th>
                        <th></th>
                        <th></th>
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
