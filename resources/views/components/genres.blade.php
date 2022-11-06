@props(['genre_name'])

<div class="row justify-content-center">
    @for ($i = 0; $i < count($genre_name); $i++)
        <button class="col-sm-2 btn btn-primaryBgColor me-2 mb-1">{{$genre_name[$i]}}</button>
    @endfor
</div>
