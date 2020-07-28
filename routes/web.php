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

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('topic/{slug}', 'HomeController@topic')->name('topic');

Route::group([
    'prefix' => 'manage',
    'namespace' => 'Manage',
    'as' => 'manage.',
    'middleware' => ['auth', 'verified']
], function () {

    Route::get('/', 'DashboardController@index');

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    Route::resource('tags', 'TagController');

    Route::resource('topics', 'TopicController');

    Route::resource('posts', 'PostController');

    Route::resource('users', 'UserController');

});

Route::get('{slug}', 'HomeController@single')->name('single');

