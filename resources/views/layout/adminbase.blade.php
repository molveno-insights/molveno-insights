<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>MLR Video Management System</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"  integrity="sha384-J/JrQzMo5A/ewqt8Xsq6nTHQVVAk/OOhH66uqpFN9+3+MiM427Ub97OApi7o6orj" crossorigin="anonymous" />
        <link rel="stylesheet" href="/css/admin.css" />
    </head>

    <body>
        @guest
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('login') }}">
                <img src="/statics/logoMolvenoInsights.png" height="75px" />
                </a>
                
            </div>
        </nav>
        @else
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('media.index') }}">
                <img src="/statics/logoMolvenoInsights.png" height="75px" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('admin/media*')) ? 'active' : '' }}" href="{{ route('media.index') }}">Videos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('admin/category*')) ? 'active' : '' }}" href="{{ route('category.index') }}">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @endguest
        <div class="container-fluid">
            @yield('content')
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/@popperjs/core@2.0.6/dist/umd/popper.min.js" integrity="sha384-ilN5ySyBtvpP8fGWj3u3gWBvtCbT5l60hHYMGsr0ct8wK0sy8JQRQfLYMrZ9hhI2" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js" integrity="sha384-hVry8+iweLeSXncfkJ1oB4r2dRAI2pHZNsSCjTJl4o6hspfUDuGlBKm1nqORIp3S" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/disableautofill/src/jquery.disableAutoFill.min.js" integrity="sha384-fKOvHWQDSPEVR2NdvlXtWqI0Bk1bYUGqudSwRKasWZ6Y65BQuPcKGBnpUGK91qCM" crossorigin="anonymous"></script>
        <script src="/js/app.js"></script>
    </body>
</html>
