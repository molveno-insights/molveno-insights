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

Route::get('/', 'MainController@index')->name('welcome');
// Route::get('/base-layout-test', function() {
//     return view('layout.adminbase');
// });

// Route::get('/admin', function() {
//     return view('layout.admin');
// });

// Route::get('/base-layout', 'Admin@show')->name('admin.show');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/', 'Admin@index');

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
        Route::get('/media', 'MediaController@index')->name('media.index');
    });
});

Auth::routes(['register' => false, 'password.request' => false, 'reset' => false]);

Route::get('/home', 'HomeController@index')->name('home');
