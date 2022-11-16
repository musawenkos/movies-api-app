<?php

namespace App\Http\Controllers;

use App\Models\GenreList;
use App\Models\ViewedMedia;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\AppController;

class MovieAppController extends Controller
{


    //Show all movies
    public function index(){
        $appController = new AppController();

        return view('movies.index',[
            'heading' => 'Category',
            'media' => 'movies',
            'categories' => $appController->getMoviesByCategories()
        ]);
    }

    public function search(Request $request){
        $query = $request->input('q');
        $mediaType = 'movie';
        $appController = new AppController();

        return view('movies.search',[
            'query_val' => $query,
            'results' => $appController->searchMedia($query,$mediaType)
        ]);
    }

    //Show single movie
    public function show(Request $request){
        $appController = new AppController();
        $responses = $appController->getMediaAPI($request->id,'movie');

        $appController->addViewedMedia($request->id,'movie',auth()->id());
        //dd($responses);

        $responses['genre_name'] = $appController->getGenresName($responses['genres']);

        return view('movies.show',[
            'movieInfo' => $responses,
            'movieVideo' => $appController->getRandomMediaVideo($request->id,'movie')
        ]);
    }
}
