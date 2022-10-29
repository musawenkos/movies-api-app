<x-layout>
    <div id="movie-trailer" class="d-flex flex-row text-white text-center vw-100 vh-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.8)), url(images/57394.jpg);">
        <div id="movie-trailer-info" class="w-50">
            <div class="align-bottom ">
                <div class="display-6 mb-4">The Dark Knight</div>
                <div class="d-flex flex-row justify-content-center">
                    <button class="btn me-2 btn-primaryBgColor">Action</button>
                    <button class="btn btn-primaryBgColor me-2">Crime</button>
                    <button class="btn btn-primaryBgColor me-2">Drama</button>
                </div>
                <div class="mt-4">When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.</div>
            </div>
        </div>
        <div id="movie-trailer-video" class="w-50">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/LDG9bisJEaI?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div class="vw-100">
        <div class="ms-4 mt-3" >
            @foreach ($categories as $key => $category)
                <div class="mw-80 ms-2 me-2 mb-3">
                    <div class="text-white fw-bold fs-4 ps-4">{{$key}}</div>
                    <div id="{{strtolower($key)}}" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                        <div class="carousel-inner" style="top: 15px;">
                            @for ($i = 0; $i < count($category); $i++)
                                @if ($i == 0)
                                    <div class="carousel-item active">
                                        
                                    </div>
                                @else
                                    <div class="carousel-item">

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
