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


//Route::group(['middleware' => 'auth:api'], function () {
Route::post('/newsfeed', 'App\Http\Controllers\Api\NewsfeedController@store');
Route::get('/newsfeed', 'App\Http\Controllers\Api\NewsfeedController@index');
Route::get('/newsfeed/{id}', 'App\Http\Controllers\Api\NewsfeedController@show');
Route::get('/newsfeed/search/{name}', 'App\Http\Controllers\Api\NewsfeedController@search');

Route::post('/alarm', 'App\Http\Controllers\Api\AlarmController@store');
Route::get('/alarm', 'App\Http\Controllers\Api\AlarmController@show');
Route::put('/alarm/{id}', 'App\Http\Controllers\Api\AlarmController@update');

Route::get('/hospitals/{lat}/{lng}', 'App\Http\Controllers\Api\HospitalController@getHospitals');

Route::post('/logout', 'App\Http\Controllers\Api\AuthController@logout');
//});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });