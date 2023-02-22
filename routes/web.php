<?php

use Illuminate\Support\Facades\Route;

//FE
Route::get('/', 'App\Http\Controllers\HomeController@index');


//BE
Route::get('/laravel/php/admin','App\Http\Controllers\AdminController@index');