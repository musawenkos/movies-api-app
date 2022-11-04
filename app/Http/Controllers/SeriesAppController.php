<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class SeriesAppController extends Controller
{
    //Show all series
    public function index(){

        //dd($responsesGenre[0]['name']);
        $data = [];
        $responses = Http::pool(function (Pool $pool){
            $urlGenreList = 'https://api.themoviedb.org/3/genre/tv/list?api_key='. env('API_KEY') .'&language=en-US';
            $responsesGenre = Http::get($urlGenreList)->json()["genres"];
            $genreList = $responsesGenre;
            $req = [];
            for ($i=0; $i < count($genreList); $i++) {
                $req[$i] = $pool->as($genreList[$i]['name'])->get('https://api.themoviedb.org/3/discover/tv?api_key='. env('API_KEY') .'&language=en-US&with_genres='. $genreList[$i]['id']);
            }
            return $req;
        });
        foreach ($responses as $key => $value) {
            $data[$key] = $responses[$key]->json()["results"];
        }

        //dd($data);

        return view('series.index',[
            'heading' => 'Category',
            'media' => 'tv',
            'categories' => $data
        ]);
    }

    public function search(Request $request){
        $query = $request->input('q');

        $urlSearch = 'https://api.themoviedb.org/3/search/tv?api_key=' . env('API_KEY') . '&language=en-US&page=1&include_adult=false&query=' . $query;
        $responses = Http::get($urlSearch)->json()["results"];
        //dd($responses[0]["original_title"]);

        return view('series.search',[
            'query_val' => $query,
            'results' => $responses
        ]);
    }
}
