<?php

use Illuminate\Support\Facades\Route;
use App\Http\middleware\checkauth;

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

Route::get('/', 'HotController@index' );
Route::get('/check', 'HotController@checkAvailabe' );

Route::get('check/check', 'HotController@checkAvailabe' );
Route::get('/admin', 'AdminController@loging' );
Route::get('/dashboard', 'AdminController@dashboard' )->middleware(checkauth::class);
Route::get('/insert', 'AdminController@insert' );
Route::get('/webinsert', 'HotController@inser' );
Route::get('/CreateRoom', 'AdminController@addRooms' );
Route::get('/login', 'AdminController@login' );
Route::post('/autoth', 'AdminController@autouser' );
Route::get('/CreateRoom/insert', 'AdminController@insert' )->middleware(checkauth::class);

/*
Rout::middleware('web')
	->group(base_path())*/