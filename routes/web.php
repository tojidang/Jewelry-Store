<?php

use Illuminate\Support\Facades\Route;

//FE
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('laravel/php/trangchu/', 'App\Http\Controllers\HomeController@index');


//Category Home
Route::get('laravel/php/show-category/{category_id}', 'App\Http\Controllers\CategoryProduct@show_category');
Route::get('laravel/php/show-brand/{brand_id}', 'App\Http\Controllers\BrandProduct@show_brand');

Route::get('laravel/php/product-detail/{product_id}', 'App\Http\Controllers\ProductController@product_detail');
Route::get('laravel/php/product-home', 'App\Http\Controllers\ProductController@product_home');


//BE
Route::get('laravel/php/admin','App\Http\Controllers\AdminController@index');
Route::get('laravel/php/dashboard','App\Http\Controllers\AdminController@show_dashboard');
Route::post('laravel/php/admin-dashboard','App\Http\Controllers\AdminController@dashboard');
Route::post('laravel/php/logout','App\Http\Controllers\AdminController@logout');


//Category Product
Route::get('laravel/php/add-category-product','App\Http\Controllers\CategoryProduct@add_category_product');
Route::get('laravel/php/all-category-product','App\Http\Controllers\CategoryProduct@all_category_product');

Route::post('laravel/php/save-category-product','App\Http\Controllers\CategoryProduct@save_category_product');
Route::post('laravel/php/update-category-product/{category_id}','App\Http\Controllers\CategoryProduct@update_category_product');

Route::get('laravel/php/edit-category-product/{category_id}','App\Http\Controllers\CategoryProduct@edit_category_product');
Route::get('laravel/php/delete-category-product/{category_id}','App\Http\Controllers\CategoryProduct@delete_category_product');

Route::get('laravel/php/active-category-product/{category_id}','App\Http\Controllers\CategoryProduct@active_category_product');
Route::get('laravel/php/inactive-category-product/{category_id}','App\Http\Controllers\CategoryProduct@inactive_category_product');



//Brand Product
Route::get('laravel/php/add-brand-product','App\Http\Controllers\BrandProduct@add_brand_product');
Route::get('laravel/php/all-brand-product','App\Http\Controllers\BrandProduct@all_brand_product');

Route::post('laravel/php/save-brand-product','App\Http\Controllers\BrandProduct@save_brand_product');
Route::post('laravel/php/update-brand-product/{brand_id}','App\Http\Controllers\BrandProduct@update_brand_product');

Route::get('laravel/php/edit-brand-product/{brand_id}','App\Http\Controllers\BrandProduct@edit_brand_product');
Route::get('laravel/php/delete-brand-product/{brand_id}','App\Http\Controllers\BrandProduct@delete_brand_product');

Route::get('laravel/php/active-brand-product/{brand_id}','App\Http\Controllers\BrandProduct@active_brand_product');
Route::get('laravel/php/inactive-brand-product/{brand_id}','App\Http\Controllers\BrandProduct@inactive_brand_product');


//Product
Route::get('laravel/php/add-product','App\Http\Controllers\ProductController@add_product');
Route::get('laravel/php/all-product','App\Http\Controllers\ProductController@all_product');

Route::post('laravel/php/save-product','App\Http\Controllers\ProductController@save_product');
Route::post('laravel/php/update-product/{product_id}','App\Http\Controllers\ProductController@update_product');

Route::get('laravel/php/edit-product/{product_id}','App\Http\Controllers\ProductController@edit_product');
Route::get('laravel/php/delete-product/{product_id}','App\Http\Controllers\ProductController@delete_product');

Route::get('laravel/php/active-product/{product_id}','App\Http\Controllers\ProductController@active_product');
Route::get('laravel/php/inactive-product/{product_id}','App\Http\Controllers\ProductController@inactive_product');

//Cart
Route::post('laravel/php/save-cart','App\Http\Controllers\CartController@save_cart');
// Route::get('laravel/php/show-cart','App\Http\Controllers\CartController@show_cart');
Route::get('laravel/php/delete-to-cart/{rowId}','App\Http\Controllers\CartController@delete_to_cart');

//Checkout
Route::get('laravel/php/login-checkout','App\Http\Controllers\CheckoutController@login_checkout');
Route::get('laravel/php/logout','App\Http\Controllers\CheckoutController@logout');
Route::get('laravel/php/registor-checkout','App\Http\Controllers\CheckoutController@registor_checkout');
Route::post('laravel/php/add-customer','App\Http\Controllers\CheckoutController@add_customer');

Route::post('laravel/php/save-checkout','App\Http\Controllers\CheckoutController@save_checkout');


Route::get('laravel/php/checkout','App\Http\Controllers\CheckoutController@checkout');