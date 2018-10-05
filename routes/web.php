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
Route::get('/', 'TodoController@index')->name("todo.index");
Route::get('/todo', 'TodoController@index')->name("todo.index");
Route::post('/todo', 'TodoController@store')->name("todo.store");
Route::put('/todo/{Todo}', 'TodoController@update')->name("todo.update");
Route::delete('/todo/{Todo}', 'TodoController@destroy')->name("todo.destroy");
Route::get('/todo/{Todo}/edit', 'TodoController@edit')->name("todo.edit");