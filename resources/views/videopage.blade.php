<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link rel="stylesheet" href="/css/app.css" />
        <title>Molveno Lake Resort</title>
    </head>
    <body>
        <div class="container-fluid flex-center position-ref full-height">
            @foreach ($categories as $cat)
            <h2>{{ $cat->name }}</h2>
            <div class="row">
                @php
                    $categoryMedia = App\Http\Controllers\VideoController::categoryMedia($cat->id);
                @endphp
                @foreach ($categoryMedia as $med)
                <div class="col-md-3 card shadow" id="media-{{ $med->id }}">
                    <a href="https://www.youtube.com/embed/{{ $med->url }}?rel=0&amp;autoplay=1;fs=0;autohide=0;hd=0;" data-media-id="{{ $med->id }}" class="media-view">
                        <img class="card-img-top" src="https://i3.ytimg.com/vi/{{ $med->url }}/hqdefault.jpg" />
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><a href="https://www.youtube.com/embed/{{ $med->url }}?rel=0&amp;autoplay=1;fs=0;autohide=0;hd=0;" class="media-view" data-media-id="{{ $med->id }}">{{ Illuminate\Support\Str::limit($med->name, 45) }}</a></h5>
                        <div>
                            <i class="far fa-eye"></i> <span id="media-view-count-{{ $med->id }}">{{ $med->views }} </span>
                            <i class="media-like fas fa-thumbs-up fa-2x" data-type="like" data-media-id="{{ $med->id }}"></i><span id="media-like-count-{{ $med->id }}">{{ $med->likes }}</span>
                            <i class="media-dislike fas fa-thumbs-down fa-2x" data-type="dislike" data-media-id="{{ $med->id }}"></i><span id="media-dislike-count-{{ $med->id }}">{{ $med->dislikes }}</span>
                        </div>
                        <div class="float-right" style="margin-top:-50px;">
                            <div style="width:50px;">
                                <div class="circ_perc" id="media-rating-perc-icon-{{ $med->id }}">
                                @php
                                    if( $med->getRatingPercentage() < 50 ){
                                        $color = 'red';
                                    }else{
                                        $color = 'green';
                                    }
                                @endphp
                                    <svg viewBox="0 0 36 36" class="circular-chart"><path class="circle" stroke-dasharray="{{ $med->getRatingPercentage() }}, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" style="stroke:{{ $color }};" /></svg>
                                </div>
                                <div style="color:{{ $color }};" class="media-rating-perc"><span id="media-rating-perc-{{ $med->id }}">{{ $med->getRatingPercentage() }}</span>%</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
        <a href="#" class="btn-feedback" data-toggle="modal" data-target="#videopage_feedback">
            <i class="fas fa-exclamation"></i>
        </a>
        <div class="modal" tabindex="-1" role="dialog" id="videopage_feedback">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Guest Options</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="feedback-question">
                        <p class="lead">How can we help you ?</p>
                        <p><button class="btn btn-primary btn-feedback-q" id="feedback_complaint">I have a complaint</button></p>
                        <p><button class="btn btn-primary btn-feedback-q" id="feedback_suggestvideo">I want to suggest a video</button></p>
                        <p><button class="btn btn-primary btn-feedback-q" id="feedback_order_roomservice">I wish to order Room Service</button></p>
                        <p><button class="btn btn-primary btn-feedback-q" id="feedback_feedback">I have feedback </button></p>
                    </div>
                    <div class="modal-body"  id="feedback-form">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="feedback_templ" style="display:none;">
            <div id="complaint">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Please leave your complaint below:</label>
                    <textarea class="form-control" id="complaintInput" rows="3"></textarea>
                </div>
            </div>
            <div id="suggestvideo">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Suggest a video to add:</label>
                    <input type="text" class="form-control" id="suggestVideoInput" placeholder="Enter Youtube URL or Id ">
                    <iframe id="yt_preview" width="100%" height="275" style="display:none;" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div id="order_roomservice">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Please leave your feedback below:</label>
                    <textarea class="form-control" id="roomService" rows="3"></textarea>
                </div>
            </div>
            <div id="feedback">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Please leave your feedback below:</label>
                    <textarea class="form-control" id="feedbackInput" rows="3"></textarea>
                </div>
            </div>
        </div>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="/js/media.js"></script>
    </body>
</html>
