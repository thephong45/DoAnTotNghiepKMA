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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'Oauth2SettingController@index')->name('home');
Route::post('/saveOauth2', 'Oauth2SettingController@saveOauth2')->name('saveOauth2');
Route::get('/welcome', 'Oauth2SettingController@welcome')->name('welcome');
Route::get('/connection', 'Oauth2SettingController@connection')->name('connection');
Route::get('/callback', 'Oauth2SettingController@callback')->name('callback');
Route::get('/logout', 'Oauth2SettingController@logout')->name('logout');




