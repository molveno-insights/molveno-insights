@extends('layout.base')

@section('content')
<div>
    <h2>Media overzicht (list)</h2>
    <div class="row">
    @foreach ($mediaList as $media)
        <div class="col-3">
            <p>
                <a href="{{ route('media.show', [$media->id]) }}">name: {{ $media->name }}</a>
                <a href="{{ route('media.edit', [$media->id]) }}"><i class="fas fa-edit"></i></a>
                <a href="{{ route('media.delete', [$media->id]) }}"><i class="fas fa-trash-alt"></i></a>
            </p>
        </div>
    @endforeach
    </div>
    <a href="{{ route('media.create') }}"><button>Create new media</button></a>
</div>
@endsection

<div>
    {{ $media->name }}
</div>
<div>
    <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $media->url }}" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
</div>
