<?php

use Illuminate\Support\Facades\Route;


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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/posts', 'PostController@index')->name('guest.index');

Route::get('/posts/{slug}', 'PostController@show')->name('guest.show');

Route::prefix('categories')
    ->namespace('Categories')
    ->name('categories.')
    ->group(function() {
        Route::get('categories', 'CategoriesController@index')->name('index');
        Route::get('categories/{id}', 'CategoriesController@show')->name('show');
    });

    Route::prefix('tags')
    ->namespace('Tags')
    ->name('tags.')
    ->group(function() {
        Route::get('tags', 'TagsController@index')->name('index');
        Route::get('tags/{id}', 'TagsController@show')->name('show');
    });

Route::prefix('admin')
    ->namespace('Admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('posts', 'PostController');
});