<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link rel="stylesheet" href="/css/app.css" />
        <title>Molveno Lake Resort</title>
    </head>
    <body>
        <div class="container-fluid p-0 flex-center position-ref full-height">
            <section class="jumbotron">
                <div class="text-center">
                    <h1>Molveno Media</h1>
                </div>
            </section>
            <div class="row ml-4 mr-4">
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
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
