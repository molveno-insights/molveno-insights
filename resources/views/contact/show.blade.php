@extends('layout.adminbase')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Customer Service</li>
                <li class="breadcrumb-item active" aria-current="page">Enquiries</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $contact->topic }}</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-header clearfix">
            <h2 class="float-left">{{ $contact->topic }}</h2>
            
            </div>
            <div class="card-body">
            <p>Room : {{ $contact->guest->roomnumber }}</p>
            <p>Guest : {{ $contact->guest->name}}</p><hr>
            <p>{{ $contact->text}}</p>
                
                


          
         </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
