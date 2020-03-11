@extends('layout.adminbase')

@section('content')
<div>
    <h2 class="display-4">Media</h2>
    <div class="row">
        <div class="col-md-12">
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
                        <th>Video</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($categoryList as $category)
                    <tr>
                        {{-- <td><a href="https:/youtube.com/watch_popup?v={{ $media->url }}" target="_blank">{{ $media->name }}</a></td> --}}
                        <p>{{ $category->name }}</p>
                    </tr>
                @endforeach
                {{-- {{ $mediaList->links() }} --}}

                </tbody>
            </table>
            {{-- {{ $mediaList->links() }} --}}

        </div>
    </div>
</div>
@endsection

