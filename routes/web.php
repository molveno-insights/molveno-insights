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

Route::resource('/', 'MainController');
// function () {
//     return view('welcome', ['media' => \App\Media::all()]);
// });

Route::get('/user', 'UserController@index');

Route::resource('/media', 'MediaController');