@extends('layout.adminbase')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('guest.index') }}">Guest</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Guest</li>
  </ol>
</nav>
<div class="ml-8 mr-8">
    <div class="text-center">
        <h2>Guest Media</h2>
        <iframe id="yt_preview" width="560" height="315" style="display:none;" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <form class="col-8 mx-auto" method="POST">
        @csrf
        <div class="form-group">
            <label for="roomnumber">Roomnumber:</label>
            <input id="roomnumber" class="form-control" type="text" name="roomnumber" value="{{ old('roomnumber') }}">
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="surname">Surname:</label>
            <input id="surname" class="form-control" type="text" name="surname" value="{{ old('surname') }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="phonenumber">Phonenumber:</label>
            <input id="phonenumber" class="form-control" type="number" name="phonenumber" value="{{ old('phonenumber') }}">
        </div>
        <button class="btn btn-primary">Create Guest</button>
    </form>
</div>
@endsection
