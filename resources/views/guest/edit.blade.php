@extends('layout.adminbase')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('media.index') }}">Media</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Guest</li>
  </ol>
</nav>
<div class="ml-8 mr-8">
    <div class="text-center">
        <h2>Edit Guest</h2>
    </div>
    <form class="col-8 mx-auto" method="POST">
        @csrf
        <div class="form-group">
            <label for="editroomnumber">Roomnumber:</label>
            <input id="editroomnumber" class="form-control" type="text" name="editroomnumber" value="{{ $guests->roomnumber }}">
        </div>
        <div class="form-group">
            <label for="editname">Name:</label>
            <input id="editname" class="form-control" type="text" name="editname" value="{{ $guests->name }}">
        </div>
        <div class="form-group">
            <label for="editsurname">Surname:</label>
            <input id="editsurname" class="form-control" type="text" name="editsurname" value="{{ $guests->surname }}">
        </div>
        <div class="form-group">
            <label for="editemail">Email:</label>
            <input id="editemail" class="form-control" type="email" name="editemail" value="{{ $guests->email }}">
        </div>
        <div class="form-group">
            <label for="editphonenumber">Phonenumber:</label>
            <input id="editphonenumber" class="form-control" type="number" name="editphonenumber" value="{{ $guests->phonenumber }}">
        </div>

        <button class="btn btn-primary">Save Changes</button>
    </form>
</div>

@endsection
