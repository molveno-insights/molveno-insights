@extends('layout.adminbase')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('category.index') }}">Media</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Media</li>
  </ol>
</nav>
<div class="ml-8 mr-8">
    <div class="text-center">
        <h2>Create Category</h2>
    </div>
    <form class="col-8 mx-auto" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}">
        </div>
        <button class="btn btn-primary">Create Category</button>
    </form>
</div>
@endsection
