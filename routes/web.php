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

use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@index');

Route::get('/about', 'AboutController@index');

Route::get('/contact', 'ContactController@index');

Route::get('/blog/{slug}', 'PostController@details')->name('blogdata.details');

Route::get('/blog', 'PostController@index');

Route::get('/shop', 'ShopController@index');

Route::get('/works', 'WorkController@index')->name('works.index');
Route::get('/works/{slug}', 'WorkController@show')->name('works.show');

Route::get('/work/data', function () {
    return view('projects');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('mail/contact', 'ContactMailController@index')->name('mail.contact');
