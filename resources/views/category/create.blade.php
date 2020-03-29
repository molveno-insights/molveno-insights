@extends('layout.adminbase')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('category.index') }}">Categories</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
        </ol>
      </nav>
      <div class="card">
        <div class="card-header clearfix">
          <h2 class="float-left">Add Category</h2>
          <a href="{{ route('category.create') }}" class="btn btn-outline-primary btn-lg float-right"><i class="fas fa-plus"></i> Add Category</a>
        </div>
        <div class="card-body">
          <form method="POST">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Name:</label>
                <div class="col-md-10">
                  <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}">
                </div>
            </div>
            <button class="btn btn-lg btn-primary">Add Category</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> 


@endsection
