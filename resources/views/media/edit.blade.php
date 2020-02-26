@extends('layout.adminbase')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('media.index') }}">Media</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Media</li>
  </ol>
</nav>
<div class="ml-8 mr-8">
    <div class="text-center">
        <h2>Edit Media</h2>
    </div>
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
