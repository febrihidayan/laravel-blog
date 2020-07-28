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


Route::group([
    'prefix' => 'manage',
    'namespace' => 'Manage',
    'as' => 'manage.'
], function () {

    Route::get('/', 'DashboardController@index');

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    Route::resource('tags', 'TagController');

    Route::resource('topics', 'TopicController');

    Route::resource('posts', 'PostController');

    Route::resource('users', 'UserController');

});

