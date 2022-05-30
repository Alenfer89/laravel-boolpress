<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/welcome', function () {
    return view('welcome');
});


Auth::routes();

Route::middleware('auth')
->namespace('Admin')
->prefix('admin')
->name('admin.')
->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('comments', 'CommentController');
    Route::resource('users', 'UserController');
});

//landing pages
Route::get('/', 'HomeController@index')->name('guest.home');
//Route::get('/home', 'HomeController@index')->name('guest.home');
Route::get('/contacts', 'HomeController@contact')->name('guest.contact');
Route::post('/contacts', 'HomeController@emailSender')->name('guest.sender');
Route::get('/contactsthx', 'HomeController@thanks')->name('guest.thanks');

//any-entry page
Route::get('/{any}', 'HomeController@index')->where('any','.*');
