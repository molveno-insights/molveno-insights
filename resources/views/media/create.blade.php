@extends('layout.adminbase')

@section('content')
<div class="ml-8 mr-8">
    <div class="text-center">
        <h2>Create Media</h2>
    </div>
    <form class="col-8 mx-auto" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input id="name" class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <input id="category" class="form-control" type="text" name="category">
        </div>
        <div class="form-group">
            <label for="added_by">Added by:</label>
            <input id="added_by" class="form-control" type="text" name="added_by">
        </div>
        <div class="form-group">
            <label for="url">Youtube ID:</label>
            <input id="url" class="form-control" type="text" name="url">
        </div>
        <div class="form-group form-check">
            <input id="forchildren" class="form-check-input" type="checkbox" name="forchildren" value="1">
            <label for="forchildren">Suitable for Childeren</label>
        </div>
        <button class="btn btn-primary">Create Media</button>
    </form>
</div>
@endsection

