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

Route::get('/new', 'PixController@new');
Route::get('/fork/{id}', 'PixController@fork');
Route::get('/pix/{id}', 'PixController@id');
Route::get('/pix/edit/{id}', 'PixController@edit');
Route::post('/pix', 'PixController@save');
Route::delete('/pix/{id}', 'PixController@del');

Route::get('login/', 'UserController@redirectToProvider');
Route::get('login/callback', 'UserController@handleProviderCallback');
Route::get('/about', 'UserController@about');
Route::get('/logout', 'UserController@page_logout');

Route::get('/users', 'UserController@users');
Route::get('/discover', 'PixController@discover');
Route::get('/{username}', 'UserController@username');



Route::get('/', 'UserController@welcome');
Route::get('/json/info', 'UserController@info');
Route::get('/json/user', 'UserController@user');
Route::get('/json/messages/{pix}', 'MsgController@list');
Route::post('/json/messages', 'MsgController@save');




