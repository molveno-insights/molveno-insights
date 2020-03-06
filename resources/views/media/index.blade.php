@extends('layout.adminbase')

@section('content')
<div>
    <h2 class="display-4">Media</h2>
    <div class="row">
        <div class="col-md-12">
            <a type="button" class="btn btn-info" href="{{ route('media.create') }}" style="margin-bottom: 20px;">Create new media</a>
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
                @foreach ($mediaList as $media)
                    <tr>
                        <td style="width: 150px;"><a href="https:/youtube.com/watch_popup?v={{ $media->url }}" target="_blank"><img width="125" class="img-thumbnail" src="https://i3.ytimg.com/vi/{{ $media->url }}/hqdefault.jpg" /></a></td>
                        <td><a href="https:/youtube.com/watch_popup?v={{ $media->url }}" target="_blank">{{ $media->name }}</a></td>
                        <td><a href="{{ route('media.edit', [$media->id]) }}">{{ $media->category->name }}</a></td>
                        <td><a href="{{ route('media.edit', [$media->id]) }}"><i class="fas fa-edit"></i></a></td>
                        <td><a href="{{ route('media.delete', [$media->id]) }}"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
                {{ $mediaList->links() }}

                </tbody>
            </table>
            {{-- {{ $mediaList->links() }} --}}

        </div>
    </div>
</div>
@endsection


