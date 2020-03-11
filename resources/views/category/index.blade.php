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
                        <td><a href="{{ route('category.delete', [$category->id]) }}"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
                {{ $categoryList->links() }}
                </tbody>
            </table>
            {{-- {{ $categoryList->links() }} --}}
        </div>
    </div>
</div>
@endsection
