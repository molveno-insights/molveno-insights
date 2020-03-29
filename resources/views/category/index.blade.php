@extends('layout.adminbase')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('media.index') }}">Media</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-header clearfix">
            <h2 class="float-left">Categories</h2>
            <a href="{{ route('category.create') }}" class="btn btn-outline-primary btn-lg float-right"><i class="fas fa-plus"></i> Add Category</a>
            </div>
            <div class="card-body">
            {{ $categoryList->links() }}
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th style="width: 20px;"></th>
                        <th style="width: 20px;"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($categoryList as $category)
                    <tr>
                        <td><a href="{{ route('category.edit', [$category->id]) }}">{{ $category->name }}</a></td>
                        <td><a href="{{ route('category.edit', [$category->id]) }}" class="hover"><i class="fas fa-edit"></i></a></td>
                        <td class="deleteCategory"><a href="{{ route('category.delete', [$category->id]) }}" class="hover"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categoryList->links() }}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="categoryDeleteConfirm">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Do you really want to delete this category?</p>
        </div>
        <div class="modal-footer">
          <a class="btn btn-primary categoryDeleteBtn">Confirm Delete</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
@endsection
