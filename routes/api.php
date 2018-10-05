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

Route::get('/todo', 'Api\TodoController@index')->name("todo.api.index");
Route::post('/todo', 'Api\TodoController@store')->name("todo.api.store");
Route::get('/todo/{Todo}', 'Api\TodoController@show')->name("todo.api.show");
Route::put('/todo/{Todo}', 'Api\TodoController@update')->name("todo.api.update");
Route::delete('/todo/{Todo}', 'Api\TodoController@destroy')->name("todo.api.delete");
Route::get('/todo/{Todo}/edit', 'Api\TodoController@edit')->name("todo.api.edit");
