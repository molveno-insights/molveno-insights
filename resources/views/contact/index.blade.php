@extends('layout.adminbase')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Customer Service</li>
                <li class="breadcrumb-item active" aria-current="page">Enquiries</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-header clearfix">
            <h2 class="float-left">Enquiries</h2>
            
            </div>
            <div class="card-body">
     
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Subject</th>
                        <th>Roomnumber</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($contactList as $contact)
                    <tr>
                        <td><a href="{{ route('contact.show', [$contact->id]) }}">{{ $contact->topic }}</a></td>
                        <td><a href="{{ route('contact.show', [$contact->id]) }}">{{ $contact->guest->roomnumber }}</a></td>
                        <td class="deleteContact"><a href="{{ route('contact.delete', [$contact->id]) }}" class="hover"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
          
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
