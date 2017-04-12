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
use App\Http\Middleware\CantDoItAgain as CantDoItAgain;
use App\Http\Middleware\Logged as Logged;

Route::middleware(CantDoItAgain::class)->name('index')->get('/', 'LoginController@index');
Route::middleware(CantDoItAgain::class)->name('login')->post('/login', 'LoginController@login');

Route::middleware([CantDoItAgain::class, Logged::class])->name('frame')->get('/frame/{id}', 'FrameController@getFrame');
Route::middleware([CantDoItAgain::class, Logged::class])->name('save')->post('save', 'FrameController@saveFrame');
Route::middleware(Logged::class)->name('finish')->get('finish', 'FrameController@finish');
