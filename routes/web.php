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

Route::get('/', function () {
    return ('welcome');
});

Route::get('/user',['uses' => 'UserController@getUsers']);


Route::get('/users','UserController@index');
Route::post('/users','UserController@add');
Route::get('/users/{id}','UserController@show');
Route::delete('/users/{id}','UserController@delete');
Route::put('/users/{id}','UserController@update');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
