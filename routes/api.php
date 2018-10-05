<?php

use Illuminate\Http\Request;

/**
 * Setup of all the routes used for the API.
 * -----------------------------------------
 */

Route::get('/todo', 'Api\v1\TodoController@index')->name("todo.api.index");
Route::post('/todo', 'Api\v1\TodoController@store')->name("todo.api.store");
Route::get('/todo/{Todo}', 'Api\v1\TodoController@show')->name("todo.api.show");
Route::put('/todo/{Todo}', 'Api\v1\TodoController@update')->name("todo.api.update");
Route::delete('/todo/{Todo}', 'Api\v1\TodoController@destroy')->name("todo.api.delete");

