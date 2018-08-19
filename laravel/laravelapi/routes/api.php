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


Route::get('notes', 'NotesController@index');
Route::get('notes/{article}', 'NotesController@show');
Route::post('notes', 'NotesController@store');
Route::put('notes/{article}', 'NotesController@update');
Route::delete('notes/{article}', 'NotesController@delete');
