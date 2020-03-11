@extends('layout.adminbase')

@section('content')
<div>
    <h2 class="display-4">Categories</h2>
    <div class="row">
        <div class="col-md-12">
            <a type="button" class="btn btn-info" href="{{ route('category.create') }}" style="margin-bottom: 20px;">Create new category</a>
            <form action="" method="GET">
                @csrf
                <div class="form-group">
                    <label for="search">Search:</label>
                    <input id="search" class="form-control" placeholder="Search" type="text" name="search">
                    <button class="btn btn-primary">Search</button>
                </div>
            </form>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($categoryList as $category)
                    <tr>
                        <td><a href="{{ route('category.edit', [$category->id]) }}">{{ $category->name }}</a></td>
                        <td><a href="{{ route('category.edit', [$category->id]) }}"><i class="fas fa-edit"></i></a></td>
                        <td class="deleteCategory"><a href="{{ route('category.delete', [$category->id]) }}"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
                {{ $categoryList->links() }}
                </tbody>
            </table>
            {{-- {{ $categoryList->links() }} --}}
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
