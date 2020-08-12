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
    return view('welcome'); //you can also use redirect instead of view
});
Route::get('articles', 'ArticleController@show');
Route::get('articles/add', 'ArticleController@Add');
Route::post('articles/add', 'ArticleController@save');
// Route::get('/sample/{id}', function ($id) { passing data from one page to another
//     echo $id;
//     return view('sample');
// });

Route::view('/sample1','sample1');  //another way of routing
