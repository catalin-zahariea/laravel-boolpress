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

Route::get('/terms-and-conditions', 'HomeController@termsAndConditions')->name('terms-and-conditions');

Route::get('/marketing-conditions', 'HomeController@marketingConditions')->name('marketing-conditions');

Route::prefix('contacts')
    ->name('contacts.')
    ->group(function() {
        Route::get('/', 'HomeController@contacts')->name('form');
        Route::post('/new-contact', 'HomeController@newContact')->name('new-contact');
        Route::get('/new-contact-greeting', 'HomeController@newContactGreeting')->name('new-contact-greeting');
    });

Route::get('/vue-posts', 'PostController@vuePosts')->name('vue-post');

Route::get('/posts', 'PostController@index')->name('guest.index');

Route::get('/posts/{slug}', 'PostController@show')->name('guest.show');

Route::prefix('categories')
    ->namespace('Categories')
    ->name('categories.')
    ->group(function() {
        Route::get('/', 'CategoriesController@index')->name('index');
        Route::get('/{slug}', 'CategoriesController@show')->name('show');
    });

    Route::prefix('tags')
    ->namespace('Tags')
    ->name('tags.')
    ->group(function() {
        Route::get('/', 'TagsController@index')->name('index');
        Route::get('/{slug}', 'TagsController@show')->name('show');
    });

Route::prefix('admin')
    ->namespace('Admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('posts', 'PostController');
});