@extends('layout.adminbase')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('media.index') }}">Set Room</a></li>
    <li class="breadcrumb-item active" aria-current="page">Set Room</li>
  </ol>
</nav>
<div class="ml-8 mr-8">
    <div class="text-center">
        <h2>Add Media</h2>
        <iframe id="yt_preview" width="560" height="315" style="display:none;" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <form class="col-8 mx-auto" method="POST">
        @csrf
        <div class="form-group">
            <label for="roomnumber">Room:</label>
            <select name="roomnumber" id="roomnumber" class="custom-select form-control @error('roomSelect') is-invalid @enderror">
                <option value="">--- Select Room ---</option>
                @foreach ($rooms as $room)
                <option value="{{ $room->id }}">{{ $room->number }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Set Room</button>
    </form>
</div>
@endsection
