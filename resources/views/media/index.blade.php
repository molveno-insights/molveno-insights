@extends('layout.base')

@section('content')
<div>
    <h2>Dieren overzicht (list)</h2>
    @foreach ($dieren as $dier)
    <p>
        <a href="{{ route('dier.show', [$dier->id]) }}">type: {{ $dier->type }} naam: {{ $dier->naam }}</a>
        <a href="{{ route('dier.edit', [$dier->id]) }}"><i class="fas fa-edit"></i></a>
        <a href="{{ route('dier.delete', [$dier->id]) }}"><i class="fas fa-trash-alt"></i></a>
    </p>
    @endforeach
    <a href="{{ route('dier.create') }}"><button>Nieuw dier aanmaken</button></a>
</div>
@endsection