<?php

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


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Product/Add-Product','ProductController@create')->name('create');
Route::Post('/Product/store','ProductController@store')->name('store');
Route::get('/Product/Product-list','ProductController@index')->name('index');
Route::get('/Product/Edit-Product/{id}','ProductController@edit')->name('edit');
Route::put('/Product/Update-Products/{id}','ProductController@update')->name('update');
Route::delete('/Product/Delete-Products/{id}','ProductController@destroy')->name('delete');

Route::get('/home', 'HomeController@index')->name('home');
