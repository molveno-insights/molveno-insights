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

// Route::resource('/', 'MainController');
Route::get('/', 'MainController@index');
Route::get('/base-layout-test', function() {
    return view('layout.adminbase');
});

Route::get('/admin', function() {
    return view('layout.admin');
});

Route::get('/base-layout', 'Admin@show')->name('admin.show');


// Route::resource('/', 'MainController');
// function () {
//     return view('welcome', ['media' => \App\Media::all()]);
// });

// Route::get('/user', 'UserController@index');

// Route::resource('/media', 'MediaController');




Route::get('media', 'MediaController@index')->name('media.index');

// Create routes
Route::get('/media/create', 'MediaController@create')->name('media.create');
Route::post('/media/create', 'MediaController@insert');

// Update routes
Route::get('/media/{media}/edit', 'MediaController@edit')->name('media.edit');
Route::post('/media/{media}/edit', 'MediaController@update');

// Delete route
Route::get('/media/{media}/delete', 'MediaController@delete')->name('media.delete');

// Listing (read) routes
Route::get('/media/{media}', 'MediaController@show')->name('media.show');

