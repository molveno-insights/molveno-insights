@extends('layout.adminbase')

@section('content')
<div>
    <br>
    <br>
    <h2 class="text-center">Media overzicht (list)</h2>
    <br>
    <div class="row">
    <div class="col-12 text-center">
    <div style="text-align: -webkit-center" class="table">
    <table>
        <thead>
            <tr>
              <th>Name</th>
              <th>edit</th>
              <th>delete</th>

            </tr>
          </thead>
    <tbody>
    @foreach ($mediaList as $media)
        <div class="col-12">
            <tr>
                <td><a href="{{ route('media.show', [$media->id]) }}">name: {{ $media->name }}</a></td>
                <td><a href="{{ route('media.edit', [$media->id]) }}"><i class="fas fa-edit"></i></a></td>
                <td><a href="{{ route('media.delete', [$media->id]) }}"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        </div>
    @endforeach
    </tbody>
    </table>
    <br>
    <a type="button" class="btn btn-info"  href="{{ route('media.create') }}">Create new media</a>
</div>
</div>
</div>
@endsection


