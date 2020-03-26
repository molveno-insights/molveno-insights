@extends('layout.adminbase')

@section('content')
<div>
    <h2 class="display-4">Enquiries</h2>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="GET" class="form-inline d-flex justify-content-center md-form form-sm active-cyan active-cyan-2 mt-2">
                @csrf
                <i class="fas fa-search" aria-hidden="true"></i>
                <input id="search" class="form-control form-control-sm ml-3 w-75" placeholder="Search" aria-label="Search" type="text" name="search">
            </form>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Topic</th>
                        <th>Roomnumber</th>
                        <th>Text</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($contactList as $contact)
                    <tr>
                        <td>{{ $contact->topic }}</td>
                        <td>{{ $contact->roomnumber}}</td>
                        <td>{{ $contact->text}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $contactList->links() }}
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
