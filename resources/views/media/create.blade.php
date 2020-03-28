@extends('layout.adminbase')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('media.index') }}">Media</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Video</li>
  </ol>
</nav>
<div class="ml-8 mr-8">

        <h2>Add Video</h2>
        <iframe id="yt_preview" width="560" height="315" style="display:none;" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
   
    <form class="col-8 mx-auto" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category" id="category" class="custom-select form-control @error('categorySelect') is-invalid @enderror">
                <option value="">--- Select category ---</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="url">Youtube ID:</label>
            <input id="url" class="form-control" type="text" name="url" value="{{ old('url') }}">
        </div>
        <div class="form-group form-check">
            <input id="forchildren" class="form-check-input" type="checkbox" name="forchildren" value="{{ old('forchildren') }}">
            <label for="forchildren">Suitable for Childeren</label>
        </div>
        <button class="btn btn-primary">Add Video</button>
    </form>
</div>
@endsection
