<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
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

Route::post('create','ApiController@create');
Route::get('show','ApiController@show');
Route::get('/prod/{id}','ApiController@sid');
Route::get('/prod/{id}','ApiController@sid');
Route::post('/produpdate/{id}','ApiController@update');
Route::delete('/delete/{id}','ApiController@destroy');