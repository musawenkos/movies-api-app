<x-layout>
    <div class="vw-100">
        <x-search :mediaType="$media"></x-search>
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
                                                    <a href="/tv/{{$category[$i]['id']}}"><img src="https://image.tmdb.org/t/p/original/{{$category[$i]['poster_path']}}" height="220" width="200" alt="..." ></a>
                                                    <div>
                                                        <div class="text-truncate" style="font-size: 14px; font-weight:bolder;color:white;text-align:center">{{$category[$i]['name']}}</div>
                                                        <div class="d-flex justify-content-center bg-gray bg-info mb-2 ">
                                                            <div class="col-sm-4">
                                                                <i class="fa-solid fa-star"></i>{{$category[$i]['vote_average']}}
                                                            </div>
                                                            <div class="col-sm-6">
                                                                {{$category[$i]['vote_count']}}
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
                                                    <a href="/tv/{{$category[$j]['id']}}"><img src="https://image.tmdb.org/t/p/original/{{$category[$j]['poster_path']}}" height="220" width="190" alt="..." ></a>
                                                    <div>
                                                        <div class="text-truncate" style="font-size: 14px; font-weight:bolder;color:white;text-align:center">{{$category[$j]['name']}}</div>
                                                        <div class="d-flex justify-content-center bg-gray bg-info mb-2">
                                                            <div class="col-sm-4">
                                                                <i class="fa-solid fa-star"></i>{{$category[$j]['vote_average']}}
                                                            </div>
                                                            <div class="col-sm-6">
                                                                {{$category[$j]['vote_count']}}
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
