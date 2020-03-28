<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Anton|Archivo+Black|PT+Sans+Caption&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/css/landingpage.css" />
    <title>Molveno Lake Resort</title>
</head>

<body class="bg-dark">


    <section class="landingpage">
        <div>
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <img src="/statics/logoMolvenoInsights.png" height="100px" />
            </a>
        </div>
        <div class="col-12 hero-text text-center">
            <h1>Molveno Insights</h1>
            <p class="lead">Get to know more about Molveno Area with selected inspiring videos</p>
            <!-- <a href="{{ route('videopage') }}"><button>Watch Videos</button></a> -->
            <div class="container-fluid" style="margin-top: 125px">
                <div class="row justify-content-center">
                    <div class="col-2">
                        <form id="select-profile-default" method="POST">
                            @csrf
                            <input type="hidden" name="profile" value="default">
                            <span tabindex="1" onclick="document.getElementById('select-profile-default').submit();" class="fa-stack fa-2x" style="font-size: 8em; color: #4191f2; cursor: pointer;">
                                <i class="fas fa-circle fa-stack-2x fa-inverse"></i>
                                <i class="fas fa-user fa-stack-1x guest-profile-icon"></i>
                            </span>
                            <p style="margin-left:50px;font-size: 3em; color: #fff;">Default</p>
                        </form>
                    </div>
                    <div class="col-2">
                        <form id="select-profile-kids" method="POST">
                            @csrf
                            <input type="hidden" name="profile" value="kids">
                            <span tabindex="1" onclick="document.getElementById('select-profile-kids').submit();" class="fa-stack fa-2x" style="font-size: 8em; color: #4191f2; cursor: pointer;">
                                <i class="fas fa-circle fa-stack-2x fa-inverse"></i>
                                <i class="fas fa-child fa-stack-1x"></i>
                            </span>
                            <p style="margin-left:50px;font-size: 3em; color: #fff;">Kids</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/@popperjs/core@2.0.6/dist/umd/popper.min.js"
        integrity="sha384-ilN5ySyBtvpP8fGWj3u3gWBvtCbT5l60hHYMGsr0ct8wK0sy8JQRQfLYMrZ9hhI2" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>
