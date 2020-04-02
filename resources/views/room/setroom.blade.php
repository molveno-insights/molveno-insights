@extends('layout.adminbase')

@section('content')



<div class="container">
  <div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Set Room</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-header clearfix">
                <h2>Set Room</h2>
            
            </div>
            <div class="card-body">
            @if ($roomNumber)
                <p class="h1 lead">Current roomnumber is set to: <b>{{ $roomNumber }}</b><p>
                @if ($currentGuest)
                    <p>Current guest is: {{ $currentGuest->name }} {{ $currentGuest->surname }}</p>
                @else
                    <p>No current guest found for given roomnumber.<p>
                @endif
            @endif
                
            <form class="col-4" method="POST">
                @csrf
                <div class="form-group">
                    <label for="roomnumber">Set Room to this device:</label>
                    <input id="roomnumber" class="form-control form-control-lg" type="number" name="roomnumber" value="">
                </div>

                <button class="btn btn-primary">Set Room</button>
            </form>


          
         </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
