@extends('layout.adminbase')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('media.index') }}">Media</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Media</li>
  </ol>
</nav>
<div class="ml-8 mr-8">
    <div class="text-center">
        <h2>Create Media</h2>
    </div>
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
            <label for="added_by">Added by:</label>
            <input id="added_by" class="form-control" type="text" name="added_by" value="{{ old('added_by') }}">
        </div>
        <div class="form-group">
            <label for="url">Youtube ID:</label>
            <input id="url" class="form-control" type="text" name="url" value="{{ old('url') }}">
        </div>
        <div class="form-group form-check">
            <input id="forchildren" class="form-check-input" type="checkbox" name="forchildren" value="{{ old('forchildren') }}">
            <label for="forchildren">Suitable for Childeren</label>
        </div>
        <button class="btn btn-primary">Create Media</button>
    </form>
</div>
@endsection
