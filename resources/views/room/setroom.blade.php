@extends('layout.adminbase')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('media.index') }}">Set</a></li>
        <li class="breadcrumb-item active" aria-current="page">Set Room</li>
    </ol>
</nav>
<div class="ml-8 mr-8">
    <div class="text-center">
        <h2>Set Room</h2>
        @if ($roomNumber)
        <p>Current roomnumber is set to: {{ $roomNumber }}<p>
            @if ($currentGuest)
            <p>Current guest is: {{ $currentGuest->name }} {{ $currentGuest->surname }}</p>
            @else
            <p>No current guest found for given roomnumber.<p>
            @endif
        @endif
    </div>
    <form class="col-8 mx-auto" method="POST">
        @csrf
        <div class="form-group">
            <label for="roomnumber">Room:</label>
            <input id="roomnumber" class="form-control" type="number" name="roomnumber" value="">
        </div>

        <button class="btn btn-primary">Set Room</button>
    </form>
</div>
@endsection
