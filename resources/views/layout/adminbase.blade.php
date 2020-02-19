<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MLR Video Management System</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin.css">
</head>

<body>
    <p><h3>Hotel staff</h3><br>

    <div>

    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand" href="#">
          <img src="/statics/Molveno_logo_white.png" height="50px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
        <li class="nav-item">
          <a class="nav-link" href="#">Videos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
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

<div class="container-fluid">


    @yield('content')
<br>
  <form class="md-form">
    <div class="file-field">
      <a class="btn-floating peach-gradient mt-0 float-left">
        <i class="fas fa-paperclip" aria-hidden="true"></i>
        <input type="file">
      </a>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload your file">
      </div>
    </div>
  </form>
  <form class="md-form">
    <div class="file-field">
      <a class="btn-floating blue-gradient mt-0 float-left">
        <i class="far fa-heart" aria-hidden="true"></i>
        <input type="file">
      </a>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload your file">
      </div>
    </div>
  </form>

</div>

<!-- Footer -->
<footer class="page-footer font-small blue pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© Molveno Lake Resort 2020 Copyright:
    <a href="https://mdbootstrap.com/education/bootstrap/"> MolvenoLakeResort.it</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>
