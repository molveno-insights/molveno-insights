@extends('layout.adminbase')

@section('content')
<div>
    <h2>Edit Media</h2>
    <form class="col-8 mx-auto" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ $media->name }}">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <input id="category" type="text" class="form-control" name="category" value="{{ $media->category }}">
        </div>
        <div class="form-group">
            <label for="added_by">Added by:</label>
            <input id="added_by" type="text" class="form-control" name="added_by" value="{{ $media->added_by }}">
        </div>
        <div class="form-group">
            <label for="url">Youtube ID:</label>
            <input id="url" type="text" class="form-control" name="url" value="{{ $media->url }}">
        </div>
        <div class="form-group form-check">
            <input id="forchildren" class="form-check-input" type="checkbox" name="forchildren"
            @if ($media->forchildren === 1)
            checked>
            @else
            unchecked>
            @endif
            <label for="forchildren">Suitable for Childeren</label>
        </div>
        <button class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
