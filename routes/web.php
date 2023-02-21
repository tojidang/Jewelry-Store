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
//FE
Route::get('/', 'App\Http\Controllers\HomeController@index');

//BE
Route::get('/laravel/php/admin', 'App\Http\Controllers\AdminController@index');