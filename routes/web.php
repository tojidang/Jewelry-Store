<?php

use Illuminate\Support\Facades\Route;

//FE
Route::get('/', 'App\Http\Controllers\HomeController@index');




//BE
Route::get('/laravel/php/admin','App\Http\Controllers\AdminController@index');
Route::get('/laravel/php/dashboard','App\Http\Controllers\AdminController@show_dashboard');
Route::post('/laravel/php/admin-dashboard','App\Http\Controllers\AdminController@dashboard');
Route::get('/laravel/php/logout','App\Http\Controllers\AdminController@logout');