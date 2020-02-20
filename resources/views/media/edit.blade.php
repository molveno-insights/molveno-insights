@extends('layout.adminbase')

@section('content')
<div>
    <h2>Edit Media</h2>
    <form class="col-8 mx-auto" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">name:</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ $media->name }}">
        </div>
        <div class="form-group">
            <label for="category">category:</label>
            <input id="category" type="text" class="form-control" name="category" value="{{ $media->category }}">
        </div>
        <div class="form-group">
            <label for="added_by">added by:</label>
            <input id="added_by" type="text" class="form-control" name="added_by" value="{{ $media->added_by }}">
        </div>
        <div class="form-group">
            <label for="url">url:</label>
            <input id="url" type="text" class="form-control" name="url" value="{{ $media->url }}">
        </div>
        <div class="form-group">
            <label for="forchildren">urlforchildren:</label>
            <input id="forchildren" type="checkbox" class="form-control" name="forchildren" @if ($media->forchildren)checked @endif><br>
        </div>
        <button>Modify Media</button>
    </form>
</div>
@endsection
