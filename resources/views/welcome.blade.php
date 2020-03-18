<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Anton|Archivo+Black|PT+Sans+Caption&display=swap" rel="stylesheet">
        {{-- <link rel="stylesheet" href="/css/app.css" /> --}}
        <link rel="stylesheet" href="/css/landingpage.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
        <title>Molveno Lake Resort</title>
    </head>
    <body>
<div class="container-fluid">
    <div class="row">
            <div class="landingpage col-12">

                            <div>
                                <a class="navbar-brand" href="{{ route('welcome') }}">
                                    <img src="/statics/Molveno_logo_white.png" height="50px" />
                                </a>
                            </div>


                    {{-- <div class="col-12 text-center">
                        <input type="text" placeholder="Search..">
                    </div> --}}

                    <div class="col-12 hero-text text-center">
                        <h1>Molveno Insights</h1>
                        <p class="lead">Get to know more about Molveno Area with selected inspiring videos</p>
                        <a href="{{ route('videopage') }}"><button>Watch Videos</button></a>
                    </div>
                    <div class="col-12 text-center">
                        <a href="#text"><i class="fas fa-chevron-circle-down fa-4x"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
<br>
<br>
                    <h2>Guest profiles</h2>
                    <br>
                </div>
                <div class="col-sm-12 text-center user">

                        <div class="col-sm-12 col-md-4 users">
                            <div class="card" style="width: 300px;">
                                <img src="/statics/user.png" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Hans Liddel</h5>
                                    <a href="#" class="btn btn-primary">Login</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 users text-center">
                            <div class="card" style="width: 300px;">
                                <img src="/statics/person-girl-flat.png" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Noelle Liddel</h5>
                                    <a href="#" class="btn btn-primary">Login</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 users">
                            <div class="card" style="width: 300px;">
                                <img src="/statics/user.png" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Alice Liddel</h5>
                                    <a href="#" class="btn btn-primary">Login</a>
                                </div>
                            </div>
                        </div>

                </div>

            </div>
        </div>
        <div class="container-fluid">

            <div class="row">

                <div class="col-sm-12 text-center">
                    <br>
                    <br>
                    <h2>Categories</h2>
                    <br>
                </div>
                <div class="col-sm-12 text-center">
                    <br>
                    <h3>Sport</h3>
                    <br>
                </div>
                @foreach ($sportMedia as $sportMed)
                <div class="col-sm-12 col-md-3">
                    <div class="card shadow">

                        <img class="card-img-top" src="https://i3.ytimg.com/vi/{{ $sportMed->url }}/hqdefault.jpg" />
                        <div class="card-body">
                         <h5 class="card-title"><a href="https://www.youtube.com/watch_popup?v={{ $sportMed->url }}">{{ Illuminate\Support\Str::limit($sportMed->name, 45) }}</a></h5>

                            <div class="col-12">
                                <i class="media-like fas fa-thumbs-up fa-3x" data-type="like" data-media-id="{{ $sportMed->id }}"></i>
                                <i class="media-dislike fas fa-thumbs-down fa-3x" data-type="dislike" data-media-id="{{ $sportMed->id }}"></i>
                            </div>
                            <div class="col-12">
                                (<span id="media-like-count-{{ $sportMed->id }}">{{ $sportMed->likes }}</span>)
                                (<span id="media-dislike-count-{{ $sportMed->id }}">{{ $sportMed->dislikes }}</span>)
                            </div>
                            <div class="col-12">
                                <span>{{ $sportMed->getRatingPercentage() }}% vond deze film leuk</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                @endforeach
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/@popperjs/core@2.0.6/dist/umd/popper.min.js" integrity="sha384-ilN5ySyBtvpP8fGWj3u3gWBvtCbT5l60hHYMGsr0ct8wK0sy8JQRQfLYMrZ9hhI2" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
