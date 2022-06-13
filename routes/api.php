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

Route::post('/register', 'App\Http\Controllers\Api\AuthController@register');
Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');

//add newsfeed api with auth
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/newsfeed', 'App\Http\Controllers\Api\NewsfeedController@store');
    Route::get('/newsfeed', 'App\Http\Controllers\Api\NewsfeedController@index');
    Route::get('/newsfeed/{id}', 'App\Http\Controllers\Api\NewsfeedController@show');
    Route::put('/newsfeed/{id}', 'App\Http\Controllers\Api\NewsfeedController@update');
    Route::delete('/newsfeed/{id}', 'App\Http\Controllers\Api\NewsfeedController@destroy');
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });