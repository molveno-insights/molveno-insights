@extends('layout.adminbase')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('media.index') }}">Media</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Video</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-header clearfix">
            <h2 class="float-left">Add Video</h2>
            <a href="{{ route('media.index') }}" class="btn btn-outline-primary btn-lg float-right"><i class="fas fa-arrow-left"></i> Back to Media Overview</a>
            </div>
            <div class="card-body">
                <iframe id="yt_preview" width="100%" height="500" style="display:none;" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div id="select_yt_video">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="yt_id-tab" data-toggle="tab" href="#yt_id" role="tab" aria-controls="home" aria-selected="true">ID or URL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="yt_search-tab" data-toggle="tab" href="#yt_search" role="tab" aria-controls="profile" aria-selected="false">Search</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent" style="padding:10px;">
                    <div class="tab-pane fade show active" id="yt_id" role="tabpanel" aria-labelledby="yt_id-tab">
                        <input id="youtube_url"  class="form-control form-control-lg" type="text" placeholder="Enter a Youtube URL or ID">
                    </div>
                    <div class="tab-pane fade" id="yt_search" role="tabpanel" aria-labelledby="yt_search-tab">
                        <form class="input-group mb-3" id="searchYT">
                            <input id="search_yt_input"  class="form-control form-control-lg" type="text" placeholder="Search on Youtube">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit" id="search_yt"><i class="fas fa-search"></i> Search</button>
                            </div>
</form>
                        <div class='results'>

                        </div>
                    </div>
               </div>
                </div>
                <form method="POST" id="addvideo" style="display:none;">
                    @csrf
                    <div class="btn btn-secondary btn-lg" id="toggle_ytvideo_select"><i class="fas fa-arrow-left"></i> Select other video</div>
                    <input type="hidden" name="url" id="url" />
                    <div class="form-group row" style="padding-top:10px;">
                        <label for="name" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="name" id="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-sm-2 col-form-label">Category:</label>
                        <div class="col-sm-10">
                            <select name="category" id="category" class="custom-select form-control @error('categorySelect') is-invalid @enderror">
                                <option value="">--- Select category ---</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <input id="forchildren" class="form-check-input" type="checkbox" name="forchildren" value="{{ old('forchildren') }}">
                        <label for="forchildren">Suitable for Childeren</label>
                    </div>
                    <button class="btn btn-lg btn-primary">Add Video</button>
                </form>
            </div>
        </div>   
    </div>
  </div>
</div>

@endsection
