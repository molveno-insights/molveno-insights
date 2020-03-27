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
Route::get('/index', 'VideoController@index')->name('videopage');

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

        Route::get('/category', 'CategoryController@index')->name('category.index');

        Route::get('/category/create', 'CategoryController@create')->name('category.create');
        Route::post('/category/create', 'CategoryController@insert');

        Route::get('/category/{category}/edit', 'CategoryController@edit')->name('category.edit');
        Route::post('/category/{category}/edit', 'CategoryController@update');

        Route::get('/category/{category}/delete', 'CategoryController@delete')->name('category.delete');

        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('/category', 'CategoryController@index')->name('category.index');
    });
});

Auth::routes(['register' => false, 'password.request' => false, 'reset' => false]);

Route::post('/media/{media}/like', 'VideoController@like')->name('videopage.like');
Route::post('/media/{media}/dislike', 'VideoController@dislike')->name('videopage.dislike');
Route::post('/media/{media}/view', 'VideoController@view')->name('videopage.view');
Route::post('/', 'MainController@profile');
