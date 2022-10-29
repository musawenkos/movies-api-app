<?php

namespace App\Http\Controllers;

use App\Models\GenreList;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;


class MovieAppController extends Controller
{
    //Show all movies
    public function index(){
        $data = [];
        $responses = Http::pool(function (Pool $pool){
            $genreList = GenreList::all();
            $req = [];
            for ($i=0; $i < count($genreList); $i++) {
                $req[$i] = $pool->as($genreList[$i]->name)->get('https://api.themoviedb.org/3/discover/movie?api_key='. env('API_KEY') .'&language=en-US&with_genre='. $genreList[$i]->id);
            }
            return $req;
        });
        foreach ($responses as $key => $value) {
            $data[$key] = $responses['Adventure']->json()["results"];
        }

        //dd($data);
        return view('movies.index',[
            'heading' => 'Category',
            'categories' => $data
        ]);
    }
}
