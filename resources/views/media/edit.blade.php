@extends('layout.adminbase')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('media.index') }}">Media</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Video</li>
  </ol>
</nav>
<div class="ml-8 mr-8">
    <div class="text-center">
        <h2>Edit Video</h2>
        <iframe id="yt_preview" width="560" height="315" src="https://www.youtube.com/embed/{{ $media->url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <form class="col-8 mx-auto" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ $media->name }}">
        </div>

        <div class="form-group">
            <label for="categorySelect">Category:</label>
            <select name="categorySelect" class="custom-select form-control @error('categorySelect') is-invalid @enderror">
                <option value="">--- Select category ---</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($media->category->id == $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="url">Youtube ID:</label>
            <input id="url" type="text" class="form-control" onclick="select()" name="url" value="{{ $media->url }}">
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
