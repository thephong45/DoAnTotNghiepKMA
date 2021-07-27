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

Route::get('/', function () {
    return view('information');
})->name('welcome');

Auth::routes();

Route::get('/settings', 'SettingsController@index')->name('settings');
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => '/admin/user'], function () {
    Route::get('/edit', 'StudentUserController@editUser')->name('editUser');

    Route::get('add', 'StudentUserController@addUser')->name('addUser');

    Route::post('/post', 'StudentUserController@postUser')->name('postUser');

    Route::get('/list', 'StudentUserController@showAll')->name('showAll');

    Route::post('/delete', 'StudentUserController@deleteUser')->name('deleteUser');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login','UserController@postLogin')->name('postLogin');
    Route::post('/login','UserController@adminLogin')->name('adminLogin');
    Route::post('/logout','UserController@getLogout')->name('getLogout');
});

