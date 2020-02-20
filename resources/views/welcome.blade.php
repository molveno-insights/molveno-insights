<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/app.css">
    <title>Landing page</title>
  </head>
  <body>
    <div class="container-fluid p-0 flex-center position-ref full-height">

        <section class="jumbotron">
            <div class="text-center">
                <h1>Molveno Media</h1>
                <p>Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
                <p>
                    <a href="" type="button" class="btn btn-info"></a>
                    <a href="" type="button" class="btn btn-info"></a>
                </p>
            </div>
        </section>
        <br>
        <br>
        <div class="row ml-4 mr-4">
            @foreach ($media as $med)
            <div class="col-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h2>{{ $med->name }}</h2>
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $med->url }}" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <br>
            </div>
            <br>
            @endforeach
        </div>
    </div>
    <br>
    <br>
    <footer>
        <p>Posted by: Hege Refsnes</p>
        <p>Contact information: <a href="mailto:someone@example.com">
        someone@example.com</a>.</p>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
