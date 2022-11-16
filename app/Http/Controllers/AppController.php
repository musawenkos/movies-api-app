<?php

namespace App\Http\Controllers;

use App\Models\GenreList;
use App\Models\ViewedMedia;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;


class AppController extends Controller
{

    function addViewedMedia($id, $mediaType ,$authID){
        $media = ViewedMedia::where('media_id', $id)->where('user_id',$authID)->get();
        if (count($media) == 0) {
            ViewedMedia::create([
                "media_id" => $id,
                "type_media" => $mediaType,
                "user_id" => $authID
            ]);
        }
    }

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

    function getRandomMediaVideo($id,$mediaType){
        $urlMovie = 'https://api.themoviedb.org/3/'. $mediaType  .'/' . $id . '/videos?api_key=' . env('API_KEY') .'&append_to_response=videos';
        $responsesVid = Http::get($urlMovie)->json()["results"];
        return $responsesVid;
    }

    function getMediaAPI($id,$mediaType){
        $urlMovie = 'https://api.themoviedb.org/3/'. $mediaType  .'/'. $id .'?api_key=' . env('API_KEY');
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
            'homeRandTrailer' => $this->getRandomMediaVideo($homeRandMovie['id'],'movie'),
            'categories' => $movieByCategory
        ]);
    }

    public function show(){
        $data = [];

        $viewedMedia = ViewedMedia::where('user_id',auth()->id())->get();
        //dd($viewedMedia[0]['type_media']);
        for ($i=0; $i < count($viewedMedia); $i++) {
            if ($viewedMedia[$i]['type_media'] == 'movie') {
                $movieData = $this->getMediaAPI($viewedMedia[$i]['media_id'],'movie');
                $data[$i] = [
                    'id' => $movieData['id'],
                    'title' => $movieData['title'],
                    'poster_path' => $movieData['poster_path'],
                    'vote_average' => $movieData['vote_average'],
                    'date' => $movieData['release_date'],
                    'media_type' => 'movies'
                ];
            }else{
                $movieData = $this->getMediaAPI($viewedMedia[$i]['media_id'],'tv');
                $data[$i] = [
                    'id' => $movieData['id'],
                    'title' => $movieData['name'],
                    'poster_path' => $movieData['poster_path'],
                    'vote_average' => $movieData['vote_average'],
                    'date' => $movieData['first_air_date'],
                    'media_type' => 'series'
                ];
            }
        }

        //dd($data);


        return view('home.viewed',[
            'results' => $data
        ]);
    }




}
