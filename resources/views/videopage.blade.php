<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link rel="stylesheet" href="/css/app.css" />
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

        <title>Molveno Lake Resort</title>
    </head>
    <body>
        <div class="container-fluid p-0 flex-center position-ref full-height">
            <section class="jumbotron">
                <div class="text-center">
                    <h1>Molveno Media</h1>
                </div>
            </section>
            <div class="row">
                @foreach ($media as $med)
                <div class="col-sm-12 col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h2>{{ Illuminate\Support\Str::limit($med->name, 45) }}</h2>
                            <a href="https://www.youtube.com/watch_popup?v={{ $med->url }}"><img class="img-thumbnail" src="https://i3.ytimg.com/vi/{{ $med->url }}/hqdefault.jpg" /></a>
                            <div class="col-12">
                                <i class="media-like fas fa-thumbs-up fa-3x" data-type="like" data-media-id="{{ $med->id }}"></i>
                                <i class="media-dislike fas fa-thumbs-down fa-3x" data-type="dislike" data-media-id="{{ $med->id }}"></i>
                            </div>
                            <div class="col-12">
                                (<span id="media-like-count-{{ $med->id }}">{{ $med->likes }}</span>)
                                (<span id="media-dislike-count-{{ $med->id }}">{{ $med->dislikes }}</span>)
                            </div>
                            <div class="col-12">
                                <span>{{ round(($med->likes / ($med->likes + $med->dislikes)) * 100) }}% vond deze film leuk</span>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                @endforeach
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.media-like, .media-dislike').click(function() {
                    var mediaId = $(this).attr('data-media-id');
                    var type = $(this).attr('data-type');

                    $.ajax({
                        'type': "POST",
                        'headers': {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        'url': `/media/${mediaId}/${type}`,
                        'success': function() {
                            let countSelector = $(`#media-${type}-count-${mediaId}`);
                            let currentCount = countSelector.html();
                            countSelector.html(++currentCount);
                        },
                        'error': function() {
                            alert("There was an error. Try again please!");
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('.media-dislike').click(function() {
                    var mediaId = $(this).attr('data-media-id');

                    console.log(mediaId);
                    console.log($(this));

                });
            });

        </script>
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
         <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
