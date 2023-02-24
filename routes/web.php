<?php

use Illuminate\Support\Facades\Route;

//FE
Route::get('/', 'App\Http\Controllers\HomeController@index');




//BE
Route::get('/laravel/php/admin','App\Http\Controllers\AdminController@index');
Route::get('/laravel/php/dashboard','App\Http\Controllers\AdminController@show_dashboard');
Route::post('/laravel/php/admin-dashboard','App\Http\Controllers\AdminController@dashboard');
Route::get('/laravel/php/logout','App\Http\Controllers\AdminController@logout');


//Category Product
Route::get('/laravel/php/add-category-product','App\Http\Controllers\CategoryProduct@add_category_product');
Route::get('/laravel/php/all-category-product','App\Http\Controllers\CategoryProduct@all_category_product');
Route::post('/laravel/php/save-category-product','App\Http\Controllers\CategoryProduct@save_category_product');

Route::get('/laravel/php/active-category-product/{category_id}','App\Http\Controllers\CategoryProduct@active_category_product');
Route::get('/laravel/php/inactive-category-product/{category_id}','App\Http\Controllers\CategoryProduct@inactive_category_product');