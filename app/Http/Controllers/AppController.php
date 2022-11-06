<?php

namespace App\Http\Controllers;

use App\Models\GenreList;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;


class AppController extends Controller
{

    public function getGenreNameList($genre_ids){
        $genre_name = [];
        for ($i=0; $i < count($genre_ids); $i++) {
            $gName = GenreList::find($genre_ids[$i]);
            $genre_name[$i] = $gName->name;
        }

        return $genre_name;
    }

    //Show all movies
    public function index(){
        $data = [];
        $responses = Http::pool(function (Pool $pool){
            $genreList = GenreList::all();
            $req = [];
            for ($i=0; $i < count($genreList); $i++) {
                $req[$i] = $pool->as($genreList[$i]->name)->get('https://api.themoviedb.org/3/discover/movie?api_key='. env('API_KEY') .'&language=en-US&with_genres='. $genreList[$i]->id);
            }
            return $req;
        });
        foreach ($responses as $key => $value) {
            $data[$key] = $responses[$key]->json()["results"];
        }
        $genreList = GenreList::all();
        $randomGenre = $genreList[Rand(0, count($genreList)-1)]->name;
        $homeRandMovie = $data[$randomGenre][Rand(0, count($data[$randomGenre])-1)];

        $urlMovie = 'https://api.themoviedb.org/3/movie/' . $homeRandMovie['id'] . '/videos?api_key=' . env('API_KEY') .'&append_to_response=videos';
        $responsesVid = Http::get($urlMovie)->json()["results"];
        $homeRandMovie['genre_name'] = $this->getGenreNameList($homeRandMovie['genre_ids']);
        //dd($homeRandMovie);





        return view('home.index',[
            'heading' => 'Category',
            'homeRandMovie' => $homeRandMovie,
            'homeRandTrailer' => $responsesVid,
            'categories' => $data
        ]);
    }


}
