<?php

namespace App\Http\Controllers;

use App\Models\GenreList;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;


class AppController extends Controller
{

    function getGenresName($genre){
        $genre_name = [];
        foreach ($genre as $key => $value) {
            $genre_name[$key] = $value['name'];
        }
        return $genre_name;

    }

    function getGenreNameList($genre_ids){
        $genre_name = [];
        for ($i=0; $i < count($genre_ids); $i++) {
            $gName = GenreList::find($genre_ids[$i]);
            $genre_name[$i] = $gName->name;
        }

        return $genre_name;
    }

    function getMoviesByGenre(){
        $responses = Http::pool(function (Pool $pool){
            $genreList = GenreList::all();
            $req = [];
            for ($i=0; $i < count($genreList); $i++) {
                $req[$i] = $pool->as($genreList[$i]->name)->get('https://api.themoviedb.org/3/discover/movie?api_key='. env('API_KEY') .'&language=en-US&with_genres='. $genreList[$i]->id);
            }
            return $req;
        });
        return $responses;
    }

    function getMoviesByCategories(){
        $data = [];
        $responses = $this->getMoviesByGenre();
        foreach ($responses as $genre => $value) {
            $data[$genre] = $responses[$genre]->json()["results"];
        }
        return $data;
    }

    function getRandomMovieVideo($id){
        $urlMovie = 'https://api.themoviedb.org/3/movie/' . $id . '/videos?api_key=' . env('API_KEY') .'&append_to_response=videos';
        $responsesVid = Http::get($urlMovie)->json()["results"];
        return $responsesVid;
    }

    function getMovieAPI($id){
        $urlMovie = 'https://api.themoviedb.org/3/movie/'. $id .'?api_key=' . env('API_KEY');
        $responses = Http::get($urlMovie)->json();
        return $responses;
    }

    function searchMedia($query,$mediaType){
        $urlSearch = 'https://api.themoviedb.org/3/search/'. $mediaType  .'?api_key=' . env('API_KEY') . '&language=en-US&page=1&include_adult=false&query=' . $query;
        $responses = Http::get($urlSearch)->json()["results"];
        return $responses;
    }



    //Show home page => trailer and all movies
    public function index(){
        $movieByCategory = $this->getMoviesByCategories();
        $genreList = GenreList::all();
        $randomGenre = $genreList[Rand(0, count($genreList)-1)]->name;
        $homeRandMovie = $movieByCategory[$randomGenre][Rand(0, count($movieByCategory[$randomGenre])-1)];
        $homeRandMovie['genre_name'] = $this->getGenreNameList($homeRandMovie['genre_ids']);

        return view('home.index',[
            'heading' => 'Category',
            'homeRandMovie' => $homeRandMovie,
            'homeRandTrailer' => $this->getRandomMovieVideo($homeRandMovie['id']),
            'categories' => $movieByCategory
        ]);
    }


}
