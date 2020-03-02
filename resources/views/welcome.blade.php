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
        <div class="container-fluid p-0 flex-center position-ref full-height">
            <section class="jumbotron">
                <div class="row">
                    <div class="col-12">
                        <br>
                            <div>
                                <a class="navbar-brand" href="{{ route('welcome') }}">
                                    <img src="/statics/Molveno_logo_white.png" height="50px" />
                                </a>
                            </div>
                    </div>

                    <div class="col-12 text-center">
                        <input type="text" placeholder="Search..">
                    </div>

                    <div class="col-12 hero-text text-center">
                        <h1>Welcome to Molveno Videos! Unlimited Videos and more!</h1>
                        {{-- <p>hi</p> --}}
                        <br>
                        <br>
                        <a href="#text"><button>Visit</button></a>
                    </div>
                </div>
            </section>
            <section>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <a id="text" type="button" href="{{ route('videopage') }}">videos</a>
                    </div>
                </div>
            </section>
            {{-- <div class="row ml-4 mr-4">
                @foreach ($media as $med)
                <div class="col-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h2>{{ $med->name }}</h2>
                            <a href="https://www.youtube.com/watch_popup?v={{ $med->url }}"><img class="img-thumbnail" src="https://i3.ytimg.com/vi/{{ $med->url }}/hqdefault.jpg" /></a>
                            <i class="fas fa-thumbs-up fa-3x"></i> <i class="fas fa-thumbs-down fa-3x"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> --}}
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/@popperjs/core@2.0.6/dist/umd/popper.min.js" integrity="sha384-ilN5ySyBtvpP8fGWj3u3gWBvtCbT5l60hHYMGsr0ct8wK0sy8JQRQfLYMrZ9hhI2" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
