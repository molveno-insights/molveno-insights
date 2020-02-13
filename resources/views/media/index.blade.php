@extends('layout.base')

@section('content')
<div>
    <h2>Media overzicht (list)</h2>
    <div class="row">
    @foreach ($mediaList as $media)
        <div class="col-12">
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
