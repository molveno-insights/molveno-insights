@extends('layout.base')

@section('content')
<div>
    <h2>Create Media</h2>
    <form method="POST">
        @csrf

        <label for="name">name:</label>
        <input id="name" type="text" name="name"><br>
        <label for="date">date:</label>
        <input id="date" type="date" name="date"><br>
        <label for="category">category:</label>
        <input id="category" type="text" name="category"><br>

        <button>Create Media</button>
    </form>
</div>
@endsection


$media->name = $request->input('name');
$media->category = $request->input('category');
$media->added_by = $request->input('added_by');
$media->type = $request->input('type');
$media->forchildren = $request->input('forchildren');