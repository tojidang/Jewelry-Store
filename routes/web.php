<?php

use Illuminate\Support\Facades\Route;

//FE
Route::get('/', 'App\Http\Controllers\HomeController@index');


//BE
Route::get('/laravel/php/admin','App\Http\Controllers\AdminController@index');
Route::get('/laravel/php/dashboard','App\Http\Controllers\AdminController@dashboard');