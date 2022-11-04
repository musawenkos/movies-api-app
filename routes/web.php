<?php

use App\Models\GenreList;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\MovieAppController;
use App\Http\Controllers\SeriesAppController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AppController::class,'index']);


Route::get('/hpw/movies', [MovieAppController::class,'index']);

Route::get('/hpw/movies/search', [MovieAppController::class,'search']);



Route::get('/hpw/series', [SeriesAppController::class,'index']);
/*
Route::get('/hpw/movies/search', [MovieAppController::class,'search']); */
