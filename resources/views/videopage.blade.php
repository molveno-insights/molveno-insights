<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />
        <link rel="stylesheet" href="/css/app.css" />
        <title>Molveno Lake Resort</title>
    </head>
    <body class="bg-dark">
        <div id="viewRating" style="position:absolute;bottom:45px;z-index:112;color:#fff !important;"></div>
        <div class="float-right" id="viewClose" style="display:none;z-index:102;position:absolute;top:10px;right:150px;text-align:center;font-size:1.5em;color:#fff;cursor:pointer" ><i class="fas fa-times" style="color:#fff !important;"></i> Close</div>
        <iframe id="mediaView_" src="" frameborder="0" style="display:none; pointer-events: none;border: 0; width: 100%; height: 100%;z-index:99;position:absolute;top:0px;" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <div id="mediaOverlay"  style="display:none; border: 0; width: 100%; height: 100%;z-index:101;position:absolute;top:0px;"></div>
        <div id="mediaView" style="display:none; border: 0; width: 100%; height: 100%;z-index:99;position:absolute;top:0px;"></div>
        <div id="mediaSortOptions">
            
            <div class="float-right option" id="most_viewed">Views </div>
            <div class="float-right option" id="highest_rating">Rating | </div>
            <div class="float-right option" id="date_added">Date | </div>
            <div class="float-right option selected" id="category">Category | </div>
            <div class="float-right label">Sort by : </div>
        </div>
        <div id="searchMedia" class="form-inline d-flex justify-content-center md-form form-sm"><i class="fas fa-search fa-2x"></i><input class="form-control" id="searchMediaInput" placeholder="Search media" style="display:none;" /></div>
        @if ($message ?? '' or session('message'))
            <br>
            <div class="alert alert-primary" role="alert">{{ $message ?? '' }}{{ session('message') }}
                <button class="close" data-dismiss="alert">
                    <i class="fas fa-times"></i>
                </button></div>
        @endif
        <div id="mediaSearchContainer" style="display:none;" class="container-fluid flex-center position-ref full-height">
            <h2></h2>
            <div class="row"></div>
        </div>
        <div id="mediaSortContainer" style="display:none;" class="container-fluid flex-center position-ref full-height">
            <h2></h2>
            <div class="row"></div>
        </div>
        <div id="mediaDefaultContainer" class="container-fluid flex-center position-ref full-height">
            @foreach ($categories as $cat)
            @php
                $categoryMedia = App\Http\Controllers\VideoController::categoryMedia($cat->id);
                if(count($categoryMedia)>0){

            @endphp
            <h2>{{ $cat->name }}</h2>
            <div class="row" id="cat-{{ $cat->id }}">
                
                @foreach ($categoryMedia as $med)
                <div class="col-md-3 card shadow" id="media-{{ $med->id }}" data-media-added="{{ $med->created_at }}">
                    <a href="https://www.youtube.com/embed/{{ $med->url }}?rel=0&amp;enablejsapi=1;autoplay=1;fs=0;autohide=0;hd=1;controls=1;hl=en;fs=0;color=white;modestbranding=1;showinfo=0" data-media-id="{{ $med->id }}" class="media-view">
                        <img class="card-img-top" src="https://i3.ytimg.com/vi/{{ $med->url }}/hqdefault.jpg" />
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><a href="https://www.youtube.com/embed/{{ $med->url }}?rel=0&amp;autoplay=1;fs=0;autohide=0;hd=1;controls=1;hl=en;fs=0;color=white;modestbranding=1;showinfo=0;" class="media-view" data-media-id="{{ $med->id }}">{{ Illuminate\Support\Str::limit($med->name, 45) }}</a></h5>
                        <div id="media-rating-container-{{ $med->id }}">
                        <div id="media-rating-{{ $med->id }}">
                            <i class="far fa-eye fa-2x"></i><span id="media-view-count-{{ $med->id }}" class="media-view-count">{{ $med->views }} </span>
                            <i class="media-like fas fa-thumbs-up fa-2x" data-type="like" data-media-id="{{ $med->id }}"></i><span id="media-like-count-{{ $med->id }}">{{ $med->likes }}</span>
                            <i class="media-dislike fas fa-thumbs-down fa-2x" data-type="dislike" data-media-id="{{ $med->id }}"></i><span id="media-dislike-count-{{ $med->id }}">{{ $med->dislikes }}</span>
                        </div>
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
                                <div style="color:{{ $color }};" class="media-rating-perc"><span id="media-rating-perc-{{ $med->id }}"  class="media-rating-perc-val">{{ $med->getRatingPercentage() }}</span>%</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @php 
                }
            @endphp
            @endforeach
        </div>
        <a href="#" class="btn-feedback" data-toggle="modal" data-target="#videopage_feedback">
            <i class="fas fa-exclamation"  style="color:gray !important;"></i>
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
        <form action="/contact?type=complaint" name="complaint" class="form-group" method="POST">
            @csrf
            <label for="exampleFormControlTextarea1">Please leave your complaint below:</label>
            <textarea class="form-control" name="complaintinput" rows="3"></textarea>
            <br>
            <button class="btn btn-primary" name="formcomplaint">Send</button>
        </form>
    </div>
    <div id="suggestvideo">
        <form action="/contact?type=suggest-video" name="suggestvideo" class="form-group" method="POST">
            @csrf
            <label for="exampleFormControlTextarea1">Suggest a video to add:</label>
            <input id="url" type="text" class="form-control" name="suggestvideoinput" placeholder="Enter Youtube URL or Id ">
            <iframe id="yt_preview" width="100%" height="350" style="display:none;" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <br>
            <button class="btn btn-primary" name="formurl">Send</button>
        </form>
    </div>
    <div id="order_roomservice">
        <form action="/contact?type=roomservice" name="roomservice" class="form-group" method="POST">
            @csrf
            <label for="exampleFormControlTextarea1">Please describe your wish:</label>
            <textarea id="text" class="form-control" name="roomserviceinput" rows="3"></textarea>
            <br>
            <button class="btn btn-primary" name="formroomservice">Send</button>
        </form>
    </div>
    <div id="feedback">
        <form action="/contact?type=feedback" name="feedback" class="form-group" method="POST">
            @csrf
            <label for="exampleFormControlTextarea1">Please leave your feedback below:</label>
            <textarea class="form-control" name="feedbackinput" rows="3"></textarea>
            <br>
            <button class="btn btn-primary" name="formfeedback">Send</button>
        </form>
    </div>
        </div>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>
        <script src="https://www.youtube.com/iframe_api"></script>
        <script src="/js/video.js"></script>
        <script src="/js/media.js"></script>
    </body>
</html>
