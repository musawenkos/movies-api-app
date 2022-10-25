<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('movies',[
        'heading' => 'Category',
        'categories' => [
            'Adventure' => [
                [
                    "id" => 960704,
                    "title"=> "Athena",
                    "img_url" => 'images/Athena.jpg',
                ],
                [
                    "id" => 960704,
                    "title"=> "Secret Headquarters",
                    "img_url" => 'images/secret_headquarters.jpg',
                ],
                [
                    "id" => 960704,
                    "title"=> "Blackout",
                    "img_url" => 'images/blackout.jpg',
                ],

            ],
            'Action' => [
                [
                    "id" => 960704,
                    "title"=> "The Battle at Lake Changjin II",
                    "img_url" => 'images/The Battle at Lake Changjin II.jpg',
                ],
                [
                    "id" => 960704,
                    "title"=> "Batman and Superman: Battle of the Super Sons",
                    "img_url" => 'images/batman and superman-battle of the super sons.jpg',
                ],
                [
                    "id" => 960704,
                    "title"=> "Lou",
                    "img_url" => 'images/Lou.jpg',
                ],
            ],
            'Drama' => [
                [
                    "id" => 960704,
                    "title"=> "Athena",
                    "img_url" => 'images/Athena.jpg',
                ],
                [
                    "id" => 960704,
                    "title"=> "Secret Headquarters",
                    "img_url" => 'images/secret_headquarters.jpg',
                ],
                [
                    "id" => 960704,
                    "title"=> "Blackout",
                    "img_url" => 'images/blackout.jpg',
                ],

            ],
        ]
    ]);
});
