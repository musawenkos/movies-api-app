<x-layout>
    <div id="movie-trailer" class="d-flex flex-row text-white text-center vw-95 vh-100 " style=" background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.8)), url(https://image.tmdb.org/t/p/original/{{$homeRandMovie['poster_path']}}); ">
        <div id="movie-trailer-info" class="w-50">
            <div class="align-bottom ">
                <div class="display-6 mb-4">{{$homeRandMovie['title']}}</div>
                <div class="d-flex flex-row justify-content-center">
                    <button class="btn me-2 btn-primaryBgColor">Action</button>
                    <button class="btn btn-primaryBgColor me-2">Crime</button>
                    <button class="btn btn-primaryBgColor me-2">Drama</button>
                </div>
                <div class="mt-4">{{$homeRandMovie['overview']}}</div>
            </div>
        </div>
        <div id="movie-trailer-video" class="w-50">
            @if (count($homeRandTrailer) != 0)
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$homeRandTrailer[0]['key']}}?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            @else
                <div class="embed-responsive embed-responsive-16by9">

                </div>
            @endif

        </div>
    </div>
    <div class="vw-100">
        <div class="ms-4 mt-3" >
            @foreach ($categories as $key => $category)
                <div class="mw-80 ms-2 me-2 mb-3">
                    <div class="text-white fw-bold fs-4 ps-4">{{$key}}</div>
                    <div id="{{strtolower($key)}}" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                        <div class="carousel-inner" style="top: 15px;">
                            {{-- {{print($category[0]['poster_path'])}} --}}
                            @for ($i = 0; $i < count($category); $i += 5)
                                @if ($i == 0)
                                    <div class="carousel-item active">
                                        <div class="d-flex flex-row justify-content-sm-center">
                                            @for ($i = 0; $i < 5; $i++)
                                                <div class="col-md-2 me-2 col-lg-2">
                                                    <a href="/movies/{{$category[$i]['id']}}"><img src="https://image.tmdb.org/t/p/original/{{$category[$i]['poster_path']}}" height="220" width="200" alt="..." ></a>
                                                    <div>
                                                        <div class="text-truncate" style="font-size: 14px; font-weight:bolder;color:white;text-align:center">{{$category[$i]['title']}}</div>
                                                        <div class="d-flex justify-content-center bg-gray bg-info mb-2 ">
                                                            <div class="col-sm-4">
                                                                <i class="fa-solid fa-star"></i>{{$category[$i]['vote_average']}}
                                                            </div>
                                                            <div class="col-sm-6">
                                                                {{$category[$i]['release_date']}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <div class="d-flex flex-row justify-content-sm-center">
                                            @for ($j = $i; $j < ($i + 5); $j++)
                                                <div class="col-md-2 me-2 col-lg-2">
                                                    <a href="/movies/{{$category[$j]['id']}}"><img src="https://image.tmdb.org/t/p/original/{{$category[$j]['poster_path']}}" height="220" width="190" alt="..." ></a>
                                                    <div>
                                                        <div style="font-size: 14px; font-weight:bolder;color:white;text-align:center">{{$category[$j]['title']}}</div>
                                                        <div class="d-flex justify-content-center bg-gray bg-info mb-2">
                                                            <div class="col-sm-4">
                                                                <i class="fa-solid fa-star"></i>{{$category[$j]['vote_average']}}
                                                            </div>
                                                            <div class="col-sm-6">
                                                                {{$category[$j]['release_date']}}
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                @endif
                            @endfor
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#{{strtolower($key)}}" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#{{strtolower($key)}}" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>



{{-- <div class="d-flex flex-row">
    @foreach ($category as $item)
    <div class="me-2 mb-5">
            <img class="rounded" src="{{asset($item['img_url'])}}" height="250" width="150" alt="">
    </div>
    @endforeach
</div>

/* [▼ // app\Http\Controllers\MovieAppController.php:33
  0 => array:10 [▼
    "iso_639_1" => "en"
    "iso_3166_1" => "US"
    "name" => "ATHENA directed by Romain Gavras | Official Trailer | Netflix"
    "key" => "vRunUkdkK8s"
    "site" => "YouTube"
    "size" => 1080
    "type" => "Trailer"
    "official" => true
    "published_at" => "2022-08-24T15:10:00.000Z"
    "id" => "6306a8bdb04228007a5816a8"
  ]
] */


<div class="carousel-inner" style="top: 15px;">
    <div class="carousel-item active">
        <div class="d-flex flex-row justify-content-sm-center">
            <div class="col-md-2 me-2 col-lg-2">
                <img src="images/Athena.jpg" height="220" width="200" alt="..." >
            </div>
            <div class="col-md-2 me-2 col-lg-2">
                <img src="images/batman and superman-battle of the super sons.jpg" height="220" width="200" alt="..." >
            </div>
            <div class="col-md-2 me-2 col-lg-2 me-2">
                <img src="images/57394.jpg" height="220" width="200" alt="..." >
            </div>

            <div class="col-md-2 me-2 col-lg-2">
                <img src="images/85182.jpg" height="220" width="200" alt="..." >
            </div>
            <div class="col-md-2 me-2 col-lg-2">
                <img src="images/blackout.jpg" height="220" width="200" alt="..." >
            </div>
        </div>
    </div>
    <div class="carousel-item">
    <div class="d-flex flex-row justify-content-sm-center">
        <div class="col-md-2 me-2 col-lg-2">
            <img src="images/blackout.jpg" height="220" width="200" alt="..." >
        </div>
        <div class="col-md-2 me-2 col-lg-2">
            <img src="images/batman and superman-battle of the super sons.jpg" height="220" width="200" alt="..." >
        </div>
        <div class="col-md-2 me-2 col-lg-2 me-2">
            <img src="images/57394.jpg" height="220" width="200" alt="..." >
        </div>

        <div class="col-md-2 me-2 col-lg-2">
            <img src="images/85182.jpg" height="220" width="200" alt="..." >
        </div>
        <div class="col-md-2 me-2 col-lg-2">
            <img src="images/blackout.jpg" height="220" width="200" alt="..." >
        </div>
    </div>
    </div>
</div>
 --}}
