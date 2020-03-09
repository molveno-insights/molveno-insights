@extends('layout.adminbase')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('category.index') }}">Category</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
  </ol>
</nav>
<div class="ml-8 mr-8">
    <div class="text-center">
        <h2>Edit Category</h2>
    </div>
    <form class="col-8 mx-auto" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ $category->name }}">
        </div>
        <button class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
