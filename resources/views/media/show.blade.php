@extends('layout.adminbase')

@section('content')
<div>
    <h2>Media (show)</h2>
    <p>{{ $media->name }}</p>
    <p>{{ $media->url }}</p>
    <button onclick="window.history.back()">Terug naar vorige pagina</button><br>
    <a href="{{ route('media.index') }}">Terug naar overzicht</a><br>
    <a href="{{ route('media.edit', [$media->id]) }}">Wijzigen</a>
</div>
@endsection
