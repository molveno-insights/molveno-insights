@extends('layout.adminbase')

@section('content')
<div>
    <h2 class="display-4">Media</h2>
    <div class="row">
        <div class="col-md-12">
            <a type="button" class="btn btn-info" href="{{ route('media.create') }}" style="margin-bottom: 20px;">Add media</a>
            <form action="" method="GET" class="form-inline d-flex justify-content-center md-form form-sm active-cyan active-cyan-2 mt-2">
                @csrf
                <i class="fas fa-search" aria-hidden="true"></i>
                <input id="search" class="form-control form-control-sm ml-3 w-75" placeholder="Search" aria-label="Search" type="text" name="search">
            </form>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Video</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($mediaList as $media)
                    <tr>
                        <td style="width: 150px;"><a href="https://www.youtube.com/embed/{{ $media->url }}?rel=0&amp;autoplay=1;fs=0;autohide=0;hd=0;" target="_blank"><img width="125" class="img-thumbnail" src="https://i3.ytimg.com/vi/{{ $media->url }}/hqdefault.jpg" /></a></td>
                        <td><a href="{{ route('media.edit', [$media->id]) }}">{{ $media->name }}</a></td>
                        <td>{{ $media->category->name }}</td>
                        <td><a href="{{ route('media.edit', [$media->id]) }}" class="hover"><i class="fas fa-edit"></i></a></td>
                        <td class="deleteCategory"><a href="{{ route('media.delete', [$media->id]) }}" class="hover"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $mediaList->links() }}
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="categoryDeleteConfirm">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Media</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete this video?</p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary categoryDeleteBtn">Confirm Delete</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
@endsection
