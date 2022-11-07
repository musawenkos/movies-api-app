<x-layout>
    @if (count($results) != 0 )
        <div class="row text-white justify-content-center vw-100 p-5" style="margin-top: 10%">
            @for ($i = 0; $i < count($results); $i++)
                <div class="col-md-2 me-2 col-lg-2">
                    <a href="/hpw/series/{{$results[$i]['id']}}"><img src="https://image.tmdb.org/t/p/original/{{$results[$i]['poster_path']}}" height="220" width="200" alt="..." ></a>
                    <div>
                        <div class="text-truncate" style="font-size: 14px; font-weight:bolder;color:white;text-align:center">{{$results[$i]["name"]}}</div>
                        <div class="d-flex justify-content-center bg-gray bg-info mb-2 ">
                            <div class="col-sm-4">
                                <i class="fa-solid fa-star"></i>{{$results[$i]["vote_average"]}}
                            </div>
                            <div class="col-sm-6">
                                {{$results[$i]["first_air_date"]}}
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    @else
        <div style="margin-top: 10%;margin-left: 35%; color:white;font-weight:bolder;font-size:15px;">No results of '{{$query_val}}'</div>
    @endif
</x-layout>
