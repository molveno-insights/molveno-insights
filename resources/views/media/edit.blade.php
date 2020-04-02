@extends('layout.adminbase')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('media.index') }}">Media</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Video</li>
            </ol>
        </nav><form method="POST">
                        @csrf
        <div class="card">
            <div class="card-header clearfix">
            <h2 class="float-left">Edit Video</h2>
            <a href="{{ route('media.index') }}" class="btn btn-outline-primary btn-lg float-right"><i class="fas fa-arrow-left"></i> Back to Media Overview</a>
            </div>
            
            <div class="card-body">
                <iframe id="yt_preview" width="100%" height="500" src="https://www.youtube.com/embed/{{ $media->url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                        <div class="form-group row">
                            <label for="name" class="col-md-2">Name:</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $media->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description">{{ $media->description }}</textarea>
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="categorySelect" class="col-md-2">Category:</label>
                            <div class="col-md-10">
                                <select name="categorySelect" class="custom-select form-control @error('categorySelect') is-invalid @enderror">
                                    <option value="">--- Select category ---</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if ($media->category->id == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url" class="col-md-2">Youtube ID:</label>
                            <div class="col-md-10">
                                <input id="url" type="text" class="form-control" onclick="select()" name="url" value="{{ $media->url }}">
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <input id="forchildren" class="form-check-input" type="checkbox" name="forchildren"
                            @if ($media->forchildren === 1)
                            checked>
                            @else
                            unchecked>
                            @endif
                            <label for="forchildren">Suitable for Childeren</label>
                        </div>
                        <input  type="hidden" id="added_by" name="added_by" value="admin" />
                        
                    
            </div>
            <div class="card-footer">
                <button class="btn btn-lg btn-primary">Save Changes</button>
            </div>
            
        </div></form>
    </div>
  </div>
</div>



@endsection
