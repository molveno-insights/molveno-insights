@extends('layout.adminbase')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header clearfix">
          <h2 class="float-left">Media Overview</h2>
          <a href="{{ route('media.create') }}" class="btn btn-outline-primary btn-lg float-right"><i class="fas fa-plus"></i> Add Video</a>
        </div>
        <div class="card-body">
            {{ $mediaList->links() }}
                <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Video</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($mediaList as $media)
                    <tr>
                        <td style="width: 150px;"><a href="https://www.youtube.com/embed/{{ $media->url }}?rel=0&amp;autoplay=1;fs=0;autohide=0;hd=0;" target="_blank"><img width="125" class="img-thumbnail" src="https://i3.ytimg.com/vi/{{ $media->url }}/hqdefault.jpg" /></a></td>
                        <td>
                          <p class="h5 lead"><a href="{{ route('media.edit', [$media->id]) }}">{{ $media->name }}</a></p>
                          <div id="media-rating" class="text-black-50 font-weight-lighter">
                            <i class="far fa-eye"></i><span class="media-view-count"> {{ $media->views }} | {{ $media->getRatingPercentage() }}%</span>
                            ( <i class="media-like fas fa-thumbs-up"></i><span> {{ $media->likes }}</span> |
                            <i class="media-dislike fas fa-thumbs-down"></i><span> {{ $media->dislikes }}</span> )
                        </div>
                        </td>
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
