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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'Admin\Api\AuthController@login')->name('api.login');

Route::group(['middleware' => ['auth:api'], 'namespace' => 'Admin\Api'], function () {
    Route::get('users', 'ApiController@users')->name('jsonUsers');
    Route::get('partners', 'ApiController@partners')->name('jsonPartners');
    Route::get('occurrencies', 'ApiController@occurrencies')->name('jsonOccurrencies');
});
