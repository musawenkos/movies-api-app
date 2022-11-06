@props(['trailerInfo','trailerVideo'])


<div id="movie-trailer" class="d-flex flex-row text-white text-center vw-95 vh-100 " style=" background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.8)), url(https://image.tmdb.org/t/p/original/{{$trailerInfo['poster_path']}}); ">
    <div id="movie-trailer-info" class="w-50">
        <div class="align-bottom ">
            <div class="display-6 mb-4">{{$trailerInfo['title']}}</div>
            <x-genres :genre_name="$trailerInfo['genre_name']"/>
            <div class="mt-4">{{$trailerInfo['overview']}}</div>
        </div>
    </div>
    <div id="movie-trailer-video" class="w-50">
        @if (count($trailerVideo) != 0)
            <div class="embed-responsive embed-responsive-16by9">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$trailerVideo[0]['key']}}?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        @else
            <div class="embed-responsive embed-responsive-16by9">

            </div>
        @endif

    </div>
</div>
