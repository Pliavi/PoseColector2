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

Route::get('/', 'LoginController@index');
Route::name('login')->post('/login', 'LoginController@login');

Route::name('frame')->get('/{id}', 'FrameController@getFrame');
Route::name('save')->post('save', 'FrameController@saveFrame');
Route::name('finish')->post('finish', 'FrameController@finish');
