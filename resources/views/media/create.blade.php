@extends('layout.base')

@section('content')
<div class="ml-8 mr-8">
    <div class="text-center">
        <br>
        <br>
        <h2>Create Media</h2>
    </div>
    <form class="col-8 mx-auto" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">name:</label>
            <input id="name" class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
            <label for="category">category:</label>
            <input id="category" class="form-control" type="text" name="category">
        </div>
        <div class="form-group">
            <label for="added_by">added by:</label>
            <input id="added_by" class="form-control" type="text" name="added_by">
        </div>
        <div class="form-group">
            <label for="url">url:</label>
            <input id="url" class="form-control" type="text" name="url">
        </div>
        <div class="form-group">
            <label for="forchildren">urlforchildren:</label>
            <input id="forchildren" class="form-control" type="checkbox" name="forchildren" value="1">
        </div>
            <div class="form-group">
            <button class="btn primary-btn">Create Media</button>
        </div>
    </form>
</div>
@endsection

