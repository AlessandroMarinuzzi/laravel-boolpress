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
// User Routes
Route::get('/', 'PageController@index')->name('welcome');
Route::get('about', 'PageController@about')->name('about');

#Contact form
#Route::get('contacts', 'PageController@contacts')->name('contacts');
#Route::post('contacts', 'PageController@sendContactForm')->name('contacts.send');

#Model related contact form
Route::get('contacts', 'ContactController@form')->name('contacts');
Route::post('contacts', 'ContactController@storeAndSend')->name('contacts.send');

#Post controller guest side.
Route::resource('posts', PostController::class)->only('index', 'show');


// Admin Routes
Auth::routes();

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function (){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts', PostController::class);
});
#Categories
Route::get('categories/{category:slug}','CategoryController@show')->name('categories.show');