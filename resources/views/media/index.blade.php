@extends('layout.adminbase')

@section('content')
<div>
    <h2 class="display-4">Media</h2>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <!-- <thead>
                    <tr>
                        <th>Video</th>
                        <th>Name</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>
                </thead> -->
                <tbody>
                @foreach ($mediaList as $media)
                    <tr>
                        <td style="width: 150px;"><a href="https:/youtube.com/watch_popup?v={{ $media->url }}" target="_blank"><img width="125" class="img-thumbnail" src="https://i3.ytimg.com/vi/{{ $media->url }}/hqdefault.jpg" /></a></td>
                        <td><a href="https:/youtube.com/watch_popup?v={{ $media->url }}" target="_blank">{{ $media->name }}</a></td>
                        <td><a href="{{ route('media.edit', [$media->id]) }}"><i class="fas fa-edit"></i></a></td>
                        <td><a href="{{ route('media.delete', [$media->id]) }}"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a type="button" class="btn btn-info"  href="{{ route('media.create') }}">Create new media</a>
        </div>
    </div>
</div>
@endsection


