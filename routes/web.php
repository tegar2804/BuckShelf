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
        Route::get('/forgor', 'ForgorController@index');
        Route::post('/forgor', 'ForgorController@sendLink');
    });
    
    Route::group(['middleware' => ['isAdmin']], function() {
    
    });
    
    Route::group(['middleware' => ['auth']], function() {
        Route::post('/logout', 'LoginController@logout');

        Route::get('/profile', 'UserController@index');
        Route::get('/profile/{user:email}/edit', 'UserController@edit');
        Route::put('/profile/{user:email}', 'UserController@update');

        Route::put('/book/{book:slug}/rating', 'CollectionController@rate');
        Route::get('/collection', 'CollectionController@index');

        Route::get('/upload/checkSlug', 'UploadController@checkSlug');
        Route::resource('/upload', 'UploadController');
        
        Route::get('/cart', 'CartController@index');
        Route::post('/cart', 'CartController@addItem');
        Route::delete('/cart/{order_id}/{book_id}', 'CartController@removeItem');
        Route::put('/cart/{order}', 'CartController@payOrder');
        Route::get('/invoice/{order}', 'InvoiceController@index');
        Route::get('/history', 'HistoryController@index');
        Route::get('/download-pdf/{book:slug}', 'DownloadController@index');
    });
});