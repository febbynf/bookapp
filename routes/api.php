<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// menambahkan route untuk author
Route::get('/author','AuthorController@all');
Route::get('/author/{id}','AuthorController@show');
Route::post('/author','AuthorController@store');
Route::put('/author/{id}','AuthorController@update');
Route::delete('/author/{id}','AuthorController@delete');

// menambahkan route untuk book
Route::get('/book','BookController@all');
Route::get('/book/{id}','BookController@show');
Route::post('/book','BookController@store');
Route::put('/book/{id}','BookController@update');
Route::delete('/book/{id}','BookController@delete');