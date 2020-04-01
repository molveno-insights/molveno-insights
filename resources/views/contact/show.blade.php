@extends('layout.adminbase')

@section('content')
<div>
    <h2>Contact (show)</h2>
    <td>{{ $contact->topic }}</td>
    <td>{{ $contact->guest->roomnumber}}</td>
    <td>{{ $contact->text}}</td>
    <a href="{{ route('contact.index') }}">Back to overview</a><br>
</div>
@endsection
