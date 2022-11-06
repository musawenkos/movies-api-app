<?php

namespace App\Http\Controllers;

use App\Models\GenreList;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class MovieAppController extends Controller
{
    function getGenresName($genre){
        $genre_name = [];
        foreach ($genre as $key => $value) {
            $genre_name[$key] = $value['name'];
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

        return view('movies.index',[
            'heading' => 'Category',
            'media' => 'movies',
            'categories' => $data
        ]);
    }

    //Show single movie
    public function show(Request $request){
        $urlMovie = 'https://api.themoviedb.org/3/movie/'. $request->id .'?api_key=' . env('API_KEY');
        $responses = Http::get($urlMovie)->json();

        $urlMovie = 'https://api.themoviedb.org/3/movie/' . $responses['id'] . '/videos?api_key=' . env('API_KEY') .'&append_to_response=videos';
        $responsesVid = Http::get($urlMovie)->json()["results"];

        $responses['genre_name'] = $this->getGenresName($responses['genres']);


        //dd($responses);
        return view('movies.show',[
            'movieInfo' => $responses,
            'movieVideo' => $responsesVid
        ]);
    }

    public function search(Request $request){
        $query = $request->input('q');

        $urlSearch = 'https://api.themoviedb.org/3/search/movie?api_key=' . env('API_KEY') . '&language=en-US&page=1&include_adult=false&query=' . $query;
        $responses = Http::get($urlSearch)->json()["results"];
        //dd($responses[0]["original_title"]);

        return view('movies.search',[
            'query_val' => $query,
            'results' => $responses
        ]);
    }
}
