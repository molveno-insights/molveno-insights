<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link rel="stylesheet" href="/css/app.css" />
        <title>Molveno Lake Resort Video App</title>
    </head>
    <body>
        @guest
        <div class="container-fluid p-0 flex-center full-height">
            <section class="jumbotron">
                <div class="text-center">
                    <h1>Welcome to Hotel Lake Resort Molveno</h1>
                </div>
            </section>
        </div>
        <div class="container-fluid flex-center">
            <div class="card-group">
                <div class="card">
                    <img src="./media/simpsonsAdult.jpg" class="card-img-top" alt="Main Guest" />
                    <div class="card-body">
                        Main Guest
                    </div>
                </div>
                <div class="card">
                    <img src="./media/simpsonsKids.jpg" class="card-img-top" alt="Main Guest" />
                    <div class="card-body">
                        <h5 class="card-title">Kids</h5>
                    </div>
                </div>
            </div>
        </div>
        @else
            {{ route('/base-layout-test') }}
        @endguest
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
