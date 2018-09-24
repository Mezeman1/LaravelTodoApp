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

<<<<<<< HEAD
Route::resource('todo', 'TodoAPIController');
=======
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('Todo', 'TodoControllerApi');
>>>>>>> d94b8f63aa7283c4ca7f54a7b7685c12d0252205
