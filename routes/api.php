<?php

use Illuminate\Http\Request;

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

Route::post('register','Auth\RegisterController@create');
Route::post('login','Auth\LoginController@login');
Route::get('/guest-news','NewsController@indexForGuest');



Route::group(['middleware' => 'auth:api'],function (){

        Route::resource('category', 'CategoryController');
        Route::resource('news', 'NewsController');
});
