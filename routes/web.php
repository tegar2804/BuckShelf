<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function()
{ 
    Route::get('/', 'BookController@index');

    Route::get('/book', 'BookController@all');
    Route::get('/book/{book:slug}', 'BookController@show');

    Route::get('/categories', 'CategoryController@index');

    Route::group(['middleware' => ['guest']], function() {
        Route::get('/login', 'LoginController@index')->name('login');
        Route::post('/login', 'LoginController@login');
        Route::get('/register', 'RegisterController@index');
        Route::post('/register', 'RegisterController@regis');
        //forgot-pass
    });

    Route::group(['middleware' => ['auth']], function() {
        Route::post('/logout', 'LoginController@logout');

        Route::get('/profile', 'UserController@index');

        Route::put('/book/{book:slug}', 'CollectionController@rate');
        Route::get('/collection', 'CollectionController@index');

        Route::get('/upload/checkSlug', 'UploadController@checkSlug');
        Route::resource('/upload', 'UploadController');
        
        Route::get('/cart', 'CartController@index');

        //history
        //history/invoice
    });
});