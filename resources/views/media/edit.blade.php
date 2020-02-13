@extends('layout.base')

@section('content')
<div>
    <h2>Edit dier</h2>
    <form method="POST">
        @csrf

        <label for="type">type:</label>
        <input id="type" type="text" name="type" value="{{ $dier->type }}"><br>
        <label for="naam">naam:</label>
        <input id="naam" type="text" name="naam" value="{{ $dier->naam }}"><br>
        <button>Dier wijzigen</button>
    </form>
</div>
@endsection