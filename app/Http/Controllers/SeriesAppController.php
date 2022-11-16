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
        $mediaType = 'tv';
        $appController = new AppController();

        return view('series.search',[
            'query_val' => $query,
            'results' => $appController->searchMedia($query,$mediaType)
        ]);
    }

    //Show single tv
    public function show(Request $request){
        $appController = new AppController();
        $responses = $appController->getMediaAPI($request->id,'tv');

        //dd($responses);
        $appController->addViewedMedia($request->id,'tv',auth()->id());

        $responses['genre_name'] = $appController->getGenresName($responses['genres']);

        return view('series.show',[
            'seriesInfo' => $responses,
            'seriesVideo' => $appController->getRandomMediaVideo($request->id,'tv')
        ]);
    }
}
